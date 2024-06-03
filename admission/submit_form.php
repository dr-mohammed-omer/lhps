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

    // Validation logic
    $errors = [];
    if (empty($firstName)) {
        $errors[] = "First name is required";
    }
    if (empty($lastName)) {
        $errors[] = "Last name is required";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }
    if (empty($phone)) {
        $errors[] = "Phone number is required";
    }
    if (empty($dob)) {
        $errors[] = "Date of birth is required";
    }
    if (empty($city)) {
        $errors[] = "City is required";
    }
    if (empty($joinDate)) {
        $errors[] = "Join date is required";
    }
    if (empty($comments)) {
        $errors[] = "Comments are required";
    }

    if (!empty($errors)) {
        // Return errors to the user
        echo implode("<br>", $errors);
        exit;
    }

    // If no validation errors, process the form data (e.g., store it in a database, send an email, etc.)
    // For example, sending an email:
    $to = "mdomer19967@gmail.com";
    $subject = "New Form Submission";
    $message = "Form ID: $formid\n";
    $message .= "First Name: $firstName\n";
    $message .= "Last Name: $lastName\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "Date of Birth: $dob\n";
    $message .= "City: $city\n";
    $message .= "Join Date: $joinDate\n";
    $message .= "Comments: $comments\n";
    
    $headers = "From: no-reply@leadinghighschool.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Form submitted successfully!";
    } else {
        echo "There was an error submitting the form. Please try again.";
    }
} else {
    echo "Invalid form submission.";
}
?>
