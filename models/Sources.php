<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sources".
 *
 * @property integer $id_source
 * @property string $source
 *
 * @property Read[] $reads
 */
class Sources extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sources';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['source'], 'required'],
            [['source'], 'string', 'max' => 100],
            [['source'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_source' => 'Id Source',
            'source' => 'Source',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReads()
    {
        return $this->hasMany(Read::className(), ['source' => 'source']);
    }
}
