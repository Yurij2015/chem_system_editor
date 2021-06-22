<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ChemicalReactions;

/**
 * ChemicalReactionsSearch represents the model behind the search form of `app\models\ChemicalReactions`.
 */
class ChemicalReactionsSearch extends ChemicalReactions
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'chemicals_id'], 'integer'],
            [['result', 'reaction_type'], 'safe'],
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
        $query = ChemicalReactions::find();

        $query->joinWith(['chemicals']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['chemicals'] = [
            'asc' => ['tbl_chemicals.substance_name' => SORT_ASC],
            'desc' => ['tbl_chemicals.substance_name' => SORT_DESC],
        ];

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
        ]);

        $query->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'reaction_type', $this->reaction_type])
            ->andFilterWhere(['like', 'tbl_chemicals.substance_name', $this->chemicals]);

        return $dataProvider;
    }
}
