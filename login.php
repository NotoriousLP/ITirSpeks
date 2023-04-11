<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ielogošanās sistēmā</title>
    <link rel="stylesheet" href="style_login.css">
</head>
<body>
	<div class="container" id="container">
		<div class="form-container sign-in-container">
			<form action="" method="POST">
				<h1>Ielogoties sistēmā</h1>
				<?php
                    if(isset($_POST["autorizacija"])){
                        require("files/connect_db.php");
                        session_start();

                        $Lietotajvards = mysqli_real_escape_string($savienojums, $_POST["lietotajs"]);
                        $Parole = mysqli_real_escape_string($savienojums, $_POST["parole"]);
                        $adminStatus = mysqli_real_escape_string($savienojums, $_POST["adminStatus"]);

                        $lietotaja_atrasana_SQL = "SELECT * FROM lietotajs WHERE lietotajvards = '$Lietotajvards'";
                        $atrasanas_rezultats = mysqli_query($savienojums, $lietotaja_atrasana_SQL);

                        if(mysqli_num_rows($atrasanas_rezultats) == 1){
                            while($ieraksts = mysqli_fetch_assoc($atrasanas_rezultats)){
                                if(password_verify($Parole, $ieraksts["parole"])){
                                    $_SESSION["lietotajvards"] = $ieraksts["lietotajvards"];
                                    $privilegijasStatuss = $ieraksts['adminStatus'];
                                    if($privilegijasStatuss == 1){
                                        $_SESSION["adminStatus"] = 1;
                                    }else{
                                        $_SESSION["adminStatus"] = 0;
                                    }
                                    header("location:index.php");
                                }else{
                                    echo "Nepareizs lietotājvārds vai parole!";
                                }
                            }
                            
                        }else{
                            echo "Nepareizs lietotājvārds vai parole!";
                        }
                    }

                    if(isset($GET['logout'])){
                        session_destroy();
                    }
                ?>
				<input type="text" name="lietotajs" placeholder="Lietotājvārds" />
				<input type="password" name="parole" placeholder="Parole" />
				<button name="autorizacija">Ielogoties</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1>Esi sveicināts!</h1>
					<p>Administrēšanas vietne paredzēta tikai administratoriem un moderatoriem</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>