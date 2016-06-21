<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\Module;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Notification */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notification-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal'],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_code')->dropDownList([
        'user_sign_up' => 'Регистрация пользователя',
        'new_article_added' => 'Появление новой статьи'
    ], ['onchange' => 'notification_form.on_event_change()']); ?>

    <?= $form->field($model, 'from')->textInput(['readonly' => true, 'value' => 'admin']) ?>

    <?= $form->field($model, 'to')->dropDownList(
        ['toAll' => 'Всем', ArrayHelper::map(\app\modules\user\models\backend\User::find()->all(),'id','username')],
        [
            'prompt'=>'Выберите получателя...',
            'style'=>'width:200px'

        ]); ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group" id="paste_options">
        <?php
        $paste_options = [
            'user_status_changed'=>'{site_name},{username},{login_page}',
            'new_article_added' => '{site_name},{username},{article_title},{article_anons},{article_link}'
        ];

        foreach ($paste_options as $opt) {
            echo '<p class="well well-sm" style="display:none">
                            <strong>Варианты подстановки:</strong> '.$opt.'</p>';
        }

        ?>
    </div>

    <?= $form->field($model, 'event_type')->dropDownList([
        'email' => 'email',
        'browser' => 'browser'
    ], ['multiple' => 'true']); ?>

    <?= $form->field($model, 'created_at')->hiddenInput(['value' => $model->isNewRecord ? date('Y-m-d H:i:s') : $model->created_at])->label(false) ?>

    <?= $form->field($model, 'updated_at')->hiddenInput(['value' => date('Y-m-d H:i:s')])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('module', 'ADMIN_NOTIFICATIONS_ADD') : Module::t('module', 'ADMIN_NOTIFICATIONS_EDIT'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php
    $this->registerJs('
     var $p;
     var notification_form = {
        on_event_change: function(){
            if ($("#notification-event_code").val()=="user_status_changed") { $p=0; } else { $p=1; } 
            $("#paste_options").children("p").hide().eq($p).show();
        }
     };
     notification_form.on_event_change();
    ', \yii\web\View::POS_END);
    ?>

    <?php ActiveForm::end(); ?>

</div>
