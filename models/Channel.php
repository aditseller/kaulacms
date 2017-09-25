<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "channel".
 *
 * @property integer $id_channel
 * @property string $channel
 *
 * @property Read[] $reads
 */
class Channel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'channel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['channel'], 'required'],
            [['channel'], 'string', 'max' => 100],
            [['channel'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_channel' => 'Id Channel',
            'channel' => 'Channel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReads()
    {
        return $this->hasMany(Read::className(), ['channel' => 'channel']);
    }
}
