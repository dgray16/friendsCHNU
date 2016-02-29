<?php

namespace app\modules\search\controllers;


use app\components\Controller;
use app\modules\search\models\SearchForm;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $model = new SearchForm();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionSearch() {
        $model = new SearchForm();

        $model->name = \Yii::$app->request->get('SearchForm')['name'];
        $model->birth_day = \Yii::$app->request->get('SearchForm')['birth_day'];

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $model->search()
        ]);
    }
}