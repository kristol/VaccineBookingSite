<?php
    include_once("header.php");
    include_once("storage.php");

    $u = new Storage(new JsonIO('users.json'));
    $a = new Storage(new JsonIO('appointments.json'));

    $x = [
        "id" => $_GET["id"]
    ];

    $appointment = $a -> findOne($x);


?>

<script>
function check_checked() {
    if (document.getElementById('accept').checked == true) {
        document.getElementById('submit').disabled = false;
        document.getElementById('err').innerText = "";
    } else {
        document.getElementById('submit').disabled = true;
        document.getElementById('err').innerText = "Fogadja el a jelentkezés feltételeit!";
    }
}
</script>

<section>
<form action="apply_data.php" method="post" novalidate>
    <p>Időpont: <?= $appointment["time"] ?></p>
    <p>Felhasználó: <?= $_SESSION["user"]["name"] ?> </p>
    <p>Lakcím: <?= $_SESSION["user"]["address"] ?> </p>
    <p>TAJ szám: <?= $_SESSION["user"]["TAJ"] ?> </p>
    <input type="checkbox" id="accept" name="accept" onchange='check_checked();'>
    <label for="accept" required>Elfogadom a jelentkezés feltételeit</label><br>
    <button type="submit" name="submit" id="submit" disabled>Jelentkezés megerősítése</button>
</form>
</section>  
<span style="color: red;" id="err"></span>

</div>
</body>
</html>