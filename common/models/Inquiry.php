<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%inquiry}}".
 *
 * @property string $id
 * @property string $name
 * @property string $subject
 * @property string $description
 * @property string $email
 * @property integer $phone
 * @property string $country
 * @property string $address
 * @property string $ip
 * @property integer $pubtime
 * @property string $facebook
 * @property string $twitter
 * @property string $sns
 * @property string $url
 * @property string $page
 * @property integer $status
 */
class Inquiry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%inquiry}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'email'], 'required'],
            [['description'], 'string'],
            [['phone', 'pubtime', 'status'], 'integer'],
            [['name', 'email', 'country', 'page'], 'string', 'max' => 50],
            [['subject', 'url'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 100],
            [['ip'], 'string', 'max' => 16],
            [['facebook', 'twitter', 'sns'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'subject' => '主题',
            'description' => '详情',
            'email' => '邮箱',
            'phone' => '手机',
            'country' => '国家',
            'address' => '详细地址',
            'ip' => 'Ip',
            'pubtime' => 'Pubtime',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'sns' => 'Sns',
            'url' => 'Url',
            'page' => 'Page',
            'status' => 'Status',
        ];
    }
}
