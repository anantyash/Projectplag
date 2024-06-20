<?php

session_start();
$gitlink = $_SESSION['gitlink'];
// echo($gitlink);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/home.css">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Profile | ProjectPlag</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="../index.html">ProjectPlag</a> </p>
        </div>

        <div class="right-links">
            <a href="logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>
    <div class="sectn">

        <div class="profile">
            <div class="img">
                <img src="../images/img-placeholder.jpg" alt="Profile Picture">
            </div>
            <div class="info">
                <p>
                    <b>Name: </b> <?php echo(strtoupper($_SESSION['name'])); ?> <br>
                    <b>College Name: </b><?php echo(strtoupper($_SESSION['clgname'])); ?> <br>
                    <b>Branch: </b> <?php echo(strtoupper($_SESSION['branch'])); ?> <br>
                </p>
            </div>
            <div class="info-2">
                <p>
                    <b>Session: </b> <?php echo(strtoupper($_SESSION['sesion'])); ?> <br>
                    <?php echo '<a href="'. $gitlink. '" target="_blank"><b>Github Profile</b></a>';?> <br>
                </p>
            </div>    
        </div>
        <div class="file_upload">
            <form class="row g-3" id="upload_form" action="" method="POST" enctype="multipart/form-data">
                <div class="container">
                    <div class="card">
                        <h3 style="color:#000">Upload Files</h3>
                        <div class="drop_box">
                            <div class="sub_div">
                                <div class="file_detail_upld">
                                    
                                    <header>
                                        <h4>File Name</h4>
                                    </header>
                                    <input type="text" name="uploading_file_name" id="uploading_file_name">
                                    <header>
                                        <h4>Select Thumbnail</h4>
                                    </header>
                                    <p></p>
                                    <span class="btn btn-primary btn-file">
                                        Select Image <input type="file" name="uploading_img" id="uploading_img" >
                                    </span>
                                </div>
                                <div class="zip_file_upld">
                                    <header>
                                        <h4>Select File here</h4>
                                    </header>
                                    <p>Files Supported: ZIP</p>
                                    <span class="btn btn-primary btn-file">
                                        Select File <input type="file" name="uploadingfile" id="uploadingfile" required>
                                    </span>
                                </div>
                            </div>
                            
                            <button class="btn" type="button"  name="btnSubmit" onclick="uploadFileHandler()">UPLOAD FILE</button>
                        </div>
                        <div class="form-group">
                            <div class="progress" id="progressDiv" style="display:none;">
                                <progress id="progressBar" value="0" max="100" style="width:100%; height: 1.2rem;"></progress>
                            </div>
                        </div>
                        <div class="form-group">
                            <h3 id="status" style="color:#000;font-size:18px"></h3>
                            <p id="uploaded_progress" style="color:#000"></p>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <div class="botm_btn">
            <a href="dashboardhtml.php"> <button type="button" class="btn">College Dashboard</button> </a>
        </div>
    </div>
    <script src="../js/home.js"></script>
</body>
</html>