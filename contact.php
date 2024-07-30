<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Define the recipient email and subject
    $to = "gathukiaanthony@gmail.com";
    $subject = "New Contact Form Submission";

    // Create the email body
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // Create email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        // Display a thank-you message
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Thank You</title>
            <link rel='stylesheet' href='styles.css'>
        </head>
        <body>
            <header>
                <h1>FuturePortfolio</h1>
            </header>
            
            <section id='thank-you'>
                <h2>Thank You!</h2>
                <p>Thank you for contacting us, $name. We will get back to you shortly.</p>
            </section>

            <footer>
                <p>&copy; 2024 FuturePortfolio. All rights reserved.</p>
            </footer>
        </body>
        </html>";
    } else {
        echo "There was a problem sending your email. Please try again later.";
    }
} else {
    // Redirect to the contact page if accessed without form submission
    header("Location: index.html");
    exit();
}
?>
