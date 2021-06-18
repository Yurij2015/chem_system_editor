<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ElementsOfChemicals */

$this->title = Yii::t('translate', 'Create Elements Of Chemicals');
$this->params['breadcrumbs'][] = ['label' => Yii::t('translate', 'Elements Of Chemicals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="elements-of-chemicals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
