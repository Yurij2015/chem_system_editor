<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChemicalReactions */

$this->title = Yii::t('translate', 'Create Chemical Reactions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('translate', 'Chemical Reactions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chemical-reactions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
