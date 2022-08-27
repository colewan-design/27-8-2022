<?php



//declare database
$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));  
 
$id = 0;  
$update = false;
$name = '';
$position = '';
$sg = '';
$step = '';
$username = '';
$gsis = 0;
$hdmf = 0;
$philhealth = 0;
$salary = 0;
$pera = 2000;
$eaName = '';
$eaAmount = '';
//insert employee allowance
if(isset($_POST['addEmployeeAllowance'])){
  $employeeId = $_POST['id'];
  
  $employeeAllowanceId = $_POST['employeeAllowanceId'];
  
  $result = $mysqli->query("SELECT * FROM allowance WHERE allowanceId=$employeeAllowanceId") or die($mysqli->error());
        $row = $result->fetch_array();
        $employeeAllowanceName = $row['allowanceName'];
        $employeeallowanceAmount = $row['allowanceAmount'];
       
    $mysqli->query("INSERT INTO employeeallowance ( employeeallowanceAmount, employeeId, eaName, allowanceId) VALUES ('$employeeallowanceAmount', '$employeeId', '$employeeAllowanceName', '$employeeAllowanceId')") or
    die($mysqli->error);

  header("location:".$_SERVER['HTTP_REFERER']);
}
//insert employee deduction
if(isset($_POST['addEmployeeDeduction'])){
  $employeeId = $_POST['id'];
  
  $employeeDeductionId = $_POST['employeeDeductionId'];
  
  $result = $mysqli->query("SELECT * FROM deductions WHERE deductionId=$employeeDeductionId") or die($mysqli->error());
        $row = $result->fetch_array();
        $employeeDeductionName = $row['deductionName'];
        $employeeDeductionAmount = $row['amount'];
       
    $mysqli->query("INSERT INTO employeedeductions( employeeDeductionAmount, employeeId, edName, deductionId) VALUES ('$employeeDeductionAmount', '$employeeId', '$employeeDeductionName', '$employeeDeductionId')") or
    die($mysqli->error);

  header("location:".$_SERVER['HTTP_REFERER']);
}
//insert deductions
if(isset($_POST['insertDeductions'])){
  $deductionName = $_POST['deductionName'];
  $description = $_POST['description'];
  $amount = $_POST['amount'];
  $mysqli->query("INSERT INTO deductions (deductionName, description, amount) VALUES ('$deductionName', '$description', '$amount')") or
  die($mysqli->error);

  header("location:calculations.php");
}
//insert department
if(isset($_POST['insertDepartment'])){
  $departmentName = $_POST['departmentName'];
  $mysqli->query("INSERT INTO department (departmentName) VALUES ('$departmentName')") or
  die($mysqli->error);

  header("location:department.php");
}
//insert position
if(isset($_POST['insertPosition'])){
  $positionName = $_POST['positionName'];
  $mysqli->query("INSERT INTO position (positionName) VALUES ('$positionName')") or
  die($mysqli->error);

  header("location:position.php");
}
//insert allowance
if(isset($_POST['insertAllowance'])){
  $allowanceName = $_POST['allowanceName'];
  $allowanceDescription = $_POST['allowanceDescription'];
  $allowanceAmount = $_POST['allowanceAmount'];
  $mysqli->query("INSERT INTO allowance (allowanceName, allowanceDescription, allowanceAmount) VALUES ('$allowanceName', '$allowanceDescription', '$allowanceAmount')") or
  die($mysqli->error);

  header("location:allowance-list.php");
}

//save
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $position = $_POST['position'];
    $sg = $_POST['sg'];
    $step = $_POST['step'];
    $gsis = $_POST['gsis'];
    $philhealth = $_POST['philhealth'];
    $hdmf = $_POST['hdmf'];
    $departmentName = $_POST['departmentName'];
    
    if($sg=="1" && $step=="1")
        $salary=12517;
    else if($sg=="1" && $step=="2")
        $salary="12,621";
    else if($sg=="1" && $step=="3")
        $salary="12,728";
    else if($sg=="1" && $step=="4")
        $salary="12,834";
    else if($sg=="1" && $step=="5")
        $salary="12,941";
    else if($sg=="1" && $step=="6")
        $salary="13,049";
    else if($sg=="1" && $step=="7")
        $salary="13,159";
    else if($sg=="1" && $step=="8")
        $salary="13,268";
        //Salary Grade 2
    else if($sg=="2" && $step=="1")
        $salary="13,305 ";
    else if($sg=="2" && $step=="2")
        $salary="13,406";
    else if($sg=="2" && $step=="3")
        $salary="13,509";
    else if($sg=="2" && $step=="4")
        $salary="13,613";
    else if($sg=="2" && $step=="5")
        $salary="13,718";
    else if($sg=="2" && $step=="6")
        $salary="13,823";
    else if($sg=="2" && $step=="7")
        $salary="13,929";
    else if($sg=="2" && $step=="8")
        $salary="14,035";
         //Salary Grade 3
else if($sg=="3" && $step=="1")
    $salary="14,125 ";
else if($sg=="3" && $step=="2")
    $salary="14,234";
else if($sg=="3" && $step=="3")
    $salary="14,343";
else if($sg=="3" && $step=="4")
    $salary="14,454";
else if($sg=="3" && $step=="5")
    $salary="14,565";
else if($sg=="3" && $step=="6")
    $salary="14,676";
else if($sg=="3" && $step=="7")
    $salary="14,790";
else if($sg=="3" && $step=="8")
    $salary="14,903";

      //Salary Grade 4
