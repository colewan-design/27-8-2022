<?php require_once("config.php");
require_once("process.php"); 
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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/datatables.bootsrap4.min.css"/>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
  
</head>
<script>
     $(function() {
        $('#nav li a').click(function() {
           $('#nav li').removeClass();
           $($(this).attr('href')).addClass('active');
        });
     });
  </script>
<body >
<section id="mainBody">
  <div id="bodyContent">
     
  </div>
</section>
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.js"></script>


<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 
    <input type="checkbox" name="" id="menu-toggle">
    <div class="sidebar">
        <div class="sidebar-container">
            <div class="brand">
                <h2>
                    <span></span>
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
                       <small></small>
                    </div>
                    
                </div>
            </div>
            <form action="">
            <div class="sidebar-menu" >
                <ul>
                    <li class="side-nav">
                        <a href="index.php" >
                            <span class="las la-adjust"></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="side-nav">
                        <a class="current" href="employees.php" >
                            <span class="las la-users"></span>
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
                        <a href="" >
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
              
            </div>
            </form>
           <!--side-card was here-->
        </div>
    </div>
    <div class="main-content">
    <header>
            <div class="header-title-wrapper">
                
                <div class="header-title">
                    <h1>Employees</h1>
                    <p>Display Employee Records <span class="las la-chart-line">

                    </span> </p>
                </div>
            </div>
            <div class="header-action"  >
                
                    
               
                  
               <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Record
</button>

<!-- Modal -->
<div style="margin-right:8rem; "class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:var(--bg);">
        <h5 class="modal-title" id="exampleModalLabel">Add Records</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="padding-left:8rem; background:var(--bg2);">
      <div class="row justify-content-enter" >
            <form action="process.php" method="post" class="forms" >
            <input type="hidden" name="id" value="<?php echo$id ?>">
                <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter employee name" required>
                </div>
                 <!-- Department -->
                 <div class="form-group">
                <label for="">Department</label><br>
                <select name="departmentName" id="" style="width: 250px;">
                    <option value="">Select</option>
                    <?php
                
                    $result = $mysqli->query("SELECT * FROM department") or die($mysqli->error());
                    while ($trow = mysqli_fetch_array($result)) {
                        $trows[] = $trow;
                    }
                    foreach ($trows as $trow) {
                        print "<option value='" . $trow['departmentName'] . "'>" . $trow['departmentName'] . "</option>";
                    }
                    ?>
                </select>
                </div>
                <!-- position -->
                <div class="form-group">
                <label for="">Position</label><br>
                <select name="position" id="" style="width: 250px;">
            <option value="">Select</option>
            <?php
          
            $result = $mysqli->query("SELECT * FROM position") or die($mysqli->error());
            while ($srow = mysqli_fetch_array($result)) {
                $srows[] = $srow;
            }
            foreach ($srows as $srow) {
                print "<option value='" . $srow['positionName'] . "'>" . $srow['positionName'] . "</option>";
            }
            ?>
        </select>
                </div>
               

                <div class="form-group">
                <label for="">Salary Grade</label>
                <input type="number" name="sg" class="form-control" value="<?php echo $sg; ?>" placeholder="Enter employee SG" required>
                </div>
                <div class="form-group">
                <label for="">Step </label>
                <input type="number" name="step" class="form-control" value="<?php echo $step; ?>"  placeholder="Enter employee Step" required>
                </div>

               
                
                <?php
                if ($update == true ): 
                 ?>
                    <button type="submit" class="btn btn-info" name="update">Update</button>
                    <a href="employees.php" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>
               <?php else: ?>
                <button type="submit" class="btn btn-success" name="save" style="margin-top:10px;">Save</button>
                <a href="employees.php" id="cancel" name="cancel" class="btn btn-danger" style="margin-top:10px;">Cancel</a>
                <?php endif; ?>
            </form>
            </div>
      </div>
      <div class="modal-footer" style="background:var(--bg);">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- end modal -->
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
           

            <?php

            if (isset($_SESSION['message'])):
            ?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">

                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
        
            </div>
            <?php endif ?>
            <div class="container">
            <?php
            $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));       
            $result = $mysqli->query("SELECT * FROM data") or die(mysqli->error);
             
            ?>
            <div class="row justify-content-center">
                <table id="tableid" class="table  table-bordered table-sm " style=" background:white;width: calc(95vw - 320px);">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>SG</th>
                            <th>Step</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <?php
                    while($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['position']; ?></td>
                    <td><?php echo $row['sg']; ?></td>
                    <td><?php echo $row['step']; ?></td>
                    <td><?php echo $row['salary']; ?></td>
                    <td>
                       
                
                       
                        <select class="ass"id="xyz" onChange="window.location.href=this.value">
                        <option value="" disabled selected hidden>Actions</option>
                        <option  class="btn btn-link btn-sm" value="edit-record.php?edit=<?php echo $row['id']; ?>">Edit</option>
                            

                        <option  class="btn btn-link btn-sm" value="process.php?delete=<?php echo $row['id']; ?>">Delete</option>
                        <option  class="btn btn-link btn-sm" value="employee-pay.php?edit=<?php echo $row['id']; ?>">Pay</option>
                        <option  class="btn btn-link btn-sm" value="employee-details.php?edit=<?php echo $row['id']; ?>">View</option>
                        </select>
                       
                    </td>
                </tr>
                <?php endwhile;  ?>
               

                </table>
            </div>
            <?php 
            function pre_r($array){
            

                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
            ?>
            
           
            </div>
        </main>
    </div>
 
   <style>
/* scrollbar styling
 */

::-webkit-scrollbar {
    -webkit-appearance: none;
}
::-webkit-scrollbar:vertical {
    width: 11px;
}
::-webkit-scrollbar:horizontal {
    height: 11px;
}
::-webkit-scrollbar-thumb {
    border-radius: 8px;
    border: 2px solid white; /* should match background, can't be transparent */
    background-color: rgba(0, 0, 0, .5);
}
::-webkit-scrollbar-track { 
    background-color: #fff; 
    border-radius: 8px; 
} 

    .link-color {
       
       color: var(--link-color);
     }
     .dropdown-item:hover{
       text-decoration: underline;
      
     }
     
       
    select#xyz {
   border:0px;
   outline:0px;
   color:var(--link-color);
}
.ass:hover{
    text-decoration: underline;
}
.table{
    color:var(--table-color);
}
.th{
    font-size:.9rem;
   
}

/* remove the horizontal scroll bar*/
html, body {
  max-width: 100%;
  overflow-x: hidden;
}
   </style>

   
   <!-- refresh the page once the back button has been clicked -->
  <script>
 window.onunload = function(){};

 $(document).ready(function () {
    $('#tableid').DataTable();
});

if (window.history.state != null && window.history.state.hasOwnProperty('historic')) {
    if (window.history.state.historic == true) {
        document.body.style.display = 'none';
        window.history.replaceState({historic: false}, '');
        window.location.reload();
    } else {
        window.history.replaceState({historic  : true}, '');
    }
} else {
    window.history.replaceState({historic  : true}, '');
    
}

</script>
</body>
</html>