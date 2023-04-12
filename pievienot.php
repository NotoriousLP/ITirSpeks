<?php
     session_start();
    if(isset($_SESSION['lietotajvards'])){
        $page = "pievienot";
    require "files/header.php";
?>

    <section id="pieteiksanas">
        <?php
        require "files/connect_db.php";
        if(isset($_POST['redigetPakalp1'])){
            $nosaukums1 = $_POST['nosaukums'];
            $apraksts1 = $_POST['apraksts'];
            $attels1 = $_POST['bilde'];
            $atrVieta1 = $_POST['atrVieta'];
            $talrunis1 = $_POST['talrunis'];
            if(!empty($nosaukums1) && !empty($apraksts1) && !empty($attels1) && !empty($atrVieta1) && !empty($talrunis1)){
                $redigetVakanciSQL = "UPDATE pakalpojumi SET nosaukums = '$nosaukums1',
                    apraksts = '$apraksts1', atrasanasVieta = '$atrVieta1', talrunis = '$talrunis1', bilde = '$attels1' 
                    WHERE pakalpojumi_id = ".$_POST['redigetPakalp1'];
                if(mysqli_query($savienojums, $redigetVakanciSQL)){
                    echo "<div class = 'pieteiksanaskluda zals'>Pakalpojumus ir veiksmīgi rediģēts!</div>";
                    header("Refresh:2; url=index.php");
                } else {
                    echo "<div class = 'pieteiksanaskluda sarkans'>Pakalpojumus nav veiksmīgi rediģēts. Mēģini vēlreiz!</div>";
                    header("Refresh:2; url=index.php");
                } 
            }
        }

        if(isset($_POST['pievienotPakalp1'])){
            $nosaukums = $_POST['nosaukums'];
            $apraksts = $_POST['apraksts'];
            $attels = $_POST['bilde'];
            $atrVieta = $_POST['atrVieta'];
            $talrunis = $_POST['talrunis'];
            if(!empty($nosaukums) && !empty($apraksts) && !empty($attels) && !empty($atrVieta) && !empty($talrunis)){
                $pievienotPakalpSQL = "INSERT INTO pakalpojumi(nosaukums,apraksts,atrasanasVieta, talrunis, bilde) 
                VALUES ('$nosaukums', '$apraksts', '$atrVieta' , '$talrunis', '$attels')";
                if(mysqli_query($savienojums, $pievienotPakalpSQL)){
                echo "<div class = 'pieteiksanaskluda zals'>Pakalpojums ir veiksmīgi pievienots!</div>";
                header("Refresh:2; url=index.php");
                 }else{
                echo "<div class = 'pieteiksanaskluda sarkans'>Pakalpojums nav pievienots. Mēģini vēlreiz!</div>";
                header("Refresh:2; url=index.php");
             }
            }
        }

        if(isset($_POST['redigetVakances1'])){
            $nosaukums1 = $_POST['nosaukums'];
            $apraksts1 = $_POST['apraksts'];
            $attels1 = $_POST['bilde'];
            $atrVieta1 = $_POST['atrVieta'];
            $darbLaikVeids1 = $_POST['darbLaikVeid'];
            $vakSkaits1 = $_POST['vakSkaits'];
            $alga1 = $_POST['alga'];
            if(!empty($nosaukums1) && !empty($apraksts1) && !empty($attels1) && !empty($atrVieta1) && !empty($darbLaikVeids1) && !empty($alga1) && !empty($vakSkaits1)){
                $redigetVakanciSQL = "UPDATE vakances SET nosaukums = '$nosaukums1',
                    apraksts = '$apraksts1', atrasanasVieta = '$atrVieta1', vakancuSkaits = '$vakSkaits1', darbaLaiksVeids = '$darbLaikVeids1', alga = '$alga1',  bilde = '$attels1' 
                    WHERE vakances_id = ".$_POST['redigetVakances1'];
                if(mysqli_query($savienojums, $redigetVakanciSQL)){
                    echo "<div class = 'pieteiksanaskluda zals'>Vakance ir veiksmīgi rediģēta!</div>";
                    header("Refresh:2; url=index.php");
                } else {
                    echo "<div class = 'pieteiksanaskluda sarkans'>Vakance nav veiksmīgi rediģēta. Mēģini vēlreiz!</div>";
                    header("Refresh:2; url=index.php");
                } 
            }
        }

        if(isset($_POST['pievienotVakances1'])){
            $nosaukums = $_POST['nosaukums'];
            $apraksts = $_POST['apraksts'];
            $attels = $_POST['bilde'];
            $atrVieta = $_POST['atrVieta'];
            $darbLaikVeids = $_POST['darbLaikVeid'];
            $vakSkaits = $_POST['vakSkaits'];
            $alga = $_POST['alga'];
            if(!empty($nosaukums) && !empty($apraksts) && !empty($attels) && !empty($atrVieta) && !empty($darbLaikVeids) && !empty($alga) && !empty($vakSkaits)){
                $pievienotVakanceSQL = "INSERT INTO vakances(nosaukums,apraksts,atrasanasVieta, vakancuSkaits, darbaLaiksVeids, alga, bilde) 
                VALUES ('$nosaukums', '$apraksts', '$atrVieta' , '$vakSkaits', '$darbLaikVeids' , '$alga' , '$attels')";
                if(mysqli_query($savienojums, $pievienotVakanceSQL)){
                echo "<div class = 'pieteiksanaskluda zals'>Vakance ir veiksmīgi pievienojusies!</div>";
                header("Refresh:2; url=index.php");
                 }else{
                echo "<div class = 'pieteiksanaskluda sarkans'>Vakance nav pievienojusies. Mēģini vēlreiz!</div>";
                header("Refresh:2; url=index.php");
             }
            }
        }

        if(isset($_POST['redigetAktualitates1'])){
            $nosaukums1 = $_POST['nosaukums'];
            $apraksts1 = $_POST['apraksts'];
            $attels1 = $_POST['bilde'];
                if(!empty($nosaukums1) && !empty($apraksts1) && !empty($attels1)){
                    $redigetAktualitateSQL = "UPDATE aktualitates SET nosaukums = '$nosaukums1',
                    apraksts = '$apraksts1', bilde = '$attels1' WHERE aktualitates_id = ".$_POST['redigetAktualitates1'];
                    if(mysqli_query($savienojums, $redigetAktualitateSQL)){
                    echo "<div class = 'pieteiksanaskluda zals'>Aktualitāte ir veiksmīgi rediģēta!</div>";
                    header("Refresh:2; url=index.php");
                     }else{
                    echo "<div class = 'pieteiksanaskluda sarkans'>Aktualitāte nav veiksmīgi rediģēta. Mēģini vēlreiz!</div>";
                    header("Refresh:2; url=index.php");
                 }
                }
            }
        if(isset($_POST['pievienotAktualitates1'])){
                $nosaukums = $_POST['nosaukums'];
                $apraksts = $_POST['apraksts'];
                $bilde = $_POST['bilde'];
        
            if(!empty($nosaukums) && !empty($apraksts) && !empty($bilde)){
                $pievienotAktualitateSQL = "INSERT INTO aktualitates(nosaukums,apraksts,bilde) 
                VALUES ('$nosaukums', '$apraksts', '$bilde')";
                if(mysqli_query($savienojums, $pievienotAktualitateSQL)){
                echo "<div class = 'pieteiksanaskluda zals'>Aktualitāte ir veiksmīgi pievienojusies!</div>";
                header("Refresh:2; url=index.php");
                 }else{
                echo "<div class = 'pieteiksanaskluda sarkans'>Aktualitāte nav pievienojusies. Mēģini vēlreiz!</div>";
                header("Refresh:2; url=index.php");
             }
            }
        }


        if(isset($_POST['redigetAktualitates'])){
            $aktualitatesVaicajums = "SELECT * from aktualitates WHERE aktualitates_id =".$_POST['redigetAktualitates'];
            $atlasaAktualiates = mysqli_query($savienojums, $aktualitatesVaicajums);
            while($ieraksts = mysqli_fetch_assoc($atlasaAktualiates )){
            echo "<h2>Rediģēt aktualitātes</h2>
                    <div class='row'>
                        <form method='post'>
                            <input type='text' placeholder='Nosaukums *' name='nosaukums' class='box1' title='Nosaukums' value='{$ieraksts['nosaukums']}' required>
                            <input type='text' placeholder='Apraksts *' name='apraksts' class='box2' title='Apraksts' value='{$ieraksts['apraksts']}' required>
                            <input type='text' placeholder='bilde *' name='bilde' class='box2' title='bilde' value='{$ieraksts['bilde']}' required>
                            <button type='submit' name='redigetAktualitates1' value='{$_POST['redigetAktualitates']}'class='btn'>
                            <i class='fas fa-edit'></i>
                            </button>
                        </form>
                    </div> ";
            }
        }

        if(isset($_POST['pievienotAktualitates'])){
        echo "<h2>Pievienot aktualitāti</h2>
                    <div class='row'>
                        <form method='post'>
                            <input type='text' placeholder='Nosaukums *' name='nosaukums' class='box1' title='Nosaukums' required>
                            <input type='text' placeholder='Apraksts *' name='apraksts' class='box2' title='Apraksts' required>
                            <input type='text' placeholder='bilde *' name='bilde' class='box2' title='Bilde' required>
                            <button type='submit' name='pievienotAktualitates1' class='btn'>Pievienot</button>
                        </form>
                    </div> ";
        }
        
        if(isset($_POST['redigetVakances'])){
            $vakancesVaicajums = "SELECT * from vakances WHERE vakances_id =".$_POST['redigetVakances'];
            $atlasaVakances = mysqli_query($savienojums, $vakancesVaicajums);
            while($ieraksts = mysqli_fetch_assoc($atlasaVakances )){
            echo "<h2>Rediģēt vakances</h2>
                    <div class='row'>
                        <form method='post'>
                        <input type='text' placeholder='Nosaukums *' name='nosaukums' class='box1' title='Nosaukums' value='{$ieraksts['nosaukums']}' required>
                        <input type='text' placeholder='Apraksts *' name='apraksts' class='box2' title='Apraksts' value='{$ieraksts['apraksts']}' required>
                        <input type='text' placeholder='bilde *' name='bilde' class='box1' title='Bilde' value='{$ieraksts['bilde']}'  required>
                        <input type='text' placeholder='Atrašanās vieta *' name='atrVieta' class='box1' value='{$ieraksts['atrasanasVieta']}' title='Atrašanās vieta' required>
                        <input type='text' placeholder='Vakanču skaits *' name='vakSkaits' class='box1' value='{$ieraksts['vakancuSkaits']}' title='Vakanču skaits' required>
                        <input type='text' placeholder='Darba laiks/veids *' name='darbLaikVeid' class='box1' value='{$ieraksts['darbaLaiksVeids']}' box1' title='Darba laiks/veids' required>
                        <input type='text' placeholder='Alga *' name='alga' class='box1' title='Alga' value='{$ieraksts['alga']}' required>
                            <button type='submit' name='redigetVakances1' value='{$_POST['redigetVakances']}'class='btn'>
                            <i class='fas fa-edit'></i>
                            </button>
                        </form>
                    </div> ";
            }
        }

        if(isset($_POST['pievienotVakances'])){
            echo "<h2>Pievienot vakanci</h2>
                        <div class='row'>
                            <form method='post'>
                                <input type='text' placeholder='Nosaukums *' name='nosaukums' class='box1' title='Nosaukums' required>
                                <input type='text' placeholder='Apraksts *' name='apraksts' class='box2' title='Apraksts' required>
                                <input type='text' placeholder='bilde *' name='bilde' class='box1' title='Bilde' required>
                                <input type='text' placeholder='Atrašanās vieta *' name='atrVieta' class='box1' title='Atrašanās vieta' required>
                                <input type='text' placeholder='Vakanču skaits *' name='vakSkaits' class='box1' title='Vakanču skaits' required>
                                <input type='text' placeholder='Darba laiks/veids *' name='darbLaikVeid' class='box1' title='Darba laiks/veids' required>
                                <input type='text' placeholder='Alga *' name='alga' class='box1' title='Alga' required>
                                <button type='submit' name='pievienotVakances1' class='btn'>Pievienot</button>
                            </form>
                        </div> ";
            }

            if(isset($_POST['redigetPakalp'])){
                $vakancesVaicajums = "SELECT * from pakalpojumi WHERE pakalpojumi_id =".$_POST['redigetPakalp'];
                $atlasaVakances = mysqli_query($savienojums, $vakancesVaicajums);
                while($ieraksts = mysqli_fetch_assoc($atlasaVakances)){
                    echo "<h2>Rediģēt pakalpojumu</h2>
                    <div class='row'>
                        <form method='post'>
                            <input type='text' placeholder='Nosaukums *' name='nosaukums' class='box1' title='Nosaukums' value='{$ieraksts['nosaukums']}' required>
                            <input type='text' placeholder='Apraksts *' name='apraksts' class='box2' title='Apraksts' value='{$ieraksts['apraksts']}' required>
                            <input type='text' placeholder='bilde *' name='bilde' class='box1' title='Bilde' value='{$ieraksts['bilde']}' required>
                            <input type='text' placeholder='Atrašanās vieta *' name='atrVieta' class='box1' value='{$ieraksts['atrasanasVieta']}' title='Atrašanās vieta' required>
                            <input type='text' placeholder='Tālrunis *' name='talrunis' class='box1' value='{$ieraksts['talrunis']}' title='Alga' required>
                            <button type='submit' name='redigetPakalp1' value='{$_POST['redigetPakalp']}' class='btn'>
                                <i class='fas fa-edit'></i>
                            </button>
                        </form>
                    </div>";
                }
            }

            if(isset($_POST['pievienotPakalp'])){
                echo "<h2>Pievienot pakalpojumu</h2>
                            <div class='row'>
                                <form method='post'>
                                    <input type='text' placeholder='Nosaukums *' name='nosaukums' class='box1' title='Nosaukums' required>
                                    <input type='text' placeholder='Apraksts *' name='apraksts' class='box2' title='Apraksts' required>
                                    <input type='text' placeholder='bilde *' name='bilde' class='box1' title='Bilde' required>
                                    <input type='text' placeholder='Atrašanās vieta *' name='atrVieta' class='box1' title='Atrašanās vieta' required>
                                    <input type='text' placeholder='Tālrunis *' name='talrunis' class='box1' title='Tālrunis' required>
                                    <button type='submit' name='pievienotPakalp1' class='btn'>Pievienot</button>
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
