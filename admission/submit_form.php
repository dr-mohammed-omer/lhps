<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formid = $_POST['formid'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $city = $_POST['city'];
    $joinDate = $_POST['join_date'];
    $comments = $_POST['comments'];

    $to = "mdomer19967@gmail.com"; // Replace with your email address
    $subject = "New Admission Form Submission";
    $message = "
    Form ID: $formid\n
    First Name: $firstName\n
    Last Name: $lastName\n
    Email: $email\n
    Phone: $phone\n
    Date of Birth: $dob\n
    City: $city\n
    Join Date: $joinDate\n
    Comments: $comments
    ";

    $headers = "From: mdomer19967@gmail.com"; // Replace with a valid email address

    if (mail($to, $subject, $message, $headers)) {
        echo "Form submitted successfully!";
    } else {
        echo "Error in form submission.";
    }
} else {
    echo "Invalid request method.";
}
?>
