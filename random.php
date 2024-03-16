<?php
// define the expected token
$expected_token = 'marwaToken';

// function to generate a random number
function generate_random_number() {
    return rand(1, 99);
}

// check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // decode JSON data received from api.php
    $data = json_decode(file_get_contents("php://input"), true);

    // check if token is provided and valid
    if (isset($data['token']) && $data['token'] === $expected_token) {
        // check if action is set to get_random_number
        if (isset($data['action']) && $data['action'] === 'get_random_number') {
            // generate a random number
            $random_number = generate_random_number();

            // send response back to api.php
            header('Content-Type: application/json');
            echo json_encode(array('number' => $random_number));
            exit; // Stop further execution
        }
    } else {
        // token is missing or invalid
        http_response_code(401); // Unauthorized
        echo json_encode(array('error' => 'Unauthorized'));
        exit;
    }
}

// if the request doesn't match expected conditions, return an error
http_response_code(400);
echo json_encode(array('error' => 'Bad request'));
