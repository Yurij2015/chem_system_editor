<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Chemicals */

$this->title = Yii::t('translate', 'Create Chemicals');
$this->params['breadcrumbs'][] = ['label' => Yii::t('translate', 'Chemicals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chemicals-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
