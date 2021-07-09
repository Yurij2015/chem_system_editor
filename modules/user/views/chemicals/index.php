<?php

use yii\grid\SerialColumn;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChemicalsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('translate', 'Chemicals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chemicals-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

//            'id',
            'substance_name',
            'chemical_formula',
            'mass',
            'molecular_weight',
            //'molformat:ntext',

            [
                'class' => ActionColumn::class,
                'template' => '{view}',
            ],
        ],
    ]); ?>


</div>
