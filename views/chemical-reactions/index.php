<?php

use app\models\ChemicalElements;
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

            'id',
            'result',
            'reaction_type',
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
                'value' => static function ($model, $key, $index) {
                    $res = [];
                    foreach ($model->reactionReagents as $k => $l) {
                        $chemical_elements = ChemicalElements::find()->where(['id' => $l->chemical_elements_id])->all();
                        $chemical_count = ReactionReagents::find()->where(['chemical_elements_id' => $l->chemical_elements_id])->all();
                        $oxidation = $chemical_elements[0]['oxidation'];
                        $count = $chemical_count[0]['element_count'];
//                        $res .= Html::tag('div', $l->chemical_elements_id);
//                        $res .= $chemical_elements[0]['oxidation'];
//                        $res .= "<span style='color: red'>" . $chemical_count[0]['element_count'] . "</span>";
//                        $res .= $chemical_elements[0]['symbol'];
//                        $res .= $chemical_elements[0]['latin_name'];
//                        $res .= ($oxidation * $count);
                        $res[] = $oxidation * $count;
                    }
                    print_r((array)$res);
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
