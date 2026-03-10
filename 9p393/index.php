<?php
    $anno_attuale = date("Y");
    echo "anno corrente: " . $anno_attuale;

    echo "questa persona ha: " . $anno_attuale - $_GET['anno'] . "anni";
?>