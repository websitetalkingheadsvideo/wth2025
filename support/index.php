<?php
// Email address that messages will be sent to
$support_email = "support@websitetalkingheads.com";

// Email address verification
function isEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$form_submitted = false;
$error_message = '';
$success_message = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_support'])) {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    $url = isset($_POST['url']) ? trim($_POST['url']) : '';
    
    // Validation
    if ($name === '') {
        $error_message = 'You must enter your name.';
    } else if ($email === '') {
        $error_message = 'Please enter a valid email address.';
    } else if (!isEmail($email)) {
        $error_message = 'You have entered an invalid e-mail address, try again.';
    } else if ($subject === '') {
        $error_message = 'Please enter a subject for your inquiry.';
    } else if ($message === '') {
        $error_message = 'Please enter your message.';
    } else {
        // Sanitize input
        $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        
        // Prepare email content
        $e_subject = 'Support Request: ' . $subject;
        $e_content = "Support Request Details:\n\n" . $message . PHP_EOL . PHP_EOL;
        $e_details = "Sender: $name\n";
        $e_details .= "Email: $email\n";
        if ($url !== '') {
            $e_details .= "Website URL: $url\n";
        }
        $e_details .= PHP_EOL;
        $e_reply = "You can reply directly to this email to respond to $name at $email." . PHP_EOL;
        
        $msg = wordwrap($e_content . $e_details . $e_reply, 70);
        
        // Email headers
        $headers = "From: $name <$email>" . PHP_EOL;
        $headers .= "Reply-To: $email" . PHP_EOL;
        $headers .= "MIME-Version: 1.0" . PHP_EOL;
        $headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
        $headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
        $headers .= "X-Mailer: PHP/" . phpversion() . PHP_EOL;
        
        // Send email
        if (mail($support_email, $e_subject, $msg, $headers)) {
            $success_message = "Thank you <strong>$name</strong>, your support request has been submitted. We'll get back to you soon!";
            $form_submitted = true;
            // Clear form data
            $name = $email = $subject = $message = $url = '';
        } else {
            $error_message = 'There was an error sending your message. Please try again or contact us directly at ' . $support_email;
        }
    }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Support - Website Talking Heads®</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="support, help, customer service, website talking heads, video spokesperson support">
<meta name="description" content="Get support for Website Talking Heads® services. Contact our support team for assistance with your video spokesperson needs.">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="30 days">
<meta name="rating" content="general">
<?php include('../includes/css-b4.php'); ?>
<style>
.error_message {
    background-color: #f8d7da;
    color: #721c24;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
    border: 1px solid #f5c6cb;
}
.success_message {
    background-color: #d4edda;
    color: #155724;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
    border: 1px solid #c3e6cb;
}
</style>
</head>

<body>
<?php include('../includes/header25.php'); ?>

<section class="container-fluid mb-4 mt-4">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="text-center mb-4">Support</h1>
            
            <?php if ($error_message !== ''): ?>
                <div class="error_message"><?php echo $error_message; ?></div>
            <?php endif; ?>
            
            <?php if ($success_message !== ''): ?>
                <div class="success_message"><?php echo $success_message; ?></div>
            <?php endif; ?>
            
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <p class="lead text-center">Need help? We're here for you!</p>
                    
                    <?php if (!$form_submitted): ?>
                    <form method="POST" action="" class="mt-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required 
                                   value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required 
                                   value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="subject" name="subject" required 
                                   placeholder="Brief description of your issue" 
                                   value="<?php echo isset($subject) ? htmlspecialchars($subject) : ''; ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="url" class="form-label">Website URL (if applicable)</label>
                            <input type="url" class="form-control" id="url" name="url" 
                                   placeholder="https://yourwebsite.com" 
                                   value="<?php echo isset($url) ? htmlspecialchars($url) : ''; ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="message" name="message" rows="6" required 
                                      placeholder="Please provide details about your issue..."><?php echo isset($message) ? htmlspecialchars($message) : ''; ?></textarea>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" name="submit_support" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane"></i> Send Support Request
                            </button>
                        </div>
                    </form>
                    <?php else: ?>
                        <div class="text-center mt-4">
                            <a href="index.php" class="btn btn-primary">Submit Another Request</a>
                        </div>
                    <?php endif; ?>
                    
                    <hr class="my-4">
                    
                    <p class="text-center mb-2">Or contact us directly:</p>
                    <p class="text-center">
                        <a href="mailto:<?php echo $support_email; ?>" class="btn btn-outline-primary">
                            <i class="fas fa-envelope"></i> <?php echo $support_email; ?>
                        </a>
                    </p>
                    
                    <p class="text-center mt-3">
                        <a href="contact.php" class="btn btn-outline-secondary">Advanced Support Request Form</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('../includes/footer25.php'); ?>
</body>
</html>

