<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Chemicals */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chemicals-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'substance_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chemical_formula')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'mass')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'molecular_weight')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('translate', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
