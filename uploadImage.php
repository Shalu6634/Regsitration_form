
<?Php
 
header("Access-Control-Allow-Method:POST");
header("Content-Tyoe:application/json");

include("config.php");

$c1 = new Config();


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // $id = $_POST["id"];
    $img = $_FILES['image'];
    $name = $img['name'];
    $tmp_name = $img['tmp_name'];
    print_r($img);

    $uid = uniqid();
    $isImageUpload = move_uploaded_file(from: $tmp_name,to: 'images/'.$name);
    
    if ($isImageUpload) {

        $res = $c1->insertImage($name,$tmp_name);

        if ($res) {
            $arr['msg'] = "Image inserted successfully!";
        }

        else {
            $arr["msg"] = "Image not inserted !";
        }
        
    } else {
        $arr["msg"] = "Image uploaded failed in server!";
    }

} else {
    $arr['error'] = "Only POST type is allowed!";
    http_response_code(400);
}
echo json_encode($arr);

?>