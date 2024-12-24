<?php 

 header("Access-Control-Allow-Method: POST");
 header("Content-Type: application/json");

 include("config.php");

 $c1= new Config();

 if($_SERVER["REQUEST_METHOD"]== "POST")
 {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course']; 
    $address = $_POST['address'];
    $res = $c1->insert($name,$age,$course,$address);
    if($res)
    {
        $arr["msg"] = "Data inserted Successfully";
    }
    else
    {
        $arr["msg"] = "Data not inserted";
    }
 }
 else
 {
    $arr['error'] = "Only POST type allowed ";
 }

 echo json_encode($arr);
?>