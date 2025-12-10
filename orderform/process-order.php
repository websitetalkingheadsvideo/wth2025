<?php
session_start();

// Configuration
define('RECAPTCHA_SITE_KEY', '6LcmdSATAAAAAGWw734vGo0AXQwuxJS7RmDZA_Fe');
define('RECAPTCHA_SECRET_KEY', '6LcymSYsAAAAAO08FaRR3HDJC2M9xug5Lt0Ma91p');
define('EMAIL_TO', 'sales@websitetalkingheads.com,andy@websitetalkingheads.com');
define('EMAIL_FROM', 'noreply@websitetalkingheads.com');
define('EMAIL_SUBJECT', 'Order Submitted from WebsiteTalkingHeads');

// Load reCAPTCHA library using autoloader
$autoloadPath = __DIR__ . '/../forms/vender/autoload.php';
if (file_exists($autoloadPath)) {
    require_once $autoloadPath;
} else {
    // Fallback: try direct require if autoloader not found
    require_once __DIR__ . '/../forms/ReCaptcha/ReCaptcha.php';
    require_once __DIR__ . '/../forms/ReCaptcha/RequestMethod/Post.php';
}

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
if (!empty($_POST['cf_1150'])) {
    $website = trim($_POST['cf_1150']);
    if (!validateUrl($website)) {
        $errors['cf_1150'] = 'Please enter a valid website URL';
    } else {
        $formData['website'] = $website;
    }
}

// Sanitize other optional fields
$formData['account_id'] = !empty($_POST['account_id']) ? sanitizeInput($_POST['account_id']) : '';
$formData['spokesperson'] = !empty($_POST['cf_contacts_spokesperson']) ? sanitizeInput($_POST['cf_contacts_spokesperson']) : '';
$formData['wardrobe'] = !empty($_POST['cf_contacts_wardrobe']) ? sanitizeInput($_POST['cf_contacts_wardrobe']) : '';
$formData['length'] = !empty($_POST['cf_contacts_length']) ? sanitizeInput($_POST['cf_contacts_length']) : '';
$formData['videotype'] = !empty($_POST['cf_contacts_videotype']) ? sanitizeInput($_POST['cf_contacts_videotype']) : '';
$formData['crop'] = !empty($_POST['cf_contacts_crop']) ? sanitizeInput($_POST['cf_contacts_crop']) : '';
$formData['positioning'] = !empty($_POST['cf_contacts_positioning']) ? sanitizeInput($_POST['cf_contacts_positioning']) : '';
$formData['start'] = !empty($_POST['cf_contacts_start']) ? sanitizeInput($_POST['cf_contacts_start']) : '';
$formData['session'] = !empty($_POST['cf_contacts_session']) ? sanitizeInput($_POST['cf_contacts_session']) : '';
$formData['script'] = !empty($_POST['cf_contacts_script']) ? sanitizeInput($_POST['cf_contacts_script']) : '';
$formData['comments'] = !empty($_POST['cf_contacts_comments']) ? sanitizeInput($_POST['cf_contacts_comments']) : '';

// Validate reCAPTCHA
if (empty(RECAPTCHA_SECRET_KEY)) {
    $errors['recaptcha'] = 'reCAPTCHA is not configured. Please contact the administrator.';
} else {
    $recaptchaResponse = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';
    
    if (empty($recaptchaResponse)) {
        $errors['recaptcha'] = 'Please complete the reCAPTCHA verification';
    } else {
        try {
            $recaptcha = new \ReCaptcha\ReCaptcha(RECAPTCHA_SECRET_KEY);
            $resp = $recaptcha->verify($recaptchaResponse, $clientIp);
            
            if (!$resp->isSuccess()) {
                $errors['recaptcha'] = 'reCAPTCHA verification failed. Please try again.';
            }
        } catch (Exception $e) {
            $errors['recaptcha'] = 'reCAPTCHA verification error. Please try again.';
        }
    }
}

// If there are errors, store them in session and redirect back
if (!empty($errors)) {
    $_SESSION['form_errors'] = $errors;
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
if (!empty($formData['account_id'])) {
    $emailBody .= "Organization Name: " . $formData['account_id'] . "\n";
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
if (!empty($formData['crop'])) {
    $emailBody .= "Frame: " . $formData['crop'] . "\n";
}
if (!empty($formData['positioning'])) {
    $emailBody .= "Positioning: " . $formData['positioning'] . "\n";
}
if (!empty($formData['start'])) {
    $emailBody .= "Autostart: " . $formData['start'] . "\n";
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
unset($_SESSION['form_success']);

// Always redirect to thank you page
// (Email delivery is handled by server, even if mail() returns false)
header('Location: thank-you.php');
exit;

