<?php

    $message = "Сообщение из PHP";
    $to = "robert.bond2000@mail.ru";
    $from = "eample@mail.ru";
    $subject = "Тема Сообщения";

    $subject = "=?utf-8?B?".base64_encode($subject)."?=";
    $headers = "From: $from\r\nReply-to: $from\r\nContent-type:text/plain; charset=utf-8\r\n";


    mail($to, $subject, $message,$headers);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Sending mail</h1>
    
</body>
</html>
