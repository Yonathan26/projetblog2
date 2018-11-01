<?php
/**
 * Created by PhpStorm.
 * User: Yonathan
 * Date: 29/10/2018
 * Time: 16:56
 */
function getposts()
{
    try
    {
        $bdd = new PDO('mysql:host=drivinpajo123.mysql.db;dbname=drivinpajo123', 'drivinpajo123', 'Drivin123');
    }
    catch (Exception $e)
    {
        die('Error of connexion to the database : ' . $e->getMessage());
    }


    $requete = $bdd->query('SELECT id, title, text as content, DATE_FORMAT(date, "%d/%c/%Y à %Hh%imin%Ss") as date_fr, DATE_FORMAT(date, "%c/%d/%Y at %Hh%imin%Ss") as date_en FROM post_yonathan ORDER BY date DESC LIMIT 0, 5');

    return $requete;
}


