<?php
session_start();
require_once("../includes/config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payload'])) {
    $receivedData = json_decode($_POST['payload']);
    $receivedFunction = $_POST['setFunction'];

    if (function_exists($receivedFunction)) {
        $result = $receivedFunction($receivedData);
        // echo json_encode($result);
    } else {
        echo "Invalid function name.";
    }
}

function forgotPass($request = null)
{
    $email = $request->email;
    // // Create a new PHPMailer instance

    $checkUserDb = "SELECT *
    FROM login
    WHERE email = :email";
    $pdo = Database::connection();
    $stmt1 = $pdo->prepare($checkUserDb);
    $stmt1->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt1->execute();
    $numRows1 = $stmt1->rowCount();

    if ($numRows1 === 0) {
        $response = array(
            'title' => 'Warning',
            'message' => `There's no account with this email`,
            'icon' => 'warning'
        );
        return $response;
    }

    $datas1  = $stmt1->fetchAll();

    foreach ($datas1 as $data) {
        $id = $data['ID'];
    }


    require '../vendor/autoload.php';
    $encryption_key = "ThisIsASecretKeyForEncryption123!";

    $hashed_id = openssl_encrypt($id, 'aes-256-cbc', $encryption_key, 0, substr($encryption_key, 0, 16));



    $mail = new PHPMailer(true);

    //Server settings
    $mail->SMTPDebug  = SMTP::DEBUG_OFF; // Enable verbose debug output
    $mail->isSMTP(); // Send using SMTP
    $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth   = true; // Enable SMTP authentication
    $mail->Username   = 'cruzcedric66@gmail.com'; // SMTP username
    $mail->Password   = 'dccnynwlpcqjkvlw'; // SMTP password
    $mail->SMTPSecure = 'ssl'; // Enable implicit TLS encryption
    $mail->Port       =  465;

    // Recipients
    $mail->setFrom('cruzcedric66@gmail.com', 'buds');
    $mail->addAddress($email); // Recipient email

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Forget Password';
    $mail->Body = "
    <p style='text-align: center;'>Click the button below to reset your password:</p>
    <div style='text-align: center;'>
        <a href='http://localhost/BUDS-2024/reset_pass.php?a=$hashed_id' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 5px;'>Reset Password</a>
    </div>
    <p style='text-align: center;'>If you did not request a password reset, please ignore this email.</p>
";

    // if sending email is successful
    if ($mail->send()) {
        $response = array(
            'title' => 'Success',
            'message' => 'Please check your email',
            'icon' => 'success'
        );
        echo json_encode($response);
    } else {
        $response = array(
            'title' => 'Error',
            'message' => 'Failed to send email. Please try again later.',
            'icon' => 'error'
        );
        echo json_encode($response);
    }
}

function resetPass($request = null)
{
    $newPass = $request->password;
    $id = $request->id;
    $hashedPassword = sha1($newPass);

    $sql = "UPDATE login SET password = :password WHERE ID = :id";
    $pdo = Database::connection();
    $stmt = $pdo->prepare($sql);
    $stmt->execute(
        array(
            ':password' => $hashedPassword,
            ':id' => $id
        )
    );
    if ($stmt->errorCode() !== '00000') {
        $errorInfo = $stmt->errorInfo();
        $errorMsg = "SQL Error: " . $errorInfo[2] . " in query: " . $sql;
        // Handle the error as needed (e.g., logging, displaying an error message)
        $msg['title'] = "Error";
        $msg['message'] = $errorMsg;
        $msg['icon'] = "error";
        echo json_encode($msg);
    } else {
        $msg['title'] = "Successful";
        $msg['message'] = 'Your password your reset';
        $msg['icon'] = "success";
        echo json_encode($msg);
    }
}

