<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ReactionReagents */

$this->title = $model->chemicalReactions->result;
$this->params['breadcrumbs'][] = ['label' => Yii::t('translate', 'Reaction Reagents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reaction-reagents-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'chemical_reactions_id',
//            'chemical_elements_id',
//            'chemicals_id',
//            'chemical_count',
//            'element_count',
            'chemicalReactions.result',
            'chemicalElements.symbol',
            'element_count',
        ],
    ]) ?>

</div>
