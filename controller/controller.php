<?php
/**
 * Created by PhpStorm.
 * User: Yonathan
 * Date: 04/11/2018
 * Time: 15:31
 */


require('model.php');

function post ()
{
    $postId = $_GET['id'];

    $post = getPost($postId);
    $comments = getComments($postId);

    require('postView.php');
}

function listPost ()
{
    $requete = getPosts();

    require('affichageAccueil.php');
}