<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_level".
 *
 * @property integer $id_level
 * @property string $level
 *
 * @property Users[] $users
 */
class UserLevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level'], 'required'],
            [['level'], 'string', 'max' => 100],
            [['level'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_level' => 'Id Level',
            'level' => 'Level',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['level' => 'id_level']);
    }
}
