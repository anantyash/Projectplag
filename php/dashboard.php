<?php 
    include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../style/dashboard.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Dashboard | ProjectPlag</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
           <span class="logo_name">ProjectPlag</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Students List</span>
                </a></li>
                <li><a href="home.php">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Profile</span>
                </a></li>
                <li><a href="../projectgrid.html" >
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Project Grid</span>
                </a></li>
                <li><a href="../plagcheck.html">
                    <i class="uil uil-file-upload"></i>
                    <span class="link-name">Code Copying Checker</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <!-- <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li> -->
            </ul>
        </div>
    </nav>

    <section class="dashboard" >
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

        </div>

        <div class="dash-content" >
            <div class="overview">
                <div class="title">
                    <span class="text"><b>College Name:</b> Guru Gobind Singh Educational Society's Technical Campus</span>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent List</span>
                    
                    
                    <div class="search-box">
                        <form action="" method="POST">
                            <i class="uil uil-search"></i>
                            <input type="text" name="search" placeholder="Search here...">
                            <button type="submit" name ="submit">Search</button>
                        </form>
                    </div>

                </div>

                <div class="activity-data">
                    <table>
                        <?php 
                            if (!isset($_POST['submit'])){
                                $sql = "SELECT * FROM form_detail";
                                $result = mysqli_query($con,$sql);
                                if ($result){
                                    if (mysqli_num_rows($result)>0){
                                        echo '<tr>
                                                    <th style=" width: 70px">S.No</th>
                                                    <th style=" width: 200px">Name</th>
                                                    <th style=" width: 300px">Email</th>
                                                    <th style=" width: 100px">Gender</th>
                                                    <th style=" width: 200px">Domain</th>
                                
                                                </tr>';
                                        $i = 1;
                                        while ($row=mysqli_fetch_assoc($result)){
                                            echo '<tr>
                                                        <td style="padding-left:15px">'.$i.'</td>
                                                        <td>'.$row['FName'].'</td>
                                                        <td>'.$row['Email'].'</td>
                                                        <td>'.$row['Gen'].'</td>
                                                        <td>'.$row['Domain'].'</td>
                                                    </tr>';
                                            $i++;
                                        }
                                        
                                    } 

                                }

                            }
                            else if(isset($_POST['submit'])){
                               
                                $srch= $_POST['search'];
                                $sql = "SELECT * FROM form_detail WHERE FName LIKE '%$srch%' OR Email = '$srch' OR Gen = '$srch' OR Domain LIKE '%$srch%' ";
                                $result = mysqli_query($con,$sql);
                           
                                if ($result){
                                    if (mysqli_num_rows($result)>0){
                                        echo '<tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Gender</th>
                                                    <th>Domain</th>
                                                    
                                                    
                                                </tr>';
                                        $i = 1;
                                        while ($row=mysqli_fetch_assoc($result)){
                                            echo '<tr>
                                                        <td>'.$i.'</td>
                                                        <td>'.$row['FName'].'</td>
                                                        <td>'.$row['Email'].'</td>
                                                        <td>'.$row['Gen'].'</td>
                                                        <td>'.$row['Domain'].'</td>
                                                    </tr>';
                                            $i++;
                                        }
                                    } 

                                }else {
                                        echo '<h4> No Matched Result Found</h4>';
                                }

                            } 
                        ?>
                    </table>
                </div>
            </div>
        </div>

        
    <script src="../js/dashboard.js"></script>
</body>
</html>