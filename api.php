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
        // initialize cURL session
        $ch = curl_init();

        // set the cURL options
        curl_setopt($ch, CURLOPT_URL, 'http://localhost/random.php'); // URL of random.php
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return response as string
        curl_setopt($ch, CURLOPT_POST, true); // set as POST request
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // set POST data
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $expected_token // include the token in header
        ));

        // execute cURL session
        $response = curl_exec($ch);

        // check for cURL errors
        if(curl_errno($ch)){
            http_response_code(500); // internal server error
            echo json_encode(array('error' => curl_error($ch)));
            exit;
        }

        // close cURL session
        curl_close($ch);

        // output response from random.php
        echo $response;
        exit; // added to stop further execution
    }
}

// if the request doesn't match expected conditions, return an error
http_response_code(400);
echo json_encode(array('error' => 'Bad request'));
