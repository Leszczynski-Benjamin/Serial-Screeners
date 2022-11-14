<?php
function caracteres_speciaux($donnees)
{
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

function getRandName(int $offset)
{
    $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
    $charset = str_shuffle($charset);
    $charset = str_shuffle($charset);
    $charset = substr($charset, 0, $offset);
    return $charset;
}
