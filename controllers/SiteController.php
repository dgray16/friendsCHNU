<?php

namespace app\controllers;

use app\components\Controller;
use app\models\user\ClientLoginForm;
use app\models\user\User;
use app\models\user\UserInfo;
use pjhl\multilanguage\components\AdvancedController;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin() {
        $model = new ClientLoginForm();
        $model->load(Yii::$app->request->getBodyParams());

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $errors =  ActiveForm::validate($model);

            if (count($errors) > 0) {
                return $errors;
            } else {
                return [];
            }
        } else {
            $model->login();
            $this->goBack();
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRegistration() {
        $user = new User();
        $userInfo = new UserInfo();

        $user->setScenario(User::SCENARIO_REGISTER);

        if (Yii::$app->request->isAjax) {
            $user->load(Yii::$app->request->getBodyParams());
            $userInfo->load(Yii::$app->request->getBodyParams());

            Yii::$app->response->format = Response::FORMAT_JSON;

            return array_merge(ActiveForm::validate($user));
        }

        if (Yii::$app->request->isPost) {
            $user->load(Yii::$app->request->getBodyParams());
            $userInfo->load(Yii::$app->request->getBodyParams());

            $user->setPassword($user->password);

            if ($user->save()) {
                $userInfo->user_id = $user->id;

                if ($userInfo->save()) {
                    Yii::$app->user->login($user);
                    return $this->redirect(['/profile']);
                }
            }

            return $this->redirect(['/']);
        }

        return $this->render('registration', [
            'user' => $user,
            'userInfo' => $userInfo
        ]);
    }
}
