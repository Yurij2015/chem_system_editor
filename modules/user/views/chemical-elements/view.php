<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ChemicalElements */

$this->title = $model->latin_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('translate', 'Chemical Elements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="chemical-elements-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'items_name',
            'symbol',
            'latin_name',
            'ram',
            'oxidation',
            'group_number',
            'period_number',
            'subgroup',
        ],
    ]) ?>

</div>
