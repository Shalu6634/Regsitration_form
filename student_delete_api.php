<?php 
header("Access-Control-Allow-Method:DELETE");
header("Content-Type:application/json");

include("config.php");
$c1= new Config();

if($_SERVER["REQUEST_METHOD"] == "DELETE")
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
    $arr["error"] = "Only DELETE tpye is allowed";
}
echo json_encode($arr);
?>