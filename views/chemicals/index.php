<?php

use app\models\ChemicalElements;
use app\models\ElementsOfChemicals;
use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChemicalsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('translate', 'Chemicals');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="chemicals-index">

    <p>
        <?= Html::a(Yii::t('translate', 'Create Chemicals'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            //'id',
            'substance_name',
            'chemical_formula',
//            'mass',
            //'molecular_weight',
            [
                'label' => 'Проверка вещества',
                'value' => static function ($model) {
                    $res = 0;
                    foreach ($model->elementsOfChemicals as $k => $l) {
                        $chemical_elements = ChemicalElements::find()->where(['id' => $l->chemical_elements_id])->all();
                        $chemical_elements_oxidation = $chemical_elements[0]['oxidation'];
                        $res += $chemical_elements_oxidation;
                    }
                    if ($res < 0 || $res > 0) {
                        $support = "<span style='color: red; font-size: 12px;'>Возможна ошибка вещества, пересмотрите елементы формулы вещества!</span>";
                    } else {
                        $support = "<span style='color: blue; font-size: 12px;'>Вещество без ошибок!</span>";
                    }
                    return $res . " " . $support;
                },
                'format' => 'raw'
            ],
            ['class' => ActionColumn::class],
        ],
    ]) ?>
</div>
