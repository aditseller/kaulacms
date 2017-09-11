<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id_user
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property string $created_at
 * @property integer $level
 * @property string $status
 * @property string $authKey
 * @property string $accessToken
 *
 * @property Read[] $reads
 * @property UserLevel $level0
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'phone'], 'required'],
            [['created_at'], 'safe'],
            [['level'], 'integer'],
            [['status'], 'string'],
            [['username'], 'string', 'max' => 50],
            [['password', 'authKey', 'accessToken'], 'string', 'max' => 300],
            [['email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 20],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['phone'], 'unique'],
            [['level'], 'exist', 'skipOnError' => true, 'targetClass' => UserLevel::className(), 'targetAttribute' => ['level' => 'id_level']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'phone' => 'Phone',
            'created_at' => 'Created At',
            'level' => 'Level',
            'status' => 'Status',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReads()
    {
        return $this->hasMany(Read::className(), ['created_by' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel0()
    {
        return $this->hasOne(UserLevel::className(), ['id_level' => 'level']);
    }
	
	
	
    public function beforeSave($insert) {
        if(isset($this->password)) {
            
            $this->password = bin2hex($this->password);
            $this->authKey = sha1($this->email);
			$this->created_at = date('Y-m-d H:i:s');
			$this->level = 2;
			$this->status = 0;
        }
            return parent::beforeSave($insert);
    }
}
