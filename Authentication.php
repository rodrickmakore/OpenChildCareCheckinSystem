<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/8/14
 * Time: 10:18 PM
 */

class Authentication
{
    public static function AuthenticationCheck($isViewPage)
    {
        if (!isset($_SESSION['user']))
        {

            if ($isViewPage)
            {
                header("Location: Login.php");
                die();
            }
            else
            {
                header('HTTP/1.0 401 Unauthorized');
                die;
            }
        }
    }

    public static function SignIn($userName, $password)
    {
        return new User($userName, $password);
    }
}