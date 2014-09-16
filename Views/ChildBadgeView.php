<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 7/20/14
 * Time: 4:38 PM
 */

//lookup child/checkin info
include_once 'CommonIncludes.php';

$connection = MySQLHelper::GetConnection();

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="well" style="background-color: white; border-color: black;">
                        <table>
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <?php
                                                    echo date('m/d/Y H:i');
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Sessions:
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Sunday School - Preschool 3
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr rowspan="2">
                                            <td rowspan="2">
                                                GD8
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Pager #: 201
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <div>
                            Charlie Jones
                        </div>
                        <div>
                            Nicholas & Katie Jones
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>