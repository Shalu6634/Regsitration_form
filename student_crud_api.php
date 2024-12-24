<?php 

header("Access-Control-Allow-Method:POST,GET,PUT,DELETE");
header("Content-Type: application/json");

include("config.php");
$c1 = new Config();

if($_SERVER["REQUEST_METHOD"] == "POST")
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
else if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $res = $c1->fetch();
    $arr =[];
    if($res)
    { 
        while($data = mysqli_fetch_assoc($res))
        {
          array_push( $arr, $data);
        }
    }
    else
    {
        $arr['err'] = "Data Not Found";
    }
}
else if($_SERVER["REQUEST_METHOD"] == "PUT")
{
    $data = file_get_contents("php://input");
    parse_str($data, $result);

    $id = $result["id"];
    $name = $result["name"];
    $age = $result["age"];
    $course = $result["course"];
    $address = $result["address"];


    $res = $c1->update(
        $id, $name, $age, $course, $address);

    if($res)
    {
        $arr['err'] = "Data updated Successfully";
       
    }
    else
    {
        $arr['err'] = "Data not updated ";
    }

}
else if($_SERVER["REQUEST_METHOD"] == "DELETE")
{

    $data = file_get_contents("php://input");
    parse_str($data, $result);

    $id = $result["id"];

    $res = $c1->delete($id);

    if($res)
    {
        $arr['err'] = "Data deleted Successfully";
       
    }
    else
    {
        $arr['err'] = "Data not deleted ";
    }
}
else
{
    $arr["msg"] = "Only this type is allowed POST-PUT-GET-DELETE";
}

echo json_encode($arr);
?>