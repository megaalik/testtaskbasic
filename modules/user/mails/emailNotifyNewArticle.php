<?php

use app\modules\user\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user app\modules\user\models\User */
$articleLink = Yii::$app->urlManager->createAbsoluteUrl(['main/article/view', 'id' => $article->id]);
$sitename = Yii::$app->name;
?>

<?= Module::t('module', 'HELLO {username}', ['username' => $user->username]); ?>

    <?= Html::encode($this->title) ?>

<?= "Уважаемый $user->username. На сайте $sitename добавлена новая статья " .  $article->title ?>
<?= $article->anons ?>
<?= Html::a('читать далее...',  $articleLink) ?>

