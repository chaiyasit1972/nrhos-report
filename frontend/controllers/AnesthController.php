<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class AnesthController extends Controller
{
    public $mText = "งานวิสัญญี(Anesth)";
    public $sText = "งานผู้ป่วยนอก";
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
         $names = $this->mText;
         return $this -> render('/site/anesth/index',['mText'=>$this->mText,'names'=>$names, 'sText' =>$this->sText]);
    } 
     public function actionIndex1() {
        $model = new Formmodel();
        $names="รายงานข้อมูลสถิติผู้ป่วยเข้ารับบริการทางวิสัญญี";          
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $sql="select  IF(MONTH(o.vstdate)>=10,YEAR(o.vstdate)+1 ,YEAR(o.vstdate))+543 AS yrs from ovstdiag o
                       where o.vstdate between '{$date1}' and '{$date2}' group by yrs;";
               $result = \Yii::$app->db1->createCommand($sql)->queryAll();      
               foreach ($result as $value) {
                      $yrs = $value['yrs'];                                              
               }                 
               $yra = $yrs-1;               
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=anesth/";   
            return $this->redirect($url.'anesth1.mrt&d1='.$date1.'&d2='.$date2.'&yrs='.$yrs.'&yra='.$yra);                         

        }
            return $this -> render('/site/anesth/anesth1-index',['mText'=>$this->mText, 'sText' => $this->sText,
                                         'names'=>$names,'model' => $model]);
    } 
     public function actionIndex2() {
        $model = new Formmodel();
        $names=" รายงานระยะเวลารอคอยการสั่ง Lab รับใบ Lab และ รายงานผล Lab แยกตาม รายการใบ Lab"; 
        $sql1 = "select form_name as id, form_name as lname from lab_form group by form_name";
        $locations =  \Yii::$app->db1->createCommand($sql1)->queryAll();           
        $listData=ArrayHelper::map($locations,'id','lname');   
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $fm = $model->select1;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=lab/";   
            return $this->redirect($url.'lab2.mrt&d1='.$date1.'&d2='.$date2.'&fm='.$fm);                         

        }
            return $this -> render('/site/lab/lab2-index',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names,
                'model' => $model, 'data' => $listData]);
    } 
     public function actionIndex3() {
        $model = new Formmodel();
        $names="รายงานระยะเวลารอคอยผล Lab แยกราย"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=lab/";   
            return $this->redirect($url.'lab3.mrt&d1='.$date1.'&d2='.$date2);                         

        }
            return $this -> render('/site/lab/lab3-index',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names,'model' => $model]);
    } 
     public function actionIndex4() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้ป่วยแยกตามเวร"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=lab/";   
            return $this->redirect($url.'lab4.mrt&d1='.$date1.'&d2='.$date2);                         

        }
            return $this -> render('/site/lab/lab3-index',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names,'model' => $model]);
    } 
    
}    

