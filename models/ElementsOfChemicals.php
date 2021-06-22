<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "elements_of_chemicals".
 *
 * @property int $id
 * @property int $chemicals_id
 * @property int $chemical_elements_id
 *
 * @property ChemicalElements $chemicalElements
 * @property Chemicals $chemicals
 */
class ElementsOfChemicals extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'elements_of_chemicals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chemicals_id', 'chemical_elements_id'], 'required'],
            [['chemicals_id', 'chemical_elements_id'], 'integer'],
            [['chemical_elements_id'], 'exist', 'skipOnError' => true, 'targetClass' => ChemicalElements::className(), 'targetAttribute' => ['chemical_elements_id' => 'id']],
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
            'chemicals_id' => Yii::t('translate', 'Chemicals ID'),
            'chemical_elements_id' => Yii::t('translate', 'Chemical Elements ID'),
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
     * Gets query for [[Chemicals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChemicals()
    {
        return $this->hasOne(Chemicals::className(), ['id' => 'chemicals_id']);
    }
}
