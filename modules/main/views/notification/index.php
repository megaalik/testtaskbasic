<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\admin\Module;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('module', 'ADMIN_NOTIFICATIONS');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notification-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('module', 'ADMIN_NOTIFICATIONS_ADD'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'event_code',
            'from',
            'to',
            'subject',
            'event_type',
            'created_at',
            'is_read',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
