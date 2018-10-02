<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class PctController extends Controller
{
    public $mText = "งานบริการข้อมูล";
    public $sText = "ข้อมูลระดับทีม";
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
    public function actionIndex1() {
        $names="PCT สูติกรรม"; 
         return $this -> render('/site/pct/index1',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names]);
    } 
    public function actionIndex8() {
        $names="PCT นรีเวชกรรม"; 
         return $this -> render('/site/pct/index8',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names]);
    }     
    public function actionIndex2() {
        $names="PCT - ศัลยกรรมทั่วไป"; 
         return $this -> render('/site/pct/index2',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names]);
    }  
    public function actionIndex3() {
        $names="PCT - ศัลยกรรมกระดูกและข้อ"; 
         return $this -> render('/site/pct/index3',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names]);
    }      
    public function actionIndex4() {
        $names="PCT - อายุรกรรม"; 
         return $this -> render('/site/pct/index4',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names]);
    }   
    public function actionIndex5() {
        $names="PCT - กุมารเวชกรรม"; 
         return $this -> render('/site/pct/index5',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names]);
    }       
    public function actionIndex6() {
        $names="PCT - หู คอ จมูก"; 
         return $this -> render('/site/pct/index6',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names]);
    }  
    public function actionIndex7() {
        $names="PCT - จักษุ"; 
         return $this -> render('/site/pct/index7',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names]);
    }  
    
    public function actionIndex2Kpi61() {
        $names = "รายงานตัวชีวัดปีงบประมาณ 2561" ;
         return $this -> render('/site/pct/index2-kpi61',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names]);
    }      
    public function actionIndex2Kpi62() {
        $names = "รายงานตัวชีวัดปีงบประมาณ 2562" ;
         return $this -> render('/site/pct/index2-kpi62',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names]);
    }       
}    