else if($sg=="4" && $step=="1")
$salary="14,993";
else if($sg=="3" && $step=="2")
$salary="15,109";
else if($sg=="4" && $step=="3")
$salary="15,224";
else if($sg=="4" && $step=="4")
$salary="15,341";
else if($sg=="4" && $step=="5")
$salary="15,459";
else if($sg=="4" && $step=="6")
$salary="15,577";
else if($sg=="4" && $step=="7")
$salary="15,698";
else if($sg=="4" && $step=="8")
$salary="15,818";

  //Salary Grade 5
  else if($sg=="5" && $step=="1")
  $salary="15,909 ";
else if($sg=="5" && $step=="2")
  $salary="16,032";
else if($sg=="5" && $step=="3")
  $salary="16,155";
else if($sg=="5" && $step=="4")
  $salary="16,279";
else if($sg=="5" && $step=="5")
  $salary="16,404";
else if($sg=="5" && $step=="6")
  $salary="16,530";
else if($sg=="5" && $step=="7")
  $salary="16,657";
else if($sg=="5" && $step=="8")
  $salary="16,784";
    //Salary Grade 6  
else if($sg=="6" && $step=="1")
$salary="16,877 ";
else if($sg=="6" && $step=="2")
$salary="17,007";
else if($sg=="6" && $step=="3")
$salary="17,137";
else if($sg=="6" && $step=="4")
$salary="17,269";
else if($sg=="6" && $step=="5")
$salary="17,402";
else if($sg=="6" && $step=="6")
$salary="17,535";
else if($sg=="6" && $step=="7")
$salary="17,670";
else if($sg=="6" && $step=="8")
$salary="17,806";

  //Salary Grade 7
  else if($sg=="7" && $step=="1")
  $salary="17,899 ";
else if($sg=="7" && $step=="2")
  $salary="18,037";
else if($sg=="7" && $step=="3")
  $salary="18,176";
else if($sg=="7" && $step=="4")
  $salary="18,315";
else if($sg=="7" && $step=="5")
  $salary="18,455";
else if($sg=="7" && $step=="6")
  $salary="18,598";
else if($sg=="7" && $step=="7")
  $salary="18,740";
else if($sg=="7" && $step=="8")
  $salary="18,884";

    //Salary Grade 8
else if($sg=="8" && $step=="1")
$salary="18,998 ";
else if($sg=="8" && $step=="2")
$salary="19,170";
else if($sg=="8" && $step=="3")
$salary="19,343";
else if($sg=="8" && $step=="4")
$salary="19,518";
else if($sg=="8" && $step=="5")
$salary="19,694";
else if($sg=="8" && $step=="6")
$salary="19,872";
else if($sg=="8" && $step=="7")
$salary="20,052";
else if($sg=="8" && $step=="8")
$salary="20,233";

 //Salary Grade 9
 else if($sg=="9" && $step=="1")
 $salary="20,402 ";
 else if($sg=="9" && $step=="2")
 $salary="20,572";
 else if($sg=="9" && $step=="3")
 $salary="20,745";
 else if($sg=="9" && $step=="4")
 $salary="20,918";
 else if($sg=="9" && $step=="5")
 $salary="21,093";
 else if($sg=="9" && $step=="6")
 $salary="21,269";
 else if($sg=="9" && $step=="7")
 $salary="21,447";
 else if($sg=="9" && $step=="8")
 $salary="21,626";
  //Salary Grade 10
else if($sg=="10" && $step=="1")
$salary="22,190 ";
else if($sg=="10" && $step=="2")
$salary="22,376";
else if($sg=="10" && $step=="3")
$salary="22,563";
else if($sg=="10" && $step=="4")
$salary="22,752";
else if($sg=="10" && $step=="5")
$salary="22,942";
else if($sg=="10" && $step=="6")
$salary="23,134";
else if($sg=="10" && $step=="7")
$salary="23,327";
else if($sg=="10" && $step=="8")
$salary="23,522";
 //Salary Grade 11
 else if($sg=="11" && $step=="1")
 $salary="25,439 ";
 else if($sg=="11" && $step=="2")
 $salary="25,723";
 else if($sg=="11" && $step=="3")
 $salary="26,012";
 else if($sg=="11" && $step=="4")
 $salary="26,304";
 else if($sg=="11" && $step=="5")
 $salary="26,600";
 else if($sg=="11" && $step=="6")
 $salary="26,901";
 else if($sg=="11" && $step=="7")
 $salary="27,205";
 else if($sg=="11" && $step=="8")
 $salary="27,514";
  //Salary Grade 12
else if($sg=="12" && $step=="1")
$salary="27,608";
else if($sg=="12" && $step=="2")
$salary="27,892";
else if($sg=="12" && $step=="3")
$salary="28,180";
else if($sg=="12" && $step=="4")
$salary="28,471";
else if($sg=="12" && $step=="5")
$salary="28,766";
else if($sg=="12" && $step=="6")
$salary="29,065";
else if($sg=="12" && $step=="7")
$salary="29,367";
else if($sg=="12" && $step=="8")
$salary="29,673";
 //Salary Grade 13
 else if($sg=="13" && $step=="1")
 $salary="29,798 ";
 else if($sg=="13" && $step=="2")
 $salary="30,111";
 else if($sg=="13" && $step=="3")
 $salary="30,427";
 else if($sg=="13" && $step=="4")
 $salary="30,747";
 else if($sg=="13" && $step=="5")
 $salary="31,072";
 else if($sg=="13" && $step=="6")
 $salary="31,400";
 else if($sg=="13" && $step=="7")
 $salary="31,732";
 else if($sg=="13" && $step=="8")
 $salary="32,069";
  //Salary Grade 14
