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
<?php
session_start();
if(isset($_SESSION['lietotajvards'])){
?>
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
                    $lietvards = $_SESSION['lietotajvards']; 
                    echo "<li><a href='files/logout.php'><i class='fa-solid fa-sign-out'><b>$lietvards</b></i></a></li>";
                ?>
            </ul>
        </nav>
    </header>

    <section id="pieteiksanas">
        <?php
        if(isset($_POST['pievienot'])){
            $nosaukums = $_POST['nosaukums'];
        }


        $koPievienot = $_POST['pievienotAktualitates'];
        if(isset($_POST['pievienotAktualitates'])){
        echo "<h2>Pievienot $koPievienot</h2>
                    <div class='row'>
                        <form method='post'>
                            <input type='text' placeholder='Nosaukums *' name='nosaukums' class='box1' title='Nosaukums' required>
                            <input type='text' placeholder='Apraksts *' name='apraksts' class='box2' title='Apraksts' required>
                            <input type='text' placeholder='bilde *' name='bilde' class='box1' title='bilde' required>
                            <button type='submit' name='pievienot' class='btn'>Pievienot</button>
                        </form>
                    </div> ";
        }
        ?>
    </section>

    <footer id="parmums kontakti">
        <div class="box-container">
    <div class="box">
        <h2>Par mums</h2>
        <p>2023. gada februārī, mēs palīdzējam atrast vakanci 1126 cilvēkiem, un turpinam meklēt darbu cilvēkiem.
    </div>

    
    <div class="box">
    <h2>Kontakti</h2>
    <p><i class="fa-solid fa-phone"></i>+371 22 345 622</p>
    <p><i class="fa-solid fa-envelope"></i>vakances@latvia.lv</p>
    <p><i class="fa-solid fa-location-dot"></i>Latvija</p>

    </div>
    <?php
    }else{
    echo "<div class = 'pieteiksanaskluda sarkans'>Jums šeit nav pieeja atļauta!</div>";
    header("Refresh:2; index.php");
    }
    ?>   
    </footer>
</body>
</html>