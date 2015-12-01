<?php

namespace frontend\controllers;
use frontend\models\Profile;
use yii;

class UpgradeController extends \yii\web\Controller
{
    public function actionIndex(){
        $name = Profile::findOne(['user_id' => Yii::$app->user->identity->id]);
        return $this->render('index',['name' => $name]);
    }

}
