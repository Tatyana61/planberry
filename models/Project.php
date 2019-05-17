<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id_project
 * @property int $id_user
 * @property string $pr_name
 * @property string $pr_type
 * @property string $pr_sratus
 * @property string $pr_desc
 * @property string $pr_update
 *
 * @property TeamProject[] $teamProjects
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'pr_name', 'pr_desc'], 'required'],
            [['id_user'], 'integer'],
            [['pr_name', 'pr_type', 'pr_sratus', 'pr_desc'], 'string'],
            [['pr_update'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_project' => 'Id проекта',
            'id_user' => 'Id пользователя',
            'pr_name' => 'Название проекта',
            'pr_type' => 'Тип проекта',
            'pr_sratus' => 'Статус проекта',
            'pr_desc' => 'Описание проекта',
            'pr_update' => 'Дата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
*/
    public function getTeamProjects()
    {
        return $this->hasMany(TeamProject::className(), ['id_project' => 'id_project']);
    }


    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id_user' => 'id_user'])
            ->viaTable('team_project', ['id_project' => 'id_project']);
    }


}
