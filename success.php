<?php
session_start();
require_once('./handlers/config.php');
$errors = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/success.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap">
  <title>Doza | Loan</title>
</head>
<body>
  <div class="card">
    <img src="./images/money.svg" alt="success" class="successful">
    <div class="text">
      <h1>Congratulations!</h1>
      <p>Your Loan Application Was Successfully Submitted. Please wait for Approval..</p>
            <script type="text/javascript">

var count = 15;

var redirect = "index.php";

 

function countDown(){

    var timer = document.getElementById("timer");

    if(count > 0){

        count--;

        timer.innerHTML = "Back Home in "+count+" seconds.";

        setTimeout("countDown()", 1000);

    }else{

        window.location.href = redirect;

    }

}

</script>

 <span id="timer">

<script type="text/javascript">countDown();</script>

</span>
    </div>
    <div class="space"></div>
  </div>
</body>
</html>
