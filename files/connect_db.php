<?php
    $servera_vards = "localhost:3307"; //varbūt localhost:3307
    $lietotajvards = "root";
    $parole = "";
    $db_vards = "itirspeks";

    $savienojums = mysqli_connect($servera_vards, $lietotajvards, $parole, $db_vards); //Savienojās ar mySQL

    if(!$savienojums){
        //die("Pieslēgties neizdevās: ".mysqli_connec_error());
    }else{
        //echo 'Savienojums ar DB veiksmīgi izveidots';
    }
?>