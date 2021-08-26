<?php
// varibales

error_reporting(E_ERROR | E_PARSE);
header('Allow-Control-Allow-Origin: *');
$message = array();
$ok = false;
$do = '';
$result = array('ok' => $ok, 'message' => $message);
include 'fun.php';




// setting routes

if (isset($_GET['do'])) {
    $do = $_GET['do'];
}

if ($do == 'login') {
    header('Allow-Control-Allow-Origin: *');
    // print_r($_POST);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $message[] = 'password or email cant be empty';
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
        } else {
            $password   =   someMoreChecks($_POST['password']);
            $email   = filter_var(someMoreChecks($_POST['email']), FILTER_SANITIZE_EMAIL);
            if (!empty($_POST['remember'])) {
                # code...
                setcookie('password', $password, time() + 60 * 60 * 24 * 30, '/', false);
                setcookie('email', $email, time() + 60 * 60 * 24 * 30, '/', false);
            } else {
                setcookie('password', $password, time() - 60 * 60 * 24 * 30, '/', false);
                setcookie('email', $email, time() - 60 * 60 * 24 * 30, '/', false);
            }
            $result = fetchUser("SELECT id,img,username,email,admins,phone,password FROM users WHERE email = '$email' ", []);

            $check = password_verify($password, $result['lol']->password);

            if ($check == true && $result['ok'] == true) {
                // fetch_all($id);
                if ($result['lol']->admins == 3) {
                    $message[] = 'You have no acccess';
                    $ok  = false;
                    $result = array('ok' => $ok, 'message' => $message);
                } else {
                    session_start();
                    $_SESSION['User'] = $result['lol'];
                    $message[] = 'good';
                    $ok = true;
                    $result = array('ok' => $ok, 'message' => $message, 'data' => $result['lol']);
                }
            } else {
                $message[] = 'Wrong Email Or Password';
                $ok = false;
                $result = array('ok' => $ok, 'message' => $message);
            }
        }
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
        $result = array('ok' => $ok, 'message' => $message);
    }
    echo json_encode($result);
} elseif ($do == 'logout') {
    session_start();
    session_unset();
    session_destroy();
    header("Location: http://localhost/tut/backend/index.html");
} elseif ($do == 'users') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // if (isset($_SESSION['User']->admins ) <= 2 ) {}
        //  (int)rtrim($_SESSION['User']->id);

        session_start();
        $id =  $_SESSION['User']->id;
        echo json_encode(fetch_all("SELECT * FROM `users` WHERE id != $id"));
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
    }
} elseif ($do == 'remove') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        delete("DELETE FROM users WHERE id = $_POST[id]", []);
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
    }
} elseif ($do == 'remove_cat') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // print_r($_POST);
        $id = $_POST['id'];
        try {
            delete("DELETE FROM categories WHERE cat_id=$id", []);
        } catch (Exception $e) {
            $message[] = 'UnValid Request';
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
        }
        // echo 'good';
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
        $result = array('ok' => $ok, 'message' => $message);
    }
} elseif ($do == 'remove_item') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // print_r($_POST);
        $id = $_POST['id'];
        try {
            delete("DELETE FROM item WHERE item_id=$id", []);
        } catch (Exception $e) {
            $message[] = 'UnValid Request';
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
        }
        // echo 'good';
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
        $result = array('ok' => $ok, 'message' => $message);
    }
} elseif ($do == 'adduser') {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // $admin = $_POST['admin'];
        // echo $admin;

        echo $admin;
        $fileName               =       $_FILES['file']['name'];
        $fileSize               =       $_FILES['file']['size'];
        $fileTmpName            =       $_FILES['file']['tmp_name'];
        $fileType               =       $_FILES['file']['type'];
        $fileError              =       $_FILES['file']['error'];
        $allowedExtensions      =       array("jpg", "jpeg", "png", "gif");
        $tmp                    =       explode('.', $fileName);
        $fileLol                =       end($tmp);
        $fileExt                =       strtolower($fileLol);
        // // echo $fileName;





        $username               =       filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $password               =       someMoreChecks($_POST['password']);
        $confirmPassword        =       someMoreChecks($_POST['connpass']);
        $email                  =       filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone                  =       filter_var(someMoreChecks($_POST['phone']), FILTER_SANITIZE_NUMBER_INT);
        $admins                 =       filter_var(someMoreChecks($_POST['admin']), FILTER_SANITIZE_NUMBER_INT);
        $ok = true;

        if (empty($username) && empty($password) && empty($confirmPassword) && empty($email) && empty($phone)) {
            $message[] = 'missing required fields';
            $ok = false;
            $error = $result;
            $result = array('ok' => $ok, 'message' => $message);
        }
        if (!preg_match('/^[a-z\d_]{2,20}$/i', $username)) {
            $ok = false;
            $message[] = 'Username can only contain letters and numbers';
            $error = $result;
            $result = array('ok' => $ok, 'message' => $message);
        }
        if (!preg_match("[^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$]", $password)) {
            $message[] = 'password must contain at least 8 characters, one uppercase letter, one lowercase letter and one number';
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
            $error = $result;
        }
        if ($password !== $confirmPassword) {
            $message[] = 'passwords do not match';
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
            $error = $result;
        }
        if (empty($admins)) {
            $admins = 4;
        }
        if (!empty($fileName) && !in_array($fileExt, $allowedExtensions)) {
            $message[] = "Only jpg, jpeg, png and gif files are allowed";
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
        } elseif (empty($fileTmpName)) {
            $file = 'user.png';
        } else {
            $file               =       rand(0, 10000000) . '_' . $fileName;
            if (!move_uploaded_file($fileTmpName, "./uploads/" . $file)) {
                $file = 'uploads/user.png';
            }
        }
        if (empty($message)) {
            try {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $result = insert("INSERT INTO users (img,username,password,email,phone,admins) VALUES ('$file','$username','$passwordHash','$email','$phone',$admins)", []);
            } catch (Exception $e) {
                $message[] = 'error';
                $ok = false;
                $error = $result;
                $result = array('ok' => $ok, 'message' => $message);
            }
        }
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
    }
    // echo json_encode($result);
} elseif ($do == 'user-seletion') {
    // var_dump($_POST);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        echo json_encode(fetchUser("SELECT img,username,id,email,phone,admins FROM users WHERE id = $id", []));
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
    }
} elseif ($do == 'item-seletion') {
    // var_dump($_POST);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        echo json_encode(fetchUser("SELECT * FROM item WHERE item_id = $id", []));
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
    }
} elseif ($do == 'cat-seletion') {
    // var_dump($_POST);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        echo json_encode(fetchUser("SELECT * FROM categories WHERE cat_id = $id", []));
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
    }
} elseif ($do == 'edit-user') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id                     =       $_POST['id'];
        $username               =       filter_var(someMoreChecks($_POST['editUsername']), FILTER_SANITIZE_STRING);
        $email                  =       filter_var(someMoreChecks($_POST['editEmail']), FILTER_SANITIZE_EMAIL);
        $phone                  =       filter_var(someMoreChecks($_POST['editPhone']), FILTER_SANITIZE_NUMBER_INT);
        $password                  =       filter_var(someMoreChecks($_POST['password']), FILTER_SANITIZE_NUMBER_INT);
        $confirmPassword                  =       filter_var(someMoreChecks($_POST['connpass']), FILTER_SANITIZE_NUMBER_INT);
        $admin                  =       $_POST['admin'];



        $fileName               =       $_FILES['editImg']['name'];
        $fileSize               =       $_FILES['editImg']['size'];
        $fileTmpName            =       $_FILES['editImg']['tmp_name'];
        $fileType               =       $_FILES['editImg']['type'];
        $fileError              =       $_FILES['editImg']['error'];

        $allowedExtensions      =       array("jpg", "jpeg", "png", "gif");
        $tmp                    =       explode('.', $fileName);
        $fileLol                =       end($tmp);
        $fileExt                =       strtolower($fileLol);

        if (!empty($username)  && !empty($email)) {
            if (!empty($fileName) && !in_array($fileExt, $allowedExtensions)) {
                $message[] = "Only jpg, jpeg, png and gif files are allowed";
                $ok = false;
                $result = array('ok' => $ok, 'message' => $message);
            } elseif (empty($fileTmpName)) {
                $file = 'user.png';
            } else {
                $file               =       rand(0, 10000000) . '_' . $fileName;
                if (!move_uploaded_file($fileTmpName, "./uploads/" . $file)) {
                    $file = 'uploads/user.png';
                }
            }
            if (!preg_match('/^[a-z\d_]{2,20}$/i', $username)) {
                $message[] = 'Username can only contain letters , numbers and not more than 20 characters';
                $ok = false;
                $result = array('ok' => $ok, 'message' => $message);
            }
            if (empty($message)) {
                try {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $result = edit("UPDATE users SET img='$file', username = '$username' ,email='$email',phone= '$phone',admins='$admin'   WHERE id = $id", []);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        } else {
            $message[] = 'cant submit empty feilds';
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
        }
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
        $result = array('ok' => $ok, 'message' => $message);
    }
    echo json_encode($result);
} elseif ($do == 'edit-cat') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $cat_name = $_POST['cat_name'];
        $cat_desc = someMoreChecks(filter_var($_POST['cat_desc'], FILTER_SANITIZE_STRING));
        if (empty($cat_desc) || empty($cat_name)) {
            $message[] = 'cant submit empty feilds';
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
        } else {
            try {
                edit("UPDATE categories SET cat_name = '$cat_name' , cat_desc = '$cat_desc' WHERE cat_id =$id", []);
                $ok = true;
                $result = array('ok' => $ok);
            } catch (Exception $e) {
                $message[] = 'catName must be uniqe';
                $ok = false;
                $result = array('ok' => $ok, 'message' => $message);
            }
        }
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
        $result = array('ok' => $ok, 'message' => $message);
    }
    echo json_encode($result);
} elseif ($do == 'edit-item') {
    //    print_r($_POST);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $file = $_FILES['file'];
        $fileName               =       $file['name'];
        $fileSize               =       $file['size'];
        $fileTmpName            =       $file['tmp_name'];
        $fileType               =       $file['type'];
        $fileError              =       $file['error'];
        $allowedExtensions      =       array("jpg", "jpeg", "png", "gif");
        $count                  =       count($_FILES['file']['name']);




        $name = $_POST['item_name'];
        $location = filter_var($_POST['location'], FILTER_SANITIZE_URL);
        $item_desc =  $item_desc = someMoreChecks(filter_var($_POST['item_desc'], FILTER_SANITIZE_STRING));

        $cat = $_POST['cat'];
        $id = $_POST['id'];
        if (!empty($name) || !empty($location) || !empty($cat)) {
            for ($i = 0; $i < $count; $i++) :
                if ($fileSize[$i] > 2000000) :
                    $error[] = 'file size is too big';
                    $ok = false;
                    $result = array('ok' => $ok, 'message' => $error);
                endif;
                $fileExt[$i]                =       strtolower(end(explode('.', $fileName[$i])));
                if (!in_array($fileExt[$i], $allowedExtensions)) :
                    $error[] = 'file extension is not allowed';
                    $ok = false;
                    $result = array('ok' => $ok, 'error' => $error);
                endif;
                if (empty($error)) :
                    $fileRand[$i]               =       rand(0, 1000000000000000000) . '_' . $fileName[$i];
                    $all_imgs[]                 =       $fileRand[$i];
                    $imgs                       =       implode(',', $all_imgs);
                    move_uploaded_file($fileTmpName[$i], "./uploads/" . $fileRand[$i]);
                endif;
            endfor;
            // if*
            $result = edit("UPDATE item SET item_name = '$name',item_desc='$item_desc',location='$location',cat_id='$cat',item_image='$imgs' WHERE item_id = $id", []);
        } else {
            $message[] = 'cant submit empty feilds';
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
        }
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
        $result = array('ok' => $ok, 'message' => $message);
    }
    echo json_encode($result);
} elseif ($do == 'search') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $search                     =           someMoreChecks($_POST['search']);

        $result = fetch_all("SELECT * FROM users WHERE username LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%'", []);
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
        $result = array('ok' => $ok, 'message' => $message);
    }
    echo json_encode($result);
} elseif ($do == 'search_items') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $search                     =           someMoreChecks($_POST['search']);

        $result = fetch_all("SELECT * FROM item WHERE  item_name LIKE '%$search%' OR item_desc LIKE '%$search%'", []);
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
        $result = array('ok' => $ok, 'message' => $message);
    }
    echo json_encode($result);
} elseif ($do == 'search_cat') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $search                     =           someMoreChecks($_POST['search']);

        $result = fetch_all("SELECT * FROM categories WHERE cat_name LIKE '%$search%' ", []);
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
        $result = array('ok' => $ok, 'message' => $message);
    }
    echo json_encode($result);
} elseif ($do == 'recover_pass') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['email'])) {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $result = fetchUser("SELECT email FROM users WHERE email = '$email'", []);
            if ($result['ok'] == true) {
                $expire = time() + (60 * 1);
                $code   = rand(10000, 99999);
                $email  = addslashes($_POST['email']);
                session_start();
                $_SESSION['mail_recover'] = $email;
                insert("INSERT INTO code (email, code,expire) VALUES('$email','$code','$expire')", []);
                mailing(
                    $email,
                    'Recover Your Email',
                    "<!DOCTYPE html>
                    <html lang='en'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>Document</title>
                        <style>
                            .mail{
                                width: 100%;
                                text-align: center;
                    
                                text-transform: capitalize;
                            }
                            .mail .contains{
                                width: 450px;
                                text-align: center;
                    
                                height: 450px;
                                
                            }
                            .mail .header{
                    
                                padding-bottom: 10px;
                                /* text-decoration: underline; */
                                border-bottom: 1px solid #000;
                    
                            }
                            .mail p {
                                margin: 40px 0 ;
                                /* line-height: ; */
                            }
                            .recoverylink{
                                text-decoration: none;
                                color:#fff ;
                                background-color:#2ecc71 ;
                                padding: 20px;
                                border-radius: 8%;
                            }
                            .mailFooter
                            {
                                border: 1px solid #000;
                                margin-top: 4rem;
                            }
                        </style>
                    </head>
                    <body>
                        <div class='mail'>
                            <div class='contains'>
                                <h1 class='header'>recover password</h1>
                            <p> did you forgot your password please click at recover now  to reset your password </p>
                            <a href='' class='recoverylink'>$code</a>
                            
                            <div class='mailFooter'></div>
                            <p>
                                after reseting pleasse try to relogin with your new password
                    
                            </p>
                            </div>
                        </div>
                    </body>
                    </html>
                    "
                );
            } else {
                return;
            }
        }
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
        $result = array('ok' => $ok, 'message' => $message);
    }
} elseif ($do == 'recover_code') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $email  =  addslashes($_SESSION['mail_recover']);
        $code   =  $_POST['code'];
        $expire =  time();
        $result = fetchUser("SELECT * FROM code WHERE email = '$email' AND code = '$code'  ORDER BY id desc LIMIT 1", []);
        if ($result['ok'] == true) {
            if ($result['lol']->expire > $expire) {
                $ok = true;
                $result = array('ok' => $ok);
            } else {
                $ok = false;
                $message = 'Your code is expired';
                $result = array('ok' => $ok, 'message' => $message);
            }
        } else {
            $ok = false;
            $message = 'Your code is not valid';
            $result = array('ok' => $ok, 'message' => $message);
        }
    }
    echo json_encode($result);
} elseif ($do == 'reset_pass') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // var_dump($_POST);
        session_start();
         $email= $_SESSION['mail_recover'] ;
        $newPassword    =  $_POST['newpassword'];
        $confirmPassword    =  $_POST['connpass'];
        if ( empty($newPassword) || empty($confirmPassword)) {
            $message[] = 'missing required fields';
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
        } else {
            if (!preg_match("[^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$]", $newPassword)) {
                $message[] = 'password must contain at least 8 characters, one uppercase letter, one lowercase letter and one number';
                $ok = false;
                $result = array('ok' => $ok, 'message' => $message);
            }
            if ($newPassword !== $confirmPassword) {
                $message[] = 'passwords do not match';
                $ok = false;
                $result = array('ok' => $ok, 'message' => $message);
            }
            if (empty($message)) {
                try {
                    $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                    $result = edit("UPDATE users SET password='$passwordHash' WHERE email='$email'", []);
                } catch (Exception $e) {
                    $message[] = 'error';
                    $ok = false;
                    $result = array('ok' => $ok, 'message' => $message);
                }
            }
        }
    }
    echo json_encode($result);
}

