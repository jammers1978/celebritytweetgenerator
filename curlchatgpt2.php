<?php

$celebrity = $_POST['celebrity'];
$craziness = $_POST['craziness']/10;

$angry= $_POST['angry'];
$drunk= $_POST['drunk'];
$defensive= $_POST['defensive'];
$funny= $_POST['funny'];
$happy = $_POST['happy'];
$cocaine = $_POST['cocaine'];
$marijuana = $_POST['marijuana'];
$lsd = $_POST['lsd'];
$crack = $_POST['crack'];
$mushrooms = $_POST['mushrooms'];
$lecherous = $_POST['lecherous'];

$concatenated = "";

if ($angry != null) {
  $concatenated .= " and make it angry ";
}

if ($drunk != null) {
  $concatenated .= " and make them sound drunk ";
}

if ($defensive != null) {
  $concatenated .= " and make them sound defensive ";
}

if ($funny != null) {
  $concatenated .= " and make it funny ";
}

if ($happy != null) {
  $concatenated .= " and make them sound happy ";
}

if ($cocaine != null) {
  $concatenated .= " and make them sound like they're on cocaine ";
}

if ($marijuana != null) {
  $concatenated .= " and make them sound high on weed ";
}

if ($lsd != null) {
  $concatenated .= " and make them sound like they took a tab of acid and are just coming up ";
}

if ($crack != null) {
  $concatenated .= " and make them sound like they are on crack ";
}

if ($mushrooms != null) {
  $concatenated .= " and make them sound like they are on psychadelic mushrooms ";
}

if ($lecherous != null) {
  $concatenated .= " and make them sound lecherous ";
}

$prompt = 'Generate a 200 character sentence in parody style including hashtags as if by the celebrity '.$celebrity.$concatenated;

$endpoint = "https://api.openai.com/v1/completions";
$data = array(
    'prompt' => $prompt,
    'max_tokens' => 100,
    'model'=> 'text-davinci-003',
    'temperature' => $craziness,
    'top_p'=> 1,
    'frequency_penalty'=> 0,
    'presence_penalty'=> 0
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer >>key here<<',
));

$response = curl_exec($ch);
curl_close($ch);

echo $response;

?>
