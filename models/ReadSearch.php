<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Read;

/**
 * ReadSearch represents the model behind the search form about `app\models\Read`.
 */
class ReadSearch extends Read
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_read', 'created_by', 'channel', 'source'], 'integer'],
            [['title', 'teaser', 'content', 'created_at', 'tag'], 'safe'],
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
        $query = Read::find();

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
            'id_read' => $this->id_read,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'channel' => $this->channel,
            'source' => $this->source,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'teaser', $this->teaser])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'tag', $this->tag]);

        return $dataProvider;
    }
}
