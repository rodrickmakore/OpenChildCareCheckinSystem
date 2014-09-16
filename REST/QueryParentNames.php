<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 7/13/14
 * Time: 4:20 PM
 */
include_once '../CommonIncludes.php';

$link = MySQLHelper::GetConnection();
$query = mysqli_escape_string($link, $_POST['query']);

class ReturnObj
{
    public $name;
    public $child_id;
    public $parent_guardian_id;
}

$sql = "SELECT DISTINCT CONCAT(lastName, ', ', firstName) name FROM parent_guardian "
        . " WHERE   LastName LIKE '%$query%'"
        . " OR    FirstName LIKE '%$query%'";

$data = [];

if ($result = $link->query($sql))
{
    while ($arrResults = $result->fetch_array())
    {
        array_push($data, $arrResults['name']);
    }
}

header('Content-Type: application/json');
$json = json_encode($data);

echo $json;