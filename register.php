<?php
    include("connect.php");

    $name = $_POST['Name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cPassword'];
    $address = $_POST['Address'];
    $image = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $role = $_POST['Role'];


    if($password == $cpassword){
        move_uploaded_file($tmp_name, "../upload/$image");
        $insert = mysqli_query($connect,"INSERT INTO user (name,mobile,password,address,photo,role,status,votes) VALUES ('$name','$mobile','$password','$address','$image','$role',0,0)");
        if($insert){
            echo'
            <script>
                    alert("success");
                    window.location = "../";
            </script>
            ';
        }
        else{
            echo '
                <script>
                    alert("error");
                    window.location = "../routes/register.html";
                </script>

        ';
        }
    }
    else{
        echo '
                <script>
                    alert("password and confirm password does not match");
                    window.location = "../routes/register.html";
                </script>

        ';    
    }
?>