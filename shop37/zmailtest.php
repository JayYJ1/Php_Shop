<?php
$to = "tntnqk12@naver.com";

$subject = "PHP 메일 발송";

$contents = "PHP mail()함수를 이용한 메일 발송 테스트";

$headers = "From: YJjeon@naver.com\r\n";



mail($to, $subject, $contents, $headers);

?>