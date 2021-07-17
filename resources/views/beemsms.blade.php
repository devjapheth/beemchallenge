@extends('layouts.app2')
<?php
if(isset($_POST['abc'])){
          $api_key='<2fc9e2bbbb34c983>';
          $secret_key = '<MTIzZDQyOTA2ODRhZDAzMjk3ZWM0MzI3Zjc5MjlmZWNmNWMxYjlhOGM2OTNjNTg4ODMzOGVlNzVkZWRjMzg4Yg==>';
            
            $postData = array(
                'source_addr' => 'INFO',
                'encoding'=>0,
                'schedule_time' => '',
                'message' => 'Hello World',
                'recipients' => [array('recipient_id' => '1','dest_addr'=>'255744910391')]
            );
            
            $Url ='https://apisms.beem.africa/v1/send';
            
            $ch = curl_init($Url);
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt_array($ch, array(
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => array(
                    'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
                    'Content-Type: application/json'
                ),
                CURLOPT_POSTFIELDS => json_encode($postData)
            ));
            
            $response = curl_exec($ch);
            
            if($response === FALSE){
                    echo $response;
            
                die(curl_error($ch));
            }
            var_dump($response);

        
        
        
}

?>
 <form action="beemsms.php" method="POST">

<input type="submit" name="abc" value="Remind All Student" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(250, 250, 250);font-weight:bold;background:green !important"> 
</form>