<?php

namespace pantera\grid\widgets\dateRangePicker;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class Assets extends AssetBundle
{
    public $sourcePath = '@vendor/pantera-digital/yii2-grid/widgets/dateRangePicker/assets';
    public $css = [
        'css/daterangepicker.css',
    ];
    public $js = [
        'js/moment-with-locales.js',
        'js/daterangepicker.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}