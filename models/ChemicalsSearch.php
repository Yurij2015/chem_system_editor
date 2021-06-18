<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Chemicals;

/**
 * ChemicalsSearch represents the model behind the search form of `app\models\Chemicals`.
 */
class ChemicalsSearch extends Chemicals
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'molecular_weight'], 'integer'],
            [['substance_name', 'chemical_formula', 'mass'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Chemicals::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'molecular_weight' => $this->molecular_weight,
        ]);

        $query->andFilterWhere(['like', 'substance_name', $this->substance_name])
            ->andFilterWhere(['like', 'chemical_formula', $this->chemical_formula])
            ->andFilterWhere(['like', 'mass', $this->mass]);

        return $dataProvider;
    }
}
