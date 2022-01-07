<?php
    include_once("header.php");
    if(!isset($_SESSION["err"])){
        $_SESSION["err"] = "";
    }

?>

<span style="color: red;"><?= $_SESSION["err"] ?></span>
<section>
    <h2>Bejelentkezés</h2><br>
    <form action="login_data.php" method="post" novalidate>
        <input type="email"  name="email" placeholder="Email cím" required><br>
        <input type="password"  name="jelszo" placeholder="Jelszó" required><br>
        <button type="submit" name="submit">Bejelentkezem</button>
    </form>
</section>


</div>
</body>
</html>