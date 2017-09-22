<?php

namespace app\models;

use Yii;

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
            [['title', 'teaser', 'content', 'created_by', 'created_at', 'channel', 'tag', 'source','image'], 'required'],
            [['content'], 'string'],
            [['created_by', 'channel', 'source'], 'integer'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['teaser'], 'string', 'max' => 150],
            [['tag'], 'string', 'max' => 500],
            [['title'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'id_user']],
            [['channel'], 'exist', 'skipOnError' => true, 'targetClass' => Channel::className(), 'targetAttribute' => ['channel' => 'id_channel']],
            [['source'], 'exist', 'skipOnError' => true, 'targetClass' => Sources::className(), 'targetAttribute' => ['source' => 'id_source']],
			
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
        return $this->hasOne(Users::className(), ['id_user' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChannel0()
    {
        return $this->hasOne(Channel::className(), ['id_channel' => 'channel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource0()
    {
        return $this->hasOne(Sources::className(), ['id_source' => 'source']);
    }
}
