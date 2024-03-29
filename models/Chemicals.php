<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "chemicals".
 *
 * @property int $id
 * @property string|null $substance_name
 * @property string|null $chemical_formula
 * @property string|null $mass
 * @property int|null $molecular_weight
 *
 * @property ChemicalReactions[] $chemicalReactions
 * @property ElementsOfChemicals[] $elementsOfChemicals
 * @property ReactionReagents[] $reactionReagents
 * @property string $molformat
 */
class Chemicals extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chemicals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['substance_name', 'chemical_formula'], 'unique',
                'when' => function ($model, $attribute) {
                    return $model->{$attribute} !== $model->getOldAttribute($attribute);
                },
            ],
            [['substance_name', 'chemical_formula'], 'required'],
            [['molecular_weight'], 'integer'],
            [['substance_name'], 'string', 'max' => 155],
            [['chemical_formula'], 'string', 'max' => 250],
            [['mass'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('translate', 'ID'),
            'substance_name' => Yii::t('translate', 'Substance Name'),
            'chemical_formula' => Yii::t('translate', 'Chemical Formula'),
            'mass' => Yii::t('translate', 'Mass'),
            'molecular_weight' => Yii::t('translate', 'Molecular Weight'),
        ];
    }

    /**
     * Gets query for [[ChemicalReactions]].
     *
     * @return ActiveQuery
     */
    public function getChemicalReactions()
    {
        return $this->hasMany(ChemicalReactions::className(), ['chemicals_id' => 'id']);
    }

    /**
     * Gets query for [[ElementsOfChemicals]].
     *
     * @return ActiveQuery
     */
    public function getElementsOfChemicals()
    {
        return $this->hasMany(ElementsOfChemicals::className(), ['chemicals_id' => 'id']);
    }

    /**
     * Gets query for [[ReactionReagents]].
     *
     * @return ActiveQuery
     */
    public function getReactionReagents()
    {
        return $this->hasMany(ReactionReagents::className(), ['chemicals_id' => 'id']);
    }

}
