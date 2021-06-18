<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ElementsOfChemicals;

/**
 * ElementsOfChemicalsSearch represents the model behind the search form of `app\models\ElementsOfChemicals`.
 */
class ElementsOfChemicalsSearch extends ElementsOfChemicals
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'chemicals_id', 'chemical_elements_id'], 'integer'],
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
        $query = ElementsOfChemicals::find();

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
            'chemicals_id' => $this->chemicals_id,
            'chemical_elements_id' => $this->chemical_elements_id,
        ]);

        return $dataProvider;
    }
}
