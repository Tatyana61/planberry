<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "team_project".
 *
 * @property int $id_user
 * @property int $id_project
 *
 * @property Comments[] $comments
 * @property Discussion[] $discussions
 * @property Discussion[] $discussions0
 * @property Task[] $tasks
 * @property Task[] $tasks0
 * @property Project $project
 * @property User $user
 * @property Ticket[] $tickets
 * @property Ticket[] $tickets0
 */
class TeamProject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team_project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_project'], 'integer'],
            [['id_project'], 'unique'],
            [['id_user'], 'unique'],
            [['id_project'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['id_project' => 'id_project']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id пользователя',
            'id_project' => 'Id проекта',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['user_id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscussions()
    {
        return $this->hasMany(Discussion::className(), ['id_project' => 'id_project']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscussions0()
    {
        return $this->hasMany(Discussion::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['id_project' => 'id_project']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks0()
    {
        return $this->hasMany(Task::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id_project' => 'id_project']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['id_project' => 'id_project']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets0()
    {
        return $this->hasMany(Ticket::className(), ['id_user' => 'id_user']);
    }
}
