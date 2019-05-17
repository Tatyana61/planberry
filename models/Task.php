<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id_task
 * @property int $id_user
 * @property int $id_project
 * @property string $task_name
 * @property string $priority
 * @property string $task_status
 * @property string $assigned_to
 * @property string $task_desc
 * @property string $start_date
 * @property string $create_date
 * @property string $finish_date
 *
 * @property TeamProject $project
 * @property TeamProject $user
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_project', 'task_name', 'assigned_to', 'task_desc'], 'required'],
            [['id_user', 'id_project'], 'integer'],
            [['task_name', 'priority', 'task_status', 'assigned_to', 'task_desc'], 'string'],
            [['start_date', 'create_date', 'finish_date'], 'safe'],
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
            'id_task' => 'Id задачи',
            'id_user' => 'Id пользователя',
            'id_project' => 'Id проекта',
            'task_name' => 'Задача',
            'priority' => 'Приоритет',
            'task_status' => 'Статус',
            'assigned_to' => 'Кому',
            'task_desc' => 'Описание задачи',
            'start_date' => 'Начало выполнения',
            'create_date' => 'Создана',
            'finish_date' => 'Время окончания',
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