else if($sg=="14" && $step=="1")
$salary="32,321";
else if($sg=="14" && $step=="2")
$salary="32,665";
else if($sg=="14" && $step=="3")
$salary="33,013";
else if($sg=="14" && $step=="4")
$salary="33,366";
else if($sg=="14" && $step=="5")
$salary="33,722";
else if($sg=="14" && $step=="6")
$salary="34,083";
else if($sg=="14" && $step=="7")
$salary="34,449";
else if($sg=="14" && $step=="8")
$salary="34,819";
 //Salary Grade 15
 else if($sg=="15" && $step=="1")
 $salary="35,097";
 else if($sg=="15" && $step=="2")
 $salary="35,475";
 else if($sg=="15" && $step=="3")
 $salary="35,858";
 else if($sg=="15" && $step=="4")
 $salary="36,246";
 else if($sg=="15" && $step=="5")
 $salary="36,638";
 else if($sg=="15" && $step=="6")
 $salary="37,035";
 else if($sg=="15" && $step=="7")
 $salary="37,437";
 else if($sg=="15" && $step=="8")
 $salary="37,845";
  //Salary Grade 16
else if($sg=="16" && $step=="1")
$salary="38,150";
else if($sg=="16" && $step=="2")
$salary="38,566";
else if($sg=="16" && $step=="3")
$salary="38,987";
else if($sg=="16" && $step=="4")
$salary="39,413";
else if($sg=="16" && $step=="5")
$salary="39,845";
else if($sg=="16" && $step=="6")
$salary="40,282";
else if($sg=="16" && $step=="7")
$salary="40,725";
else if($sg=="16" && $step=="8")
$salary="41,172";
 //Salary Grade 17
 else if($sg=="17" && $step=="1")
 $salary="41,508";
 else if($sg=="17" && $step=="2")
 $salary="41,966";
 else if($sg=="17" && $step=="3")
 $salary="42,429";
 else if($sg=="17" && $step=="4")
 $salary="42,898";
 else if($sg=="17" && $step=="5")
 $salary="43,373";
 else if($sg=="17" && $step=="6")
 $salary="43,854";
 else if($sg=="17" && $step=="7")
 $salary="44,340";
 else if($sg=="17" && $step=="8")
 $salary="44,833";
  //Salary Grade 18
else if($sg=="18" && $step=="1")
$salary="45,203";
else if($sg=="18" && $step=="2")
$salary="45,706";
else if($sg=="18" && $step=="3")
$salary="46,216";
else if($sg=="18" && $step=="4")
$salary="46,731";
else if($sg=="18" && $step=="5")
$salary="47,254";
else if($sg=="18" && $step=="6")
$salary="47,783";
else if($sg=="18" && $step=="7")
$salary="48,318";
else if($sg=="18" && $step=="8")
$salary="48,860";
 //Salary Grade 19
 else if($sg=="3" && $step=="1")
 $salary="49,835";
 else if($sg=="19" && $step=="2")
 $salary="50,574";
 else if($sg=="19" && $step=="3")
 $salary="51,325";
 else if($sg=="19" && $step=="4")
 $salary="52,088";
 else if($sg=="19" && $step=="5")
 $salary="52,864";
 else if($sg=="19" && $step=="6")
 $salary="53,652";
 else if($sg=="19" && $step=="7")
 $salary="54,454";
 else if($sg=="19" && $step=="8")
 $salary="55,268";
  //Salary Grade 20
else if($sg=="20" && $step=="1")
$salary="55,799";
else if($sg=="20" && $step=="2")
$salary="56,633";
else if($sg=="20" && $step=="3")
$salary="57,482";
else if($sg=="20" && $step=="4")
$salary="58,344";
else if($sg=="20" && $step=="5")
$salary="59,221";
else if($sg=="20" && $step=="6")
$salary="60,112";
else if($sg=="20" && $step=="7")
$salary="61,017";
else if($sg=="20" && $step=="8")
$salary="61,937";
 //Salary Grade 21
 else if($sg=="21" && $step=="1")
 $salary="62,449";
 else if($sg=="21" && $step=="2")
 $salary="63,392";
 else if($sg=="21" && $step=="3")
 $salary="64,351";
 else if($sg=="21" && $step=="4")
 $salary="65,325";
 else if($sg=="21" && $step=="5")
 $salary="66,316";
 else if($sg=="21" && $step=="6")
 $salary="67,322";
 else if($sg=="21" && $step=="7")
 $salary="68,345";
 else if($sg=="21" && $step=="8")
 $salary="69,385";
  //Salary Grade 22
else if($sg=="22" && $step=="1")
$salary="69,963";
else if($sg=="22" && $step=="2")
$salary="71,029";
else if($sg=="22" && $step=="3")
$salary="72,113";
else if($sg=="22" && $step=="4")
$salary="73,214";
else if($sg=="22" && $step=="5")
$salary="74,333";
else if($sg=="22" && $step=="6")
$salary="75,471";
else if($sg=="22" && $step=="7")
$salary="76,627";
else if($sg=="22" && $step=="8")
$salary="77,801";
 //Salary Grade 23
 else if($sg=="23" && $step=="1")
 $salary="78,455";
 else if($sg=="23" && $step=="2")
 $salary="79,659";
 else if($sg=="23" && $step=="3")
 $salary="80,884";
 else if($sg=="23" && $step=="4")
 $salary="82,133";
 else if($sg=="23" && $step=="5")
 $salary="83,474";
 else if($sg=="23" && $step=="6")
 $salary="84,836";
 else if($sg=="23" && $step=="7")
 $salary="86,220";
 else if($sg=="23" && $step=="8")
 $salary="87,628";
  //Salary Grade 24
