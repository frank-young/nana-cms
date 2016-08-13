<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Inquiry;

/**
 * InquirySearch represents the model behind the search form about `common\models\Inquiry`.
 */
class InquirySearch extends Inquiry
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'phone', 'pubtime', 'status'], 'integer'],
            [['name', 'subject', 'description', 'email', 'country', 'address', 'ip', 'facebook', 'twitter', 'sns', 'url', 'page'], 'safe'],
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
        $query = Inquiry::find()->orderBy('id DESC');

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
            'phone' => $this->phone,
            'pubtime' => $this->pubtime,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'facebook', $this->facebook])
            ->andFilterWhere(['like', 'twitter', $this->twitter])
            ->andFilterWhere(['like', 'sns', $this->sns])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'page', $this->page]);

        return $dataProvider;
    }
}
