<?php

namespace pantera\grid\widgets\materialGridView;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class Assets extends AssetBundle
{   
    public $css = [
        'css/material-grid.css',
    ];

    public function init()
    {
        $this->sourcePath = __DIR__;
        parent::init();
    }
}