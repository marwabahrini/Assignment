<?php
// handle CORS
header("Access-Control-Allow-Origin: *");

// check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // decode JSON data received from AJAX request
    $data = json_decode(file_get_contents("php://input"), true);

    // verify token
    $expected_token = 'marwaToken'; // constant token
    $received_token = isset($data['token']) ? $data['token'] : '';

    if ($received_token !== $expected_token) {
        http_response_code(401); // unauthorized
        echo json_encode(array('error' => 'Unauthorized'));
        exit;
    }

    // check if action is set to get_random_number
    if (isset($data['action']) && $data['action'] === 'get_random_number') {
        // Include random.php to access its functions
        include 'random.php';

        // generate a random number
        $random_number = generate_random_number();

        // send response back to JavaScript
        header('Content-Type: application/json');
        echo json_encode(array('number' => $random_number));
        exit; // added to stop further execution
    }
}

// if the request doesn't match expected conditions, return an error
http_response_code(400);
echo json_encode(array('error' => 'Bad request'));
