<?php

use app\modules\user\Module;

/* @var $this yii\web\View */
/* @var $user app\modules\user\models\User */

?>

<?= Module::t('module', 'HELLO {username}', ['username' => $user->username]); ?>

<?= Module::t('module', 'SUCCESS_REGISTRATION_EMAIL') ?>
