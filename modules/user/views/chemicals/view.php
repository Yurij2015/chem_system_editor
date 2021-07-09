<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Chemicals */

$this->title = $model->substance_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('translate', 'Chemicals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="chemicals-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'substance_name',
            'chemical_formula',
            'mass',
            'molecular_weight',
//            'molformat:ntext',
        ],
    ]) ?>

</div>
