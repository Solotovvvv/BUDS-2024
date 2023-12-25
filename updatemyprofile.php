<?php
require_once './includes/config.php';
session_start();

if (isset($_POST['token'])) {
    $id = $_POST['token'];
    $surname        =   $_POST['surname'];
    $firstname      =   $_POST['firstname'];
    $middlename     =   $_POST['middlename'];
    $age            =   $_POST['age'];
    $address        =   $_POST['address'];
    $contactnumber  =   $_POST['contactnumber'];


    // Handle uploaded image
    if (!empty($_FILES['abstractPic']['name'])) {
        $filename = $_FILES['abstractPic']['name'];
        $size = $_FILES['abstractPic']['size'];
        $tmp_name = $_FILES['abstractPic']['tmp_name'];

        $validImageExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = pathinfo($filename, PATHINFO_EXTENSION);
        $imageExtension = strtolower($imageExtension);

        if (!in_array($imageExtension, $validImageExtensions)) {
            $msg['title'] = "Warning";
            $msg['message'] = "Invalid image extension";
            $msg['icon'] = "warning";
            $msg['status'] = "error";
            echo json_encode($msg);
        } elseif ($size > 512000) {
            $msg['title'] = "Warning";
            $msg['message'] = "Image size is too large";
            $msg['icon'] = "warning";
            $msg['status'] = "error";
            echo json_encode($msg);
        } else {
            $newImageName = uniqid() . '.' . $imageExtension;
            $targetDirectory = 'img/profile-picture/';
            $targetPath = $targetDirectory . $newImageName;

            if (move_uploaded_file($tmp_name, $targetPath)) {
                $sql = "UPDATE owner_list SET Surname = :lname, Firstname = :fname, MiddleName = :mname, Age = :age, Address = :address, 
                contactNumber = :contact, photo = :photo WHERE email = :email";
                $pdo = Database::connection();
                $stmt = $pdo->prepare($sql);
                $stmt->execute(
                    array(
                        ':fname' => $firstname,
                        ':mname' => $middlename,
                        ':lname' => $surname,
                        ':age' => $age,
                        ':address' => $address,
                        ':contact' => $contactnumber,
                        ':photo' => $newImageName,
                        ':email' => $id
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
                    $_SESSION['lname'] = $surname;
                    $_SESSION['mname'] = $middlename;
                    $_SESSION['fname'] = $firstname;
                    $_SESSION['Address'] = $address;
                    $_SESSION['Age'] = $age;
                    $_SESSION['contactNumber'] = $contactnumber;
                    $_SESSION['photo'] = $newImageName;
                    $msg['title'] = "Successful";
                    $msg['message'] = "Success";
                    $msg['icon'] = "success";
                    $msg['status'] = "success";
                    echo json_encode($msg);
                }
            } else {
                // Failed to upload image
                $msg['title'] = "Error";
                $msg['message'] = "Failed to move uploaded image to destination";
                $msg['icon'] = "error";
                $msg['status'] = "error";
                $msg['debug'] = $_FILES; // Add this for debugging
                echo json_encode($msg);
            }
        }
    } else {
        $sql = "UPDATE owner_list SET Surname ='$surname', Firstname = '$firstname', MiddleName = '$middlename', Age = '$age', Address = '$address', contactNumber = '$contactnumber' WHERE email='$id'";
        if ($conn->query($sql)) {
            $dtl = array();
            $msg = array();
            $sql = "SELECT * FROM `owner_list` WHERE `email`= '$id'";
            $rs = $conn->query($sql);
            $row = $rs->fetch_assoc();
            // $fullname = $row['Surname'] .' '. $row['Firstname'] .' '. $row['MiddleName'];
            // array_push($dtl,array('Name'=>$fullname,'Age'=>$row['Age'],'Address'=>$row['Address'],'ContactNumber'=>$row['contactNumber']));
            $_SESSION['lname'] = $surname;
            $_SESSION['mname'] = $middlename;
            $_SESSION['fname'] = $firstname;
            $_SESSION['Address'] = $address;
            $_SESSION['Age'] = $age;
            $_SESSION['contactNumber'] = $contactnumber;
            $msg['title'] = "Successful";
            $msg['message'] = "Welcome";
            $msg['icon'] = "success";

            echo json_encode($msg);
        } else {
            $msg['title'] = "Error";
            $msg['message'] = $conn->error;
            $msg['icon'] = "error";
            echo json_encode($msg);
        }
    }
}
