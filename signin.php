<?php 
session_start();

include "dbconfig.php";   

if(isset($_POST['username']) && isset($_POST['password'])){

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $username = validate($_POST['username']);
  $password = validate($_POST['password']);

  if(empty($username)){
    header("Location: signin-page.php?error=Username is required");
    exit();
  }else if(empty($password)){
    header("Location: signin-page.php?error=Password is required");
    exit();
  }else{
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

    $db->exec($sql);
    // $result =  mysqli_query($conn, $sql);
    $query = $db->query($sql);

    if($row = $query->fetchArray()){
      // $row = $query->fetchArray();
      if($row['username'] === $username && $row['password'] === $password){
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];

        header("Location: index.php");
        exit();
        
      }else{
        header("Location: signin-page.php?error=Incorrect Username or Password");
        exit();
      }
    }else{
      header("Location: signin-page.php?error=Incorrect Username or password");
      exit();
    }
  }
}else{
  header("Location: signin-page.php");
  exit();
}

?> 