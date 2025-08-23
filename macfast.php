<?php
// Relay script for Radio Macfast
header("Content-Type: audio/mpeg");
header("Access-Control-Allow-Origin: *");

// Source stream
$streamUrl = "https://icecast.octosignals.com/radiomacfast";

// Open stream
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $streamUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
curl_setopt($ch, CURLOPT_BUFFERSIZE, 8192);

// Directly output to browser
curl_setopt($ch, CURLOPT_WRITEFUNCTION, function($ch, $data) {
    echo $data;
    flush();
    return strlen($data);
});

curl_exec($ch);
curl_close($ch);
