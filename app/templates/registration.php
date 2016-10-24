<?php
global $data;

//why am I filtering this?
$first_name = filter_input(INPUT_COOKIE, 'first_name', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_COOKIE, 'username', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_COOKIE, 'email', FILTER_SANITIZE_EMAIL);
?>

<div id='content'>
    <div id="center">
        <form id="registration_form" action="register" method="POST"> <!--enctype="multipart/form-data"-->
            <div id='input_error'><?php echo $data['input_error']; ?></div>

            <table>
                <tr>
                    <td id='td_left'>
                        <label for="first_name">First name:</label>
                    </td>
                    <td>
                        <input type="text" name="first_name" size="20" value="<?php echo $first_name; ?>" />
                        <span>*</span>
                    </td>
                </tr>

                <tr>
                    <td id='td_left'>
                        <label for="username">Username:</label>
                    </td>
                    <td>
                        <input type="text" name="username" size="20" value="<?php echo $username; ?>" />
                        <span>*</span>
                    </td>
                </tr>

                <tr>
                    <td id='td_left'>
                        <label for="password">Password:</label>
                    </td>
                    <td>
                        <input type="password"  name="password" size="20" />
                        <span>*</span>
                    </td>
                </tr>

                <tr>
                    <td id='td_left'>
                        <label for="confirm_password">Password confirmation:</label>
                    </td>
                    <td>
                        <input type="password" name="confirm_password"
                               size="20" />
                        <span>*</span>
                    </td>
                </tr>

                <tr>
                    <td colspan='2'>
                        <label id='td_left' for="email">Email:</label>
                        <input id='input_email' type="text" name="email" size="30" value="<?php echo $email; ?>" />
                    </td>
                </tr>

                <!--
                <br />            
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                <label for="user_pic">Picture:</label>
                <input type="file" name="user_pic" size="30" /><br />
                -->
            </table>
            <br />

            <input type="submit" value="Sign up" />
            <input type="reset" value="Reset" />



        </form>


    </div>

</div>