/*front end shit*/



if ($do == 'user_login') {
    // print_r($_POST);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $message[] = 'password or email cant be empty';
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
        } else {
            $password   =   someMoreChecks($_POST['password']);
            $email   = filter_var(someMoreChecks($_POST['email']), FILTER_SANITIZE_EMAIL);
            if (!empty($_POST['remember'])) {
                # code...
                setcookie('password', $password, time() + 60 * 60 * 24 * 30, '/', false);
                setcookie('email', $email, time() + 60 * 60 * 24 * 30, '/', false);
            } else {
                setcookie('password', $password, time() - 60 * 60 * 24 * 30, '/', false);
                setcookie('email', $email, time() - 60 * 60 * 24 * 30, '/', false);
            }
            $result = fetchUser("SELECT id,img,username,email,admins,phone,password FROM users WHERE email = '$email' ", []);
            $check = password_verify($password, $result['lol']->password);
            if ($check == true && $result['ok'] == true) {
                // fetch_all($id);
                session_start();
                $_SESSION['User'] = $result['lol'];
                $message[] = 'good';
                $ok = true;
                $result = array('ok' => $ok, 'message' => $message, 'data' => $result['lol']);
            } else {
                $message[] = 'Wrong Email Or Password';
                $ok = false;
                $result = array('ok' => $ok, 'message' => $message);
            }
        }
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
        $result = array('ok' => $ok, 'message' => $message);
    }
    echo json_encode($result);
} elseif ($do == 'register') {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // $admin = $_POST['admin'];
        // echo $admin;

        // echo $admin;
        $fileName               =       $_FILES['file']['name'];
        $fileSize               =       $_FILES['file']['size'];
        $fileTmpName            =       $_FILES['file']['tmp_name'];
        $fileType               =       $_FILES['file']['type'];
        $fileError              =       $_FILES['file']['error'];
        $allowedExtensions      =       array("jpg", "jpeg", "png", "gif");
        $tmp                    =       explode('.', $fileName);
        $fileLol                =       end($tmp);
        $fileExt                =       strtolower($fileLol);
        // // echo $fileName;
        $username               =       filter_var(someMoreChecks($_POST['username']), FILTER_SANITIZE_STRING);
        $password               =       someMoreChecks($_POST['password']);
        $confirmPassword        =       someMoreChecks($_POST['connpass']);
        $email                  =       filter_var(someMoreChecks($_POST['email']), FILTER_SANITIZE_EMAIL);
        // $phone                  =       filter_var(someMoreChecks(  $_POST['phone']), FILTER_SANITIZE_NUMBER_INT);
        $ok = true;



        if (empty($username) && empty($password) && empty($confirmPassword) && empty($email)) {
            $message[] = 'missing required fields';
            $ok = false;
            $error = $result;
            $result = array('ok' => $ok, 'message' => $message);
        }
        if (!preg_match('/^[a-z\d_]{2,20}$/i', $username)) {
            $ok = false;
            $message[] = 'Username can only contain letters and numbers';
            $error = $result;
            $result = array('ok' => $ok, 'message' => $message);
        }
        if (!preg_match("[^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$]", $password)) {
            $message[] = 'password must contain at least 8 characters, one uppercase letter, one lowercase letter and one number';
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
            $error = $result;
        }
        if ($password !== $confirmPassword) {
            $message[] = 'passwords do not match';
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
            $error = $result;
        }

        $admins = 3;

        if (!empty($fileName) && !in_array($fileExt, $allowedExtensions)) {
            $message[] = "Only jpg, jpeg, png and gif files are allowed";
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
        } elseif (empty($fileTmpName)) {
            $file = 'user.png';
        } else {
            $file               =       rand(0, 10000000) . '_' . $fileName;
            if (!move_uploaded_file($fileTmpName, "./uploads/" . $file)) {
                $file = 'uploads/user.png';
            }
        }
        if (empty($message)) {
            try {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $result = insert("INSERT INTO users (img,username,password,email,phone,admins) VALUES ('$file','$username','$passwordHash','$email','$phone','$admins')", []);
            } catch (Exception $e) {
                $message[] = 'error';
                $ok = false;
                $error = $result;
                $result = array('ok' => $ok, 'message' => $message);
            }
        }
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
    }
    echo json_encode($result);
} elseif ($do == 'password-change') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // var_dump($_POST);
        $id             =   $_POST['id'];
        $oldPassword    =  $_POST['oldpassword'];
        $newPassword    =  $_POST['newpassword'];
        $confirmPassword    =  $_POST['connpass'];
        if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
            $message[] = 'missing required fields';
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
        } else {
            $result =  fetchUser("SELECT * FROM users WHERE id=$id");
            if (password_verify($oldPassword, $result['lol']->password) === false) {
                $message[] = 'old password is wrong';
                $ok = false;
                $result = array('ok' => $ok, 'message' => $message);
            }
            if (!preg_match("[^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$]", $newPassword)) {
                $message[] = 'password must contain at least 8 characters, one uppercase letter, one lowercase letter and one number';
                $ok = false;
                $result = array('ok' => $ok, 'message' => $message);
            }
            if ($newPassword !== $confirmPassword) {
                $message[] = 'passwords do not match';
                $ok = false;
                $result = array('ok' => $ok, 'message' => $message);
            }
            if (empty($message)) {
                try {
                    $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                    $result = edit("UPDATE users SET password='$passwordHash' WHERE id=$id", []);
                } catch (Exception $e) {
                    $message[] = 'error';
                    $ok = false;
                    $result = array('ok' => $ok, 'message' => $message);
                }
            }
        }
    }
    echo json_encode($result);
} elseif ($do == 'addcat') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cat_name   =    someMoreChecks($_POST['cat_name']);
        $cat_desc   =    someMoreChecks($_POST['cat_desc']);
        if (empty($cat_name) && empty($cat_desc)) {
            $message[] = 'missing required fields';
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
        } else {
            try {
                $result = insert("INSERT INTO categories (cat_name,cat_desc) VALUES ('$cat_name','$cat_desc')", []);
                $ok = true;
                $message[] = 'success';
                $result = array('ok' => $ok, 'message' => $message);
            } catch (Exception $e) {
                $message[] = 'already exists';
                $ok = false;
                $result = array('ok' => $ok, 'message' => $message);
            }
            // print_r($_POST);
        }
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
        $result = array('ok' => $ok, 'message' => $message);
    }
    echo json_encode($result);
} elseif ($do == 'allcats') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo  json_encode(fetch_all("SELECT * FROM categories"));
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
        $result = array('ok' => $ok, 'message' => $message);
        echo  json_encode($result);
    }
} elseif ($do == 'additems') {
    // var_dump($_FILES);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['item_name'];
        $location = filter_var($_POST['location'], FILTER_SANITIZE_URL);
        $item_desc = someMoreChecks(filter_var($_POST['item_desc'], FILTER_SANITIZE_STRING));
        $cat = $_POST['cat'];

        $file = $_FILES['file'];
        $fileName               =       $file['name'];
        $fileSize               =       $file['size'];
        $fileTmpName            =       $file['tmp_name'];
        $fileType               =       $file['type'];
        $fileError              =       $file['error'];
        $allowedExtensions      =       array("jpg", "jpeg", "png", "gif");
        $count                  =       count($_FILES['file']['name']);


        if (empty($name) || empty($location) || empty($cat) || empty($fileName)) {

            $message[] = 'missing required fields';
            $ok = false;
            $result = array('ok' => $ok, 'message' => $message);
        } else {
            for ($i = 0; $i < $count; $i++) :
                if ($fileSize[$i] > 2000000) :
                    $error[] = 'file size is too big';
                    $ok = false;
                    $result = array('ok' => $ok, 'message' => $error);
                endif;
                $fileExt[$i]                =       strtolower(end(explode('.', $fileName[$i])));
                if (!in_array($fileExt[$i], $allowedExtensions)) :
                    $error[] = 'file extension is not allowed';
                    $ok = false;
                    $result = array('ok' => $ok, 'error' => $error);
                endif;
                if (empty($error)) :
                    $fileRand[$i]               =       rand(0, 1000000000000000000) . '_' . $fileName[$i];
                    $all_imgs[]                 =       $fileRand[$i];
                    $imgs                       =       implode(',', $all_imgs);
                    move_uploaded_file($fileTmpName[$i], "./uploads/" . $fileRand[$i]);
                endif;
            endfor;
            try {
                insert("INSERT INTO item (item_name,location,item_desc,cat_id,item_image) VALUES ('$name','$location','$item_desc',$cat,'$imgs')", []);
                $message[] = 'success';
                $ok = true;
                $result = array('ok' => $ok, 'message' => $message);
            } catch (Exception $e) {
                $message[] = $e->getMessage();
                $ok = false;
                $result = array('ok' => $ok, 'message' => $message);
            }
        }
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
        $result = array('ok' => $ok, 'message' => $message);
    }
    echo  json_encode($result);
} elseif ($do == 'allitems') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo  json_encode(fetch_all("SELECT * FROM item"));
    } else {
        $message[] = 'UnValid Request';
        $ok = false;
    }
} elseif ($do == 'get_all_items') {
    // sleep(4);
    // $perPage=3;
    // if (isset($_GET['page'])) {
    //     $pageNum = $_GET['page'];
    // } else {
    //     $pageNum = 1;
    // }

    // $pageStart=($pageNum-1)*$perPage;
    $result = fetch_all("SELECT  * FROM item ");
    echo json_encode(
        $result
    );
} elseif ($do == 'sort') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sort = $_POST['id'];
        $result = fetch_all("SELECT DISTINCT  * FROM item WHERE cat_id=$sort");
        echo json_encode($result);
    }
}elseif($do == 'feeds'){

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $feeds = fetch_all("SELECT * FROM feedback ORDER BY feed_id desc");
        foreach ($feeds as $feed) {
            $uid= $feed->user_id;
            $i_id= $feed->item_id;
            $item = fetch_all("SELECT * FROM item WHERE item_id=".$i_id);
            $users = fetch_all("SELECT * FROM users WHERE id=".$uid); 
        }
        echo json_encode(array('feeds'=>$feeds,'item'=>$item,'users'=>$users));
    }

}elseif($do == 'statistics'){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $count1 = fetch_all("SELECT item_id FROM item");
        $count2 = fetch_all("SELECT cat_id FROM categories");
        $newUsers = fetch_all("SELECT * FROM users WHERE admins=3 order by reg_date limit 11");
        $feeds=fetch_all("SELECT * FROM feedback order by feed_id desc ");
        // theLazyFunction($feeds->);
        // foreach ($feeds as $feed) :
        //     theLazyFunction();
        // endforeach;
        $result = array('items' => $count1, 'cats' => $count2, 'users' => $newUsers, 'feeds' => $feeds);
    }else{
        $message[] = 'UnValid Request';
        $ok = false;
    }
    echo json_encode($result);

}
