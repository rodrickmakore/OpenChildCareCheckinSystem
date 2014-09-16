<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/12/14
 * Time: 11:42 PM
 */

include '../CommonIncludes.php';

$parentId = $_POST['parentGuardianId'];

$link = MySQLHelper::GetConnection();
$escapedParentId = $link->escape_string("$parentId");

//lookup all kids from parentGuardianId
$sql = " SELECT 	child.firstName, "
                . " child.lastName, "
                . " child.id, "
                . " child.hasAllergy, "
                . " `clsrm`.`name` "
                . " FROM	child "
                . " JOIN	parent_guardian_child pgc "
                . " ON		pgc.child_id = child.id "
                . " JOIN	parent_guardian pg "
                . " ON		pgc.parent_guardian_id = pg.id "
                . " JOIN	classroom clsrm "
                . " ON		clsrm.id = child.classroom_id "
                . " WHERE   pg.id = $escapedParentId; ";

$result = $link->query($sql);

$row = $result->fetch_row();

$data = json_encode($row);

/* free result set */
mysqli_free_result($result);

$link->close();
