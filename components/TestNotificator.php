<?php

namespace app\components;


use app\modules\main\models\Article;
use app\modules\main\models\Notification;
use app\modules\user\models\User;
use yii\base\BootstrapInterface;
use yii\base\Event;
use Yii;
use yii\helpers\Html;

class TestNotificator implements BootstrapInterface
{
    public $mail_text = null;

    public function bootstrap($app)
    {
        Event::on(
            User::className(),
            User::EVENT_STATUS_CHANGE,
            [$this, 'userStatusChange']
        );

        Event::on(
            Article::className(),
            Article::EVENT_AFTER_INSERT,
            [$this, 'userNotifyNewArticle']
        );

        Event::on(
            Notification::className(),
            Notification::EVENT_AFTER_INSERT,
            [$this, 'userNotify']
        );
    }

    public function userStatusChange(Event $event)
    {
        $user = $event->sender;
        //\Yii::$app->session->setFlash('success', $user->username.$user->email);

        if ($user->status == User::STATUS_ACTIVE) {
            $subject = 'Success registration ';
            $text = '@app/modules/user/mails/emailUserRegistered';
        }
        elseif ($user->status == User::STATUS_BLOCKED) {
            $subject = 'Account blocked ';
            $text = '@app/modules/user/mails/emailUserBlocked';
            }
        \Yii::$app->mailer->compose(['text' => $text], ['user' => $user])
            ->setFrom([Yii::$app->params['supportEmail'] => \Yii::$app->name])
            ->setTo($user->email)
            ->setSubject($subject. \Yii::$app->name)
            ->send();
    }

    public function userNotifyNewArticle(Event $event)
    {
        $article = $event->sender;
        $users = User::find()->all();
        $articleLink = Yii::$app->urlManager->createAbsoluteUrl(['main/article/view', 'id' => $article->id]);
        \Yii::$app->session->setFlash('info', 'Уведомляем Вас о появлении новой статье на сайте: ' . Html::a($article->title,  $articleLink));


        foreach ($users as $user) {
            \Yii::$app->mailer->compose(['text' => '@app/modules/user/mails/emailNotifyNewArticle'], ['user' => $user, 'article' => $article])
                ->setFrom([Yii::$app->params['supportEmail'] => \Yii::$app->name])
                ->setTo($user->email)
                ->setSubject('New article added ' . \Yii::$app->name)
                ->send();
        }


    }

//    public function parseText($text, $paste_data){
//        foreach ($paste_data as $key => $value){
//            $text = str_replace("{".$key."}", $value, $text);
//        }
//        return $text;
//    }

    public function userNotify(Event $event)
    {
        /* @var $notification Notification */
        $notification = $event->sender;

        if ($notification->to=='toAll'){
            $users = User::find()->all();
        }else{
            $users = User::find()->where(['id' => $notification->to])->all();
        }

       //foreach ($users as $user)        {var_dump($user); } die;
        $email=false;
        $event_type=unserialize($notification->event_type);
        //print_r($event_type); die;
        foreach ($event_type as $key => $value) {
            if ($value=="email") { $email=true; }
        }


       // 'user_status_changed'=>'{site_name},{username},{login_page}',
        //    'new_article_added' => '{site_name},{username},{article_title},{article_anons},{article_link}'

        $subject = $notification->subject;

        if ($notification->event_code=="new_article_added") {
            $mail_text = '@app/modules/user/mails/emailNotifyNewArticle';
        }

        if ($notification->event_code=="user_sign_up") {
            $mail_text = '@app/modules/user/mails/emailUserRegistered';
        }

        if ($email) {
            foreach ($users as $user) {

//                $subject = $this->parseText($notification->subject,['username' => $user->username]);
//                $text = $this->parseText($notification->text,['username' => $user->username]);


                \Yii::$app->mailer->compose(['text' => $mail_text], ['user' => $user])
                    ->setFrom([Yii::$app->params['supportEmail'] => \Yii::$app->name])
                    ->setTo($user->email)
                    ->setSubject($subject. \Yii::$app->name)
                    ->send();
            }
        }



    }
    
    
}