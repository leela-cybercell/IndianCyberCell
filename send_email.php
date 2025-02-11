<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Your email address where you want to receive messages
    $to = "contact@indiancybercell.com";
    
    // Email subject
    $subject = "New Contact Form Submission from $name";
    
    // Email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";
    
    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        echo json_encode(["status" => "success", "message" => "Thank you for your message. We'll get back to you soon!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Sorry, there was an error sending your message."]);
    }
    exit;
}
?>