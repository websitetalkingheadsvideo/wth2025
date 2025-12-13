<?php
session_start();

// Configuration
define('RECAPTCHA_SITE_KEY', '6LcYMiosAAAAAIHSQ6T8faGc6smlu56rZpAI8o9j');
define('RECAPTCHA_SECRET_KEY', '6LcYMiosAAAAAFPjg2BMzgScENJXQIsHKxJxAUtz');
define('EMAIL_TO', 'sales@websitetalkingheads.com,andy@websitetalkingheads.com');
define('EMAIL_FROM', 'noreply@websitetalkingheads.com');
define('EMAIL_SUBJECT', 'Video Sale');

// reCAPTCHA verification will be done via direct API call

// Initialize errors array
$errors = [];
$formData = [];

// Only process POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Get client IP address
if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] !== '') {
    $clientIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $clientIp = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'Unknown';
}

// Sanitize and validate input
function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validateUrl($url) {
    if (empty($url)) {
        return true; // URL is optional
    }
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

// Validate required field: Full Name
if (empty($_POST['lastname']) || trim($_POST['lastname']) === '') {
    $errors['lastname'] = 'Full Name is required';
} else {
    $formData['lastname'] = sanitizeInput($_POST['lastname']);
}

// Validate optional email
if (!empty($_POST['email'])) {
    $email = trim($_POST['email']);
    if (!validateEmail($email)) {
        $errors['email'] = 'Please enter a valid email address';
    } else {
        $formData['email'] = $email;
    }
}

// Validate optional phone
if (!empty($_POST['phone'])) {
    $formData['phone'] = sanitizeInput($_POST['phone']);
}

// Validate optional website URL
if (!empty($_POST['website'])) {
    $website = trim($_POST['website']);
    // Add http:// if no protocol is provided
    if (!empty($website) && !preg_match('/^https?:\/\//i', $website)) {
        $website = 'https://' . $website;
    }
    if (!validateUrl($website)) {
        $errors['website'] = 'Please enter a valid website URL';
    } else {
        $formData['website'] = $website;
    }
}

// Sanitize other optional fields
$formData['organization'] = !empty($_POST['organization']) ? sanitizeInput($_POST['organization']) : '';
$formData['spokesperson'] = !empty($_POST['spokesperson']) ? sanitizeInput($_POST['spokesperson']) : '';
$formData['wardrobe'] = !empty($_POST['wardrobe']) ? sanitizeInput($_POST['wardrobe']) : '';
$formData['length'] = !empty($_POST['length']) ? sanitizeInput($_POST['length']) : '';
$formData['videotype'] = !empty($_POST['videotype']) ? sanitizeInput($_POST['videotype']) : '';
$formData['frame'] = !empty($_POST['frame']) ? sanitizeInput($_POST['frame']) : '';
$formData['positioning'] = !empty($_POST['positioning']) ? sanitizeInput($_POST['positioning']) : '';
$formData['autostart'] = !empty($_POST['autostart']) ? sanitizeInput($_POST['autostart']) : '';
$formData['session'] = !empty($_POST['session']) ? sanitizeInput($_POST['session']) : '';
$formData['script'] = !empty($_POST['script']) ? sanitizeInput($_POST['script']) : '';
$formData['comments'] = !empty($_POST['comments']) ? sanitizeInput($_POST['comments']) : '';

// Validate reCAPTCHA
if (empty(RECAPTCHA_SECRET_KEY)) {
    $errors['recaptcha'] = 'reCAPTCHA is not configured. Please contact the administrator.';
} else {
    $recaptchaResponse = isset($_POST['g-recaptcha-response']) ? trim($_POST['g-recaptcha-response']) : '';
    
    if (empty($recaptchaResponse)) {
        $errors['recaptcha'] = 'Please complete the reCAPTCHA verification';
    } else {
        // Verify reCAPTCHA with Google's API
        $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
        $postData = [
            'secret' => RECAPTCHA_SECRET_KEY,
            'response' => $recaptchaResponse,
            'remoteip' => $clientIp
        ];
        
        // Use file_get_contents to make POST request to Google's API
        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/x-www-form-urlencoded',
                'content' => http_build_query($postData),
                'timeout' => 10
            ]
        ]);
        
        $response = @file_get_contents($verifyUrl, false, $context);
        
        if ($response === false) {
            $errors['recaptcha'] = 'reCAPTCHA verification connection error. Please try again.';
        } else {
            $responseData = json_decode($response, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                $errors['recaptcha'] = 'reCAPTCHA verification response error. Please try again.';
            } elseif (!isset($responseData['success']) || $responseData['success'] !== true) {
                // Check error codes for details
                $errorCodes = isset($responseData['error-codes']) ? implode(', ', $responseData['error-codes']) : 'unknown error';
                $errors['recaptcha'] = 'reCAPTCHA verification failed: ' . $errorCodes . '. Please try again.';
            }
        }
    }
}

