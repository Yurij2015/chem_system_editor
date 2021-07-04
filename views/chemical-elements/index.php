<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChemicalElementsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('translate', 'Chemical Elements');
$this->params['breadcrumbs'][] = $this->title;
?>

<p>
    <?= Html::a(Yii::t('translate', 'Create Chemical Elements'), ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?php //  echo $this->render('_search', ['model' => $searchModel]); ?>
<?php if (Yii::$app->session->hasFlash('cannotdelete')): ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('cannotdelete'); ?>
    </div>
<?php endif; ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        //'id',
        'items_name',
        'symbol',
        //'latin_name',
        'ram',
        'oxidation',
        //'group_number',
        //'period_number',
        //'subgroup',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>


</div>
