<?php
include_once 'CommonIncludes.php';

use Controllers\MainController;

if (!isset($_GET['view']))
{
    header('Location: Main.php?view=family');
}
$controller = new MainController();
switch ($_GET['view'])
{
    case 'worker':
        break;
    default: //family
        $controller->FamilySearchActionGET();
        break;
}