<?php

namespace app\models;

use Yii;

date_default_timezone_set("Asia/Jakarta");

/**
 * This is the model class for table "read".
 *
 * @property integer $id_read
 * @property string $title
 * @property string $teaser
 * @property string $content
 * @property integer $created_by
 * @property string $created_at
 * @property integer $channel
 * @property string $tag
 * @property integer $source
 *
 * @property Users $createdBy
 * @property Channel $channel0
 * @property Sources $source0
 */
class Read extends \yii\db\ActiveRecord
{
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'read';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'teaser', 'content', 'channel', 'tag', 'source','image'], 'required'],
            [['content'], 'string'],
            [['created_by', 'channel', 'source'], 'string', 'max' => 100],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['teaser'], 'string', 'max' => 150],
            [['tag'], 'string', 'max' => 500],
            [['title'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'username']],
            [['channel'], 'exist', 'skipOnError' => true, 'targetClass' => Channel::className(), 'targetAttribute' => ['channel' => 'channel']],
            [['source'], 'exist', 'skipOnError' => true, 'targetClass' => Sources::className(), 'targetAttribute' => ['source' => 'source']],
			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_read' => 'Id Read',
            'title' => 'Title',
            'teaser' => 'Teaser',
            'content' => 'Content',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'channel' => 'Channel',
            'tag' => 'Tag',
            'source' => 'Source',
			'image' => 'Image URL',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Users::className(), ['username' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChannel0()
    {
        return $this->hasOne(Channel::className(), ['channel' => 'channel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource0()
    {
        return $this->hasOne(Sources::className(), ['source' => 'source']);
    }
	
	public function beforeSave($insert) {
		
        $this->created_at = date("Y-m-d H:i:s");
        $this->created_by = Yii::$app->user->identity->username;
        return parent::beforeSave($insert);
    }
}
