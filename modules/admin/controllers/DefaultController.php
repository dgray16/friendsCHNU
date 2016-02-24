<?php
/**
 * Created by PhpStorm.
 * User: serhiy
 * Date: 24.02.16
 * Time: 16:19
 */

namespace app\modules\admin\controllers;


use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex() {
        return $this->render('index');
    }
}