<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class TbController extends Controller
{
    public $mText = "คลินิกผู้ป่วยโรคเรื้อรัง(TB)";
    public $sText = "คลินิกพิเศษ";
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
    public function actionIndex() {
        $names="คลินิกผู้ป่วยโรคเรื้อรัง(TB)"; 
         return $this -> render('/site/tb/index',['mText'=>$this->mText,'sText' => $this->sText,'names'=>$names]);
    } 
     public function actionTb1Index() {
        $names="รายงานทะเบียนผู้ป่วยคลินิก TB";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=tb/";   
            return $this->redirect($url.'tb1.mrt&d1='.$date1.'&d2='.$date2);                 
        }
            return $this -> render('/site/tb/tb1-index',['mText'=>$this->mText,'names'=>$names, 'sText' => $this->sText,
                                     'model' => $model]);
     }    
    
    

}

