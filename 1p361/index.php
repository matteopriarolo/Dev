<?php
    $lato = $_GET['lato'];
    $d = 7.874;

    $v = pow($lato, 3);
    $mg = ($d*$v);
    $mkg = $mg/1000;
    $pn = $mkg*9.81;

    echo  "il cubo di ferro ha una massa di " . $pn;
?>