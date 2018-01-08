<?php



$a="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
$b= substr(microtime(),2,6);

echo $otp=substr(str_shuffle($a.$b),0,5);

//sms gateway API
//REST API

//$user='abc123';
//$pass='baduc1';
//$sender='onatstop';
//$to='reciever';
//$text='opt is =',$otp;
//$url='';

//curl is the library used to call the api

//$ch=$curl_init();
//curl_setopt($ch,CURLOPT_URL,$url);
//curl_setopt($ch,CURL_URLRETURNTRANSFER,true);
//$output=curl_exec($ch);
//curl_close($ch);

//mysqli_insert_id(); read last inserted id 

?>


