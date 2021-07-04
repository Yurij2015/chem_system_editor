<?php

use app\models\ChemicalElements;
use app\models\ChemicalReactions;
use app\models\Chemicals;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReactionReagents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reaction-reagents-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    $chemical_reactions = ChemicalReactions::find()->all();
    $chemical_reactions_items = ArrayHelper::map($chemical_reactions, 'id', 'result');
    $chemical_reactions_params = [
        'prompt' => 'Выберите химическую реакцию'
    ];
    ?>
    <?= $form->field($model, 'chemical_reactions_id')->dropDownList($chemical_reactions_items, $chemical_reactions_params) ?>
    <?php // echo $form->field($model, 'chemical_reactions_id')->textInput() ?>
    <?php
    $chemical_elements = ChemicalElements::find()->all();
    $chemical_elements_items = ArrayHelper::map($chemical_elements, 'id', 'symbol');
    $chemical_elements_params = [
        'prompt' => 'Выберите химический элемент'
    ];
    ?>
    <?= $form->field($model, 'chemical_elements_id')->dropDownList($chemical_elements_items, $chemical_elements_params) ?>
    <?php // echo $form->field($model, 'chemical_elements_id')->textInput() ?>

    <?= $form->field($model, 'element_count')->textInput() ?>
    <?php
    $chemicals = Chemicals::find()->all();
    $chemicals_items = ArrayHelper::map($chemicals, 'id', 'chemical_formula');
    $chemicals_params = [
        //'prompt' => 'Выберите химическое вещество'
    ];
    ?>
    <?//= $form->field($model, 'chemicals_id')->dropDownList($chemicals_items, $chemicals_params) ?>

    <?php // $form->field($model, 'chemicals_id')->textInput() ?>

    <?//= $form->field($model, 'chemical_count')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('translate', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
