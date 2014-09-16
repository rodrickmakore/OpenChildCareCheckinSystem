<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/15/14
 * Time: 8:17 PM
 */

include_once '../CommonIncludes.php';

$link = MySQLHelper::GetConnection();


$sql = "SELECT 		pg.id as parent_id,
                    email.id as email_id,
                    phone.id as phone_id,
                    chld.id as child_id,
                    pg.firstName,
                    pg.lastName,
                    email.emailAddress,
                    phone.phoneNumber,
                    phone.canText as phone_can_text,
                    chld.firstName as child_firstName,
                    chld.lastName as child_lastName,
                    chld.hasAllergy,
                    chld.notes,
                    clsrm.`name` as classroom_name
        FROM		parent_guardian pg
        LEFT JOIN	parent_guardian_child pgc
        ON			pgc.parent_guardian_id = pg.id
        LEFT JOIN	child chld
        ON			pgc.child_id = chld.id
        LEFT JOIN	classroom clsrm
        ON			clsrm.id = chld.classroom_id
        LEFT JOIN	parentemail email
        ON			email.parentId = pg.id
        LEFT JOIN	parentphonecontact phone
        ON			phone.parentId = pg.id
        ORDER BY 	pg.id, chld.id";

$result = $link->query($sql);

$parents = [];

//for processing per parent item (nested object processing)
$parentIdsSeen = [];
$emailIdsSeen = [];
$phoneIdsSeen = [];
$childrenIdsSeen = [];
$parent = null;

//build the object and resolve the impedance mismatch
while ($row = $result->fetch_array())
{
    if ($row['parent_id'] && !array_key_exists($row['parent_id'], $parentIdsSeen))
    {
        $parentIdsSeen[$row['parent_id']] = 1;
        $parent = new \Objects\ParentGuardian();
        $parent->id = $row['parent_id'];
        $parent->lastName = $row['lastName'];
        $parent->firstName = $row['firstName'];
        $parent->searchName =  $parent->firstName . ' ' .  $parent->lastName;
        array_push($parents, $parent);
    }

    if ($row['email_id'] && !array_key_exists($row['email_id'], $emailIdsSeen))
    {
        $emailIdsSeen[$row['email_id']] = 1;
        $currEmailID = $row['email_id'];
        array_push($parent->emailAddresses, $row['emailAddress']);
    }

    if ($row['phone_id'] && !array_key_exists($row['phone_id'], $phoneIdsSeen))
    {
        $phoneIdsSeen[$row['phone_id']] = 1;
        $parentPhoneContact = new \Objects\ParentPhoneContact();
        $parentPhoneContact->phoneNumber = $row['phoneNumber'];
        $parentPhoneContact->canText = $row['phone_can_text'];
        array_push($parent->parentPhoneContacts, $parentPhoneContact);
    }

    if ($row['child_id'] && !array_key_exists($row['child_id'] . $row['parent_id'], $childrenIdsSeen))
    {
        $childrenIdsSeen[$row['child_id'] . $row['parent_id']] = 1;
        $child = new \Objects\Child();
        $child->classRoom = $row['classroom_name'];
        $child->notes = $row['notes'];
        $child->firstName = $row['child_firstName'];
        $child->lastName = $row['child_lastName'];
        $child->hasAllergy = $row['hasAllergy'];
        array_push($parent->children, $child);
    }
}//end while loop

$allFamilyDataJSON = json_encode($parents);

header('Content-Type: application/json');
echo $allFamilyDataJSON;
