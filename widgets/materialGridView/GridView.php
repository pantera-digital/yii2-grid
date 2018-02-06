<?php

namespace pantera\grid\widgets\materialGridView;

class GridView extends \kartik\grid\GridView
{
    public $striped = true;
    
    public $condensed = false;
    
    public $responsive = true;

    public $bordered = false;

    public $panelTemplate = '{panelHeading}
    <div class="pull-left">{panelAfter}</div>
    {panelBefore}
    <div class="panel {type}">
        {items}
        {panelFooter}
    </div>';

    public function run()
    {
        parent::run();
        Assets::register($this->view);
        \yii\materialicons\AssetBundle::register($this->view);
    }
}