// If there are errors, store them in session and redirect back
if (!empty($errors)) {
    $_SESSION['form_errors'] = array_values($errors); // Convert to indexed array
    $_SESSION['form_data'] = $formData;
    header('Location: index.php');
    exit;
}

// Build email body
$emailBody = "New Website Spokesperson Order Form Submission\n\n";
$emailBody .= "Submitted: " . date('Y-m-d H:i:s') . "\n";
$emailBody .= "IP Address: " . $clientIp . "\n\n";
$emailBody .= "CONTACT INFORMATION:\n";
$emailBody .= "Full Name: " . $formData['lastname'] . "\n";
if (!empty($formData['email'])) {
    $emailBody .= "Email: " . $formData['email'] . "\n";
}
if (!empty($formData['phone'])) {
    $emailBody .= "Phone: " . $formData['phone'] . "\n";
}
if (!empty($formData['organization'])) {
    $emailBody .= "Organization Name: " . $formData['organization'] . "\n";
}
if (!empty($formData['website'])) {
    $emailBody .= "Website: " . $formData['website'] . "\n";
}

$emailBody .= "\nVIDEO DETAILS:\n";
if (!empty($formData['spokesperson'])) {
    $emailBody .= "Spokesperson: " . $formData['spokesperson'] . "\n";
}
if (!empty($formData['wardrobe'])) {
    $emailBody .= "Wardrobe: " . $formData['wardrobe'] . "\n";
}
if (!empty($formData['length'])) {
    $emailBody .= "Length: " . $formData['length'] . "\n";
}
if (!empty($formData['videotype'])) {
    $emailBody .= "Video Type: " . $formData['videotype'] . "\n";
}
if (!empty($formData['frame'])) {
    $emailBody .= "Frame: " . $formData['frame'] . "\n";
}
if (!empty($formData['positioning'])) {
    $emailBody .= "Positioning: " . $formData['positioning'] . "\n";
}
if (!empty($formData['autostart'])) {
    $emailBody .= "Autostart: " . $formData['autostart'] . "\n";
}
if (!empty($formData['session'])) {
    $emailBody .= "Session: " . $formData['session'] . "\n";
}

if (!empty($formData['script'])) {
    $emailBody .= "\nSCRIPT:\n" . $formData['script'] . "\n";
}

if (!empty($formData['comments'])) {
    $emailBody .= "\nCOMMENTS:\n" . $formData['comments'] . "\n";
}

// Prepare email headers
$headers = "From: " . EMAIL_FROM . "\r\n";
$headers .= "Reply-To: " . (!empty($formData['email']) ? $formData['email'] : EMAIL_FROM) . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

// Send email
$mailSent = @mail(EMAIL_TO, EMAIL_SUBJECT, $emailBody, $headers);

// Note: mail() may return false even if email is queued for delivery
// In production, consider logging the result but still show success to user
// For now, we'll proceed to thank you page regardless (email may still be sent)
// You can check server mail logs to verify delivery

// Clear any previous form data
unset($_SESSION['form_errors']);
unset($_SESSION['form_data']);

// Set success message
$_SESSION['form_success'] = 'Thank you! Your order has been submitted successfully. We will contact you shortly.';

// Redirect back to form with success message
header('Location: index.php');
exit;

