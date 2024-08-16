<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $visitor_email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $email_from = 'info@high-tech.edu';
    $email_subject = 'New form submission';

    $email_body = "User Name: $name\n".
                  "User Email: $visitor_email\n".
                  "Subject: $subject\n".
                  "User Message: $message\n";

    $to = 'benji4genius@gmail.com';

    $headers = "From: $email_from\r\n";
    $headers .= "Reply-To: $visitor_email\r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Email sent successfully, redirect to a thank you page or the same page with a success message
        header("Location: contact.html?status=success");
        exit();
    } else {
        // Email failed to send, redirect to the same page with an error message
        header("Location: contact.html?status=error");
        exit();
    }
} else {
    // If the form wasn't submitted via POST method, redirect to the contact page
    header("Location: contact.html");
    exit();
}
?>