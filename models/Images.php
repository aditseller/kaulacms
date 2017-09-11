<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id_image
 * @property string $image
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_image', 'image'], 'required'],
            [['id_image'], 'integer'],
            [['image'], 'string', 'max' => 500],
            [['image'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_image' => 'Id Image',
            'image' => 'Image',
        ];
    }
}
