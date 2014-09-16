<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 7/19/14
 * Time: 11:42 PM
 */
session_start();
include_once 'GlobalConfig.php';
include_once 'AutoloadSetup.php';

$auth = new Authentication();
$auth->AuthenticationCheck(isset($_GET) && isset($_GET['view']));