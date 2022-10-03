<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    function ExecuteQuery($query){
        $conn = connectDb();
        $rs = $conn->query($query) or die(mysqli_error($conn));
        $conn->close();
        return $rs;
        
    }

    function connectDb(){
        $host = 'localhost'; $dbName = 'cloudbank'; $dbPassword = ''; $username = 'root';
        $conn = new mysqli($host,$username,$dbPassword,$dbName);
        return $conn;
    }

    function postData($var){
        return $_POST[$var];
    }

    function redirectTo($scriptName = null){
       if(is_null($scriptName)){
        header("Location:".$_SERVER['HTTP_REFERER']);
       }
       header("Location:".$scriptName);
    }

    function checkSession(){
        if (!isset($_SESSION['email'])){
            header("Location:login.php");
        }
      
    }

    function isLoggedIn(){
        if (isset($_SESSION['email'])){
            header("Location:dashboard.php");
        }
      
    }
?>