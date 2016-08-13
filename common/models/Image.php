<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%image}}".
 *
 * @property string $id
 * @property string $pid
 * @property string $path
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%image}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            // [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'path' => 'Path',
        ];
    }


}
