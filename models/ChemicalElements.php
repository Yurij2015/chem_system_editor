<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chemical_elements".
 *
 * @property int $id
 * @property string|null $items_name
 * @property string|null $symbol
 * @property string|null $latin_name
 * @property string|null $ram
 * @property int|null $oxidation
 * @property int|null $group_number
 * @property int|null $period_number
 * @property string|null $subgroup
 *
 * @property ElementsOfChemicals[] $elementsOfChemicals
 * @property ReactionReagents[] $reactionReagents
 */
class ChemicalElements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chemical_elements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['items_name', 'symbol', 'latin_name'], 'unique',
//                'targetClass' => 'app\models\ChemicalElements',
//                'message' => \Yii::t('translate', 'Комбинация атрибутов занята'),
                'when' => function ($model, $attribute) {
                    return $model->{$attribute} !== $model->getOldAttribute($attribute);
                },
            ],
//            [['items_name', 'symbol', 'latin_name'], 'unique'],
            [['oxidation', 'group_number', 'period_number'], 'integer'],
            [['items_name'], 'match', 'pattern' => '/^[А-Яа-я]/', 'message' => 'Недопустимый символ для поля'],
            [['symbol'], 'string', 'max' => 5],
            ['symbol', 'match', 'pattern' => '/^[A-Za-z]+$/', 'message' => 'Недопустимый символ для поля'],
            [['latin_name'], 'match', 'pattern' => '/^[A-Za-z]/', 'message' => 'Недопустимый символ для поля'],
            [['ram'], 'string', 'max' => 20],
            [['subgroup'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('translate', 'ID'),
            'items_name' => Yii::t('translate', 'Items Name'),
            'symbol' => Yii::t('translate', 'Symbol'),
            'latin_name' => Yii::t('translate', 'Latin Name'),
            'ram' => Yii::t('translate', 'Ram'),
            'oxidation' => Yii::t('translate', 'Oxidation'),
            'group_number' => Yii::t('translate', 'Group Number'),
            'period_number' => Yii::t('translate', 'Period Number'),
            'subgroup' => Yii::t('translate', 'Subgroup'),
        ];
    }

    /**
     * Gets query for [[ElementsOfChemicals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getElementsOfChemicals()
    {
        return $this->hasMany(ElementsOfChemicals::className(), ['chemical_elements_id' => 'id']);
    }

    /**
     * Gets query for [[ReactionReagents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReactionReagents()
    {
        return $this->hasMany(ReactionReagents::className(), ['chemical_elements_id' => 'id']);
    }
}
