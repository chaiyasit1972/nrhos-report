<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class LabController extends Controller
{
    public $mText = "งานห้องชันสูตร(LAB)";
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
         $names = "งานห้องชันสูตร(LAB)";
         return $this -> render('/site/lab/index',['mText'=>$this->mText,'names'=>$names, 'sText' =>$this->sText]);
    } 
     public function actionIndex1() {
        $model = new Formmodel();
        $names="รายงานสรุปผลการปฎิบัติงานแผนกชันสูตร(OPD,IPD)ตามใบ LAB ในเวลา(08.00 - 16.00)";          
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
           if($model->select1=='1'){    
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=lab/";   
            return $this->redirect($url.'lab1-opd.mrt&d1='.$date1.'&d2='.$date2);                         
           }else{
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=lab/";   
            return $this->redirect($url.'lab1-ipd.mrt&d1='.$date1.'&d2='.$date2);                 
           }
        }
            return $this -> render('/site/lab/lab1-index',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names,'model' => $model]);
    } 
     public function actionIndex2() {
        $model = new Formmodel();
        $names=" รายงานระยะเวลารอคอยการสั่ง Lab รับใบ Lab และ รายงานผล Lab แยกตาม รายการใบ Lab"; 
        $sql1 = "select '0-ทั้งหมด' as id, '0-ทั้งหมด' as lname union all select form_name as id, form_name as lname from lab_form group by form_name";
        $locations =  \Yii::$app->db1->createCommand($sql1)->queryAll();           
        $listData=ArrayHelper::map($locations,'id','lname');   
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $fm = $model->select1;
            if (substr($fm,0,1)==0) {   
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=lab/";   
            return $this->redirect($url.'lab2_0.mrt&d1='.$date1.'&d2='.$date2);     
            } else {
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=lab/";   
            return $this->redirect($url.'lab2_1.mrt&d1='.$date1.'&d2='.$date2.'&fm='.$fm);                     
            }

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

