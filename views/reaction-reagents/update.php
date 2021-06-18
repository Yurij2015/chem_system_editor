<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReactionReagents */

$this->title = Yii::t('translate', 'Update Reaction Reagents: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('translate', 'Reaction Reagents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('translate', 'Update');
?>
<div class="reaction-reagents-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
