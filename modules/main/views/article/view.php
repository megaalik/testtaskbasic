<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\rbac\Rbac as AdminRbac;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Yii::$app->user->can(AdminRbac::PERMISSION_ADMIN_PANEL) ?
            Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) : false ?>
        <?= Yii::$app->user->can(AdminRbac::PERMISSION_ADMIN_PANEL) ?
            Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])  : false ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'anons:ntext',
            'content:ntext',
            'author_id',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
