<?php

$to = "user@gmail.com";
$subject = "Test Email";
$message = "Hello, This is a test email from PHP.";
$headers = "From: admin@gmail.com";

// Send email
if(mail($to, $subject, $message, $headers))
{
    echo "Email Sent Successfully";
}
else
{
    echo "Email Sending Failed";
}

?>