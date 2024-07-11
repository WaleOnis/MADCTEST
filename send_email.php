
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$content = $_POST['message'];

$to = 'olawaleonileere@yahoo.com';
$subject = 'MADC CONTACT MESSAGE';
$from = 'MADC WEBSITE';
$ip = $_SERVER['REMOTE_ADDR'];
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = "Email = " . $email . "\r\nName = " . $name . "\r\nContent = " . $content;
 
// Sending email
if(mail($to, $subject, $message, $headers)){
    echo '<script>alert("Your Message has been sent."); window.location.href = "index.html";</script>';
    exit(); // Stop further execution after displaying the alert
} else{
    echo 'Unable to send message. Please try again.';
}

?>
