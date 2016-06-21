<?php

namespace app\modules\main\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\modules\main\models\Notification;
use yii;
class DefaultController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Notification::find()
                ->andWhere(['to'=>Yii::$app->user->id])
                ->orWhere(['to'=>'toAll'])
                ->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => 4,
            ],
        ]);
        return $this->render('index', ['listDataProvider' => $dataProvider]);

    }
}
