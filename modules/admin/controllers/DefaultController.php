<?php
/**
 * Created by PhpStorm.
 * User: serhiy
 * Date: 24.02.16
 * Time: 16:19
 */

namespace app\modules\admin\controllers;


use app\models\user\LoginForm;
use Yii;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionLogin() {
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/admin']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['/admin']);
    }
}