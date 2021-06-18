<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChemicalReactions */

$this->title = Yii::t('translate', 'Update Chemical Reactions: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('translate', 'Chemical Reactions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('translate', 'Update');
?>
<div class="chemical-reactions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
