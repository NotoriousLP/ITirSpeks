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
require("files/connect_db.php");
?>
<body>
    <header>
        <div class="logo"><img src="images/logo.png">IT ir spēks</div>
        <nav class="nav">
            <ul>
                <li><a href="#home">Sākums</a></li>
                <li><a href="#aktualitates">Aktualitātes</a></li>
                <li><a href="#vakances">Vakances</a></li>
                <li><a href="#pakalpojumi">Pakalpojumi</a></li>
                <?php
                if(isset($_SESSION['lietotajvards'])){
                echo "<li><a href='#vakAdm'>Pieteikumi</a></li>";
                if($_SESSION["adminStatus"] == 1 )
                echo "<li><a href='#lietotaji'>Lietotāji</a></li>";
                
            }
                ?>
                <?php
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

    <section id="home">
        <h1>Kas ir "IT ir spēks"</h1>
        <div class="box-container">
            <div class="box">
                <img name="slide">
            <p> IT ir spēks ir tāda mājaslapa, kura ir domāta cilvēkiem, kuri vēlas atrast vakances,  aktualitātes, pakalpojumus.</p>
        </div>
    </div>
    </section>

    <section id="aktualitates">
        <h2>IT jaunākās aktualitātes</h2>

    </div>
    
        <div class="box-container">
        <?php
        if(isset($_SESSION['lietotajvards'])){
           echo " <form action = 'pievienot.php' method = 'post'>
                                    <button type='submit' name='pievienotAktualitates' value='pievienotAktualitates' class='btn'>
                                    <i class='fas fa-circle-plus'></i>
                                    </button>
                                    </form>";
            }

            if(isset($_POST['dzestLietotaju'])){
                $dzestLietotajuSQL = "DELETE from lietotajs WHERE lietotajs_id = ".$_POST['dzestLietotaju'];
                
                 if(mysqli_query($savienojums, $dzestLietotajuSQL)){
                 echo "<div class='pieteiksanaskluda zals'>Lietotājs veiksmīgi izdzēsts!</div>";
                 header("Refresh:2; url=index.php"); 
                 }else{
                 header("Refresh:2; url=index.php");  
                 echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                }
             }

            if(isset($_POST['dzestVakances'])){

                $parbVakancespieteiksanasSQL = "SELECT COUNT(*) FROM vakancespieteiksanas WHERE id_vakances = ".$_POST['dzestVakances'];
                $rezultats = mysqli_query($savienojums, $parbVakancespieteiksanasSQL);

                $rinda = mysqli_fetch_array($rezultats);
                
                if($rinda[0] > 0){
                    $dzestVakancespieteiksanasSQL = "DELETE FROM vakancespieteiksanas WHERE id_vakances = ".$_POST['dzestVakances'];
                    mysqli_query($savienojums, $dzestVakancespieteiksanasSQL);
                }

                $dzestVakanciSQL = "DELETE from vakances WHERE vakances_id = ".$_POST['dzestVakances'];
                 if(mysqli_query($savienojums, $dzestVakanciSQL)){
                 echo "<div class='pieteiksanaskluda zals'>Vakance veiksmīgi izdzēsta!</div>";
                 header("Refresh:2; url=index.php");
                 }else{
                 echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                 header("Refresh:2; url=index.php");
                }

             }

            if(isset($_POST['dzestPakalp'])){
                $dzestPakalpSQL = "DELETE from pakalpojumi WHERE pakalpojumi_id = ".$_POST['dzestPakalp'];
                
                 if(mysqli_query($savienojums, $dzestPakalpSQL)){
                 echo "<div class='pieteiksanaskluda zals'>Pakalpojumi veiksmīgi izdzēsta!</div>";
                 header("Refresh:2; url=index.php");
                 }else{
                 echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                 header("Refresh:2; url=index.php");
                }
             }

            if(isset($_POST['dzestAktualitates'])){
                $dzestAktualitatiSQL = "DELETE from aktualitates WHERE aktualitates_id = ".$_POST['dzestAktualitates'];
                
                 if(mysqli_query($savienojums, $dzestAktualitatiSQL)){
                 echo "<div class='pieteiksanaskluda zals'>Aktualitāte veiksmīgi izdzēsta!</div>";
                 header("Refresh:2; url=index.php");
                 }else{
                 echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                 header("Refresh:2; url=index.php");
                }
             }

            $aktualitatesVaicajums = "SELECT * from aktualitates";
            $atlasaAktualiates = mysqli_query($savienojums, $aktualitatesVaicajums);
            
            if(mysqli_num_rows($atlasaAktualiates) > 0){ //atlasa rindas skaitu
                while($ieraksts = mysqli_fetch_assoc($atlasaAktualiates)){
                    echo "
                    <div class='box'>
                        <img src='{$ieraksts['bilde']}'>
                        <h3>{$ieraksts['nosaukums']}</h3>
                        <p>{$ieraksts['apraksts']}</p>";
                        if(isset($_SESSION['lietotajvards'])){
                        echo "<form action='pievienot.php' method='post'>
                        <div class= 'pogas'>
                        <button type='submit' name='redigetAktualitates' value='{$ieraksts['aktualitates_id']}' class='btn5'>
                        <i class='fas fa-edit'></i>
                        </button> </form> 
                        
                        <form method = 'post'>
                        <button type='submit' name='dzestAktualitates' value='{$ieraksts['aktualitates_id']}' class='btn5'>
                        <i class='fas fa-trash'></i>
                        </button>
                        </form>
                        </div>
                        </div>";
                        }else{ echo "</div>"; }
                    
                    }
                }
                else{
                echo "Nav aktualitātes";
            }
            ?>
        </div>
    </section>
    <section id="vakances">
        <h2>IT vakances</h2>
        <div class="box-container">
        <?php
            if(isset($_SESSION['lietotajvards'])){
                    echo " <form action = 'pievienot.php' method = 'post'>
                                             <button type='submit' name='pievienotVakances' value='pievienotVakances' class='btn'>
                                             <i class='fas fa-circle-plus'></i>
                                             </button>
                                             </form>";
              }

            $vakancesVaicajums = "SELECT * from vakances";
            $atlasaVakances = mysqli_query($savienojums, $vakancesVaicajums);
            
            if(mysqli_num_rows($atlasaVakances) > 0){ //atlasa rindas skaitu
                while($ieraksts = mysqli_fetch_assoc($atlasaVakances)){
                    echo "
                    <div class='box'>
                        <img src='{$ieraksts['bilde']}'>
                        <h3>{$ieraksts['nosaukums']}</h3>
                        <p>{$ieraksts['apraksts']}</p>
                        <p><span>Atrašanās vieta:</span> {$ieraksts['atrasanasVieta']}</p>
                        <p><span>Vakanču skaits:</span> {$ieraksts['vakancuSkaits']}</p>
                        <p><span>Darba laiks/veids:</span> {$ieraksts['darbaLaiksVeids']}</p>
                        <p><span>Alga:</span> {$ieraksts['alga']}</p>
                        <form action='pieteiksanas.php' method='post'>
                        <button type='submit' name='pieteikties' value='{$ieraksts['vakances_id']}' class='btn'>
                        Pieteikties
                        </button> </form>";
                        if(isset($_SESSION['lietotajvards'])){
                        echo                        
                        " <div class= 'pogas'>
                        <form action='pievienot.php' method='post'>
                        <button type='submit' name='redigetVakances' value='{$ieraksts['vakances_id']}' class='btn5'>
                        <i class='fas fa-edit'></i>
                        </button> </form> 
                        
                        <form method = 'post'>
                        <button type='submit' name='dzestVakances' value='{$ieraksts['vakances_id']}' class='btn5'>
                        <i class='fas fa-trash'></i>
                        </button>
                        </form>
                        </div>
                        </div>";
                        }else{ echo "</div>"; }
                    
                    }
                }else{
                echo "Nav vakanču";
            }
        ?>
        </div>
    </section>
    <section id="pakalpojumi">
        <h2>IT <span>jaunākie</span> pakalpojumi</h2>
        <div class="box-container">
        <?php
            if(isset($_SESSION['lietotajvards'])){
                    echo " <form action = 'pievienot.php' method = 'post'>
                                             <button type='submit' name='pievienotPakalp' value='pievienotPakalp' class='btn'>
                                             <i class='fas fa-circle-plus'></i>
                                             </button>
                                             </form>";
              }

            $pakalpVaicajums = "SELECT * from pakalpojumi";
            $atlasaPakalp = mysqli_query($savienojums, $pakalpVaicajums);
            
            if(mysqli_num_rows($atlasaPakalp) > 0){ //atlasa rindas skaitu
                while($ieraksts = mysqli_fetch_assoc($atlasaPakalp)){
                    echo "
                    <div class='box'>
                        <img src='{$ieraksts['bilde']}'>
                        <h3>{$ieraksts['nosaukums']}</h3>
                        <p>{$ieraksts['apraksts']}</p>
                        <p><span>Atrašanās vieta:</span> {$ieraksts['atrasanasVieta']}</p>
                        <p><span>Tālrunis:</span> {$ieraksts['talrunis']}</p>";
                        if(isset($_SESSION['lietotajvards'])){
                        echo "
                        <div class= 'pogas'>
                        <form action='pievienot.php' method='post'>
                        <button type='submit' name='redigetPakalp' value='{$ieraksts['pakalpojumi_id']}' class='btn5'>
                        <i class='fas fa-edit'></i>
                        </button> </form> 
                        
                        <form method = 'post'>
                        <button type='submit' name='dzestPakalp' value='{$ieraksts['pakalpojumi_id']}' class='btn5'>
                        <i class='fas fa-trash'></i>
                        </button>
                        </form>
                        </div>
                        </div>";
                        }else{ echo "</div>"; }
                    
                    }
                }else{
                echo "Nav pakalpojuma";
            }
        ?>
        </div>
    </section>


    <hr>

    <?php
     if(isset($_SESSION['lietotajvards']) && $_SESSION["adminStatus"] == 1 ){
    ?>
       <section id='lietotaji'>
         <h2>Lietotāju administrēšana:</h2>
            <div class='row'>
            <div class='info'>
            <div class='head-info head-color home'>Lietotāji: <a href='jaunsLietotajs.php' class="btn5"><i class="fas fa-circle-plus"></i></a>
            <table class='adminTabula'>
            <tr>
                <th>Lietotājs</th>
                <th>Statuss</th>
                <th></th>
            </tr>
        <?php
        $lietotajaVaicajums = "SELECT *from lietotajs";
        $atlasaLietotajus = mysqli_query($savienojums, $lietotajaVaicajums);

        while($ieraksts = mysqli_fetch_assoc($atlasaLietotajus)){
            echo "
            <tr>
                <td>{$ieraksts['lietotajvards']}</td> ";
                if($ieraksts['adminStatus'] == 1){
                    $statuss = "Administrators";
                    echo "<td class='tabulasApraksts'>{$statuss}</td>";
                }else{
                    $statuss = "Moderators";
                echo "<td class='tabulasApraksts'>{$statuss}</td>";
                }
                echo "
                <td>
                <form method = 'post'>
                    <button type='submit' name='dzestLietotaju' value='{$ieraksts['lietotajs_id']}' class='btn5'>
                    <i class='fas fa-trash'></i>
                    </button>
                </form>
            </td>
            </tr>
            ";
            }
    ?>
          </table>

            </div>
            </div>
            
        </section>
    <?php
        }
    ?>
    <?php
     if(isset($_SESSION['lietotajvards'])){
    ?>


    <section id="vakAdm">
    <h2>Vakanču administrēšana:</h2>
    <div class="row">
        <div class="info">
            <table class="adminTabula">
            <tr>
                <th>Vārds</th>
                <th>Uzvārds</th>
                <th>Tālrunis</th>
                <th>Vakance</th>
                <th>Statuss</th>
                <th>Komentārs</th>
                 <th>Visa informācija</th>
            </tr>

            <?php
                $atlasit_pieteikumus_SQL = "SELECT * from vakancespieteiksanas as vp 
                INNER JOIN statuss as st ON vp.id_statuss = st.statuss_id 
                INNER JOIN vakances as v ON vp.id_vakances = v.vakances_id";
                $atlasa_pieteikumus = mysqli_query($savienojums, $atlasit_pieteikumus_SQL);

                while($ieraksts = mysqli_fetch_assoc($atlasa_pieteikumus)){
                    if(empty($ieraksts['komentars'])){
                        $Komentars = "<i class='fas fa-times'></i>";
                    }else{
                        $Komentars = "<i class='fas fa-check'></i>";
                    }
                    echo "
                    <tr>
                        <td>{$ieraksts['vards']}</td>
                        <td>{$ieraksts['uzvards']}</td>
                        <td>{$ieraksts['talrunis']}</td>
                        <td class='salaust'>{$ieraksts['nosaukums']}</td>
                        <td class='salaust'>{$ieraksts['stat_nosaukums']}</td>
                        <td>$Komentars</td>
                        <td>
                            <form action = 'statusaPiesk.php' method = 'post'>
                                <button type='submit' name='apskatit' value='{$ieraksts['vakancesPieteiksanas_id']}' class='btn5'>
                                <i class='fas fa-edit'></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    ";
                }
            ?>
            </table>
        </div>
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
    <h2>Kontakti</h2>
    <p><i class="fa-solid fa-phone"></i>+371 22 345 622</p>
    <p><i class="fa-solid fa-envelope"></i>vakances@latvia.lv</p>
    <p><i class="fa-solid fa-location-dot"></i>Latvija</p>
    </div>


    </footer>
    <script src="script.js"></script>       
</body>
</html>