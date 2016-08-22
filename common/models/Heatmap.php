<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%heatmap}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property integer $time
 * @property string $point
 * @property integer $width
 * @property integer $height
 * @property string $ip
 */
class Heatmap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%heatmap}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time', 'width', 'height'], 'integer'],
            [['point'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '网页标题',
            'url' => '网页url',
            'time' => '时间',
            'point' => '点位',
            'width' => '屏幕宽度',
            'height' => '屏幕高度',
            'ip' => 'ip地址',
        ];
    }
}
