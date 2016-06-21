<?php
use yii\widgets\ListView;
use yii\widgets\Pjax;



/* @var $this yii\web\View */
$this->title = Yii::$app->name;

?>

<div class="main-default-index">

    <div class="body-content">

        <?php Pjax::begin(); ?>
        <?= ListView::widget([
            'dataProvider' => $listDataProvider,
            'itemView' => '_list',

            'summary' => 'Показано {count} из {totalCount}',
            'pager' => [
                'firstPageLabel' => 'Первая',
                'lastPageLabel' => 'Последняя',
                'prevPageLabel' => '<span class="glyphicon glyphicon-chevron-left"></span>',
                'nextPageLabel' => '<span class="glyphicon glyphicon-chevron-right"></span>',
                'maxButtonCount' => 5,
            ],
        ]); ?>
        <?php Pjax::end(); ?>

    </div>
</div>
