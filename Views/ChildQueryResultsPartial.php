<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/9/14
 * Time: 2:09 PM
 */

namespace Views;

use \Interfaces\IRenderBodyContent;

class ChildQueryResultsPartial implements IRenderBodyContent
{

    public function RenderBodyContent()
    {
        ?>
        HELLO kiddo search results
        <?php
    }
}