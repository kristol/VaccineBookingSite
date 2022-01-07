<?php
    include_once("storage.php");
    $u = new Storage(new JsonIO('users.json'));
    session_start();

    $x = [
        "email" => $_POST["email"]
    ];

    $a = $u -> findOne($x);

    if(password_verify($_POST["jelszo"], $a["passwd"])){
        $_SESSION["user"] = $a;
        $_SESSION["err"] = "";
        if($_SESSION["user"]["name"] == "admin" && $_SESSION["user"]["email"] == "admin@nemkovid.hu"){
            $_SESSION["isAdmin"] = true;
        }else{
            $_SESSION["isAdmin"] = false;
        }
    }else{
        $_SESSION["err"] = "Hibás jelszó!";
    }

    
    if($_SESSION["err"] == ""){
        header("Location: index.php");
    }else{
        header("Location: login.php");
    }
    
    
    
?>