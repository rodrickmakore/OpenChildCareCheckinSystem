<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 7/17/14
 * Time: 6:03 PM
 */

interface IDataSource
{
    function  connect();
    function execute($sql);
}