<?php
     session_start();
    if(isset($_SESSION['lietotajvards'])){
        $page = "pievienot";
    require "files/header.php";
?>
<section class="admin">

<div class="row">
    <div class="info">
        <div class="head-info head-color">Audzēkņu administrēšana:</div>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            require "files/connect_db.php";

            if(isset($_POST['rediget'])){
                $atlasitaisStatuss = $_POST['Statuss'];
                $atjaunot_statusu_SQL = "UPDATE vakancespieteiksanas SET id_statuss = '$atlasitaisStatuss' WHERE Audzeknis_ID = ".$_POST['rediget'];

                if(mysqli_query($savienojums, $atjaunot_statusu_SQL)){
                    echo "<div class='pieteiksanaskluda zals'>Statuss veiksmīgi atjaunots!</div>";
                    header("Refresh:2; url=audzekni.php");
                }else{
                    echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                    header("Refresh:2; url=audzekni.php");
                }
            }else{
            $audzeknaID = $_POST['apskatit'];
            $atlasit_audzeki_SQL = "SELECT * from audzekni as a JOIN statuss as st ON a.Statuss = st.Statuss_ID WHERE Audzeknis_ID = $audzeknaID";
            $atlasa_audzekni = mysqli_query($savienojums, $atlasit_audzeki_SQL);

            $statusi_SQL = "SELECT * from statuss";
            $atlasa_statusus = mysqli_query($savienojums, $statusi_SQL);
            $Statusi  = "";

            while($ieraksts = mysqli_fetch_assoc($atlasa_statusus)){
                $Statusi = $Statusi."<option value='{$ieraksts['Statuss_ID']}'>{$ieraksts['Stat_nosaukums']}</option>";
            }
        
            }}else{
            echo "<div class = 'pieteiksanaskluda sarkans'>Kaut kas nogāja greizi! <br>
            Atgreizies iepriekšējā lapā un mēģini vēlreiz!</div>";
            header("Refresh:2; url=audzekni.php");
            }

            while($ieraksts =  mysqli_fetch_assoc($atlasa_audzekni)){
                echo "
                    <table>
                    <tr><td rowspan='13'><i class='fas fa-user user-ico'></i></td></tr>
                    <tr><td>Vārds un uzvārds:</td><td class='value'>{$ieraksts['Vards']} {$ieraksts['Uzvards']}</td></tr>
                    <tr><td>Tālrunis:</td><td class='value'>{$ieraksts['talrunis']}</td></tr>
                    <tr><td>Darba pieredze:</td><td class='value'>{$ieraksts['darbaPieredze']}</td></tr>
                    <tr><td>Digitālā prasme:</td><td class='value'>{$ieraksts['digitalaPrasme']}</td></tr>
                    <tr><td>Izglītība:</td><td class='value'>{$ieraksts['izglitiba']}</td></tr>
                    <tr><td>Komentārs:</td><td class='value'>{$ieraksts['komentars']}</td></tr>
                    <tr><td>Uzņemšanas datums:</td><td class='value'>
                        <form method='POST'>
                            <select name='Statuss' required>
                                <option value='{$ieraksts['statuss']}' selected hidden >{$ieraksts['stat_nosaukums']}</option>
                                $Statusi;
                            </select>
                            <button class='btn' type='submit' name='rediget' value='{$ieraksts['Audzeknis_ID']}'>Saglabāt</button>
                        </form>
                    </td></tr>
                    </table>
                ";
            }
        ?>
    </div>
</div>
</section>
            ?>
        </table>
    </div>
</div>
</section>




<?php
    require "files/footer.php";
    }else{
    echo "<div class = 'pieteiksanaskluda sarkans'>Jums šeit nav pieeja atļauta!</div>";
    header("Refresh:2;index.php");
    }
    ?>