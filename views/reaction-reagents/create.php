<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReactionReagents */

$this->title = Yii::t('translate', 'Create Reaction Reagents');
$this->params['breadcrumbs'][] = ['label' => Yii::t('translate', 'Reaction Reagents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reaction-reagents-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
