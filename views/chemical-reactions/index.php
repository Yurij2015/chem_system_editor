<?php

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
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'result',
            'reaction_type',
            'chemicals_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
