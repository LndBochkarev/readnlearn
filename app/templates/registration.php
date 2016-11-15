<?php
global $data;
?>

<div id='content'>
    <div id="center">
        <form id="registration_form" action="sign_up" method="POST"> <!--enctype="multipart/form-data"-->
            <div id='input_error'><?php echo $data['input_error']; ?></div>

            <table>
                <tr>
                    <td id='td_left'>
                        <label for="first_name">First name:</label>
                    </td>
                    <td>
                        <input type="text" name="first_name" size="20" required />
                    </td>
                </tr>

                <tr>
                    <td id='td_left'>
                        <label for="username">Username:</label>
                    </td>
                    <td>
                        <input type="text" name="username" size="20" required />
                    </td>
                </tr>

                <tr>
                    <td id='td_left'>
                        <label for="password">Password:</label>
                    </td>
                    <td>
                        <input type="password"  name="password" size="20" required />
                    </td>
                </tr>

                <tr>
                    <td id='td_left'>
                        <label for="confirm_password">Password confirmation:</label>
                    </td>
                    <td>
                        <input type="password" name="confirm_password"
                               size="20" required />
                    </td>
                </tr>

                <tr>
                    <td colspan='2'>
                        <label id='td_left' for="email">Email:</label>
                        <input id='input_email' type="text" name="email" size="30" />
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