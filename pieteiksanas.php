<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT ir spēks</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <header>
        <div class="logo"><img src="images/logo.png">IT ir spēks</div>
        <nav class="nav">
            <ul>
                <li><a href="index.php">Sākums</a></li>
                <li><a href="index.php">Aktualitātes</a></li>
                <li><a href="index.php">Vakances</a></li>
                <li><a href="index.php">Pakalpojumi</a></li>
                <?php
                session_start();
                 if(isset($_SESSION['lietotajvards'])){
                    $lietvards = $_SESSION['lietotajvards']; 
                    echo "<li><a href='files/logout.php'><i class='fa-solid fa-sign-out'><b>$lietvards</b></i></a></li>";
                    }else{
                        echo "<li><a href='login.php'><i class='fa-solid fa-right-to-bracket border'></i></a></li>";
                    }
                ?>
            </ul>
        </nav>
    </header>

    <section id="pieteiksanas">
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            require("files/connect_db.php");
            if(isset($_POST['gatavs'])){
                $vards = $_POST['vards'];
                $uzvards = $_POST['uzvards'];
                $talrunis = $_POST['talrunis'];
                $komentars = $_POST['komentars'];
                $darbaPieredze = $_POST['darbaPieredze'];
                $digitalaPrasme = $_POST['digitalaPrasme'];
                $izglitiba = $_POST['izglitiba'];
                $vakance = $_POST['vakance'];

                if(!empty($vards) && !empty($uzvards) && !empty($talrunis) && !empty($komentars) && !empty($darbaPieredze) && !empty($digitalaPrasme) && !empty($izglitiba)){
                    $pievienot_pieteikumu_SQL = "INSERT INTO  vakancesPieteiksanas(vards,uzvards,talrunis,komentars,darbaPieredze, digitalaPrasme, izglitiba, id_vakances) 
                    VALUES ('$vards', '$uzvards', '$talrunis', '$komentars', '$darbaPieredze', '$digitalaPrasme', '$izglitiba', '$vakance')";

                    if(mysqli_query($savienojums, $pievienot_pieteikumu_SQL)){
                        echo "<div class = 'pieteiksanaskluda zals'>Pieteikšanās ir veiksmīga!</div>";
                        header("Refresh:2; url=index.php");
                    }else{
                        echo "<div class = 'pieteiksanaskluda sarkans'>Pieteikšanās nav izdevusies! Mēģiniet vēlreiz!</div>";
                    }
                }else{
                    echo "<div class = 'pieteiksanaskluda sarkans'>Pieteikšanās nav izdevusies! Kāds no ievades laukiem aizpildīts NEKOREKTI!</div>";
               }
            }
        }
    ?>
    <?php 
    if(isset($_POST['pieteikties'])){
    ?>
        <h2>Pieteikšanās vakancei</h2>
                    <div class="row">
                        <form method="POST">
                            <input type="text" placeholder="Vārds *" name="vards" class="box1" title="Vārds" required>
                            <input type="text" placeholder="Uzvārds *" name="uzvards" class="box1" title="Uzvārds" required>
                            <input type="text" placeholder="Tālrunis *" name="talrunis" class="box1" title="Tālrunis" required>
                            <input type="text" placeholder="Komentārs" name="komentars" class="box2" title="Komentārs" >
                            <input type="text" placeholder="Darba pieredze" name="darbaPieredze" class="box2" title="Darba pieredze">
                            <input type="text" placeholder="Digitāla prasme" name="digitalaPrasme" class="box2" title="Digitāla prasme" >
                            <input type="text" placeholder="Izglītība" name="izglitiba" class="box2" title="Izglītība">
                            <input type="submit" value="Pieteikties!" name="gatavs" class="btn">
                            <input type="hidden" name="vakance" value="<?php echo $_POST['pieteikties']; ?>">
                        </form>
                    </div>
    </section>
<?php
}
?>
    <footer id="parmums kontakti">
        <div class="box-container">
    <div class="box">
        <h2>Par mums</h2>
        <p>2023. gada februārī, mēs palīdzējam atrast vakanci 1126 cilvēkiem, un turpinam meklēt darbu cilvēkiem.
    </div>
    
    <div class="box">
        <h2>Saites</h2>
        <ul>
            <li><a href="#home">Sākums</a></li>
            <li><a href="#aktualitates">Aktualitātes</a></li>
            <li><a href="#vakances">Vakances</a></li>
            <li><a href="#pakalpojumi">Pakalpojumi</a></li>
        </ul>
    </div>
    
    
    <div class="box">
    <h2>Kontakti</h2>
    <p><i class="fa-solid fa-phone"></i>+371 22 345 622</p>
    <p><i class="fa-solid fa-envelope"></i>vakances@latvia.lv</p>
    <p><i class="fa-solid fa-location-dot"></i>Latvija</p>

    </div>
    
    </footer>
            
</body>
</html>