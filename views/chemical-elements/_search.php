<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChemicalElementsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chemical-elements-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'items_name') ?>

    <?= $form->field($model, 'symbol') ?>

    <?= $form->field($model, 'latin_name') ?>

    <?= $form->field($model, 'ram') ?>

    <?php // echo $form->field($model, 'oxidation') ?>

    <?php // echo $form->field($model, 'group_number') ?>

    <?php // echo $form->field($model, 'period_number') ?>

    <?php // echo $form->field($model, 'subgroup') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('translate', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('translate', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
