<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $tags
 * @property string $date
 * @property string $views
 * @property string $status
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'content'], 'required'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['views', 'status'], 'integer'],
            [['title'], 'string', 'max' => 55],
            [['description'], 'string', 'max' => 255],
            [['tags'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'description' => '描述',
            'content' => '内容',
            'tags' => '标签',
            'date' => '日期',
            'views' => '浏览人数',
            'status' => '状态',
        ];
    }
}
