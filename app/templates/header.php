<?php
global $registry;
$data = $registry['view_data'];
?>


<body>
    <div id='header'>
        <div id="hbuttonHolder">
            <a href="book">
                <div class="hbutton1" id="hbt1"><span class="textHolder">Book</span></div>
            </a>
            <a href="dictionary">
                <div class="hbutton1" id="hbt2"><span class="textHolder">Dictionary</span></div>
            </a>
            <a href="d_b_structure">
                <div class="hbutton1" id="hbt3"><span class="textHolder">DB structure</span></div>
            </a>
        </div>

        <div id="hlogin_form">
            <form action="sign_in" method="post">
                <table>
                    <tr>
                        <td>
                            Login
                        </td>
                        <td>
                            <input type="text" name="login">
                        </td>
                        <td>
                            <input class="subutton" type="submit" value="Sign in" name="sign_in">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password                           
                        </td>
                        <td>
                            <input class="password" type="password" name="password">
                        </td>                        
                        <td>
                            <a href="registration">
                                <div id='rebutton' class="subutton">Register</div>
                            </a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>        
    </div>

    <?php //temporary
    if (isset($data['error_message'])) {
        echo $data['error_message'] . '<br>';
    }
    $error_msg = filter_input(INPUT_COOKIE, 'error_message', FILTER_SANITIZE_STRING);
    if ($error_msg) {
        echo $error_msg;
        setcookie('error_message', NULL, time() - 3600*24);
    }
    ?>