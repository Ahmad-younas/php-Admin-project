<?php 

session_start();
$connection = new mysqli("localhost","root","","adminpanel");
if(isset($_POST['btn_register'])){
    $student_Name= $_POST['username'];
    $student_Email= $_POST['email'];
    $student_Password= $_POST['password'];
    $student_ConfirmPassword= $_POST['cpassword'];
    $Depart=$_POST['department'];
    $phone=$_POST['phone'];
     if($student_Password == $student_ConfirmPassword){
     $query= "INSERT INTO student (username,email,password,department, phoneNumber) VALUES('$student_Name','$student_Email','$student_Password','$Depart','$phone')";
     $query_run = mysqli_query($connection,$query);
             if($query_run){
                echo ("Query".$query_run);
                 $_SESSION['success'] = "Admin Profile Added";
                 header('Location: add_student.php');

              }else{

                  $_SESSION['status'] = "Admin Profile NOT Added";
                 header('Location: code.php');
                 echo("student not added");

              }
      }else{

          $_SESSION['status'] = "Password and Confirm Password Does not Match";
          header('Location: code.php');
          echo("password not match");

      }    
}


if(isset($_POST['btn_edit'])){
     $id = $_POST['id'];
     $username = $_POST['username'];
     $email=$_POST['email'];
     $password = $_POST['password'];
     $cpassword = $_POST['cpassword'];
     $phone = $_POST['phone'];
     $depart = $_POST['department'];

        
    echo($username.$email.$password.$cpassword.$phone.$depart.$id);
    $query="UPDATE student SET username='$username', email='$email', password='$password', department='$depart', phoneNumber='$phone' WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);
    echo($query_run);
    header('location:update_student.php');
}

if(isset($_POST['btn_delete'])){
    $id = $_POST['id'];
    echo("$id");
    $query = "DELETE FROM student WHERE id = $id";
    $query_run=mysqli_query($connection,$query);

    if($query_run){
        header('location:delete_student.php');
    }
  //  echo ($query_run);

}

?>