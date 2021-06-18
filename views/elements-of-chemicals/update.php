<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ElementsOfChemicals */

$this->title = Yii::t('translate', 'Update Elements Of Chemicals: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('translate', 'Elements Of Chemicals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('translate', 'Update');
?>
<div class="elements-of-chemicals-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
