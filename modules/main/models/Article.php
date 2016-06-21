<?php

namespace app\modules\main\models;

use Yii;
use app\modules\admin\Module;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $anons
 * @property string $content
 * @property integer $author_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'anons', 'content', 'author_id', 'status', 'created_at'], 'required'],
            [['anons', 'content'], 'string'],
            [['author_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 200],
            [['status'], 'string', 'max' => 20],
            [['title'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('module', 'ID'),
            'title' => Module::t('module', 'ARTICLE_TITLE'),
            'anons' => Module::t('module', 'ARTICLE_ANONS'),
            'content' => Module::t('module', 'ARTICLE_CONTENT'),
            'author_id' => Module::t('module', 'ARTICLE_AUTHOR'),
            'status' => Module::t('module', 'ARTICLE_STATUS'),
            'created_at' => Module::t('module', 'Created At'),
            'updated_at' => Module::t('module', 'Updated At'),
        ];
    }
}