else if($sg=="24" && $step=="1")
$salary="88,410";
else if($sg=="24" && $step=="2")
$salary="89,853";
else if($sg=="24" && $step=="3")
$salary="91,320";
else if($sg=="24" && $step=="4")
$salary="92,810";
else if($sg=="24" && $step=="5")
$salary="94,325";
else if($sg=="24" && $step=="6")
$salary="95,865";
else if($sg=="24" && $step=="7")
$salary="97,430";
else if($sg=="24" && $step=="8")
$salary="99,020";
 //Salary Grade 25
 else if($sg=="25" && $step=="1")
 $salary="100,788";
 else if($sg=="25" && $step=="2")
 $salary="102,433";
 else if($sg=="25" && $step=="3")
 $salary="104,105";
 else if($sg=="25" && $step=="4")
 $salary="105,804";
 else if($sg=="25" && $step=="5")
 $salary="107,531";
 else if($sg=="25" && $step=="6")
 $salary="109,286";
 else if($sg=="25" && $step=="7")
 $salary="111,070";
 else if($sg=="25" && $step=="8")
 $salary="112,883";
  //Salary Grade 26
else if($sg=="26" && $step=="1")
$salary="113,891";
else if($sg=="26" && $step=="2")
$salary="115,749";
else if($sg=="26" && $step=="3")
$salary="117,639";
else if($sg=="26" && $step=="4")
$salary="119,558";
else if($sg=="26" && $step=="5")
$salary="121,510";
else if($sg=="26" && $step=="6")
$salary="123,493";
else if($sg=="26" && $step=="7")
$salary="125,508";
else if($sg=="26" && $step=="8")
$salary="127,557";
 //Salary Grade 27
 else if($sg=="27" && $step=="1")
 $salary="128,696";
 else if($sg=="27" && $step=="2")
 $salary="130,797";
 else if($sg=="27" && $step=="3")
 $salary="132,931";
 else if($sg=="27" && $step=="4")
 $salary="135,101";
 else if($sg=="27" && $step=="5")
 $salary="137,306";
 else if($sg=="27" && $step=="6")
 $salary="139,547";
 else if($sg=="27" && $step=="7")
 $salary="141,825";
 else if($sg=="27" && $step=="8")
 $salary="144,140";
  //Salary Grade 28
else if($sg=="28" && $step=="1")
$salary="145,427";
else if($sg=="28" && $step=="2")
$salary="147,800";
else if($sg=="28" && $step=="3")
$salary="150,213";
else if($sg=="28" && $step=="4")
$salary="152,664";
else if($sg=="28" && $step=="5")
$salary="155,155";
else if($sg=="28" && $step=="6")
$salary="157,689";
else if($sg=="28" && $step=="7")
$salary="160,262";
else if($sg=="28" && $step=="8")
$salary="162,877";
 //Salary Grade 29
 else if($sg=="29" && $step=="1")
 $salary="164,332";
 else if($sg=="29" && $step=="2")
 $salary="167,015";
 else if($sg=="29" && $step=="3")
 $salary="169,740";
 else if($sg=="29" && $step=="4")
 $salary="172,511";
 else if($sg=="29" && $step=="5")
 $salary="175,326";
 else if($sg=="29" && $step=="6")
 $salary="178,188";
 else if($sg=="29" && $step=="7")
 $salary="181,096";
 else if($sg=="29" && $step=="8")
 $salary="184,052";
  //Salary Grade 30
else if($sg=="30" && $step=="1")
$salary="185,695";
else if($sg=="30" && $step=="2")
$salary="188,726";
else if($sg=="30" && $step=="3")
$salary="191,806";
else if($sg=="30" && $step=="4")
$salary="194,937";
else if($sg=="3" && $step=="5")
$salary="198,118";
else if($sg=="30" && $step=="6")
$salary="201,352";
else if($sg=="30" && $step=="7")
$salary="204,638";
else if($sg=="30" && $step=="8")
$salary="207,978";
 //Salary Grade 31
 else if($sg=="31" && $step=="1")
 $salary="273,278";
 else if($sg=="31" && $step=="2")
 $salary="278,615";
 else if($sg=="31" && $step=="3")
 $salary="284,057";
 else if($sg=="31" && $step=="4")
 $salary="289,605";
 else if($sg=="31" && $step=="5")
 $salary="295,262";
 else if($sg=="31" && $step=="6")
 $salary="301,028";
 else if($sg=="31" && $step=="7")
 $salary="306,908";
 else if($sg=="31" && $step=="8")
 $salary="312,902";
  //Salary Grade 32
else if($sg=="32" && $step=="1")
$salary="325,807";
else if($sg=="32" && $step=="2")
$salary="332,378";
else if($sg=="32" && $step=="3")
$salary="339,080";
else if($sg=="32" && $step=="4")
$salary="345,918";
else if($sg=="32" && $step=="5")
$salary="352,894";
else if($sg=="32" && $step=="6")
$salary="360,011";
else if($sg=="32" && $step=="7")
$salary="367,272";
else if($sg=="32" && $step=="8")
$salary="374,678";
 //Salary Grade 33
 else if($sg=="33" && $step=="1")
 $salary="411,382 ";
 else if($sg=="33" && $step=="2")
 $salary="423,723";
//END Salary Grade 
$totalSalary = $salary + 2000;
//convert string to integer
$intgsis = (int)$gsis;
$inthdmf = (int)$hdmf;
$intphilhealth = (int)$philhealth;
 $totalDeductions = $intgsis + $inthdmf + $intphilhealth;
    $mysqli->query("INSERT INTO data (name, position, sg, step, salary, hdmf, gsis, philhealth, totalSalary, totalDeductions, departmentName) VALUES ('$name', '$position', '$sg', '$step', '$salary', '$hdmf', '$gsis', '$philhealth', '$totalSalary', '$totalDeductions', '$departmentName')") or
            die($mysqli->error);

            
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location:employees.php");
}

