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


function isAdmin(?string $redirectLink = null)
{
    if (session_status() === PHP_SESSION_NONE)
        session_start();
    
    if (!isset($_SESSION["user_kind"]) || (int)$_SESSION["user_kind"] === 2)
    {
        if (!is_null($redirectLink))
            header("location: $redirectLink");

        return false;
    }

    return true;
}