<?php 

include("config.php");

$c1 = new Config();

                                                                                                                                                         
$is_btn_set=isset( $_POST['button']);
if($is_btn_set)
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course']; 
    $address = $_POST['address'];
    $c1->insert($name,$age,$course,$address);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration From</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
    }

    body{
        width: 100%;
        height: 100vh;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url('https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRFg-oBc_XIKVJwLeigQaq02uHJb6USoAN5lwCZOgn8U0gyOkqy');
        background-size: cover;
        background-repeat: no-repeat;
        
    }
    .box1{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 350px;
    }
    .box1 h1{
        font-size: 30px;
        text-align: center;
        text-transform: uppercase;
        margin: 30px  0;
        color: #FFFFFF;
    }

    .box1 P{
        font-size: 20px;
        margin: 6px  0;
        color: #FFFFFF;
    }
    .box1 input{
        font-size: 16px;
        padding: 15px  10px;
        width: 100%;
        border: 0;
        border-radius: 5px;
        outline: none;
        
    }
    .box1 button{
        font-size: 18px;
        font-weight: bold;
        margin: 20px  0;
        padding: 10px  15px;
        width: 50%;
        border: 0;
        border-radius: 5px;
        background-color: #FF0000;
        color: #FFFFFF;
    }
    
    .container{
        
    }

  </style>
</head>

<body>

   <div class="container">
   <div class="box1">
        <h1>
           Student Registration Form
        </h1>

        <form method="POST">
            <p>Name :</p>
            <br><input type="text" name="name"><br><br>
            <p>Age :</p>
            <input type="number" name="age"><br><br>
            <p>Course :</p>
            <input type="text" name="course"><br><br>
            <p>Address :</p>
            <input type="text" name="address"><br><br>
            <button name="button" type="submit">Submit</button>
        </form>

    </div>
   </div>

</body>

</html>