<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ChemicalElements */

$this->title = $model->items_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('translate', 'Chemical Elements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="chemical-elements-view">

    <p>
        <?= Html::a(Yii::t('translate', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('translate', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('translate', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
