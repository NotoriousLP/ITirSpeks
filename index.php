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
                echo "<li><a href='#admin'>Lietotāji</a></li>";
                echo "<li><a href='#lietotaji'>Pieteikumi</a></li>";
                
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
                        <button type='submit' name='redigetAktualitates' value='{$ieraksts['aktualitates_id']}' class='btn'>
                        <i class='fas fa-edit'></i>
                        </button> </form> 
                        
                        <form method = 'post'>
                        <button type='submit' name='dzestAktualitates' value='{$ieraksts['aktualitates_id']}' class='btn'>
                        <i class='fas fa-trash'></i>
                        </button>
                        </form>
                        </div>";
                        }else{ echo "</div>"; }
                    
                    }
                }
                else{
                echo "Nav nevienas specialitātes";
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

              if(isset($_POST['dzestVakances'])){
                $dzestAktualitatiSQL = "DELETE from vakances WHERE vakances_id = ".$_POST['dzestVakances'];
                
                 if(mysqli_query($savienojums, $dzestAktualitatiSQL)){
                 echo "<div class='pieteiksanaskluda zals'>Vakance veiksmīgi izdzēsta!</div>";
                 header("Refresh:2; url=index.php");
                 }else{
                 echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                 header("Refresh:2; url=index.php");
                }
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
                        <p><span>Alga</span>{$ieraksts['alga']}</p>";
                                  
                        if(isset($_SESSION['lietotajvards'])){
                        echo "<form action='pievienot.php' method='post'>
                        <button type='submit' name='redigetVakances' value='{$ieraksts['vakances_id']}' class='btn'>
                        <i class='fas fa-edit'></i>
                        </button> </form> 
                        
                        <form method = 'post'>
                        <button type='submit' name='dzestVakances value='{$ieraksts['vakances_id']}' class='btn'>
                        <i class='fas fa-trash'></i>
                        </button>
                        </form>
                        </div>";
                        }else{ echo "</div>"; }
                    
                    }
                }else{
                echo "Nav nevienas specialitātes";
            }
        ?>
            <div class="box">
                <img src="images/programmer.jpg" alt="1.vakance">
                <h3>Programmētājs</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique molestias sapiente,
                 quas modi neque distinctio non illo, quam ut, dolores quasi temporibus inventore consequatur reiciendis provident
                sit aspernatur labore nemo.</p>
                <p><span>Atrašanās vieta:</span> Liepāja, Latvija</p>
                <p><span>Vakanču skaits:</span> 5</p>
                <p><span>Darba laiks/veids:</span> 8:00-15:00 / atālināti</p>
                <p><span>Alga:</span> 1500 euro mēnesī bruto</p>
                <a href="pieteiksanas.php" class="btn"><i class="fa fa-info-circle"></i> Pieteikties</a>
            </div> 
    
            <div class="box">
                <img src="images/slud2.jpg" alt="2.vakance">
                <h3>WEB programmētājs</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique molestias sapiente,
                 quas modi neque distinctio non illo, quam ut, dolores quasi temporibus inventore consequatur reiciendis provident
                sit aspernatur labore nemo.</p>
                <p><span>Atrašanās vieta:</span> Liepāja, Latvija</p>
                <p><span>Vakanču skaits:</span> 5</p>
                <p><span>Darba laiks/veids:</span> 8:00-15:00 / atālināti</p>
                <p><span>Alga:</span> 2500 euro mēnesī bruto</p>
                <a href="pieteiksanas.php" class="btn"><i class="fa fa-info-circle"></i>Pieteikties</a>
            </div> 
    
            <div class="box">
                <img src="images/slud3.jpg" alt="3.vakance">
                <h3>PHP programmētājs</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique molestias sapiente,
                 quas modi neque distinctio non illo, quam ut, dolores quasi temporibus inventore consequatur reiciendis provident
                sit aspernatur labore nemo.</p>
                <p><span>Atrašanās vieta:</span> Liepāja, Latvija</p>
                <p><span>Vakanču skaits:</span> 5</p>
                <p><span>Darba laiks/veids:</span> 8:00-15:00 / atālināti</p>
                <p><span>Alga:</span> 5500 euro mēnesī bruto</p>
                <a href="pieteiksanas.php" class="btn btn1"><i class="fa fa-info-circle"></i>Pieteikties</a>
            </div> 
        </div>
    </section>
    <section id="pakalpojumi">
        <h2>IT <span>jaunākie</span> pakalpojumi</h2>
        <div class="box-container">
            <div class="box">
                <img src="images/slud4.jpg" alt="1.pakalpojumus">
                <h3>Operētājsistēmas uzinstelētājs</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique molestias sapiente,
                 quas modi neque distinctio non illo, quam ut, dolores quasi temporibus inventore consequatur reiciendis provident
                sit aspernatur labore nemo.</p>
                <p><span>Atrašanās vieta:</span> Liepāja, Latvija</p>
                <p><span>Tālrunis:</span> +371 29 912 412</p>

            </div> 
    
            <div class="box">
                <img src="images/pak2.jpg" alt="1.pakalpojumus">
                <h3>Uzprogrammēs jebko</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique molestias sapiente,
                 quas modi neque distinctio non illo, quam ut, dolores quasi temporibus inventore consequatur reiciendis provident
                sit aspernatur labore nemo.</p>
                <p><span>Atrašanās vieta:</span> Liepāja, Latvija</p>
                <p><span>Tālrunis:</span> +371 23 477 412</p>
            </div> 
    
            <div class="box">
                <img src="images/pak3.jpg" alt="1.pakalpojumus">
                <h3>Tev uztaisīs jebkādu WEB mājaslapu</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique molestias sapiente,
                 quas modi neque distinctio non illo, quam ut, dolores quasi temporibus inventore consequatur reiciendis provident
                sit aspernatur labore nemo.</p>
                <p><span>Atrašanās vieta:</span> Liepāja, Latvija</p>
                <p><span>Tālrunis:</span> +371 23 412 413</p>
            </div> 
        </div>
    </section>
    <?php
     if(isset($_SESSION['lietotajvards'])){
        
        if(isset($_POST['dzestLietotaju'])){
            $dzestLietotajuSQL = "DELETE from lietotajs WHERE lietotajs_id = ".$_POST['dzestLietotaju'];
            
             if(mysqli_query($savienojums, $dzestLietotajuSQL)){
             echo "<div class='pieteiksanaskluda zals'>Specialitāte veiksmīgi izdzēsta!</div>";
             header("Refresh:2;");
             }else{
             echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
             header("Refresh:2;");
            }
         }
    ?>
       <section id='lietotaji'>
            <h3>Administratori un moderatori</h3>
            <div class='row'>
            <div class='info'>
            <div class='head-info head-color home'>Lietotāju administrēšana: <a href='jaunsLietotajs.php' class="btn3"><i class="fas fa-circle-plus"></i></a>
            <table class='adminTabula'>
            <tr>
                <th>Lietotājs</th>
                <th>Statuss</th>
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
                    <button type='submit' name='dzestLietotaju' value='{$ieraksts['lietotajs_id']}' class='btn4'>
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