//delete
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location:employees.php");
}
//employee allowance delete process
if (isset($_GET['employeeallowanceDelete'])){
  $eaID = $_GET['employeeallowanceDelete'];
  $mysqli->query("DELETE FROM employeeallowance WHERE eaID=$eaID") or die($mysqli->error());

  $_SESSION['message'] = "Record has been deleted!";
  $_SESSION['msg_type'] = "danger";

  header("location:".$_SERVER['HTTP_REFERER']);
}
//employee deduction delete process
if (isset($_GET['employeeDeductionDelete'])){
  $edID = $_GET['employeeDeductionDelete'];
  $mysqli->query("DELETE FROM employeedeductions WHERE edID=$edID") or die($mysqli->error());

  $_SESSION['message'] = "Record has been deleted!";
  $_SESSION['msg_type'] = "danger";

  header("location:".$_SERVER['HTTP_REFERER']);
}

//deduction delete process
if (isset($_GET['deductionDelete'])){
  $deductionId = $_GET['deductionDelete'];
  $mysqli->query("DELETE FROM deductions WHERE deductionId=$deductionId") or die($mysqli->error());

  $_SESSION['message'] = "Record has been deleted!";
  $_SESSION['msg_type'] = "danger";

  header("location:calculations.php");
}
//allowance delete process
if (isset($_GET['allowanceDelete'])){
  $allowanceId = $_GET['allowanceDelete'];
  $mysqli->query("DELETE FROM allowance WHERE allowanceId=$allowanceId") or die($mysqli->error());

  $_SESSION['message'] = "Record has been deleted!";
  $_SESSION['msg_type'] = "danger";

  header("location:allowance-list.php");
}
//department delete process
if (isset($_GET['departmentDelete'])){
  $departmentId = $_GET['departmentDelete'];
  $mysqli->query("DELETE FROM department WHERE departmentId=$departmentId") or die($mysqli->error());

  $_SESSION['message'] = "Record has been deleted!";
  $_SESSION['msg_type'] = "danger";

  header("location:department.php");
}

//position delete process
if (isset($_GET['positionDelete'])){
  $positionId = $_GET['positionDelete'];
  $mysqli->query("DELETE FROM position WHERE positionId=$positionId") or die($mysqli->error());

  $_SESSION['message'] = "Record has been deleted!";
  $_SESSION['msg_type'] = "danger";

  header("location:position.php");
}

//edit
if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());

    if (is_countable($result) && count($result) == 1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $position = $row['position'];
        $sg = $row['sg'];
        $step = $row['step'];
    
    }
}
//update
if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name =$_POST['name'];
    $position =$_POST['position'];
    $sg =$_POST['sg'];
    $step =$_POST['step'];

   $mysqli->query("UPDATE data SET name='$name', position='$position', sg='$sg', step='$step' WHERE id=$id") or die($mysqli->error());

   if($sg=="1" && $step=="1")
        $salary=12517;
    else if($sg=="1" && $step=="2")
        $salary="12,621";
    else if($sg=="1" && $step=="3")
        $salary="12,728";
    else if($sg=="1" && $step=="4")
        $salary="12,834";
    else if($sg=="1" && $step=="5")
        $salary="12,941";
    else if($sg=="1" && $step=="6")
        $salary="13,049";
    else if($sg=="1" && $step=="7")
        $salary="13,159";
    else if($sg=="1" && $step=="8")
        $salary="13,268";
        //Salary Grade 2
    else if($sg=="2" && $step=="1")
        $salary="13,305 ";
    else if($sg=="2" && $step=="2")
        $salary="13,406";
    else if($sg=="2" && $step=="3")
        $salary="13,509";
    else if($sg=="2" && $step=="4")
        $salary="13,613";
    else if($sg=="2" && $step=="5")
        $salary="13,718";
    else if($sg=="2" && $step=="6")
        $salary="13,823";
    else if($sg=="2" && $step=="7")
        $salary="13,929";
    else if($sg=="2" && $step=="8")
        $salary="14,035";
         //Salary Grade 3
else if($sg=="3" && $step=="1")
    $salary="14,125 ";
else if($sg=="3" && $step=="2")
    $salary="14,234";
else if($sg=="3" && $step=="3")
    $salary="14,343";
else if($sg=="3" && $step=="4")
    $salary="14,454";
else if($sg=="3" && $step=="5")
    $salary="14,565";
else if($sg=="3" && $step=="6")
    $salary="14,676";
else if($sg=="3" && $step=="7")
    $salary="14,790";
else if($sg=="3" && $step=="8")
    $salary="14,903";

      //Salary Grade 4
else if($sg=="4" && $step=="1")
$salary="14,993";
else if($sg=="3" && $step=="2")
$salary="15,109";
else if($sg=="4" && $step=="3")
$salary="15,224";
else if($sg=="4" && $step=="4")
$salary="15,341";
else if($sg=="4" && $step=="5")
$salary="15,459";
else if($sg=="4" && $step=="6")
$salary="15,577";
else if($sg=="4" && $step=="7")
$salary="15,698";
else if($sg=="4" && $step=="8")
$salary="15,818";

  //Salary Grade 5
  else if($sg=="5" && $step=="1")
  $salary="15,909 ";
else if($sg=="5" && $step=="2")
  $salary="16,032";
else if($sg=="5" && $step=="3")
  $salary="16,155";
else if($sg=="5" && $step=="4")
  $salary="16,279";
else if($sg=="5" && $step=="5")
  $salary="16,404";
else if($sg=="5" && $step=="6")
  $salary="16,530";
else if($sg=="5" && $step=="7")
  $salary="16,657";
