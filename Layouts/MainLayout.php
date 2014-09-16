<?php

//include_once 'CommonIncludes.php';

namespace Layouts;

use \Interfaces\ILayoutRenderer;
use \Interfaces\IRenderBodyContent;

class MainLayout implements ILayoutRenderer
{
    private $content;

    public function __construct(IRenderBodyContent $content)
    {
        $this->content = $content;
    } //end constructor

    public function ExecuteLayout()
    {?>

        <!DOCTYPE html>
        <html>
        <head>
            <title>Search</title>
            <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />
            <link rel="stylesheet" type="text/css" href="./css/jquery-ui-1.10.4.custom.css" />
            <link rel="stylesheet" type="text/css" href="./css/occs.css" />
        </head>
        <body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Sunshine Ridge</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="./Main.php?view=family">Family</a></li>
                        <li><a href="#">Workers</a></li>
                    </ul>
                    <div class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input id="txtSearch" type="text" class="form-control" placeholder="Search Family"
                                   style="border-radius: 5px 0 0 5px; margin-right: 0;" />
                        </div>
                        <button type="button" id="btnSearch" class="btn btn-default"
                                style="border-radius: 0 5px 5px 0; margin-left: -5px;" ><span class="glyphicon glyphicon-search"></span></button>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Administrative</a></li>
                                <li class="divider"></li>
                                <li><a href="Login.php?logout=1">Sign Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <script src="./js/jquery.js"></script>
        <script src="./js/jquery-ui.js"></script>
        <script src="./js/knockout-3.1.0.js"></script>
        <script src="./js/bootstrap.js"></script>
        <script src="./js/Common.js"></script>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php
                        $this->content->RenderBodyContent();
                    ?>
                </div>
            </div>
        </div>
        </body>
        </html>

    <?php
    }
}//end class
