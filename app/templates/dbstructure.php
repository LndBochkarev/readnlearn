<?php
global $data;

$structure = $data['structure'];
?>

<div id='content'>
    <div id="center">
        <?php
        foreach ($structure as $table_name => $table_data) {
            $colnames = array_keys($table_data[0]);
            ?>

            <div class="db_table_div">
                <h3 class='table_header'><?php echo $table_name; ?></h3>
                
                <table class='db_table'>
                    <tr>
                        <?php foreach ($colnames as $colname) { ?>
                        <td class="db_th"><?php echo $colname; ?> </td>
                        <?php } ?>
                    </tr>    

                    <?php foreach ($table_data as $row) { ?>
                        <tr>
                            <?php foreach ($row as $value) { ?>
                                <td><?php echo $value; ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table>


            </div>
        <?php }
        ?>

        <div style="float: left; clear: both;">
            <?php echo $data['test_data']; ?>
        </div>

    </div>    
</div>