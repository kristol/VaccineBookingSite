<?php
    include_once("header.php");
    
?>

<h2>Új időpont meghirdetése</h2><br>
<form action="admin_data.php" method="post" novalidate>
        <input type="date"  name="new_date" placeholder="Új időpont" required><br>
        <input type="time"  name="new_time" placeholder="Új óra" required><br>
        <input type="number"  name="places" placeholder="Férőhely" required><br>
        <button type="submit" name="submit">Új dátum meghirdetése</button>
    </form>
<?php

?>
</div>
</body>
</html>