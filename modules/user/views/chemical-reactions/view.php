<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ChemicalReactions */

$this->title = $model->result;
$this->params['breadcrumbs'][] = ['label' => Yii::t('translate', 'Chemical Reactions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="chemical-reactions-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'result',
            'reaction_type',
            'chemicals.substance_name',
        ],
    ]) ?>

</div>
