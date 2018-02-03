<?php

namespace pantera\grid\widgets\materialGridView;

class GridView extends \kartik\grid\GridView
{
    public $striped = true;
    
    public $condensed = false;
    
    public $responsive = true;

    public $bordered = false;

    public function run()
    {
        parent::run();
        Assets::register($this->view);
    }
}
