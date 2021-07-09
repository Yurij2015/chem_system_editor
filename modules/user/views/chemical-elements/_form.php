<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChemicalElements */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chemical-elements-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'items_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'symbol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latin_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oxidation')->textInput() ?>

    <?= $form->field($model, 'group_number')->textInput() ?>

    <?= $form->field($model, 'period_number')->textInput() ?>

    <?= $form->field($model, 'subgroup')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('translate', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
