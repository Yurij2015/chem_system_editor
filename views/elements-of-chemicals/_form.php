<?php

use app\models\ChemicalElements;
use app\models\Chemicals;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ElementsOfChemicals */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="elements-of-chemicals-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $chemicals = Chemicals::find()->all();
    $chemicals_items = ArrayHelper::map($chemicals, 'id', 'chemical_formula');
    $chemicals_params = [
        'prompt' => 'Выберите химическое вещество'
    ];
    ?>
    <?= $form->field($model, 'chemicals_id')->dropDownList($chemicals_items, $chemicals_params) ?>


    <?php // echo $form->field($model, 'chemicals_id')->textInput() ?>

    <?php
    $chemical_elements = ChemicalElements::find()->all();
    $chemical_elements_items = ArrayHelper::map($chemical_elements, 'id', 'symbol');
    $chemical_elements_params = [
        'prompt' => 'Выберите химический элемент'
    ];
    ?>
    <?= $form->field($model, 'chemical_elements_id')->dropDownList($chemical_elements_items, $chemical_elements_params) ?>

    <?php // echo $form->field($model, 'chemical_elements_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('translate', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
