<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $number = htmlspecialchars($_POST['number']);
    $email = htmlspecialchars($_POST['email']);
    $date = htmlspecialchars($_POST['date']);
    $style = htmlspecialchars($_POST['style']);

    // Prepare email
    $to = "your-email@example.com";  // Replace with your email address
    $subject = "New Appointment Booking from $name";
    $message = "
    <html>
    <head>
      <title>Appointment Booking</title>
    </head>
    <body>
      <h2>New Appointment Booking</h2>
      <p><strong>Name:</strong> $name</p>
      <p><strong>Number:</strong> $number</p>
      <p><strong>Email:</strong> $email</p>
      <p><strong>Date:</strong> $date</p>
      <p><strong>Style:</strong> $style</p>
    </body>
    </html>
    ";

    // Set content-type for email (HTML format)
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";

    // Additional headers
    $headers .= "From: $email" . "\r\n";  // Senders email in case of replies

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for your booking! We will get back to you soon.";
    } else {
        echo "There was an error with your booking. Please try again.";
    }
}
?>
