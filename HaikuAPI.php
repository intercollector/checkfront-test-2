<?php
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, 'https://haiku.kremer.dev/?keyword=stanza');
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     $starttime = microtime(true);
     $result = curl_exec($curl);
     $endtime = microtime(true);
     $response_time = ($endtime - $starttime)*1000;
     
     $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
     
     if($httpcode == '200'){
        $response = json_decode($result, true);
        $answer = json_encode(array('message'=>$response, 'response-code'=>$httpcode, 'response-time'=>$response_time));
        print_r($answer);
     } else {
        echo "An error occurred:\n";
        $error_msg = curl_error($curl);
        print_r($error_msg);
        exit(1);
     }
?>

