<?php require_once "handlers/controllerUserData.php"; ?> 
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doza | Loans</title>

    <!-- ==== STYLE.CSS ==== -->
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/fab.css">
    <link rel="stylesheet" href="./css/popup.css">
    <link rel="stylesheet" href="./css/signups.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
 
#popup1 {
  -webkit-box-shadow:  0px 0px 0px 9999px rgba(0, 0, 0, 0.5);
  box-shadow:  0px 0px 0px 9999px rgba(0, 0, 0, 0.5);
}
    </style>

    <!-- ====  REMIXICON CDN ==== -->
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />

    <!-- ==== ANIMATE ON SCROLL CSS CDN  ==== -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  </head>
  <body>
    <!-- ==== HEADER ==== -->
    <header class="container header">
      <!-- ==== NAVBAR ==== -->
      <nav class="nav">
        <div class="logo">
          <h2>Doza.</h2>
        </div>

        <div class="nav_menu">
          <button class="close_btn" id="close_btn">
            <i class="ri-close-fill"></i>
          </button>

          <ul class="nav_menu_list">
            <li class="nav_menu_item">
              <a href="#" class="nav_menu_link" onclick="show('popup1')">Get Loan</a>
            </li>
            <li class="nav_menu_item">
              <a href="#" class="nav_menu_link" onclick="show('popup3')">Repay Loan</a>
            </li>
          </ul>
        </div>

        <button class="toggle_btn" id="toggle_btn">
          <i class="ri-menu-line"></i>
        </button>
      </nav>
    </header>

    <section class="wrapper">
      <div class="container">
        <div class="grid-cols-2">
          <div class="grid-item-1">
            <h1 class="main-heading">
              Welcome to <span>Doza.</span>
              <br />
              Are you a civil servant?, Get an Instant Loan now with Zero paperwork needed.
            </h1>
            <p class="info-text">
              Its Easy & Fast, Just like counting 123.....
            </p>

            <div class="btn_wrapper">
              <button class="btn view_more_btn" onclick="show('popup1')">
                Apply <i class="ri-arrow-right-line"></i>
              </button>

              <!-- <button class="btn documentation_btn">documentation</button> -->
            </div>
          </div>
          <div class="grid-item-2">
            <div class="team_img_wrapper">
              <img src="./images/team.svg" alt="team-img" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="wrapper">
      <div class="container" data-aos="fade-up" data-aos-duration="1000">
        <div class="grid-cols-3">
          <div class="grid-col-item">
            <div class="icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                />
              </svg>
            </div>
            <div class="featured_info">
              <span>Accessible Online </span>
              <p>
                Our online platform is accessible online to anyone, Please make sure that you have an internet connection when using our platform to avoid interruptions.
              </p>
            </div>
          </div>
          <div class="grid-col-item">
            <div class="icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"
                />
              </svg>
            </div>
            <div class="featured_info">
              <span>Easy to use</span>
              <p>
                If ypu are already our customer just click on Instant Loan button and get one. For new users click the Instant Loan button and then follow the steps as easy as 123...
              </p>
            </div>
          </div>

          <div class="grid-col-item">
            <div class="icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"
                />
              </svg>
            </div>
            <div class="featured_info">
              <span>Documentation for everything</span>
              <p>
                Feel free to read more about us for a better understanding of our work flow
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>


      <div class="containerform" style="display:block;" id="popup2">
      <form action="otp.php" class="form" method="post">
      <h1 class="text-center">Verify OTP</h1>
      <p style="color:#339900;">
      <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?> </p>
      <!-- Progress bar -->
      <div class="progressbar">        
      </div>

      <!-- Steps -->
      <div class="form-step form-step-active">
        <div class="input-group">
          <input type="number" name="otp" placeholder="Enter OTP here"/>
        </div>
        <div class="btns-group">
          <input type="submit"  name="check" value="Submit" class="btn" />
        </div>
      </div>
    </form>    
    </div> 
       


    <footer></footer>

    <!-- ==== ANIMATE ON SCROLL JS CDN -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- ==== GSAP CDN ==== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
    <!-- ==== SCRIPT.JS ==== -->
    <script src="./script.js" defer></script>
    <script src="./signups.js" defer></script>
    <script>
        $ = function(id) {
  return document.getElementById(id);
}

var show = function(id) {
	$(id).style.display ='block';
}
var hide = function(id) {
	$(id).style.display ='none';
}
    </script>
  </body>
</html>
