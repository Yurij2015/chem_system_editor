<?php

use app\models\ChemicalElements;
use app\models\ElementsOfChemicals;
use app\models\ReactionReagents;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;
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

            //'id',
            'result',
            //'reaction_type',
            [
                'attribute' => 'chemicals_id',
                'value' => 'chemicals.substance_name'
            ],
//            [
//                'label' => 'Возможность реакции',
//                'value' => function ($model) {
//                    return implode(ArrayHelper::map($model->reactionReagents, 'id', 'chemical_elements_id'));
//                },
//            ],
            [
                'label' => 'Возможность реакции',
                'value' => static function ($model) {
                    $res = [];
                    foreach ($model->reactionReagents as $k => $l) {
                        $chemical_elements = ChemicalElements::find()->where(['id' => $l->chemical_elements_id])->all();
                        $element_count = ReactionReagents::find()->where(['id' => $l->id])->all();
//                        $chemical_count = ReactionReagents::find()->where(['chemicals_id' => $l->chemicals_id])->all();
//                        $chemical_elements_id = ElementsOfChemicals::find()->where(['chemicals_id' => $l->chemicals_id])->all();
//                        $chemical_elements_item = $chemical_elements_id[0]['chemical_elements_id'];
//                        $get_element_data = ChemicalElements::find()->where(['id' => $chemical_elements_item])->all();
//                        print_r($chemical_count[0]['element_count']);
//                        print_r($chemical_elements_id[0]['chemical_elements_id']);
//                        print_r($get_element_data['items_name']);
//                        print_r($chemical_count[0]['chemical_count']);
                        $oxidation = $chemical_elements[0]['oxidation'];
                        $count = $element_count[0]['element_count'];
//                        $res .= Html::tag('div', $l->chemical_elements_id);
                        $chemical_elements_oxidation = $chemical_elements[0]['oxidation'];
//                        $res .= "<span style='color: red'>" . $element_count[0]['element_count'] . "</span>";
                        $symbol = $chemical_elements[0]['symbol'];
//                        $res .= $chemical_elements[0]['latin_name'];
//                        $res .= ($oxidation * $count);
                        $res[] = $oxidation * $count;
//                        print_r($k . " kkk<br>");
//                        print_r($oxidation . " оксисл </br>");
//                        print_r($symbol . " cbv </br>");
//                        print_r($count . " количество</br>");
//                        print_r($oxidation * $count . " res</br>");

                    }
//                    echo "<pre>";
//                    print_r((array)$res);
//                    echo "</pre>";
                    $result = array_sum($res);
                    if ($result < 0 || $result > 0) {
                        $support = "<span style='color: red; font-size: 12px;'>Возможна ошибка в реакции, пересмотрите реагенты реакции!</span>";
                    } else {
                        $support = "<span style='color: blue; font-size: 12px;'>Реакция без ошибок!</span>";
                    }
                    return $result . " " . $support;
                },
                'format' => 'raw'
            ],

//            'chemicals.substance_name',

            ['class' => ActionColumn::class],
        ],
    ])
    ?>


</div>