else if($sg=="5" && $step=="8")
  $salary="16,784";
    //Salary Grade 6  
else if($sg=="6" && $step=="1")
$salary="16,877 ";
else if($sg=="6" && $step=="2")
$salary="17,007";
else if($sg=="6" && $step=="3")
$salary="17,137";
else if($sg=="6" && $step=="4")
$salary="17,269";
else if($sg=="6" && $step=="5")
$salary="17,402";
else if($sg=="6" && $step=="6")
$salary="17,535";
else if($sg=="6" && $step=="7")
$salary="17,670";
else if($sg=="6" && $step=="8")
$salary="17,806";

  //Salary Grade 7
  else if($sg=="7" && $step=="1")
  $salary="17,899 ";
else if($sg=="7" && $step=="2")
  $salary="18,037";
else if($sg=="7" && $step=="3")
  $salary="18,176";
else if($sg=="7" && $step=="4")
  $salary="18,315";
else if($sg=="7" && $step=="5")
  $salary="18,455";
else if($sg=="7" && $step=="6")
  $salary="18,598";
else if($sg=="7" && $step=="7")
  $salary="18,740";
else if($sg=="7" && $step=="8")
  $salary="18,884";

    //Salary Grade 8
else if($sg=="8" && $step=="1")
$salary="18,998 ";
else if($sg=="8" && $step=="2")
$salary="19,170";
else if($sg=="8" && $step=="3")
$salary="19,343";
else if($sg=="8" && $step=="4")
$salary="19,518";
else if($sg=="8" && $step=="5")
$salary="19,694";
else if($sg=="8" && $step=="6")
$salary="19,872";
else if($sg=="8" && $step=="7")
$salary="20,052";
else if($sg=="8" && $step=="8")
$salary="20,233";

 //Salary Grade 9
 else if($sg=="9" && $step=="1")
 $salary="20,402 ";
 else if($sg=="9" && $step=="2")
 $salary="20,572";
 else if($sg=="9" && $step=="3")
 $salary="20,745";
 else if($sg=="9" && $step=="4")
 $salary="20,918";
 else if($sg=="9" && $step=="5")
 $salary="21,093";
 else if($sg=="9" && $step=="6")
 $salary="21,269";
 else if($sg=="9" && $step=="7")
 $salary="21,447";
 else if($sg=="9" && $step=="8")
 $salary="21,626";
  //Salary Grade 10
else if($sg=="10" && $step=="1")
$salary="22,190 ";
else if($sg=="10" && $step=="2")
$salary="22,376";
else if($sg=="10" && $step=="3")
$salary="22,563";
else if($sg=="10" && $step=="4")
$salary="22,752";
else if($sg=="10" && $step=="5")
$salary="22,942";
else if($sg=="10" && $step=="6")
$salary="23,134";
else if($sg=="10" && $step=="7")
$salary="23,327";
else if($sg=="10" && $step=="8")
$salary="23,522";
 //Salary Grade 11
 else if($sg=="11" && $step=="1")
 $salary="25,439 ";
 else if($sg=="11" && $step=="2")
 $salary="25,723";
 else if($sg=="11" && $step=="3")
 $salary="26,012";
 else if($sg=="11" && $step=="4")
 $salary="26,304";
 else if($sg=="11" && $step=="5")
 $salary="26,600";
 else if($sg=="11" && $step=="6")
 $salary="26,901";
 else if($sg=="11" && $step=="7")
 $salary="27,205";
 else if($sg=="11" && $step=="8")
 $salary="27,514";
  //Salary Grade 12
else if($sg=="12" && $step=="1")
$salary="27,608";
else if($sg=="12" && $step=="2")
$salary="27,892";
else if($sg=="12" && $step=="3")
$salary="28,180";
else if($sg=="12" && $step=="4")
$salary="28,471";
else if($sg=="12" && $step=="5")
$salary="28,766";
else if($sg=="12" && $step=="6")
$salary="29,065";
else if($sg=="12" && $step=="7")
$salary="29,367";
else if($sg=="12" && $step=="8")
$salary="29,673";
 //Salary Grade 13
 else if($sg=="13" && $step=="1")
 $salary="29,798 ";
 else if($sg=="13" && $step=="2")
 $salary="30,111";
 else if($sg=="13" && $step=="3")
 $salary="30,427";
 else if($sg=="13" && $step=="4")
 $salary="30,747";
 else if($sg=="13" && $step=="5")
 $salary="31,072";
 else if($sg=="13" && $step=="6")
 $salary="31,400";
 else if($sg=="13" && $step=="7")
 $salary="31,732";
 else if($sg=="13" && $step=="8")
 $salary="32,069";
  //Salary Grade 14
else if($sg=="14" && $step=="1")
$salary="32,321";
else if($sg=="14" && $step=="2")
$salary="32,665";
else if($sg=="14" && $step=="3")
$salary="33,013";
else if($sg=="14" && $step=="4")
$salary="33,366";
else if($sg=="14" && $step=="5")
$salary="33,722";
else if($sg=="14" && $step=="6")
$salary="34,083";
else if($sg=="14" && $step=="7")
$salary="34,449";
else if($sg=="14" && $step=="8")
$salary="34,819";
 //Salary Grade 15
 else if($sg=="15" && $step=="1")
 $salary="35,097";
 else if($sg=="15" && $step=="2")
 $salary="35,475";
 else if($sg=="15" && $step=="3")
 $salary="35,858";
 else if($sg=="15" && $step=="4")
 $salary="36,246";
 else if($sg=="15" && $step=="5")
 $salary="36,638";
 else if($sg=="15" && $step=="6")
 $salary="37,035";
 else if($sg=="15" && $step=="7")
 $salary="37,437";
 else if($sg=="15" && $step=="8")
 $salary="37,845";
  //Salary Grade 16
