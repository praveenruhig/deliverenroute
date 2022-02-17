<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Transparent Login Form HTML CSS</title>
  <link rel="stylesheet" href="log.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script src="https://kit.fontawesome.com/a1106be3c5.js" crossorigin="anonymous"></script>
</head>

<body>

<header>
    <nav>
      <div class="nav-row sticky">
        <p class="main-logo">Deliver <span>En</span> Route</p>

        <ul class="nav-list">
          <li><a href="#section" class="nav-link">product delivery</a></li>
          <li><a href="#article" class="nav-link">how it works</a></li>
          <li><a href="#" class="nav-sign">sign in</a></li>
        </ul>
      </div>
    </nav>
</header>


  <div class="log-page">

    <div class="log-form">
      <h3>sign in to enroute</h3>
      <form action="" method="POST">

        <input type="email" id="email" name="email" placeholder="Your email.." required">

        <input type="password" id="password" name="password" placeholder="Your email.." required>

        <input type="submit" name="submit" value="LOG IN">

  <?php
    include "CURD\config.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = mysqli_query($conn, "select *from users where email='$email' and password='$password'");
        $count = $sql->num_rows;
        if($count > 0){
            while($row = mysqli_fetch_array($sql))
            header("Location: user.php?id=$row[id]");
        }
        else{
            $text = "invalid username or password";
            echo "<p  style='color:red; font-family: system-ui;'>".$text."</p>";
        }
    }

  ?>
      </form>
      <p>New to Enroute? <a href="reg.php">Create an acoount</a></p>
    </div>

    <div class="log-content">
      <h1>GET THE HELP YOU NEED WHEN YOU NEED FOR</h1>
    </div>

  </div>

  <section id="section">
    <div class="sec-row">
      <h2>we deliver on time — every time</h2>
      <p>Hello, we’re Omnifood, your new premium food delivery service. We know you’re always busy. No time for cooking.
        So let us take care of that, we’re really good at it, we promise! </p>
    </div>

    <div class="sec-grid">

      <div class="col-1">
        <img src="icons\infinity.svg" alt="infinity-logo" class="sec-grid-img">
        <h3 class="sec-grid-heading">Up to 365 days/year</h3>
        <p class="sec-grid-para">Never cook again! We really mean that. Our subscription plans include up to 365
          days/year coverage. You can also choose to order more flexibly if that's your style. </p>
      </div>

      <div class="col-2">
        <img src="icons\alarm.svg" alt="alarm-logo" class="sec-grid-img">
        <h3 class="sec-grid-heading">On time & save time</h3>
        <p class="sec-grid-para">You're only twenty minutes away from your delicious and super healthy meals delivered
          right to your home. We work with the best chefs in each town to ensure that you're 100% happy. </p>
      </div>

      <div class="col-3">
        <img src="icons\handshake.svg" alt="infinity-logo" class="sec-grid-img">
        <h3 class="sec-grid-heading">Earn money</h3>
        <p class="sec-grid-para">All our vegetables are fresh, organic and local. Animals are raised without added
          hormones or antibiotics. Good for your health, the environment, and it also tastes better!</p>
      </div>

      <div class="col-4">
        <img src="icons\shopping-cart.svg" alt="infinity-logo" class="sec-grid-img">
        <h3 class="sec-grid-heading">Order anything</h3>
        <p class="sec-grid-para">We don't limit your creativity, which means you can order whatever you feel like. You
          can also choose from our menu containing over 100 delicious meals. It's up to you! </p>
      </div>

    </div>
  </section>

  <article id="article">
    <div class="art-row">
      <h2>How it works — Simple as 1, 2, 3</h2>
    </div>

    <div class="art-flex">
      <div class="art-col-1">
        <img src="images\mobile-app.png" alt="app" class="art-flex-mob-img">
      </div>

      <ul class="art-col-2">
        <li class="art-flex-li">
          <img src="icons\number-circle-one.svg" alt="one" class="art-flex-img">
          <p>Choose the subscription plan that best fits your needs and sign up today.</p>
        </li>
        <li class="art-flex-li">
          <img src="icons\number-circle-two.svg" alt="two" class="art-flex-img">
          <p>Choose the subscription plan that best fits your needs and sign up today.</p>
        </li>
        <li class="art-flex-li">
          <img src="icons\number-circle-two.svg" alt="three" class="art-flex-img">
          <p>Enjoy your meal after less than 20 minutes. See you the next time!</p>
        </li>
      </ul>

    </div>
  </article>

  <footer>
    <p>Copyright © 2015 by Omnifood. All rights reserved.</p>
    <ul class="footer-link">
      <li><a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a></li>
      <li><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
      <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
      <li><a href="mailto:praveengovind76@gmail.com?subject=free chocolate"><i class="fas fa-envelope"></i></a></li>
    </ul>
  </footer>

</body>

</html>



