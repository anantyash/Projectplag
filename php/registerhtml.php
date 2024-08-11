<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../style/register.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Regisration | ProjectPlag </title> 
</head>
<body>
    <div class="container">

    <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $gen = $_POST['gen'];
            $branch = $_POST['branch'];
            $clgname = $_POST['clgname'];
            $userid = $_POST['userid'];
            $session = $_POST['session'];
            $project = $_POST['project'];
            $gitlink = $_POST['gitlink'];
            $domain = $_POST['domain'];

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT Email FROM form_detail WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         
         else{

            //encrypting password
            $secure_pass = password_hash($password, PASSWORD_DEFAULT);

            mysqli_query($con,"INSERT INTO form_detail(FName,DOB, Email, Password, Gen, Branch, Clgname, Userid, Sesion, Project, Gitlink, Domain) VALUES('$name','$dob','$email','$secure_pass','$gen','$branch','$clgname','$userid','$session','$project','$gitlink','$domain')") or die("Erroe Occured");

            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='login.php'>
                  <button class= 'sumbit' name='submit' >
                        <span class='btnText'>Nextr</span>
                        <i class='uil uil-navigator'></i>
                   </button>";
         

         }

         }else{
         
        ?>

        <header>Registration</header>

        <form action="" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter your name" required>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" id="dob" placeholder="Enter birth date" required>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="email" id="email" placeholder="Enter your email" required>
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" required>
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select name="gen" id="gen" required>
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Branch</label>
                            <select name="branch" id="branch" required>
                                <option disabled selected>Select Branch</option>
                                <option>CSE</option>
                                <option>MBA</option>
                                <option>ECE</option>
                            </select>
                        </div>
                        
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Identity Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>College Name</label>
                            <input type="text" name="clgname" id="clgname" placeholder="College Name" required>
                        </div>

                        <div class="input-field">
                            <label>USER ID</label>
                            <input type="number" name="userid" id="userid" placeholder="Enter USER ID " required>
                        </div>

                        <div class="input-field">
                            <label>Session</label>
                            <input type="text" name="session" id="session" placeholder="2020-2024" required>
                        </div>

                        <div class="input-field">
                            <label>Project</label>
                            <select name="project" id="project" required>
                                <option disabled selected>Select Project Type</option>
                                <option>Minor</option>
                                <option>Major</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Github username</label>
                            <input type="url" name="gitlink" id="gitlink" placeholder="https://github.com/">
                        </div>

                        <div class="input-field">
                            <label>Domain</label>
                            <select name="domain" id="domain" required>
                                <option disabled selected>Select Your Interest</option>
                                <option>Artificial intelligence</option>
                                <option>Web Technology</option>
                                <option>Data Science</option>
                                <option>Machine Learning</option>
                                <option>IOT</option>
                            </select>
                        </div>
                        <button class="sumbit" name="submit" type="submit" value="Register" onclick="loginPage()">
                            <span class="btnText">Register</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                 </div>   
        </form>
    </div>

    <?php } ?>

    <script src="../js/registerjs.js"></script>
</body>
</html>