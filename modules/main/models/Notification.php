<?php

namespace app\modules\main\models;

use app\modules\user\models\backend\User;
use Yii;
use app\modules\admin\Module;

/**
 * This is the model class for table "notification".
 *
 * @property integer $id
 * @property string $name
 * @property string $event_code
 * @property string $from
 * @property string $to
 * @property string $subject
 * @property string $text
 * @property string $event_type
 * @property string $created_at
 * @property string $updated_at
 * @property integer $is_read
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'event_code', 'from', 'to', 'subject', 'text', 'event_type', 'created_at'], 'required'],
            [['subject', 'text'], 'string'],
            [['created_at', 'updated_at', 'event_type'], 'safe'],
            [['is_read'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['event_code'], 'string', 'max' => 100],
            [['from', 'to'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('module', 'ID'),
            'name' => Module::t('module', 'NOTIFICATION_NAME'),
            'event_code' => Module::t('module', 'NOTIFICATION_EVENT_CODE'),
            'from' => Module::t('module', 'NOTIFICATION_FROM'),
            'to' => Module::t('module', 'NOTIFICATION_TO'),
            'subject' => Module::t('module', 'NOTIFICATION_SUBJECT'),
            'text' => Module::t('module', 'NOTIFICATION_TEXT'),
            'event_type' => Module::t('module', 'NOTIFICATION_EVENT_TYPE'),
            'created_at' => Module::t('module', 'Created At'),
            'updated_at' => Module::t('module', 'Updated At'),
            'is_read' => Module::t('module', 'Is Read'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            $this->event_type = serialize($this->event_type);
            return true;
        }
        return false;
    }

    public function afterFind()
    {
        parent::afterFind();
        $arr = unserialize($this->event_type);
        if(is_array($arr)){
            $this->event_type = implode(", ", $arr);
        }else{
            $this->event_type = $arr;
        }


        //$users = User::findOne($this->from);
        //var_dump($users);die;
        //$this->from = $users->username;

       // print_r($this->event_type);die;
    }
}
