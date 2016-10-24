<?php
global $data;
?>





<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
        <script type="text/javascript" src="jquery-3.1.1.js"></script>

        <?php
        if (isset($data['links'])) {
            $links = $data['links'];
            foreach ($links as $link) {
                ?>           

                <link rel="<?php echo $link['rel']; ?>" type="<?php echo $link['type']; ?>" href="<?php echo $link['href']; ?>"/>

                <?php
            }
        }
        ?>

        <?php
        if (isset($data['scripts'])) {
            $scripts = $data['scripts'];
            foreach ($scripts as $script) {
                ?>           

                <script src="<?php echo $script['src']; ?>" type="<?php echo $script['type']; ?>"></script>

                <?php
            }
        }
        ?>
    </head>