else if($sg=="16" && $step=="1")
$salary="38,150";
else if($sg=="16" && $step=="2")
$salary="38,566";
else if($sg=="16" && $step=="3")
$salary="38,987";
else if($sg=="16" && $step=="4")
$salary="39,413";
else if($sg=="16" && $step=="5")
$salary="39,845";
else if($sg=="16" && $step=="6")
$salary="40,282";
else if($sg=="16" && $step=="7")
$salary="40,725";
else if($sg=="16" && $step=="8")
$salary="41,172";
 //Salary Grade 17
 else if($sg=="17" && $step=="1")
 $salary="41,508";
 else if($sg=="17" && $step=="2")
 $salary="41,966";
 else if($sg=="17" && $step=="3")
 $salary="42,429";
 else if($sg=="17" && $step=="4")
 $salary="42,898";
 else if($sg=="17" && $step=="5")
 $salary="43,373";
 else if($sg=="17" && $step=="6")
 $salary="43,854";
 else if($sg=="17" && $step=="7")
 $salary="44,340";
 else if($sg=="17" && $step=="8")
 $salary="44,833";
  //Salary Grade 18
else if($sg=="18" && $step=="1")
$salary="45,203";
else if($sg=="18" && $step=="2")
$salary="45,706";
else if($sg=="18" && $step=="3")
$salary="46,216";
else if($sg=="18" && $step=="4")
$salary="46,731";
else if($sg=="18" && $step=="5")
$salary="47,254";
else if($sg=="18" && $step=="6")
$salary="47,783";
else if($sg=="18" && $step=="7")
$salary="48,318";
else if($sg=="18" && $step=="8")
$salary="48,860";
 //Salary Grade 19
 else if($sg=="3" && $step=="1")
 $salary="49,835";
 else if($sg=="19" && $step=="2")
 $salary="50,574";
 else if($sg=="19" && $step=="3")
 $salary="51,325";
 else if($sg=="19" && $step=="4")
 $salary="52,088";
 else if($sg=="19" && $step=="5")
 $salary="52,864";
 else if($sg=="19" && $step=="6")
 $salary="53,652";
 else if($sg=="19" && $step=="7")
 $salary="54,454";
 else if($sg=="19" && $step=="8")
 $salary="55,268";
  //Salary Grade 20
else if($sg=="20" && $step=="1")
$salary="55,799";
else if($sg=="20" && $step=="2")
$salary="56,633";
else if($sg=="20" && $step=="3")
$salary="57,482";
else if($sg=="20" && $step=="4")
$salary="58,344";
else if($sg=="20" && $step=="5")
$salary="59,221";
else if($sg=="20" && $step=="6")
$salary="60,112";
else if($sg=="20" && $step=="7")
$salary="61,017";
else if($sg=="20" && $step=="8")
$salary="61,937";
 //Salary Grade 21
 else if($sg=="21" && $step=="1")
 $salary="62,449";
 else if($sg=="21" && $step=="2")
 $salary="63,392";
 else if($sg=="21" && $step=="3")
 $salary="64,351";
 else if($sg=="21" && $step=="4")
 $salary="65,325";
 else if($sg=="21" && $step=="5")
 $salary="66,316";
 else if($sg=="21" && $step=="6")
 $salary="67,322";
 else if($sg=="21" && $step=="7")
 $salary="68,345";
 else if($sg=="21" && $step=="8")
 $salary="69,385";
  //Salary Grade 22
else if($sg=="22" && $step=="1")
$salary="69,963";
else if($sg=="22" && $step=="2")
$salary="71,029";
else if($sg=="22" && $step=="3")
$salary="72,113";
else if($sg=="22" && $step=="4")
$salary="73,214";
else if($sg=="22" && $step=="5")
$salary="74,333";
else if($sg=="22" && $step=="6")
$salary="75,471";
else if($sg=="22" && $step=="7")
$salary="76,627";
else if($sg=="22" && $step=="8")
$salary="77,801";
 //Salary Grade 23
 else if($sg=="23" && $step=="1")
 $salary="78,455";
 else if($sg=="23" && $step=="2")
 $salary="79,659";
 else if($sg=="23" && $step=="3")
 $salary="80,884";
 else if($sg=="23" && $step=="4")
 $salary="82,133";
 else if($sg=="23" && $step=="5")
 $salary="83,474";
 else if($sg=="23" && $step=="6")
 $salary="84,836";
 else if($sg=="23" && $step=="7")
 $salary="86,220";
 else if($sg=="23" && $step=="8")
 $salary="87,628";
  //Salary Grade 24
else if($sg=="24" && $step=="1")
$salary="88,410";
else if($sg=="24" && $step=="2")
$salary="89,853";
else if($sg=="24" && $step=="3")
$salary="91,320";
else if($sg=="24" && $step=="4")
$salary="92,810";
else if($sg=="24" && $step=="5")
$salary="94,325";
else if($sg=="24" && $step=="6")
$salary="95,865";
else if($sg=="24" && $step=="7")
$salary="97,430";
else if($sg=="24" && $step=="8")
$salary="99,020";
 //Salary Grade 25
 else if($sg=="25" && $step=="1")
 $salary="100,788";
 else if($sg=="25" && $step=="2")
 $salary="102,433";
 else if($sg=="25" && $step=="3")
 $salary="104,105";
 else if($sg=="25" && $step=="4")
 $salary="105,804";
 else if($sg=="25" && $step=="5")
 $salary="107,531";
 else if($sg=="25" && $step=="6")
 $salary="109,286";
 else if($sg=="25" && $step=="7")
 $salary="111,070";
 else if($sg=="25" && $step=="8")
 $salary="112,883";
  //Salary Grade 26
