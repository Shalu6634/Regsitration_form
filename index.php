<?php 

include('config.php');

$c1 = new Config();
$res = $c1->fetch();


$is_btn_set = isset($_POST['button']);
if($is_btn_set)
{
   
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $address = $_POST['address'];

    $c1->insert($name,$age,$course,$address,);
    header("Location:index.php");

}

if(isset($_POST['delete']))
{
   $id= $_POST['deleteId'];
   $c1->delete($id); 

   header("Location:index.php");
}


if(isset($_POST['update']))
{
    $id= $_POST['deleteId'];
    $name = $_POST['nameId'];
    $age = $_POST['ageId'];
    $course = $_POST['courseId'];
    $address = $_POST['addressId'];
     $c1->update($id,$name,$age,$course,$address);
    header("Location:index.php");
   

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://img.freepik.com/premium-photo/student-concentrating-taking-exam-writing-classroom_38013-102779.jpg');
   
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        height: 100vh;
     
        margin: 0;
   
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container {
        background-color: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
       
        padding: 20px;
        border-radius: 20px;
        color: white;
    }
    </style>
</head>

<body>
    <div class="container mx-auto p-2" style="width: 350px;">
        <h2>Student Registration Form</h2>
        <form method="POST">

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>

            </div>
            <div class="mb-3">
                <label for="course" class="form-label">Course</label>
                <input type="text" class="form-control" id="course" name="course" required title="Enter your course">

            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" required min="5" max="100"
                    title="Age must be between 5 and 80">

            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>

            </div>

            <button name="button" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <hr>
    <div class="container mx-auto p-2" style="width: 650px;">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Student's Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Course</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($data = mysqli_fetch_assoc($res)){?>
                <tr>
                    <th scope="row"><?php echo $data['id']?></th>
                    <td><?php echo $data['name']?></td>
                    <td><?php echo $data['age']?></td>
                    <td><?php echo $data['course']?></td>
                    <td><?php echo $data['address']?></td>

                    <td>
                        <button type="button" class="btn btn-warning"
                            onclick="showUpdateDialog(<?php echo htmlspecialchars(json_encode($data)) ?>)">Update</button>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" value="<?php echo $data['id']?>" name="deleteId">
                            <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="updateId" name="deleteId">
                        <div class="mb-3">
                            <label for="updateName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="updateName" name="nameId">
                        </div>
                
                        <div class="mb-3">
                            <label for="updateAge" class="form-label">Age</label>
                            <input type="number" class="form-control" id="updateAge" name="ageId">
                        </div>
                        <div class="mb-3">
                            <label for="updateCourse" class="form-label">Course</label>
                            <input type="text" class="form-control" id="updateCourse" name="courseId">

                        </div>
                
                        <div class="mb-3">
                            <label for="updateAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="updateAddress" name="addressId">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
    function showUpdateDialog(data) {
        document.getElementById('updateId').value = data.id;
        document.getElementById('updateName').value = data.name;
        document.getElementById('updateAge').value = data.age;
        document.getElementById('updateCourse').value = data.course;
        document.getElementById('updateAddress').value = data.address;

        var updateModal = new bootstrap.Modal(document.getElementById('updateModal'));
        updateModal.show();
    }
    </script>

</body>

</html>
