<?php

namespace pantera\grid;

use Yii;
use yii\grid\DataColumn;
use yii\widgets\MaskedInput;

class DateTimeColumn extends DataColumn
{
    /* @var string Формат в каком отобразить время */
    public $dateTimeFormat = 'd MMM Y';
    /* @var string Маска для поля */
    public $mask = '99.99.9999';

    public function init()
    {
        if (empty($this->options)) {
            $this->options = [
                'style' => 'width: 200px;',
            ];
        }
        parent::init();
    }

    protected function renderDataCellContent($model, $key, $index)
    {
        if (empty($this->value)) {
            return Yii::$app->formatter->asDatetime($model->{$this->attribute}, $this->dateTimeFormat);
        } else {
            return parent::renderDataCellContent($model, $key, $index);
        }
    }

    protected function renderFilterCellContent()
    {
        if (empty($this->filter)) {
            $options = array_merge([
                'class' => 'form-control',
            ], $this->filterInputOptions);
            return MaskedInput::widget([
                'model' => $this->grid->filterModel,
                'attribute' => $this->attribute,
                'mask' => $this->mask,
                'options' => $options,
            ]);
        } else {
            return parent::renderFilterCellContent();
        }
    }
}
