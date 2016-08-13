<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%products}}".
 *
 * @property string $id
 * @property string $name
 * @property string $model
 * @property string $cId
 * @property string $description
 * @property string $content
 * @property string $carton
 * @property string $quantity
 * @property string $weight
 * @property integer $putTime
 * @property string $img_path
 * @property string $file
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%products}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'model', 'cId', 'description', 'content'], 'required'],
            [['cId', 'putTime'], 'integer'],
            [['content'], 'string'],
            [['name', 'model', 'img_path'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 255],
            [['carton'], 'string', 'max' => 50],
            [['quantity', 'weight'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            // 'id' => 'id',
            'name' => '产品名称',
            'model' => '产品型号',
            'cId' => '产品分类',
            'description' => '产品描述',
            'content' => '产品内容',
            'carton' => '产品包装',
            'quantity' => '每箱重量',
            'weight' => '每箱净重',
            // 'putTime' => 'Put Time',
            // 'img_path' => '图片路径',
            // 'file' => 'File',
        ];
    }

}
