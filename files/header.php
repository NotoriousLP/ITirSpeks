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
                echo "<li><a href='#vakAdm'>Pieteikumi</a></li>";
                if($_SESSION["adminStatus"] == 1 ){
                echo "<li><a href='#lietotaji'>Lietotāji</a></li>";
                }
                ?>
                <?php
                    $lietvards = $_SESSION['lietotajvards']; 
                    echo "<li><a href='files/logout.php'><i class='fa-solid fa-sign-out'><b>$lietvards</b></i></a></li>";
                ?>
            </ul>
        </nav>
    </header>