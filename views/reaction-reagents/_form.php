<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReactionReagents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reaction-reagents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'chemical_reactions_id')->textInput() ?>

    <?= $form->field($model, 'chemical_elements_id')->textInput() ?>

    <?= $form->field($model, 'chemicals_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('translate', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
