<?php

$celebrity = $_GET['prompt'];

if (is_null($hashtags)) 
{
    $prompt = 'Picture of '.$celebrity;    
}

$imageUrl = "https://www.pngmart.com/files/22/Silicobra-Pokemon-PNG-HD.png";

// Fetch the image data from the URL
$imageData = file_get_contents($imageUrl);

// Prepare the POST request data
$postData = array(
    "image" => base64_encode($imageData)
);

http_build_query($postData);

$endpoint = "https://api.openai.com/v1/images/variations";
$data = array(
    'image' => $imageData ,
    'n' => 1,
    'size'=> '1024x1024'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: multipart/form-data',
    'Authorization: Bearer >>key here<<',
));

$response = curl_exec($ch);
curl_close($ch);
$decoded_json = json_decode($response, false);

echo $response;
?>