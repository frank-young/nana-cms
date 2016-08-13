<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%cate}}".
 *
 * @property string $id
 * @property string $cName
 */
class Cate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cate}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cName'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cName' => 'C Name',
        ];
    }


}
