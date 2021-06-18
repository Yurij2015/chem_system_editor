<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ElementsOfChemicalsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="elements-of-chemicals-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'chemicals_id') ?>

    <?= $form->field($model, 'chemical_elements_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('translate', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('translate', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
