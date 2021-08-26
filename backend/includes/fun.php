<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// functions
header('Allow-Control-Allow-Origin: *');

include 'config/config.php';

function fetchUser($sql, $data_array = [])
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute($data_array);
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    // echo $row=$stmt->rowCount();
    if ($row = $stmt->rowCount() == 0) {
        $ok = false;
        $message[] = 'Wrong Email Or Password ';
        $result = array('ok' => $ok, 'message' => $message);
        return $result;
    } else {
        $ok = true;
        // $message[]='Logged in';
        $result = array('ok' => $ok, 'lol' => $result);
        return $result;
    }
}












function fetch_all($sql)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}




function delete($sql, $data_array = [])
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute($data_array);
}

function edit($sql, $data_array = [])
{
    global $conn;
    $stmt = $conn->prepare($sql);
    if (!$stmt->execute($data_array)) {
        $ok = false;
        $message[] = 'record alreadyexists';
        $result = array('ok' => $ok, 'message' => $message);
        return $result;
    } else {
        $message[] = 'Updated';
        $result = array('ok' => true, 'message' => $message);
        return $result;
    }
}

function insert($sql, $data_array = [])
{
    global $conn;
    $stmt = $conn->prepare($sql);
    if (!$stmt->execute($data_array)) {
        $ok = false;
        $message[] = 'record already exists';
        $result = array('ok' => $ok, 'message' => $message);
        return $result;
    } else {
        $message[] = 'Inserted';
        $result = array('ok' => true, 'message' => $message);
        return $result;
    }
}
function someMoreChecks($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function mailing($email, $subject, $content)
{

    require 'vendor/autoload.php';
    $mail   = new PHPMailer();
    try {
        $mail->SMTPDebug  =      0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       =     'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   =     true;                                   //Enable SMTP authentication
        $mail->Username   =     'holdmycup0000@gmail.com';                     //SMTP username
        $mail->Password   =     'esfevmabfneawuhs';                               //SMTP password
        $mail->SMTPSecure =     'tls';                                  //Enable TLS encryption, `ssl` also accepted;            //Enable implicit TLS encryption
        $mail->Port       =     587;                                    //Set the SMTP port for the GMAIL server;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $email            =     $_POST['email'];
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress("$email", 'Joe User');     //Add a recipient
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject    =     $subject;
        $mail->Body       =     $content;
        $mail->AltBody    =     $subject;
        $mail->send();
    } catch (Exception $e) {
        return;
    }
}




function theLazyFunction($check)
{
    if (!empty($check)) {

        if ($check % 2 == 0) {
            # code...

            if ($check == 2) {
                echo '
        <i class="fas fa-star checked"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
';
            } elseif ($check == 4) {
                echo '
        <i class="fas fa-star checked"></i>
        <i class="fas fa-star checked"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
';
            } elseif ($check == 6) {
                echo '
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        ';
            } elseif ($check == 8) {
                echo '
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star"></i>
        ';
            } elseif ($check == 10) {
                echo '
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        ';
            }
        } else {
            $check++;
            if ($check == 2) {
                echo '
        <i class="fas fa-star checked"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
';
            } elseif ($check == 4) {
                echo '
        <i class="fas fa-star checked"></i>
        <i class="fas fa-star checked"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
';
            } elseif ($check == 6) {
                echo '
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        ';
            } elseif ($check == 8) {
                echo '
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star"></i>
        ';
            } elseif ($check == 10) {
                echo '
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        <i class="fas fa-star checked"></i> 
        ';
            }
        }
    } else {
        echo '
    <i class="fas fa-star checked"></i> 
    <i class="fas fa-star checked"></i> 
    <i class="fas fa-star checked"></i> 
    <i class="fas fa-star checked"></i> 
    <i class="fas fa-star checked"></i> 
    ';
    }
}
