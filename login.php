<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="logincss.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Login | ProjectPlag</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
        <?php 
             
             include("php/config.php");
             if(isset($_POST['submit'])){
               $email = mysqli_real_escape_string($con,$_POST['email']);
               $pwd = mysqli_real_escape_string($con,$_POST['password']);

               

               $result = mysqli_query($con,"SELECT * FROM form_detail WHERE Email='$email' AND Password='$pwd' ") or die("Select Error");
               $row = mysqli_fetch_assoc($result);
               
               if(is_array($row) && !empty($row)){
                   
                   $_SESSION['id'] = $row['Id'];
                   $_SESSION['name'] = $row['FName'];
                   $_SESSION['dob'] = $row['DOB'];
                   $_SESSION['valid'] = $row['Email'];
                   $_SESSION['password'] = $row['Password'];
                   $_SESSION['gen'] = $row['Gen'];
                   $_SESSION['branch'] = $row['Branch'];
                   $_SESSION['clgname'] = $row['Clgname'];
                   $_SESSION['userid'] = $row['Userid'];
                   $_SESSION['sesion'] = $row['Sesion'];
                   $_SESSION['project'] = $row['Project'];
                   $_SESSION['gitlink'] = $row['Gitlink'];
                   $_SESSION['domain'] = $row['Domain'];

                }else{
                    echo "<div class='message'>
                     <p>Wrong Username or Password</p>
                      </div> <br>";
                  echo "<a href='login.php'><button class='btn'>Try Again</button>";
        
                }
                if(isset($_SESSION['valid'])){
                    header("Location: home.php");
                }
             }else{

           
           ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input email">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="registerhtml.php">Register Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>

      <script src="loginjs.js"></script>


</body>
</html>