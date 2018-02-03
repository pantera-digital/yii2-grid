<?php

namespace pantera\grid\widgets\materialGridView;

class GridView extends \kartik\grid\GridView
{
    public $striped = true;
    
    public $condensed = false;
    
    public $responsive = true;

    public $bordered = false;

    public $panelTemplate = '{panelHeading}
    {panelBefore}
    <div class="panel {type}">
        {items}
        {panelAfter}
        {panelFooter}
    </div>';

    public function run()
    {
        parent::run();
        Assets::register($this->view);
    }
}