function createUser($request = null)
{
    $fname = $request->fname;
    $mname = $request->mname;
    $lname = $request->lname;
    $email = $request->email;
    $pass = $request->pass;
    $hashedPassword = sha1($pass);
    $msg = array();

    $checkUserDb = "SELECT *
    FROM login
    WHERE email = :email";
    $pdo = Database::connection();
    $stmt1 = $pdo->prepare($checkUserDb);
    $stmt1->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt1->execute();
    $numRows1 = $stmt1->rowCount();

    if ($numRows1 != 1) {
        $insertUserDb = "INSERT INTO login (`email`, `password`, `userType`) VALUES (:email, :pass, :usertype)";
        $pdo = Database::connection();
        $stmt = $pdo->prepare($insertUserDb);
        $stmt->execute(
            array(
                ':email' => $email,
                ':pass' => $hashedPassword,
                ':usertype' => 3,
            )
        );
        if ($stmt->errorCode() !== '00000') {
            $errorInfo = $stmt->errorInfo();
            $errorMsg = "SQL Error: " . $errorInfo[2];
            // Handle the error as needed (e.g., logging, displaying an error message)
            $msg['title'] = "Error";
            $msg['message'] = $errorMsg;
            $msg['icon'] = "error";
        } else {
            $insertProfileUserDb = "INSERT INTO owner_list (`Surname`, `Firstname`, `MiddleName`, `Email`) VALUES (:lname, :fname, :mname, :email)";
            $stmt = $pdo->prepare($insertProfileUserDb);
            $stmt->execute(
                array(
                    ':fname' => $fname,
                    ':mname' => $mname,
                    ':lname' => $lname,
                    ':email' => $email
                )
            );
            if ($stmt->errorCode() !== '00000') {
                $errorInfo = $stmt->errorInfo();
                $errorMsg = "SQL Error: " . $errorInfo[2];
                // Handle the error as needed (e.g., logging, displaying an error message)
                $msg['title'] = "Error";
                $msg['message'] = $errorMsg;
                $msg['icon'] = "error";
            } else {
                $msg['title'] = "Successful";
                $msg['message'] = "Success";
                $msg['icon'] = "success";
                $msg['status'] = "success";
            }
        }
    } else {
        $msg['title'] = "Warning";
        $msg['message'] = "Email has already been used";
        $msg['icon'] = "warning";
    }

    echo json_encode($msg);
};

function createOwner($request = null)
{
    $ownerEmail = $request->ownerEmail;
    $ownerFname = $request->ownerFname;
    $ownerMname = $request->ownerMname;
    $ownerLname = $request->ownerLname;
    $ownerBirthday = $request->ownerBirthday;
    $ownerAge = $request->ownerAge;
    $ownerSex = $request->ownerSex;
    $ownerNumber = $request->ownerNumber;
    $ownerAddress = $request->ownerAddress;
    $hashedPassword = sha1($request->ownerPass);
    $msg = array();

    $checkUserDb = "SELECT *
    FROM login
    WHERE email = :email";
    $pdo = Database::connection();
    $stmt1 = $pdo->prepare($checkUserDb);
    $stmt1->bindParam(':email', $ownerEmail, PDO::PARAM_STR);
    $stmt1->execute();
    $numRows1 = $stmt1->rowCount();

    // return $numRows1;

    if ($numRows1 != 1) {
        $insertUserDb = "INSERT INTO login (`email`, `password`, `userType`) VALUES (:email, :pass, :usertype)";
        $pdo = Database::connection();
        $stmt = $pdo->prepare($insertUserDb);
        $stmt->execute(
            array(
                ':email' => $ownerEmail,
                ':pass' => $hashedPassword,
                ':usertype' => 2,
            )
        );
        if ($stmt->errorCode() !== '00000') {
            $errorInfo = $stmt->errorInfo();
            $errorMsg = "SQL Error: " . $errorInfo[2];
            // Handle the error as needed (e.g., logging, displaying an error message)
            $msg['title'] = "Error";
            $msg['message'] = $errorMsg;
            $msg['icon'] = "error";
        } else {
            $insertProfileUserDb = "INSERT INTO owner_list (`Surname`, `Firstname`, `MiddleName`, `Email`, `contactNumber`, `Address`, `Sex`, `Birthday`, `Age`, `owner_name`) 
            VALUES (:lname, :fname, :mname, :email, :contact, :address, :sex, :birthdate, :age, :owner_name)";
            $stmt = $pdo->prepare($insertProfileUserDb);
            $stmt->execute(
                array(
                    ':fname' => $ownerFname,
                    ':mname' => $ownerMname,
                    ':lname' => $ownerLname,
                    ':email' => $ownerEmail,
                    ':contact' => $ownerNumber,
                    ':address' => $ownerAddress,
                    ':sex' => $ownerSex,
                    ':birthdate' => $ownerBirthday,
                    ':age' => $ownerAge,
                    ':owner_name' => $ownerFname . ' ' . $ownerMname . ' ' . $ownerLname
                )
            );
            if ($stmt->errorCode() !== '00000') {
                $errorInfo = $stmt->errorInfo();
                $errorMsg = "SQL Error: " . $errorInfo[2];
                // Handle the error as needed (e.g., logging, displaying an error message)
                $msg['title'] = "Error";
                $msg['message'] = $errorMsg;
                $msg['icon'] = "error";
            } else {
                $msg['title'] = "Successful";
                $msg['message'] = "Success";
                $msg['icon'] = "success";
                $msg['status'] = "success";
            }
        }
    } else {
        $msg['title'] = "Warning";
        $msg['message'] = "Email has already been used";
        $msg['icon'] = "warning";
    }
    echo json_encode($msg);
};

