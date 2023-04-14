<?php
     session_start();
    if(isset($_SESSION['lietotajvards'])){
        $page = "pievienot";
    require "files/header.php";
?>
<section id="statuss">

<div class="row">
    <div class="info">
        <div class="head-info head-color">Vakanču administrēšana:</div>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            require "files/connect_db.php";
            $Statusi  = "";
            if(isset($_POST['rediget'])){
                $atlasitaisStatuss = $_POST['Statuss'];
                $atjaunot_statusu_SQL = "UPDATE vakancespieteiksanas SET id_statuss = '$atlasitaisStatuss' WHERE vakancesPieteiksanas_id = ".$_POST['rediget'];

                if(mysqli_query($savienojums, $atjaunot_statusu_SQL)){
                    echo "<div class='pieteiksanaskluda zals'>Statuss veiksmīgi atjaunots!</div>";
                    header("Refresh:2; url=index.php");
                }else{
                    echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                    header("Refresh:2; url=index.php");
                }
            }else{
            $pieteikumaID = $_POST['apskatit'];
            
            $atlasit_pieteikumu_SQL = "SELECT * from vakancespieteiksanas as vp 
            INNER JOIN statuss as st ON vp.id_statuss = st.statuss_id 
            INNER JOIN vakances as v ON vp.id_vakances = v.vakances_id 
            WHERE vp.vakancesPieteiksanas_id = $pieteikumaID";

            $atlasa_pieteikumu = mysqli_query($savienojums, $atlasit_pieteikumu_SQL);

            $statusi_SQL = "SELECT * from statuss";
            $atlasa_statusus = mysqli_query($savienojums, $statusi_SQL);

            while($ieraksts = mysqli_fetch_assoc($atlasa_statusus)){
                $Statusi = $Statusi."<option value='{$ieraksts['statuss_id']}'>{$ieraksts['stat_nosaukums']}</option>";
            }
        
         
            while($ieraksts =  mysqli_fetch_assoc($atlasa_pieteikumu)){
                echo "
                    <table>
                    <tr><td>Vārds un uzvārds:</td><td class='vertiba'>{$ieraksts['vards']} {$ieraksts['uzvards']}</td></tr>
                    <tr><td>Tālrunis:</td><td class='vertiba'>{$ieraksts['talrunis']}</td></tr>
                    <tr><td>Darba pieredze:</td><td class='vertiba'>{$ieraksts['darbaPieredze']}</td></tr>
                    <tr><td>Digitālā prasme:</td><td class='vertiba'>{$ieraksts['digitalaPrasme']}</td></tr>
                    <tr><td>Izglītība:</td><td class='vertiba'>{$ieraksts['izglitiba']}</td></tr>
                    <tr><td>Komentārs:</td><td class='vertiba'>{$ieraksts['komentars']}</td></tr>
                    <tr><td>Vakances nosaukums:</td><td class='vertiba'>{$ieraksts['nosaukums']}</td></tr>
                        <form method='POST'>
                            <select name='Statuss' required>
                                <option vertiba='{$ieraksts['id_statuss']}' selected hidden >{$ieraksts['stat_nosaukums']}</option>
                                $Statusi;
                            </select>
                            <button class='btn5' type='submit' name='rediget' value='{$ieraksts['vakancesPieteiksanas_id']}'><i class='fas fa-save'></i></button>
                        </form>
                    </td></tr>
                    </table>
                ";
            }

        }}else{
            echo "<div class = 'pieteiksanaskluda sarkans'>Kaut kas nogāja greizi! <br>
            Atgreizies iepriekšējā lapā un mēģini vēlreiz!</div>";
            header("Refresh:2; url=index.php");
            }
        ?>
    </div>
</div>
</section>
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