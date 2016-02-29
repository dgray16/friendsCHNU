<?php
/**
 * Created by PhpStorm.
 * User: serhiy
 * Date: 25.02.16
 * Time: 19:34
 */

namespace app\modules\graduates\controllers;


use app\components\Controller;
use app\models\user\User;
use yii\data\ActiveDataProvider;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->joinWith('info'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
}