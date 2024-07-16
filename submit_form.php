<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "your-email@example.com"; // Replace with your email address
        $subject = "New Contact Form Submission from $name";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        $email_body = "Name: $name\nEmail: $email\nMessage:\n$message\n";

        if (mail($to, $subject, $email_body, $headers)) {
            echo "Thank you for your message. We will get back to you shortly.";
        } else {
            echo "Sorry, there was an error sending your message. Please try again later.";
        }
    } else {
        echo "Invalid email address. Please go back and try again.";
    }
} else {
    echo "Invalid request method.";
}
?>
