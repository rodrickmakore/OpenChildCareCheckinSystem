<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 7/13/14
 * Time: 4:20 PM
 */
include_once '../CommonIncludes.php';

use \Objects\ParentGuardian;

$link = MySQLHelper::GetConnection();

$query = mysqli_escape_string($link, $_POST['query']);

$names = explode(',', $query);

$lastName = trim($names[0]);
$firstName = trim($names[1]);

$sql = "SELECT  lastName, firstName, pg.id AS id, MAX(phoneNumber) AS phoneNumber "
    .  " FROM parent_guardian pg "
    .  " JOIN parentphonecontact ppc "
    .  " ON pg.id = ppc.parentId "
    .  " WHERE   LastName = ? "
    .  " AND     FirstName = ? "
    .  " GROUP BY lastName, firstName, id ";

$stmt = $link->prepare($sql);
$stmt->bind_param("ss", $lastName, $firstName);

$data = [];

if ($stmt->execute())
{
    $stmt->bind_result($col1, $col2, $col3, $col4);
    while ($stmt->fetch())
    {
        $obj = new ParentGuardian();
        $obj->lastName = $col1;
        $obj->firstName = $col2;
        $obj->id = $col3;
        //TODO: nest contact info
        $obj->phoneNumber = $col4;

        array_push($data, $obj);
    }
}

header('Content-Type: application/json');
$json = json_encode($data);

echo $json;