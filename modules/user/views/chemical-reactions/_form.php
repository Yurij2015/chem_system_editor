<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChemicalReactions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chemical-reactions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reaction_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chemicals_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('translate', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
