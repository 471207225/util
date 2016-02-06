<?php

$file = new \CURLFile(__DIR__.'/File/55decf78e58d8.jpg');
$data = array('key'=>'key','key2'=>'key2','file'=>$file);
$url = 'http://www.zhanghu.com/Mobile/School/video';
$ch = curl_init($url);
curl_setopt($ch,CURLOPT_TIMEOUT,30);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
$rs = curl_exec($ch);

//var_dump($rs);

header('Content-type:text/html;charset=UTF-8');
echo $rs;