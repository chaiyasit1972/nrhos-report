<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class IpdMeds6Controller extends Controller
{
    public $mText = "อาคาร 5 ชั้น 6 (อายุรกรรม - ห้องพิเศษ)";
    public $sText = "งานผู้ป่วยใน";
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
        $names=""; 
         return $this -> render('/site/ipd-meds6/index',['mText'=>$this->mText,'names'=>$names, 'sText'=>$this->sText]);
    } 
    public function actionMeds1Index() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้ป่วยด้วยโรค Pneumonitis due to food and vomit (ICD-10 : J690)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                 $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd_meds6/";   
                 return $this->redirect($url.'meds1.mrt&d1='.$date1.'&d2='.$date2);  

        }
            return $this -> render('/site/ipd-meds6/meds-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    }  
    public function actionMeds2Index() {
        $model = new Formmodel();
        $names="รายงานรายงานจำนวนผู้ป่วยด้วยโรค Decubitus ulcer and pressure area (ICD-10 : L890 - L899)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                 $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd_meds6/";   
                 return $this->redirect($url.'meds2.mrt&d1='.$date1.'&d2='.$date2);  

        }
            return $this -> render('/site/ipd-meds6/meds-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    }  

}    