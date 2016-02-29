<?php
/**
 * Created by PhpStorm.
 * User: serhiy
 * Date: 29.02.16
 * Time: 12:14
 */

namespace app\modules\profile\controllers;


use app\components\Controller;
use app\models\user\User;
use yii\web\NotFoundHttpException;

class ViewController extends Controller
{
    public function actionIndex($id) {
        $profile = User::find()->where(['user.id' => $id])->joinWith('info')->one();

        if (!$profile) {
            throw new NotFoundHttpException;
        }

        return $this->render('index', [
            'profile' => $profile
        ]);
    }
}