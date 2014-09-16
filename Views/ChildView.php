<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 7/19/14
 * Time: 11:33 PM
 */
include_once 'CommonIncludes.php';

$connection = MySQLHelper::GetConnection();

$child_id = $_GET['child_id'];

$query = "SELECT id,lastName,firstName,hasAllergy,notes FROM child WHERE id = $child_id";

$child = $connection->query($query);

$connection->close();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
        <style>
            p
            {
                margin-top: 10px;
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="well">
                            <table style="width: 100%">
                              <tr>
                                  <td style="text-align: left">
                                      <h1>$child['firstName'] . ' ' . $child['lastName']</h1>
                                  </td>
                                  <td style="text-align: right">
                                     <button class="btn btn-info" style="margin: 0 auto">Check In</button>
                                  </td>
                              </tr>
                            </table>
                        <div class="alert-danger" style="padding: 10px">
                            Has Allergy
                        </div>

                        <h3>Parents:</h3>
                        <span style="margin-left: 10px">Nick and Katie Jones</span>
                        <button class="btn-xs btn-info" style="margin-left: 10px">Info</button>

                        <h3>Notes:</h3>
                        <span style="margin-left: 10px">
                            Normally behaves very well.  Tends to get excited after eating Marshmellows. Parent would like to be contacted in case of hyper-activity...
                        </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
