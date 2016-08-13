<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StatisticsUnique;

/**
 * StatisticsUniqueSearch represents the model behind the search form about `common\models\StatisticsUnique`.
 */
class StatisticsUniqueSearch extends StatisticsUnique
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'time', 'count'], 'integer'],
            [['ip', 'language', 'country', 'province', 'city', 'device'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = StatisticsUnique::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'time' => $this->time,
            'count' => $this->count,
        ]);

        $query->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'device', $this->device]);

        return $dataProvider;
    }
}
