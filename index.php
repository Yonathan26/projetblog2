<?php

   require('controller.php');

   if (isset($_GET['action']))
   {

       if ($_GET['action'] == 'home')
       {
           listPost();
       } else if ($_GET['action'] == 'post')
       {
           post();
       }

   }
   else {
          listPost();
   }




