<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reg</title>
    <link rel="stylesheet" href="reg.css">
</head>
<body>
<div class="log-page">
<div class="log-form">
  <h3>sign up</h3>
  <form action="" method="POST">

    <div class="grid">
        <div>
            <input type="name" id="firstname" name="firstname" placeholder="Your First name.." required">
            <input type="email" id="email" name="email" placeholder="Your email.." required>
            <input type="name" id="username" name="username" placeholder="username.." required>
            <input type="tel" id="tel" name="phonenumber" placeholder="Your Mobile Number.." maxlength=10 required>
        </div>
        <div>
        <input type="name" id="lastname" name="lastname" placeholder="Your last name.." required>
            <input type="password" id="password" name="password" placeholder="Password.." required>
            <input type="tel" id="tel" name="pincode" placeholder="Your pincode.." maxlength=6 required>
            <label for="gender" class="gender">
                <span><input type="radio" name="gender" value="male" required>&nbsp;Male</span>
                <span><input type="radio" name="gender" value="female" required>&nbsp;Female</span>
            </label>
        </div>

    </div>
<?php
    include "CURD\config.php";
    if(isset($_POST['submit'])){

        if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty('password') && !empty($_POST['gender']) && !empty('pincode'))
        {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];
            $pincode = $_POST['pincode'];
            $phonenumber = $_POST['phonenumber'];

            //user check 
            $check_username = mysqli_query($conn, "select *from users where username='$username'");
            $username_count = $check_username->num_rows;
            if ($username_count > 0)
            {
                $error_msg = "! Username is Already Taken";
                echo "<p style='color:rgb(255, 6, 10); margin-top:10px;'>".$error_msg."</p>";
            }
            else
            {
                $chech_email = mysqli_query($conn, "select *from users where email='$email'");
                $count = $chech_email->num_rows;
                if ($count > 0)
                {
                    $error_msg = "! Email Address is Already Registered";
                    echo "<p style='color:rgb(255, 6, 10); margin-top:10px;'>".$error_msg."</p>";
                }
                else
                {
                    $sql = mysqli_query($conn, "insert into users (firstname, lastname, username, email, password, gender, pincode, phonenumber) values ('$firstname', '$lastname', '$username', '$email', '$password', '$gender', '$pincode', '$phonenumber')");
                    if($sql == TRUE)
                    {
                        echo "Record updated successfully";
                        header('Location: log.php');
                    }
                    else
                    {
                        echo "Error". $sql . $conn->error;
                    }
                }
            } 
        }
    }
?>
    <input type="submit" name="submit" value="SIGN UP">

  </form>
  <p>Already have an account? <a href="log.php">Sign in</a></p>
</div>

</div>
</body>
</html>






