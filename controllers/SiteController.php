<?php

namespace app\controllers;

use app\components\repository\ArrayRepository;
use app\models\Topic;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\TopicForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
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
        return $this->render('index');
    }


    /**
     * Displays topic page
     * @return string|Response
     */
    public function actionTopic($id = null, $vote = null)
    {
        if (!is_null($id) && $vote) {
            Yii::$app->apiClient->voteForTopic($id, ($vote === 'up'));
            return $this->redirect(Url::to(['site/list']));
        }

        $model = new TopicForm;
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->apiClient->saveTopic($model);
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }

        return $this->render('topic', [
            'model' => $model
        ]);
    }

    /**
     * Displays topic page
     * @return string|Response
     */
    public function actionList()
    {
        /** @var []Topic $items */
        $items = Yii::$app->apiClient->getTopics();
        $dataProvider = new ArrayDataProvider;
        $dataProvider->setModels($items);
        return $this->render('list', [
            'dataProvider' => $dataProvider
        ]);
    }
}
