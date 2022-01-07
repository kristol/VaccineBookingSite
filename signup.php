<?php
    include_once("header.php");
?>
<script>

function check_pass() {
    if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
        document.getElementById('submit').disabled = false;
        document.getElementById('err').innerText = "";
    } else {
        document.getElementById('submit').disabled = true;
        document.getElementById('err').innerText = "Jelszó nem egyezik meg!";
    }
}
</script>


<section>
    <h2>Regisztráció</h2><br>
    <form action="signup_data.php" method="post" novalidate>
        <input type="text"  name="name" placeholder="Teljes név" required><br>
        <input type="text"  name="taj" maxlength="9" placeholder="TAJ szám" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"/><br>
        <input type="text"  name="ertCim" placeholder="Értesítési cím" required><br>
        <input type="email"  name="email" placeholder="Email cím" required><br>
        <input type="password"  name="jelszo" id="password" placeholder="Jelszó" onchange='check_pass();' required><br>
        <input type="password"  name="jelszoujra" id="confirm_password" placeholder="Jelszó újra" onchange='check_pass();' required><br>
        <button type="submit" name="submit" id="submit">Regisztrálok</button>
    </form>
</section>
<span style="color: red;" id="err"></span>

</div>


    
</body>
</html>