<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/9/14
 * Time: 2:48 PM
 */

namespace Controllers;

use Layouts\MainLayout;
use Views\MainView;

class MainController
{
    public function FamilySearchActionGET()
    {
        if (!(isset($_GET['childSearch']) && $_GET['childSearch'] == '1'))
        {
            $layout = new MainLayout(new MainView());

            $layout->ExecuteLayout();
        }
        else
        {
            //is child search view
        }
    }

    public function WorkerSearchActionGET()
    {

    }
}