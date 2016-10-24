<?php 
global $data;
?>

<div id='content'>
    <div id="center">
        <?php
        foreach ($_REQUEST as $key => $value) {
            echo $key . " => " . $value . '<br>';
        }/*
          foreach ($_SERVER as $key => $value) {
          echo $key . " => " . $value . '<br>';
          } */
        ?>

        <?php        
        echo $data['test_data'];
        
        ?>

    </div>

</div>