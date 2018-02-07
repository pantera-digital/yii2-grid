<?php

namespace pantera\grid\widgets\materialGridView;

class GridView extends \kartik\grid\GridView
{
    public $striped = true;
    
    public $condensed = false;
    
    public $responsive = true;

    public $bordered = false;

    public $panelHeadingTemplate = '<h3 class="panel-title">{heading}</h3>';

    public $panelBeforeTemplate = '<div class="pull-right">
    <div class="btn-toolbar kv-grid-toolbar" role="toolbar">
        {toolbar}
    </div>
</div>
<div class="pull-right">{summary}</div>
{before}
<div class="clearfix"></div>';

    public $panelTemplate = '
    <div>
    <div class="pull-left">{panelHeading}</div>
    <div class="pull-right">{panelBefore}</div>
    <div class="clearfix"></div>
    </div>
    <div class="panel {type}">
        {items}
        {panelAfter}
        {panelFooter}
    </div>';

    public $panelFooterTemplate = '<div class="kv-panel-pager pull-right">{pager}</div>
<div class="bulk-button">{footer}</div>
<div class="clearfix"></div>';

    public function run()
    {
        parent::run();
        Assets::register($this->view);
        \yii\materialicons\AssetBundle::register($this->view);
    }
}
