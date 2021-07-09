<?php

use yii\grid\SerialColumn;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChemicalElementsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('translate', 'Chemical Elements');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chemical-elements-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

//            'id',
            'items_name',
            'symbol',
            'latin_name',
            'ram',
            //'oxidation',
            //'group_number',
            //'period_number',
            //'subgroup',

            [
                'class' => ActionColumn::class,
                'template' => '{view}',
            ],
        ],
    ]) ?>


</div>
