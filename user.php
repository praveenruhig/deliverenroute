<?php
    include 'CURD\config.php';
    
    $id = $_GET['id'];

    $sql = mysqli_query($conn, "select *from users where id='$id'");
    if($sql == TRUE){
        while($row = mysqli_fetch_array($sql)){
        // echo $row['email'];
        // echo $row['firstname'];
        // echo $row['lastname'];
        // echo $row['username'];
        // echo $row['gender'];
        // echo $row['pincode'];
?>
<header>
    <nav>
      <div class="nav-row sticky">
        <p class="main-logo">Deliver <span>En</span> Route</p>

        <ul class="nav-list">
          <li><i class="fas fa-user"></i><a onclick="userdetails()" href="#" class="nav-link"><?php echo $row['username']; ?></a></li>
          <li><i class="fas fa-info-circle"></i><a href="mailto:praveengovind76@gmail.com?subject= Need Help On Delivery" class="nav-link">Help</a></li>
          <li><a href="log.php" class="nav-signout">sign out</a></li>
        </ul>
      </div>
    </nav>
</header>

<!-- <div class="overlay"  id="nav-link">
        <div class="overlay-box">
            <button onclick="userdetails()">x</button>
            
            <div class="overlay-grid">
                <form action="edit.php" method="POST">
                <input type="name" class="overlay-input" name="firstname" placeholder = <?php echo $row['firstname'];?>>
                <input type="name" class="overlay-input" name="lastname" placeholder = <?php echo $row['lastname']; ?>>
                <input type="name" class="overlay-input" name="username" placeholder = <?php echo $row['username']; ?>>
                <input type="email" class="overlay-input" name="email" placeholder = <?php echo $row['email']; ?>>
                <input type="name" class="overlay-input" name="gender" placeholder = <?php echo $row['gender']; ?>>
                <input type="number" class="overlay-input" name="pincide" placeholder = <?php echo $row['pincode']; ?>>
                <input type="number" class="overlay-input" name="phonenumber" placeholder = <?php echo $row['phonenumber']; ?>>
                <input type="submit" name="edit" value="edit">
                </form>
            </div>
        </div>
</div> -->
<?php
        }
    }     
?>

<!-- html code -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>enroute</title>
    <link rel="stylesheet" href="user.css">
    <script src="https://kit.fontawesome.com/a1106be3c5.js" crossorigin="anonymous"></script>
</head>
<body>

<section>
    <div class="pin-pannel">

            <div class="pin-content">
                <div class="pin-text">
                    <h1 class="pin-heading">Find your neighbours!</h1>
                    <p class="pin-para">Order product from friends near you.</p>
                </div>
                <div class="accordin-search">
                    <form action="" method="POST">
                    <input type="tel" name="pincode" class="pincode-search" placeholder="Enter your pincode">
                    <input type="submit" name="submit" value="search" id="submit" required>
                    </form>
                </div>
                <div class="accordin-ans" id="accordin-ans">
                    <div class="accordin-ans-details">
                    <?php
                        include "CURD\config.php";
                            if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']){
                                $pincode = $_POST['pincode'];
                                $sql = mysqli_query($conn, "select *from users where pincode='$pincode'");
                                $count = $sql->num_rows;
                                if($count > 0){
                                while($data = mysqli_fetch_array($sql)){
                     ?>
                    <div style="margin-bottom:30px;">
                    <h1 class="accordin-ans-td accordin-ans-td-name"><?php echo $data['firstname'].' '.$data['lastname']; ?></h1>
                    <p class="accordin-ans-td accordin-ans-td-username"><?php echo $data['username']; ?></p>
                    <p class="accordin-ans-td accordin-ans-td-email"><?php echo $data['email']; ?></p>
                    <p class="accordin-ans-td accordin-ans-td-gender"><?php echo $data['gender']; ?></p>
                    <p class="accordin-ans-td accordin-ans-td-pincode"><?php echo $data['pincode']; ?></p>
                    </div>
                    <div class="accordin-ans-button">
                    <a href="https://wa.me/+91<?php echo $data['phonenumber'] ?>?text=Iam user_name" target="_blank" class="accordin-ans-button-link accordin-ans-button-order" style="margin-bottom: 20px;">Order</a>
                    </div>
                    <?php
                        }
                            }else{
                                echo "<p id='hid'>1</p>";
                            }
                        }
                    ?>
                    </div>

                </div>
            </div>

            <div>
                <img src="images\user-del.jpg" alt="deliver-image" class="deliver-image">
            </div>
    </div>
</section>


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

<script>
    // function userdetails(){
    //     if(document.getElementById("nav-link").style.display=='block')
    //     {
    //         document.getElementById("nav-link").style.display='none';
    //     }else{
    //         document.getElementById("nav-link").style.display='block';
    //     }
    // }

    let x = document.getElementById('hid').textContent;
    if(x){
        console.log(x);
        document.getElementById("accordin-ans").style.display='none';
        alert("no matches found in this pincode");
    }
    

    
</script>