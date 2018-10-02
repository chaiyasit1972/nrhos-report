<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Nureport;

/**
 * NureportSearch represents the model behind the search form about `backend\models\Nureport`.
 */
class NureportSearch extends Nureport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['station', 'rname', 'rcontroller', 'rdate', 'status','ext'], 'safe'],
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
        $query = Nureport::find();

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
            'rdate' => $this->rdate,
        ]);

        $query->andFilterWhere(['like', 'station', $this->station])
            ->andFilterWhere(['like', 'rname', $this->rname])
            ->andFilterWhere(['like', 'rcontroller', $this->rcontroller])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'ext', $this->ext])                
            ->orderBy('id DESC')    ;

        return $dataProvider;
    }
}
