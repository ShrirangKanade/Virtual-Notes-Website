<?php
session_start();
require("includes/database_connect.php");
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}

if (!isset($_SESSION["user_id"])) {
    header("location: Home.php");
    die();
}
$user_id = $_SESSION['user_id'];

$sql_1 = "SELECT * FROM users WHERE id = $user_id";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}
$user = mysqli_fetch_assoc($result_1);
if (!$user) {
    echo "Something went wrong!";
    return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Virutal Notes | Dashboard</title>

    <?php
    include "includes/Head_links.php";
    ?>
    <link href="css/Dashboard.css" rel="stylesheet" />
    
</head>

<body>
    <?php
    include "includes/header.php";
    ?>
 
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb py-2">
            <li class="breadcrumb-item">
                <a href="Home.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Dashboard
            </li>
        </ol>
    </nav>

    <div class = "div4"> 
        <p class="title" >My Profile</p>
    </div>
    <!--Personal Details-->
    <div class="div3">
            <br>
            <br>
            <br>
         

            <div id="User" >
                <img src="img/user3.png" class="user-img">
            </div>

            <div id="user-div">
                <p id="user-details">
                    <?= $user['Full_Name'] ?><br>
                    <?= $user['email'] ?><br>

                    <?= $user['Phone_no'] ?><br>
                    <?= $user['College_Name'] ?>
                </p>
            </div>
    </div>




    <div class = "div4"> 
        <p class="title" >Select Subjects</p>
    </div>

    
    <div class = "div6">  
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <a href="Physics.php"><div class="card h-100 crd1">
                    <img id="img1" src="img/Physics.jpg" class="card-img-top" alt="Physics">
                    <div class="card-body">
                        <h5 class="card-title" style="color: black">Physics Notes</h5>
                        <p class="card-text" style="color: black">Learn the Mechanics over here.</p>
                    </div>
                </div>
                </a>
            </div>
           
        
            <div class="col">
                <a href="Chemistry.php">
                    <div class="card h-100 crd2">
                        <img id="img2" src="img/Chem.jpg" class="card-img-top" alt="Chemistry">
                        <div class="card-body">
                            <h5 class="card-title" style="color: black">Chemistry Notes</h5>
                            <p class="card-text" style="color: black">Play with physical,organic and inorganic chemistry.</p>
                        </div>
                        
                    </div>
                </a>
            </div>
        
        
        <div class="col">
        <a href="Math.php"><div class="card h-100 crd3">
                <img  src="img/Math.jpeg" class="card-img-top" alt="Maths">
                <div id="T3" class="card-body">
                    <h5  class="card-title"  style="color: black">Math Notes</h5>
                     <p class="card-text"  style="color: black">Integrate and differentiate stuff over here.</p>
                </div>
            </div>
        </a>
        </div>
    </div>
    </div>
    
 

    <!-- <div class="my-profile page-container">
        <h1>My Profile</h1>
        <div class="row">
            <div class="col-md-3 profile-img-container">
                <i class="fas fa-user profile-img"></i>
            </div>
            <div class="col-md-9">
                <div class="row no-gutters justify-content-between align-items-end">
                    <div class="profile">
                        <div class="name">
                            <?= $user['full_name'] ?>
                        </div>
                        <div class="email">
                            <?= $user['email'] ?>
                        </div>
                        <div class="phone">
                            <?= $user['phone'] ?>
                        </div>
                        <div class="college">
                            <?= $user['college_name'] ?>
                        </div>
                    </div>
                    <div class="edit">
                        <div class="edit-profile">Edit Profile</div>
                    </div>
                </div>
            </div>
        </div> -->
        
        <?php
                      include "includes/footer.php";
           
        ?>
</body>
</html>