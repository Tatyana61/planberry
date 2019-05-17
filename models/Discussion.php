<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "discussion".
 *
 * @property int $id_disc
 * @property int $id_project
 * @property int $id_user
 * @property string $disc_name
 * @property string $discription
 *
 * @property TeamProject $project
 * @property TeamProject $user
 */
class Discussion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discussion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project', 'id_user', 'disc_name'], 'required'],
            [['id_project', 'id_user'], 'integer'],
            [['disc_name', 'discription'], 'string'],
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
            'id_disc' => 'Id обсуждения',
            'id_project' => 'Id проекта',
            'id_user' => 'Id пользователя',
            'disc_name' => 'Наименование обсуждения',
            'discription' => 'Описание',
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
