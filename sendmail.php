<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->isHTML(true);

    // От кого письмо
    $mail->setFrom('robert.bond2000@mail.ru');
    // Кому адресовано
    $mail->addAddress('robert.bond10@mail.ru');
    // Тема письма
    $mail->Subject = 'Привет меня зовут Pоберт';
    
    // Рука
    $hand = 'Правая';
    if($_POST['hand']== 'left'){
        $hand = 'Левая';
    }

    // Тело письма
    $body = '<h1>Встречайте супер писбмо</h1>';

    if(trim(!empty($_POST['name']))){
        $body.="<p><srtong>Имя:</strong> ".$_POST['name']."</p>";
    }
    if(trim(!empty($_POST['email']))){
        $body.="<p><srtong>E-mail:</strong> ".$_POST['email']."</p>";
    }
    if(trim(!empty($_POST['hand']))){
        $body.="<p><srtong>Рука:</strong> ".$hand."</p>";
    }
    if(trim(!empty($_POST['age']))){
        $body.="<p><srtong>Возраст:</strong> ".$_POST['age']."</p>";
    }
    if(trim(!empty($_POST['message']))){
        $body.="<p><srtong>Сообщение:</strong> ".$_POST['message']."</p>";
    }

    if(trim(!empty($_FILES['image']['tmp_name']))){
        // Путь загрузки файла
        $filePath = __DIR__ . "/files/" . $_FILES['image']['name'];
        // Грузим файл
        if(copy($_FILES['image']['tmp-name'], $filePath)){
            $fileAttach = $filePath;
            $body.="<p><strong>Фото в приложении</strong></p>";
            $mail->addAttachment($fileAttach);
        }
    }
    
    $mail->Body = $body;

    // Отправляем
    if(!$mail->send()){
        $message = 'Ошибка';
    }else{
        $message = 'Данны отправлены';
    }

    $response = ['message' => $message];

     header('Content-type: application/json');
     echo json_encode($response);