<?php

$checkId = '115...';
$token = 'kM1...';

$curl = \curl_init();
\curl_setopt_array(
    $curl,
    [
        CURLOPT_URL => 'https://plagiarismcheck.org/lms/get_pdf_report',
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => "id={$checkId}&token={$token}&lms-type=moodle&oauth_consumer_key=",
    ]
);

$response = \curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$id = null;
echo $code;
if ($response && 200 === $code) {
    file_put_contents("{$checkId}.pdf", $response);
} else {
    echo $response;
    echo curl_error($curl);
}
curl_close($curl);
