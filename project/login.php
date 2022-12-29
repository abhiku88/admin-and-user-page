<?php
$host="localhost";
$user="root";
$password="";
$db="admin";

session_start();


$data= mysqli_connect($host,$user,$password,$db);
if($data==false){
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]== "POST") {
    $username= $_POST["username"];
    $password= $_POST["password"];

    $sql= "select * from login where username= '".$username."' AND password='".$password."' ";
    $result= mysqli_query($data,$sql);
    $row= mysqli_fetch_array($result);

    if ($row["usertype"] == "user"){
        $_SESSION["username"]=$username;
       header("location: userhome.php");

    }
    elseif ($row["usertype"] =="admin"){

        $_SESSION["username"]=$username;

        header("location: adminhome.php");

    }
    else
    {
        echo "username or  password incorrect";

    }
    


}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
</head>

<body>
    <center>
        <h1>Login Form</h1>
        <br><br><br><br>
        <div style="background-color: grey; width= 500px;">
            <br><br>

            <form action="#" method="POST">
                <div>

                    <label for="">username</label>
                    <input type="text" name="username" required>
                </div>
                <br><br>

                <div>
                    <label for="">password</label>
                    <input type="text" name="password" required>
                </div>
                <br><br>
                <div>
                    <input type="submit" value="Login">
                </div>
            </form>
            <br><br>
        </div>
    </center>
</body>

</html>