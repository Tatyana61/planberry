<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Task;

/**
 * TaskSearch represents the model behind the search form of `app\models\Task`.
 */
class TaskSearch extends Task
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_task', 'id_user', 'id_project'], 'integer'],
            [['task_name', 'priority', 'task_status', 'assigned_to', 'task_desc', 'start_date', 'create_date', 'finish_date'], 'safe'],
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
        $query = Task::find();

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
            'id_task' => $this->id_task,
            'id_user' => $this->id_user,
            'id_project' => $this->id_project,
            'start_date' => $this->start_date,
            'create_date' => $this->create_date,
            'finish_date' => $this->finish_date,
        ]);

        $query->andFilterWhere(['like', 'task_name', $this->task_name])
            ->andFilterWhere(['like', 'priority', $this->priority])
            ->andFilterWhere(['like', 'task_status', $this->task_status])
            ->andFilterWhere(['like', 'assigned_to', $this->assigned_to])
            ->andFilterWhere(['like', 'task_desc', $this->task_desc]);

        return $dataProvider;
    }
}
