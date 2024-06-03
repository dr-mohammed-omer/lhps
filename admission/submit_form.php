<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input
    $errors = [];
    $requiredFields = ['first_name', 'last_name', 'email', 'phone', 'dob', 'city', 'join_date', 'comments'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $errors[$field] = ucfirst(str_replace('_', ' ', $field)) . ' is required';
        }
    }

    if (count($errors) === 0) {
        // Sanitize input
        $firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $joinDate = filter_input(INPUT_POST, 'join_date', FILTER_SANITIZE_STRING);
        $comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);

        // Process the data (e.g., save to database)
        // For demonstration purposes, we'll just print the data
        echo "First Name: $firstName<br>";
        echo "Last Name: $lastName<br>";
        echo "Email: $email<br>";
        echo "Phone: $phone<br>";
        echo "Date of Birth: $dob<br>";
        echo "City: $city<br>";
        echo "Join Date: $joinDate<br>";
        echo "Comments: $comments<br>";
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "$error<br>";
        }
    }
} else {
    http_response_code(405);
    echo 'Method Not Allowed';
}
?>
