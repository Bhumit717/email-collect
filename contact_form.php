<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = "bhumitnasit1@gmail.com";
    $subject = "New Contact Form Submission from " . $name;

    // Email body
    $body = "You have received a new message from the contact form on your website.\n\n";
    $body .= "Name: " . $name . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Message:\n" . $message;

    // Send email
    $headers = "From: " . $email;
    if (mail($to, $subject, $body, $headers)) {
        $statusMessage = "Thank you for contacting us. We will get back to you soon.";
    } else {
        $statusMessage = "There was an error sending your message. Please try again later.";
    }
} else {
    $statusMessage = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    
    <!-- Display status message if form is submitted -->
    <?php if ($statusMessage): ?>
        <p><?php echo $statusMessage; ?></p>
    <?php endif; ?>

    <!-- Contact Form -->
    <form action="" method="POST">
        <label for="name">Your Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Your Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Your Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Send Message">
    </form>
</body>
</html>
