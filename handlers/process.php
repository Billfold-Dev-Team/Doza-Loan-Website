<?php
session_start();
require_once('config.php');
$errors = array();
?>
<?php

if(isset($_POST)){

	$loan_ref = $_POST['loan_ref'];
	$loan_product = $_POST['loan_product'];
	$interest_rate = $_POST['interest_rate'];
	$principle = $_POST['principle'];
	$loan_interest = $_POST['loan_interest'];
	$loan_total_amount = $_POST['loan_total_amount'];
	$loan_type = $_POST['loan_type'];
	$loan_status = 'notverified';
	$code = rand(99999, 11111);
	$email = $_POST['email'];
	$loan_check = "SELECT * FROM loan WHERE loan_ref = '$loan_ref'";
    $res = mysqli_query($con, $loan_check);
    if(mysqli_num_rows($res) > 0){
        $errors['loan_ref'] = "You still have an unpaid loan!";
    }
     if(count($errors) === 0){
		$sql = "INSERT INTO loan (loan_ref, loan_product, interest_rate, principle, loan_interest, loan_total_amount, loan_type, loan_status, code) VALUES(?,?,?,?,?,?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$loan_ref, $loan_product, $interest_rate, $principle, $loan_interest, $loan_total_amount, $loan_type, $loan_status, $code]);
		if($result){
	    $subject = "Doza Loan Verification Code";
            $message = "Your Loan verification code is $code";
            $sender = "From: Acksonbusiness@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "Enter Loan OTP sent to $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: ../loanotp.php');
                exit();
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}}
}