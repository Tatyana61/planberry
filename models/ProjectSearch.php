<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Project;

/**
 * ProjectSearch represents the model behind the search form of `app\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project', 'id_user'], 'integer'],
            [['pr_name', 'pr_type', 'pr_sratus', 'pr_desc', 'pr_update'], 'safe'],
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
        $query = Project::find();

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
            'id_project' => $this->id_project,
            'id_user' => $this->id_user,
            'pr_update' => $this->pr_update,
        ]);

        $query->andFilterWhere(['like', 'pr_name', $this->pr_name])
            ->andFilterWhere(['like', 'pr_type', $this->pr_type])
            ->andFilterWhere(['like', 'pr_sratus', $this->pr_sratus])
            ->andFilterWhere(['like', 'pr_desc', $this->pr_desc]);

        return $dataProvider;
    }
}
