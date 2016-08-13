<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%carts}}".
 *
 * @property string $id
 * @property integer $product_id
 * @property string $name
 * @property integer $quantity
 * @property string $other
 * @property string $model
 * @property double $price
 * @property integer $time
 */
class Carts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%carts}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'name', 'quantity'], 'required'],
            [['product_id', 'quantity', 'time'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 100],
            [['other', 'model'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'name' => 'Name',
            'quantity' => 'Quantity',
            'other' => 'Other',
            'model' => 'Model',
            'price' => 'Price',
            'time' => 'Time',
        ];
    }
}
