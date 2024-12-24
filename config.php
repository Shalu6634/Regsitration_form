

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

    public function insert($name, $age, $course,$address)
    {
        $query = "INSERT INTO student (name, age, course,address) VALUES ('$name', $age, '$course', '$address')";
        $res = mysqli_query($this->connection, $query);
        return $res;

    }

   
    public function fetch()
    {
        $query = "SELECT * FROM student";
        $res = mysqli_query($this->connection,$query);
        return $res;
    }
    
    public function delete($id)
    {
        $query = "DELETE FROM student WHERE id = $id";
        $res = mysqli_query($this->connection,$query);
        return $res;
    }

    public function update($id,$name,$age,$course,$address)
    {
        $query = "UPDATE student SET name='$name',age=$age,course='$course',address='$address' WHERE id=$id";
        $res = mysqli_query($this->connection,$query);
        return $res;
    }

    public function insertImage($name,$image)
    {
        $query = "INSERT INTO media(name,image) VALUES ('$name','$image')";
        $res = mysqli_query($this->connection, $query);
        return $res;

    }
    public function fetchImages()
    {
        $query = "SELECT * FROM media";
        $res = mysqli_query($this->connection,$query);
        return $res;
    }
 }
?>

 
