<?php
session_start();
require_once("../includes/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payload'])) {
    $receivedData = json_decode($_POST['payload']);
    $receivedFunction = $_POST['setFunction'];

    if (function_exists($receivedFunction)) {
        $result = $receivedFunction($receivedData);
        echo $result;
    } else {
        echo "Invalid function name.";
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
    }else{
        $msg['title'] = "Successful";
        $msg['message'] = "Welcome";
        $msg['icon'] = "success";
        echo json_encode($msg);
    }
};
