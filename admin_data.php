<?php
    include_once("storage.php");
    $app = new Storage(new JsonIO('appointments.json'));
    session_start();
    
    $time = $_POST["new_date"];
    $arr = explode('-', $time);
    $newDate = $arr[0].'.'.$arr[1].'.'.$arr[2].'. '. $_POST["new_time"];

    $new_record = [
        "time" => $newDate,
        "space" => intval($_POST["places"]),
        "users" => []
    ];

    $app -> add($new_record);

    header("Location: index.php");
?>