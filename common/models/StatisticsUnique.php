<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%statistics_unique}}".
 *
 * @property string $id
 * @property string $ip
 * @property string $url
 * @property string $language
 * @property string $country
 * @property string $province
 * @property string $city
 * @property string $title
 * @property string $device
 * @property integer $time
 * @property string $count
 */
class StatisticsUnique extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%statistics_unique}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['ip','unique'],
            [['count'], 'integer'],
            [['ip'], 'string', 'max' => 16],
            [['language', 'country', 'province', 'city', 'device'], 'string', 'max' => 50],
            [['time', 'count'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip地址',
            'url' => 'Url',
            'language' => '语言',
            'country' => '国家',
            'province' => '省份',
            'city' => '城市',
            'title' => '标题',
            'device' => '浏览设备',
            'time' => 'Time',
            'count' => 'Count',
        ];
    }
}
