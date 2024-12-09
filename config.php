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