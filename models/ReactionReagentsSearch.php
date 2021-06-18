<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ReactionReagents;

/**
 * ReactionReagentsSearch represents the model behind the search form of `app\models\ReactionReagents`.
 */
class ReactionReagentsSearch extends ReactionReagents
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'chemical_reactions_id', 'chemical_elements_id', 'chemicals_id'], 'integer'],
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
        $query = ReactionReagents::find();

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
            'chemical_reactions_id' => $this->chemical_reactions_id,
            'chemical_elements_id' => $this->chemical_elements_id,
            'chemicals_id' => $this->chemicals_id,
        ]);

        return $dataProvider;
    }
}
