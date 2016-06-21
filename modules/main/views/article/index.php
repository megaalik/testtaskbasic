<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use app\modules\admin\rbac\Rbac as AdminRbac;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Yii::$app->user->can(AdminRbac::PERMISSION_ADMIN_PANEL) ?
        Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) : false

    ?>
    </p>

    <div class="list-group">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'list-group-item', 'tag' => 'div',],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]).'<br>'. $model->created_at.'<br>'. $model->anons;
        },

        'summary' => 'Показано {count} из {totalCount}',
        'pager' => [
            'firstPageLabel' => 'Первая',
            'lastPageLabel' => 'Последняя',
            'prevPageLabel' => '<span class="glyphicon glyphicon-chevron-left"></span>',
            'nextPageLabel' => '<span class="glyphicon glyphicon-chevron-right"></span>',
            'maxButtonCount' => 5,
        ],
    ]); ?>
    </div>

</div>
