<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/9/14
 * Time: 2:48 PM
 */
namespace Views;

use \Interfaces\IRenderBodyContent;
use \ViewModels\MainViewModel;

class MainView implements IRenderBodyContent
{
    private $parentViewPartial;
    private $childViewPartial;
    private $mainViewModel;

    public function __construct(MainViewModel $viewModel = null)
    {
        $this->parentViewPartial = new ParentQueryResultsPartial();
        $this->childViewPartial = new ChildQueryResultsPartial();
        $this->mainViewModel = $viewModel || new MainViewModel();
    }

    public function RenderBodyContent()
    {
        $this->parentViewPartial->RenderBodyContent();
    }
}