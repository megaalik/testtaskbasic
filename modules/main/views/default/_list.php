<div id="<?= $model->id ?>" class="alert <?= $model->is_read ? 'alert-success' : 'alert-warning' ?>">
    <div><strong><?= $model->name ?></strong></div>
    <div><?= $model->created_at.' | От кого: '.$model->from ?></div>
    <p class="list-group-item-text"><?= $model->text ?></p>
    <div>
        <?= $model->is_read ? '<button class="btn-xs btn-success">Прочитано</button>' :
            '<a href='.Yii::$app->urlManager->createAbsoluteUrl(['main/notification/read', 'id' => $model->id]).'
                <button class="btn-xs btn-success">Прочитано</button></a>' ?>
    </div>

</div>