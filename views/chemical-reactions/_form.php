<?php

use app\models\Chemicals;
use yii\helpers\ArrayHelper;
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

    <?php // echo $form->field($model, 'chemicals_id')->textInput() ?>
    <?php
    $chemicals = Chemicals::find()->all();
    $items = ArrayHelper::map($chemicals, 'id', 'substance_name');
    $params = [
        'prompt' => 'Выберите химическое вещество'
    ];
    ?>
    <?= $form->field($model, 'chemicals_id')->dropDownList($items, $params) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('translate', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
