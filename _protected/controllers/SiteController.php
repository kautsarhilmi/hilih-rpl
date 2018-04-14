<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Postingan;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $postingan = Postingan::find()->all();
        return $this->render('home', ['postingan' => $postingan]);
    }

    public function actionCreate() {
        $posting = new Postingan();
        $formData = Yii::$app->request->post();
        if($posting->load($formData)){
            if($posting->save()) {
                Yii::$app->getSession()->setFlash('message', 'Words have said!');
                return $this->redirect(['index']);
            }
            else {
                Yii::$app->getSession()->setFlash('message', 'There was an Error. Please Try Again.');
            }
        }
        return $this->render('create', ['posting' => $posting]);
    }

    public function actionView($id) {
        $posting = Postingan::findONE($id);
        return $this->render('view', ['posting' => $posting]);
    }

    public function actionUpdate($id) {
        $posting = Postingan::findONE($id);
        if($posting->load(Yii::$app->request->post()) && $posting->save()){
            Yii::$app->getSession()->setFlash('message', 'Words changed!');
            return $this->redirect(['index', 'id' => $posting->pid]);
        }
        else {
            return $this->render('update', ['posting' => $posting]);
        }
    }

    public function actionDelete($id) {
        $posting = Postingan::findOne($id)->delete();
        if($posting){
            Yii::$app->getSession()->setFlash('message', 'Words deleted.');
            return $this->redirect(['index']);
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
