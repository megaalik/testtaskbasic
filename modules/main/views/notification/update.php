<?php

use yii\helpers\Html;
use app\modules\admin\Module;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Notification */

$this->title = Module::t('module', 'ADMIN_NOTIFICATIONS')  . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'ADMIN_NOTIFICATIONS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('module', 'ADMIN_NOTIFICATIONS_EDIT');
?>
<div class="notification-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
