<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ChemicalElements;

/**
 * ChemicalElementsSearch represents the model behind the search form of `app\models\ChemicalElements`.
 */
class ChemicalElementsSearch extends ChemicalElements
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'oxidation', 'group_number', 'period_number'], 'integer'],
            [['items_name', 'symbol', 'latin_name', 'ram', 'subgroup'], 'safe'],
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
        $query = ChemicalElements::find();

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
            'oxidation' => $this->oxidation,
            'group_number' => $this->group_number,
            'period_number' => $this->period_number,
        ]);

        $query->andFilterWhere(['like', 'items_name', $this->items_name])
            ->andFilterWhere(['like', 'symbol', $this->symbol])
            ->andFilterWhere(['like', 'latin_name', $this->latin_name])
            ->andFilterWhere(['like', 'ram', $this->ram])
            ->andFilterWhere(['like', 'subgroup', $this->subgroup]);

        return $dataProvider;
    }
}
