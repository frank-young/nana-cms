<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%setting}}".
 *
 * @property string $id
 * @property string $google
 * @property string $seo
 * @property string $webtitle
 * @property string $copyright
 * @property string $webdesc
 * @property string $robots
 * @property string $admin_email
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%setting}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['google', 'seo', 'robots'], 'string'],
            [['webtitle', 'copyright', 'webdesc'], 'string', 'max' => 255],
            [['admin_email'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'google' => '谷歌分析代码',
            'seo' => 'SEO',
            'webtitle' => '网站名称',
            'copyright' => '版权信息',
            'webdesc' => '网站描述',
            'robots' => 'Robots文件',
            'admin_email' => '管理员邮箱',
        ];
    }
}
