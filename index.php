<?php
    include_once('header.php');
    include_once("storage.php");


    if(!isset($_GET["month"])){
        $_GET["month"] = date("m");
        $previous_month = date("m",strtotime("-1 months"));
        $next_month = date("m",strtotime("+1 months"));
    }else{
        $next_month = date("m",strtotime('2021-'. $_GET["month"] .'-01 +1 months'));
        $previous_month = date("m",strtotime('2021-'. $_GET["month"] .'-01 -1 months'));
    }

    $a = new Storage(new JsonIO('appointments.json'));

    $app = $a -> findAll();

    $actualMonth = [];

    foreach($app as $k){
        if(substr($k["time"],5,2) == $_GET["month"]){
            $actualMonth[] = $k;
        }
    }
?>

        <section>
        <h1>Nemzeti Koronavírus Depó</h1>
        <h2>Mondj nemet a koronavírusra!</h2><br>
        <p>A Nemzeti Koronavírus Depó (NemKoViD - Mondj nemet a koronavírusra!)
         központi épületében különböző időpontokban oltásokat szervez. Az alábbi időpontok közül tudnak foglalni. Egyszerre maximum 5 főt tudunk fogadni.
         Megértésüket és türelmüket köszönjük. Továbbá reggel 9kor kezdődnek az oltások, jelentkezési sorrendben fogadjuk.
        </p>
        <br>
        <h1>Időpontok: </h1>
        <?php
            if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == true){
                echo '<a href="admin.php">Új időpont meghirdetése</a>';
            }
        ?>
        <div class="t">
        <table>
            <?php foreach($actualMonth as $p): ?>
                <tr><td><?= $p["time"]; ?></td><td><?= $p["space"] - count($p["users"]) ?>/<?= $p["space"]; ?> szabad hely</td>
                <td>
                <?php
                if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == true){
                    foreach($p["users"] as $u){
                        echo $u . ", ";
                    }
                }else{
                    if($p["space"] - count($p["users"]) > 0){
                        if(isset($_SESSION["user"])){
                            echo '<a style="background-color: lightgreen;" href="apply.php?id='.$p["id"].'">Jelentkezem</a>';
                        }else{
                            echo '<a style="background-color: lightgreen;" href="login.php?">Jelentkezem</a>';
                        }
                    }
                } 
                ?>
                </td>
                </tr>
            <?php endforeach; ?>
            
        </table>
        </div>
        <button><a href="index.php?month=<?= $previous_month ?>">Vissza</a></button>
        <button><a href="index.php?month=<?= $next_month ?>">Előre</button>

        </section>
        

    </div>
    
</body>
</html>