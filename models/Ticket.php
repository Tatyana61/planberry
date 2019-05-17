<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property int $id_tickets
 * @property int $id_project
 * @property int $id_user
 * @property string $id_status
 * @property string $type
 * @property string $subject
 * @property string $ticket_desc
 *
 * @property TeamProject $project
 * @property TeamProject $user
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project', 'id_user', 'subject'], 'required'],
            [['id_project', 'id_user'], 'integer'],
            [['id_status', 'type', 'subject', 'ticket_desc'], 'string'],
            [['id_project'], 'exist', 'skipOnError' => true, 'targetClass' => TeamProject::className(), 'targetAttribute' => ['id_project' => 'id_project']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => TeamProject::className(), 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tickets' => 'Id тикета',
            'id_project' => 'Id проекта',
            'id_user' => 'Id пользователя',
            'id_status' => 'Статус',
            'type' => 'Тип',
            'subject' => 'Наименование тикета',
            'ticket_desc' => 'Описание тикета',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(TeamProject::className(), ['id_project' => 'id_project']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(TeamProject::className(), ['id_user' => 'id_user']);
    }
}
