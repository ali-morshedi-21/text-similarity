<?php
// Your ID and token
$user_id = 'ad39faff';
$user_key = '8cfd64f8-6064-48dc-a032-8da7eb60833c';

// The data to send to the API
$postData = array(
    'user_id'   =>  $user_id ,
    'user_key'  =>  $user_key,
    'text1'     =>  "Some people are singing",
    'text2'     =>  "A group of people is singing"
);

// Setup cURL
$ch = curl_init('https://api.codeq.com/v1_text_similarity');
curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($postData)
));

// Send the request
$response = curl_exec($ch);

// Check for errors
if($response === FALSE){
    die(curl_error($ch));
}

// Decode the response
$responseData = json_decode($response, TRUE);

// Close the cURL handler
curl_close($ch);

// Print the date from the response
echo $responseData['text_similarity_score'];