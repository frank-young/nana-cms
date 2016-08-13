<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%statistics}}".
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
 * @property string $time
 * @property string $count
 */
class Statistics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%statistics}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['count'], 'integer'],
            [['ip'], 'string', 'max' => 16],
            [['url', 'title'], 'string', 'max' => 200],
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
            'ip' => 'Ip',
            'url' => 'Url',
            'language' => 'Language',
            'country' => 'Country',
            'province' => 'Province',
            'city' => 'City',
            'title' => 'Title',
            'device' => 'Device',
            'time' => 'Time',
            'count' => 'Count',
        ];
    }
}
