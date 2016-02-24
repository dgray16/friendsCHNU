<?php
/**
 * Created by PhpStorm.
 * User: serhiy
 * Date: 24.02.16
 * Time: 21:40
 */

namespace app\controllers;


use app\components\Controller;
use app\components\LanguageHelper;
use app\models\page\Page;
use yii\web\NotFoundHttpException;

class PageController extends Controller
{
    public function actionIndex($slug) {
        $page = Page::find()->localized()->where(['slug' => $slug])->one();

        if (!$page) {
            throw new NotFoundHttpException;
        }

        return $this->render('index', [
            'page' => $page
        ]);
    }
}