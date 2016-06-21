<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\Module;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Notification */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'ADMIN_NOTIFICATIONS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notification-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('module', 'ADMIN_NOTIFICATIONS_EDIT'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('module', 'ADMIN_NOTIFICATIONS_DELETE'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('module', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'event_code',
            'from',
            'to',
            'subject:ntext',
            'text:ntext',
            'event_type:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
