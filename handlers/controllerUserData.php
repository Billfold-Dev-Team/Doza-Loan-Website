<?php 
session_start();
require "connection.php";
$email = "";
$firstName = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $nrcNumber = mysqli_real_escape_string($con, $_POST['nrcNumber']);
    $phoneNumber = mysqli_real_escape_string($con, $_POST['phoneNumber']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $bankName = mysqli_real_escape_string($con, $_POST['bankName']);
    $workPlace = mysqli_real_escape_string($con, $_POST['workPlace']);
    include('imageupload.php');
    include('nrcupload.php');
   /*$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Passwords do not matched!";
    }*/
    $email_check = "SELECT * FROM clients WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "The Email you entered is already in use!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO clients (firstName, lastName, email, code, nrcNumber, phoneNumber, gender, bankName, workPlace, profilePicture, nrcFile, password, status)
                        values('$firstName', '$lastName', '$email', '$code', '$nrcNumber', '$phoneNumber', '$gender', '$bankName', '$workPlace', '$profilePicture', '$nrcFile', '$encpass', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: Acksonbusiness@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "OTP code has been sent to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}


    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM clients WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE clients SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['firstName'] = $firstName;
                $_SESSION['email'] = $email;
                header('location: home.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered an incorrect code!";
        }
    }
    
    //if user checks loan button
    if(isset($_POST['checkloan'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['loanotp']);
        $check_code = "SELECT * FROM loan WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $code = 0;
            $loan_status = 'verified';
            $update_otp = "UPDATE loan SET code = $code, loan_status = '$loan_status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                header('location: success.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "Loan OTP incorrect!";
        }
    }

    //if user click login button



    if(isset($_POST['login'])){
        $phoneNumber = mysqli_real_escape_string($con, $_POST['phoneNumber']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_phoneNumber = "SELECT * FROM clients WHERE phoneNumber = '$phoneNumber'";
        $res = mysqli_query($con, $check_phoneNumber);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['phoneNumber'] = $phoneNumber;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['phoneNumber'] = $phoneNumber;
                  $_SESSION['password'] = $password;
                    header('location: home.php');
                }else{
                    $info = "verify your phoneNumber - $phoneNumber";
                    $_SESSION['info'] = $info;
                    header('location: otp.php');
                }
            }else{
                $errors['phoneNumber'] = "Incorrect phoneNumber or password!";
            }
        }else{
            $errors['phoneNumber'] = "It looks like you're not Registered with us, Click on SignUp to Register.";
        }
    }

    
   //if login now button click
    if(isset($_POST['qube'])){
        header('Location: acksonprojects.html');
    }
?>