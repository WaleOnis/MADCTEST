<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $content = htmlspecialchars($_POST['message']);
    $ip = $_SERVER['REMOTE_ADDR'];

    // Email details
    $to = 'boolred852@gmail.com';
    $subject = 'MADC CONTACT MESSAGE';
    $from = 'noreply@madcwebsite.com'; // Use a valid domain email address
    
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    // Create email headers
    $headers .= 'From: '.$from."\r\n".
                'Reply-To: '.$email."\r\n" .
                'X-Mailer: PHP/' . phpversion();
    
    // Compose a simple HTML email message
    $message = "<html><body>";
    $message .= "<p><strong>Email:</strong> " . $email . "</p>";
    $message .= "<p><strong>Name:</strong> " . $name . "</p>";
    $message .= "<p><strong>Content:</strong> " . nl2br($content) . "</p>";
    $message .= "<p><strong>IP Address:</strong> " . $ip . "</p>";
    $message .= "</body></html>";
    
    // Sending email
    if(mail($to, $subject, $message, $headers)){
        echo '<script>alert("Your message has been sent."); window.location.href = "index.html";</script>';
        exit(); // Stop further execution after displaying the alert
    } else{
        echo 'Unable to send message. Please try again.';
    }
}
?>
