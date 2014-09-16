<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/11/14
 * Time: 12:04 AM
 */

namespace Objects;

class ParentGuardian
{
    public $id;
    public $lastName;
    public $firstName;
    public $searchName;
    public $emailAddresses = [];
    public $parentPhoneContacts = [];
    public $children = [];
} 