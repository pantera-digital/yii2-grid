<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 11/16/17
 * Time: 2:36 PM
 */

namespace pantera\grid\widgets\dateRangePicker;


use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\widgets\InputWidget;

class DateRangePicker extends InputWidget
{
    public $pluginOptions = [];
    public $pluginEvents = [];

    public function run()
    {
        parent::run();
        if ($this->model) {
            return Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            return Html::textInput($this->name, $this->value, $this->options);
        }
    }

    public function init()
    {
        parent::init();
        $this->setId($this->options['id']);
        if (array_key_exists('class', $this->options) === false) {
            Html::addCssClass($this->options, 'form-control');
        }
        $defaultPluginOptions = [
            'showDropdowns' => false,
            'alwaysShowCalendar' => false,
            'ranges' => [
                'Today' => new JsExpression("[
                    moment(),
                    moment()
                ]"),
                'Yesterday' => new JsExpression("[
                    moment().subtract(1, 'days'),
                    moment().subtract(1, 'days')
                ]"),
                'Last 7 Days' => new JsExpression("[
                    moment().subtract(6, 'days'),
                    moment()
                ]"),
                'This Month' => new JsExpression("[
                    moment().startOf('month'),
                    moment().endOf('month')
                ]"),
                'Last Month' => new JsExpression("[
                    moment().subtract(1, 'month').startOf('month'),
                    moment().subtract(1, 'month').endOf('month')
                ]"),
            ],
        ];
        $this->pluginOptions = array_merge($defaultPluginOptions, $this->pluginOptions);
        $this->registerAssets();
        $this->registerPluginEvents();
    }

    private function registerAssets()
    {
        Assets::register($this->view);
        $this->view->registerJs("$('#{$this->getId()}').daterangepicker(" . Json::encode($this->pluginOptions) . ");");
    }

    private function registerPluginEvents(){
        foreach ($this->pluginEvents as $event => $function) {
            $this->view->registerJs("$('#{$this->getId()}').on('{$event}', {$function});");
        }
    }
}