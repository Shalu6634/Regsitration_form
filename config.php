<?php 

 class Config
 {
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "student";
    private $connection;
    public function connect()
    {
         $this->connection=mysqli_connect($this->hostname,$this->username,$this->password,$this->database);

        //  if($res)
        //  {
        //     echo "database connected";
        //  }
        //  else{
        //     {
        //         echo "database not connected";
        //     }
        //  }
    }
    public function __construct()
    {

        $this->connect();
    }

    public function insert($name,$age,$course,$address)
    {
        $query = "INSERT INTO student(name,age,course,address) VALUES('$name',$age,'$course','$address')";
    
        $res= mysqli_query($this->connection,$query);
        // if($res)
        // {
        //    echo "Database inserted successfully";
        // }
        // else {
        //     echo "Database inserted failed !";
        //  }
    }
 }
?>


//update

<?php 

 header("Access-Control-Allow-Method:PUT");
 header("Content-Type:application/json");

 include("config.php");

 $c1= new Config();


 if($_SERVER["REQUEST_METHOD"]== "PUT")
 {

    $data = file_get_contents("php://input");
    parse_str($data, $result);
    $id = $result["id"];
    $name = $result["name"];
    $age = $result["age"];
    $course = $result["course"];
    $address = $result["address"];

    $res=$c1->update($id, $name, $age, $course, $address);

    if($res)
    { 
       $arr["msg"] = "Data Updated Successfully";
    }
    else
    {
        $arr["msg"] = "Data not Update";
    }

 }
 else
 {
    $arr['err'] = "Only PUT type is allowed ";
 }

 echo json_encode($arr);

?>

//delete

<?php 

 header("Access-Control-Allow-Method:DELETE");
 header("Content-Type:application/json");

 include("config.php");

 $c1= new Config();


 if($_SERVER["REQUEST_METHOD"]== "DELETE")
 {

    $data = file_get_contents("php://input");
    parse_str($data, $result);
    $id = $result["id"];

    $res=$c1->delete($id);

    if($res)
    { 
       $arr["msg"] = "Data deleted Successfully";
    }
    else
    {
        $arr["msg"] = "Data not deleted";
    }

 }
 else
 {
    $arr['err'] = "Only DELETE type is allowed ";
 }

 echo json_encode($arr);

?>