else if($sg=="26" && $step=="1")
$salary="113,891";
else if($sg=="26" && $step=="2")
$salary="115,749";
else if($sg=="26" && $step=="3")
$salary="117,639";
else if($sg=="26" && $step=="4")
$salary="119,558";
else if($sg=="26" && $step=="5")
$salary="121,510";
else if($sg=="26" && $step=="6")
$salary="123,493";
else if($sg=="26" && $step=="7")
$salary="125,508";
else if($sg=="26" && $step=="8")
$salary="127,557";
 //Salary Grade 27
 else if($sg=="27" && $step=="1")
 $salary="128,696";
 else if($sg=="27" && $step=="2")
 $salary="130,797";
 else if($sg=="27" && $step=="3")
 $salary="132,931";
 else if($sg=="27" && $step=="4")
 $salary="135,101";
 else if($sg=="27" && $step=="5")
 $salary="137,306";
 else if($sg=="27" && $step=="6")
 $salary="139,547";
 else if($sg=="27" && $step=="7")
 $salary="141,825";
 else if($sg=="27" && $step=="8")
 $salary="144,140";
  //Salary Grade 28
else if($sg=="28" && $step=="1")
$salary="145,427";
else if($sg=="28" && $step=="2")
$salary="147,800";
else if($sg=="28" && $step=="3")
$salary="150,213";
else if($sg=="28" && $step=="4")
$salary="152,664";
else if($sg=="28" && $step=="5")
$salary="155,155";
else if($sg=="28" && $step=="6")
$salary="157,689";
else if($sg=="28" && $step=="7")
$salary="160,262";
else if($sg=="28" && $step=="8")
$salary="162,877";
 //Salary Grade 29
 else if($sg=="29" && $step=="1")
 $salary="164,332";
 else if($sg=="29" && $step=="2")
 $salary="167,015";
 else if($sg=="29" && $step=="3")
 $salary="169,740";
 else if($sg=="29" && $step=="4")
 $salary="172,511";
 else if($sg=="29" && $step=="5")
 $salary="175,326";
 else if($sg=="29" && $step=="6")
 $salary="178,188";
 else if($sg=="29" && $step=="7")
 $salary="181,096";
 else if($sg=="29" && $step=="8")
 $salary="184,052";
  //Salary Grade 30
else if($sg=="30" && $step=="1")
$salary="185,695";
else if($sg=="30" && $step=="2")
$salary="188,726";
else if($sg=="30" && $step=="3")
$salary="191,806";
else if($sg=="30" && $step=="4")
$salary="194,937";
else if($sg=="3" && $step=="5")
$salary="198,118";
else if($sg=="30" && $step=="6")
$salary="201,352";
else if($sg=="30" && $step=="7")
$salary="204,638";
else if($sg=="30" && $step=="8")
$salary="207,978";
 //Salary Grade 31
 else if($sg=="31" && $step=="1")
 $salary="273,278";
 else if($sg=="31" && $step=="2")
 $salary="278,615";
 else if($sg=="31" && $step=="3")
 $salary="284,057";
 else if($sg=="31" && $step=="4")
 $salary="289,605";
 else if($sg=="31" && $step=="5")
 $salary="295,262";
 else if($sg=="31" && $step=="6")
 $salary="301,028";
 else if($sg=="31" && $step=="7")
 $salary="306,908";
 else if($sg=="31" && $step=="8")
 $salary="312,902";
  //Salary Grade 32
else if($sg=="32" && $step=="1")
$salary="325,807";
else if($sg=="32" && $step=="2")
$salary="332,378";
else if($sg=="32" && $step=="3")
$salary="339,080";
else if($sg=="32" && $step=="4")
$salary="345,918";
else if($sg=="32" && $step=="5")
$salary="352,894";
else if($sg=="32" && $step=="6")
$salary="360,011";
else if($sg=="32" && $step=="7")
$salary="367,272";
else if($sg=="32" && $step=="8")
$salary="374,678";
 //Salary Grade 33
 else if($sg=="33" && $step=="1")
 $salary="411,382 ";
 else if($sg=="33" && $step=="2")
 $salary="423,723";

 $totalSalary = $salary + 2000;

 $mysqli->query("UPDATE data SET totalSalary='$totalSalary', salary='$salary' WHERE id=$id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been updated!";
   $_SESSION['msg_type'] = "warning";

   header("location:employees.php");
}

if (isset($_POST['updateDeductions'])){
  $gsis = $_POST['gsis'];
  $hdmf =$_POST['hdmf'];
  $philhealth =$_POST['philhealth'];
  $datagsis = $_POST['gsis'];
  $datahdmf =$_POST['hdmf'];
  $dataphilhealth =$_POST['philhealth'];
  

 $mysqli->query("UPDATE data SET philhealth='$philhealth', gsis='$gsis', hdmf='$hdmf'") or die($mysqli->error());

 $mysqli->query("UPDATE deductions SET dataphilhealth='$dataphilhealth', datagsis='$datagsis', datahdmf='$datahdmf'") or die($mysqli->error());
 

 //convert string to integer
$intgsis = (int)$gsis;
$inthdmf = (int)$hdmf;
$intphilhealth = (int)$philhealth;
 $totalDeductions = $intgsis + $inthdmf + $intphilhealth;

 $mysqli->query("UPDATE data SET totalDeductions='$totalDeductions'") or die($mysqli->error());
 $_SESSION['message'] = "Record has been updated!";
 $_SESSION['msg_type'] = "warning";

 header("location:employees.php");
}





    

?>