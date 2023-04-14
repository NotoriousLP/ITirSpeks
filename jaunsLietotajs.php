<?php
     session_start();
    if(isset($_SESSION['lietotajvards'])){
        $page = "pievienot";
    require "files/header.php";
?>
    <section id="pieteiksanas">
    <?php
        require "files/connect_db.php";
        if(isset($_POST['pievienotLietotajus'])){
            $skaits = 0;
            $lietotajs = mysqli_real_escape_string($savienojums, $_POST['lietotajs']);
            $parole = mysqli_real_escape_string($savienojums, $_POST['parole']);
            $atkParole = mysqli_real_escape_string($savienojums, $_POST['parole1']);
            $statuss = $_POST['statuss'];
            if($statuss == 'Administrators'){
                $admin = "1";
            }else{
                $admin = "0";
            }
            if(empty($lietotajs)){
                echo "<div class = 'pieteiksanaskluda sarkans'>Kļūda! Nav ievadīts lietotājvārds!</div>";
                $skaits++;
                header("Refresh:2; url=jaunsLietotajs.php");
            }else if(empty($parole)){
                echo "<div class = 'pieteiksanaskluda sarkans'>Kļūda! Nav ievadīta parole!</div>";
                $skaits++;
                header("Refresh:2; url=jaunsLietotajs.php");
            }else if($atkParole != $parole){
                echo "<div class = 'pieteiksanaskluda sarkans'>Kļūda! Paroles nesakrīt</div>";
                $skaits++;
                header("Refresh:2; url=jaunsLietotajs.php");
            }

            $parbaudeSQL = "SELECT * from lietotajs WHERE lietotajvards = '$lietotajs'";
            $parbaudesRez = mysqli_query($savienojums, $parbaudeSQL);
            if(mysqli_num_rows($parbaudesRez) > 0){
                echo "<div class = 'pieteiksanaskluda sarkans'>Kļūda! Tāds lietotājs jau pastāv</div>";
                $skaits++;
                header("Refresh:2; url=jaunsLietotajs.php");
            } 
            if($skaits == 0){
                    $jauktaParole = password_hash($parole, PASSWORD_DEFAULT);
                    $pievienotLietotajuSQL = "INSERT INTO lietotajs(lietotajvards,parole,adminStatus) VALUES ('$lietotajs', '$jauktaParole', '$admin')";
                    if(mysqli_query($savienojums, $pievienotLietotajuSQL)){
                    echo "<div class = 'pieteiksanaskluda zals'>Lietotājs ir veiksmīgi pievienots!</div>";
                    header("Refresh:2; url=index.php");
                     }else{
                    echo "<div class = 'pieteiksanaskluda sarkans'>Lietotājs nav pievienots! Mēģini vēlreiz!</div>";
                    header("Refresh:2; url=index.php");
                }
            }
        }else{
        echo "<h2>Pievienot lietotājus</h2>
                    <div class='row'>
                        <form method='post'>
                            <input type='text' placeholder='Lietotājvārds *' name='lietotajs' class='box1' title='Lietotajs' required>
                            <input type='password' placeholder='Parole *' name='parole' class='box1' title='Parole' required>
                            <input type='password' placeholder='Atkārtota parole *' name='parole1' class='box1' title='Atkārtota parole' required>
                            <label for='statuss'>Statuss:</label>
                            <select name='statuss'>
                            <option value='Administrators'>Administrators</option>
                            <option value='Moderators'>Moderators</option>
                            </select>
                            <button type='submit' name='pievienotLietotajus' class='btn'>Pievienot</button>
                        </form>
                    </div> ";
        }
    ?>
    </section>
<?php
    require "files/footer.php";
    }else{
    echo "<div class = 'pieteiksanaskluda sarkans'>Jums šeit nav pieeja atļauta!</div>";
    header("Refresh:2;index.php");
    }
    ?>
</body>
</html>