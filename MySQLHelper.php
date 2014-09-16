<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 7/19/14
 * Time: 11:34 PM
 */

class MySQLHelper
{
    public static function GetConnection()
    {
        return new mysqli(GlobalConfig::DB_SERVER_NAME,
                          GlobalConfig::DB_USER_NAME,
                          GlobalConfig::DB_PW,
                          GlobalConfig::DB_DEFAULT_DATABASE);
    }
}