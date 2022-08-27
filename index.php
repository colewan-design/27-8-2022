<?php require_once("config.php");
if(!isset($_SESSION["login_sess"])) 
{
    header("location:login.php"); 
}
  $email=$_SESSION["login_email"];
  $findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{
$username = $res['username']; 
$fname = $res['fname'];   
$lname = $res['lname'];  
$email = $res['email'];  
$image= $res['image'];
}
 ?> 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBO Payroll Management System</title>
 
    <link rel="stylesheet" href="style2.css">
    <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
     <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    </head>

<script>
     $(function() {
        $('#nav li a').click(function() {
           $('#nav li').removeClass();
           $($(this).attr('href')).addClass('active');
        });
     });
  </script>
<body  >
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <input type="checkbox" name="" id="menu-toggle">
    <div class="sidebar">
        <div class="sidebar-container">
            <div class="brand">
                <h2>
                    <span ></span>
                    CBO Payroll Management System
                </h2>
            </div>
            <div class="sidebar-avartar">
                <div>
                <center>
            <?php if($image==NULL)
                {
                 echo '<img src="https://technosmarter.com/assets/icon/user.png">';
                } else { echo '<img src="images/'.$image.'" style="height:50px;width:50px;border-radius:50%;">';}?> 

<p></p>
  </center>
                </div>
                <div class="avartar-info">

                    <div class="avartar-text">

                        <h4 style="padding-left:3px;">
                        <?php echo $fname ." ". $lname; ?> 
                        
                        </h4>
                        
                    </div>
                
                </div>
            </div>
            <form action="" >
            <div class="sidebar-menu">

                <ul  >
                    <li class="side-nav" >
                        <a class="current" href="index.php" >
                            <span class="las la-adjust"></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="side-nav">
                        <a href="employees.php">
                            <span class="las la-users" ></span>
                            <span>Employees</span>
                        </a>
                    </li>
                    <li class="side-nav">
                        <a href="department.php">
                            <span class="las la-users" ></span>
                            <span>Departments</span>
                        </a>
                    </li>
                    <li class="side-nav">
                        <a href="position.php">
                            <span class="las la-users" ></span>
                            <span>Position</span>
                        </a>
                    </li>
                    <li class="side-nav">
                        <a href="calculations.php" >
                            <span class="las la-chart-bar"></span>
                            <span>Calculations</span>
                        </a>
                    </li>
                    <li class="side-nav">
                        <a href="">
                            <span class="las la-calendar"></span>
                            <span>Reports</span>
                        </a>
                    </li>
                    <li class="side-nav">
                        <a href="account.php">
                            <span class="las la-user"></span>
                            <span>Account</span>
                        </a>
                    </li>
                   
                </ul>
             <!--php code here-->
                <?php
            $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));       
            $result = $mysqli->query("SELECT * FROM data") or die(mysqli->error);
             
            ?>
            </div>
            </form>
           <!--side-card was here-->
        </div>
    </div>
    <div class="main-content">
        <header >
            <div class="header-title-wrapper">
               
                <div class="header-title">
                    <h1>Hi <?php echo $username ?>!</h1>
                    <p>Display Admin Dashboard <span class="las la-chart-line">

                    </span> </p>
                </div>
            </div>
           
            <div class="header-action" style="position:absolute;right:1rem; top:1rem;">
            <div class="dropdown">
           
                <button name="papa" class="btn btn-light dropdown-toggle link-color" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Profile Menu
                </button>
  
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="las la-user dropdown-item link-color" href="account.php">My Profile</a></li>
                    <li><a class="las la-cog dropdown-item link-color" href="edit-profile.php">Account settings </a></li>
                    <li><a class="las la-sign-out-alt dropdown-item link-color" href="logout.php">Log out</a></li>
   
                    </ul>
 
            </div>
                
            </div>
        </header>
        <main>
            <div class="analytics">
                <div class="analytic" style="background:white;">
                    <div class="analytic-icon">
                        <span class="las la-users"></span>
                    </div>
                        <div class="analytic-info" >
                            <h4>Total Employees</h4>
                            <h1><?php echo mysqli_num_rows($result); ?></h1>
                        </div> 

                       
                </div>

                <div class="analytic" style="background:white;">
                    <div class="analytic-icon">
                        <span class="las la-clock"></span>
                    </div>
                        <div class="analytic-info">
                            <h4>Total Work Hours </h4>
                            <h1>10.0k <small class="text-danger"> 5%</small></h1>
                        </div>  
                </div>

                <div class="analytic" style="background:white;">
                    <div class="analytic-icon">
                        <span class="las la-ruble-sign"></span>
                    </div>
                        <div class="analytic-info">
                            <h4> Total Renumeration</h4>
                            <h1>10.0k <small class="text-success"> 5%</small></h1>
                        </div>
                        
                    
                </div>
                <div class="analytic" style="background:white;">
                    <div class="analytic-icon">
                        <span class="las la-heart"></span>
                    </div>
                    <div class="analytic-info">
                            <h4>Total Likes</h4>
                            <h1>10.0k</h1>
                    </div> 
                </div>
            </div>
            <div class="block-grid">
                <div class="revenue-card">

                </div>
            </div>
        </main>
    </div>
    <style>

      .link-color {
       
        color: var(--link-color);
      }
      .dropdown-item:hover{
        text-decoration: underline;
       
      }
                 
    </style>
   
  
</body>
</html>
