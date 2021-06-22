<?php

use yii\grid\SerialColumn;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChemicalReactionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('translate', 'Chemical Reactions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chemical-reactions-index">

    <p>
        <?= Html::a(Yii::t('translate', 'Create Chemical Reactions'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            'id',
            'result',
            'reaction_type',
            [
                'attribute' => 'chemicals_id',
                'value' => 'chemicals.substance_name'
            ],
//            'chemicals.substance_name',

            ['class' => ActionColumn::class],
        ],
    ]); ?>


</div>
