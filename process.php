<?php 

session_start();

$host = "127.0.0.1:3333";
$user = "root";
$password = "HackerU2018";
$db = "crud";
$name = '';
$location = '';
$update = false;
$id = 0;

$mysqli = new mysqli($host, $user, $password, $db) or die(mysqli_error(($mysqli)));

if(isset($_POST["save"])){
    $name = $_POST["name"];
    $location = $_POST["location"];
    $mysqli->query("INSERT INTO data (name, location) VALUES ('$name', '$location')");

    $_SESSION["message"] = "Record has been saved";
    $_SESSION["msg_type"] = "success";

    header("location: index.php");

}

if(isset($_GET["delete"])){
    $id = $_GET["delete"];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die(mysqli_error($mysqli));

    $_SESSION["message"] = "Record has been deleted";
    $_SESSION["msg_type"] = "danger";

    header("location: index.php");
}

if(isset($_GET["edit"])){
    $id = $_GET["edit"];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die(mysqli_error($mysqli));
    if(count($result) == 1){
        $row = $result->fetch_array();
        $name = $row["name"];
        $location = $row["location"];
    }
}

if(isset($_POST["update"])){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $location = $_POST["location"];
    $mysqli->query("UPDATE data SET name='$name', location='$location' WHERE id=$id") or die(mysqli_error($mysqli));

    $_SESSION["message"] = "Record has been updated";
    $_SESSION["msg_type"] = "warning";

    header("location: index.php");
}


?>