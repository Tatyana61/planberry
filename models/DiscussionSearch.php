<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Discussion;

/**
 * DiscussionSearch represents the model behind the search form of `app\models\Discussion`.
 */
class DiscussionSearch extends Discussion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_disc', 'id_project', 'id_user'], 'integer'],
            [['disc_name', 'discription'], 'safe'],
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
        $query = Discussion::find();

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
            'id_disc' => $this->id_disc,
            'id_project' => $this->id_project,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'disc_name', $this->disc_name])
            ->andFilterWhere(['like', 'discription', $this->discription]);

        return $dataProvider;
    }
}
