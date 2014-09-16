<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 7/12/14
 * Time: 11:41 PM
 */
session_start();
include_once 'Objects/User.php';

if (!isset($_GET['logout']) && $_POST)
{
    if (User::AuthenticateUser($_POST['username'], $_POST['pw'])) //username and pw check out
    {
        $user = new User($_POST['username'], $_POST['pw']);

        $_SESSION['user'] = $user;

        header("Location: Main.php");
        die();
    }
}//else
session_destroy();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <style>
            input
            {
                width: 100%;
                height: 80%;
                padding: 5%;
                border-radius: 5px;
                border: solid white 1px;
            }
        </style>
    </head>
    <body>
        <form action="Login.php" method="post">
            <div style="width: 50%; height: 50%; position: absolute; top: 25%; left: 25%; border-radius: 15px; background-color: #F0F0F0; vertical-align: middle; text-align: center">
                <table style="position: absolute; width: 50%; height: 70%; top: 15%; left: 25%">

                    <tr>
                        <td style="height: 15px">
                            <h3>
                                Sunshine Ridge System Login
                            </h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="username" name="username" placeholder="User Name""/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" id="pw" name="pw" placeholder="Password"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" class="btn btn-success" style="width: 100%">Login <span class="glyphicon glyphicon-arrow-right"></span></button>
                        </td>
                    </tr>
                </table>

            </div>
        </form>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
