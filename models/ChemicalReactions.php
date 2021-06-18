<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chemical_reactions".
 *
 * @property int $id
 * @property string|null $result
 * @property string|null $reaction_type
 * @property int $chemicals_id
 *
 * @property Chemicals $chemicals
 * @property ReactionReagents[] $reactionReagents
 */
class ChemicalReactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chemical_reactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chemicals_id'], 'required'],
            [['chemicals_id'], 'integer'],
            [['result'], 'string', 'max' => 200],
            [['reaction_type'], 'string', 'max' => 45],
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
            'result' => Yii::t('translate', 'Result'),
            'reaction_type' => Yii::t('translate', 'Reaction Type'),
            'chemicals_id' => Yii::t('translate', 'Chemicals ID'),
            'chemicals' => Yii::t('translate', 'Chemicals')
        ];
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

    /**
     * Gets query for [[ReactionReagents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReactionReagents()
    {
        return $this->hasMany(ReactionReagents::className(), ['chemical_reactions_id' => 'id']);
    }
}
