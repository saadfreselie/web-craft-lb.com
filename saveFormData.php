<?php

// Get the raw POST data
$data = file_get_contents("php://input");

// Decode JSON data
$formData = json_decode($data, true);

// Check if formData is set and not null
if (isset($formData) && is_array($formData)) {
    // Save the data to a text file
    $file = fopen("formData.txt", "a");
    fwrite($file, "Username: " . ($formData['username'] ?? '') . "\n");
    fwrite($file, "Email: " . ($formData['email'] ?? '') . "\n");
    fwrite($file, "Feedback: " . ($formData['feedback'] ?? '') . "\n\n");
    fclose($file);

    // Send a response (optional)
    echo json_encode(["message" => "Form data saved successfully"]);
} else {
    // Send an error response
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "Invalid form data"]);
}

?>
