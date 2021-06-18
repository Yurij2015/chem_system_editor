<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reaction_reagents".
 *
 * @property int $id
 * @property int $chemical_reactions_id
 * @property int $chemical_elements_id
 * @property int $chemicals_id
 *
 * @property ChemicalElements $chemicalElements
 * @property ChemicalReactions $chemicalReactions
 * @property Chemicals $chemicals
 */
class ReactionReagents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reaction_reagents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chemical_reactions_id', 'chemical_elements_id', 'chemicals_id'], 'required'],
            [['chemical_reactions_id', 'chemical_elements_id', 'chemicals_id'], 'integer'],
            [['chemical_elements_id'], 'exist', 'skipOnError' => true, 'targetClass' => ChemicalElements::className(), 'targetAttribute' => ['chemical_elements_id' => 'id']],
            [['chemical_reactions_id'], 'exist', 'skipOnError' => true, 'targetClass' => ChemicalReactions::className(), 'targetAttribute' => ['chemical_reactions_id' => 'id']],
            [['chemicals_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chemicals::className(), 'targetAttribute' => ['chemicals_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('translate', 'ID'),
            'chemical_reactions_id' => Yii::t('translate', 'Chemical Reactions ID'),
            'chemical_elements_id' => Yii::t('translate', 'Chemical Elements ID'),
            'chemicals_id' => Yii::t('translate', 'Chemicals ID'),
        ];
    }

    /**
     * Gets query for [[ChemicalElements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChemicalElements()
    {
        return $this->hasOne(ChemicalElements::className(), ['id' => 'chemical_elements_id']);
    }

    /**
     * Gets query for [[ChemicalReactions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChemicalReactions()
    {
        return $this->hasOne(ChemicalReactions::className(), ['id' => 'chemical_reactions_id']);
    }

    /**
     * Gets query for [[Chemicals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChemicals()
    {
        return $this->hasOne(Chemicals::className(), ['id' => 'chemicals_id']);
    }
}
