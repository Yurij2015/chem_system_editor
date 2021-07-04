<?php

use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ElementsOfChemicalsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('translate', 'Elements Of Chemicals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="elements-of-chemicals-index">

    <p>
        <?= Html::a(Yii::t('translate', 'Create Elements Of Chemicals'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            'id',
             [
                'attribute' => 'chemicals_id',
                'value' => 'chemicals.substance_name'
            ],
//            'chemicals.substance_name',
//            'chemicalElements.items_name',
            [
                'attribute' => 'chemicalElements.symbol',
                'value' => 'chemicalElements.symbol'
            ],
            [
                'attribute' => 'chemicalElements.items_name',
                'value' => 'chemicalElements.items_name'
            ],
            [
                'attribute' => 'chemicalElements.oxidation',
                'value' => 'chemicalElements.oxidation'
            ],
            ['class' => ActionColumn::class],
        ],
    ]); ?>


</div>
