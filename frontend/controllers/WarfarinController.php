<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class WarfarinController extends Controller
{
    public $mText = "คลินิกผู้ป่วยโรคเรื้อรัง(Warfarin)";
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
        $names="คลินิกผู้ป่วยโรคเรื้อรัง(Warfarin)"; 
         return $this -> render('/site/warfarin/index',['mText'=>$this->mText,'sText' => $this->sText,'names'=>$names]);
    } 
     public function actionWarfarin1Index() {
        $names="รายงานทะเบียนผู้ป่วยคลินิก Warfarin";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=warfarin/";   
            return $this->redirect($url.'warfarin1.mrt&d1='.$date1.'&d2='.$date2);                 
        }
            return $this -> render('/site/warfarin/warfarin1-index',['mText'=>$this->mText,'names'=>$names, 'sText' => $this->sText,
                                     'model' => $model]);
     }    
    
    

}

