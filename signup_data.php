<?php
    include_once("storage.php");
    $u = new Storage(new JsonIO('users.json'));
    
    $new_record = [
        "name" => $_POST["name"],
        "TAJ" => intval($_POST["taj"]),
        "address" => $_POST["ertCim"],
        "email" => $_POST["email"],
        "passwd" => password_hash($_POST["jelszo"],PASSWORD_DEFAULT)
    ];

    $u -> add($new_record);

    header("Location: login.php");

?>