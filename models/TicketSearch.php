<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ticket;

/**
 * TicketSearch represents the model behind the search form of `app\models\Ticket`.
 */
class TicketSearch extends Ticket
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tickets', 'id_project', 'id_user'], 'integer'],
            [['id_status', 'type', 'subject', 'ticket_desc'], 'safe'],
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
        $query = Ticket::find();

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
            'id_tickets' => $this->id_tickets,
            'id_project' => $this->id_project,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'id_status', $this->id_status])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'ticket_desc', $this->ticket_desc]);

        return $dataProvider;
    }
}
