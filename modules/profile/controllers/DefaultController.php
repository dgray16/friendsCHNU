<?php
/**
 * Created by PhpStorm.
 * User: serhiy
 * Date: 25.02.16
 * Time: 19:34
 */

namespace app\modules\profile\controllers;


use app\components\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $user = \Yii::$app->user->identity;

        if (\Yii::$app->request->isPost) {
            $user->load(\Yii::$app->request->getBodyParams());
            $user->info->load(\Yii::$app->request->getBodyParams());

            if (\Yii::$app->request->post('User')['password']) {
                $user->setPassword(\Yii::$app->request->post('User')['password']);
            }

            $user->upload();

            $user->save();
            $user->info->save();

            return $this->redirect(['index']);
        }

        return $this->render('index', [
            'user' => $user
        ]);
    }
}