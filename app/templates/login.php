<?php 
global $data;
?>

<div id='content'>
    <div id="center">
        
        <div id="login_form">
            <form action="sign_in" method="post">
                <table>
                    <tr>
                        <td>
                            Login
                        </td>
                        <td>
                            <input type="text" name="login" required placeholder="Your email or username">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password                           
                        </td>
                        <td>
                            <input class="password" type="password" name="password" required>
                        </td>    
                    </tr>
                    <tr>
                        <td>
                            <input class="subutton" type="submit" value="Sign in" name="sign_in">
                        </td>
                        <td>
                            <a href="registration">
                                <div id='rebutton' class="subutton">Register</div>
                            </a>
                        </td>
                    </tr>
                </table>
            </form>
        
        
        
        
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