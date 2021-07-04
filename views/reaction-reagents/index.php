<?php

use yii\grid\SerialColumn;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReactionReagentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('translate', 'Reaction Reagents');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reaction-reagents-index">

    <p>
        <?= Html::a(Yii::t('translate', 'Create Reaction Reagents'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            //'id',
//            'chemical_reactions_id',
            [
                'attribute' => 'chemical_reactions_id',
                'value' => 'chemicalReactions.result'
            ],
//            'chemical_elements_id',
            [
                'attribute' => 'chemicalElements.symbol',
                'value' => 'chemicalElements.symbol'
            ],
            [
                'attribute' => 'chemicalElements.oxidation',
                'value' => 'chemicalElements.oxidation'
            ],
            'element_count',
//            [
//                'attribute' => 'chemicals.chemical_formula',
//                'value' => 'chemicals.chemical_formula'
//            ],
////            'chemicals_id',
//            'chemical_count',
            ['class' => ActionColumn::class],
        ],
    ]); ?>


</div>
