<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChemicalElements */

$this->title = Yii::t('translate', 'Create Chemical Elements');
$this->params['breadcrumbs'][] = ['label' => Yii::t('translate', 'Chemical Elements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chemical-elements-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