function loginUser($request = null)
{
    // session_start();
    // session_regenerate_id(true); // Regenerate the session ID
    $username = $request->username;
    $pass = $request->pass;
    $hashedPassword = sha1($pass);
    $msg = array();

    $loginQuery = "SELECT *
    FROM login
    WHERE (email = :username AND password = :pass) AND userType = 4";
    $pdo = Database::connection();
    $stmt1 = $pdo->prepare($loginQuery);
    $stmt1->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt1->bindParam(':pass', $hashedPassword, PDO::PARAM_STR);
    $stmt1->execute();
    $datas1  = $stmt1->fetchAll();
    $numRows1 = $stmt1->rowCount();

    if ($numRows1 == 0) {
        $loginQuery = "SELECT login.*, owner_list.*,user_category.*
        FROM login
        JOIN owner_list ON login.email = :username AND owner_list.Email = :username
        JOIN user_category ON login.userType = user_category.ID
        WHERE login.email = :username AND login.password = :pass";
        $pdo = Database::connection();
        $stmt = $pdo->prepare($loginQuery);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $hashedPassword, PDO::PARAM_STR);
        $stmt->execute();
        $datas  = $stmt->fetchAll();
        $numRows = $stmt->rowCount();
        if ($numRows == 0) {
            $msg['title'] = "Warning";
            $msg['message'] = "Wrong username or password";
            $msg['icon'] = "warning";
            $msg['status'] = "warning";
            echo json_encode($msg);
        } else {
            foreach ($datas as $data) {
                $role = $data['userType'];
                $_SESSION['ownerId'] = $data['ID'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['lname'] = $data['Surname'];
                $_SESSION['mname'] = $data['MiddleName'];
                $_SESSION['fname'] = $data['Firstname'];
                $_SESSION['contactNumber'] = $data['contactNumber'];
                $_SESSION['Address'] = $data['Address'];
                $_SESSION['Sex'] = $data['Sex'];
                $_SESSION['Birthday'] = $data['Birthday'];
                $_SESSION['Age'] = $data['Age'];
                $_SESSION['photo'] = $data['photo'];
                $_SESSION['userTypeDesc'] = $data['userDesccription'];
                $_SESSION['role'] = $data['userType'];
            }
            $msg['title'] = "Successful";
            $msg['message'] = "Welcome";
            $msg['icon'] = "success";
            $msg['status'] = "success";
            $msg['role'] = $role;
            $msg['id'] = $_SESSION['ownerId'];

            echo json_encode($msg);
        }
    } else {
        foreach ($datas1 as $data) {
            $role = $data['userType'];
            $_SESSION['admin_user'] = $data['email'];
        }
        $msg['title'] = "Successful";
        $msg['message'] = "Welcome";
        $msg['icon'] = "success";
        $msg['status'] = "success";
        $msg['role'] = $role;
        echo json_encode($msg);
    }
};

function applyJobUser($request = null)
{
    //status
    //0 - for waiting
    //1 - for interview
    $app_id = $request->app_id;
    $user_id = $request->user_id;

    $sql = "INSERT INTO application_list(bus_app,app_id,Status) VALUES (:app_id, :user_id, :status)";
    $pdo = Database::connection();
    $stmt = $pdo->prepare($sql);
    $stmt->execute(
        array(
            ':app_id' => $app_id,
            ':user_id' => $user_id,
            ':status' => 0,
        )
    );
    if ($stmt->errorCode() !== '00000') {
        $errorInfo = $stmt->errorInfo();
        $errorMsg = "SQL Error: " . $errorInfo[2];
        // Handle the error as needed (e.g., logging, displaying an error message)
        $msg['title'] = "Error";
        $msg['message'] = $errorMsg;
        $msg['icon'] = "error";
        echo json_encode($msg);
    } else {
        $msg['title'] = "Successful";
        $msg['message'] = "Welcome";
        $msg['icon'] = "success";
        echo json_encode($msg);
    }
};
