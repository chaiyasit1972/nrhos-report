<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class PhysicController extends Controller
{
    public $sText = "งานผู้ป่วยนอก";    
    Public $mText  = "งานกายภาพบำบัด";
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
         return $this -> render('/site/physic/index',['mText'=>$this->mText,'sText'=>$this->sText]);
    } 
     public function actionIndex1() {
        $names="รายงาน Brain Dysfunction Traumatic [Traumatic Unspecified, Open Injury, Closed Injury] ทั้งหมด";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=physic/";   
               return $this->redirect($url.'physic1.mrt&d1='.$date1.'&d2='.$date2);                       
        }
            return $this -> render('/site/physic/index1',['sText'=>$this->sText,'mText'=>$this->mText,'names'=>$names,'model' => $model]);
}
     public function actionIndex2() {
        $names="รายงาน Traumatic Spinal Cord Dysfunction ทั้งหมด";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=physic/";   
               return $this->redirect($url.'physic2.mrt&d1='.$date1.'&d2='.$date2);                       
        }
            return $this -> render('/site/physic/index1',['sText'=>$this->sText,'mText'=>$this->mText,'names'=>$names,'model' => $model]);
}
     public function actionIndex3() {
        $names="รายงาน Major Multiple Trauma [Brain + Spinal Cord Injury] ทั้งหมด";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=physic/";   
               return $this->redirect($url.'physic3.mrt&d1='.$date1.'&d2='.$date2);                       
        }
            return $this -> render('/site/physic/index1',['sText'=>$this->sText,'mText'=>$this->mText,'names'=>$names,'model' => $model]);
}
     public function actionIndex4() {
        $names="รายงานผลการปฎิบัติงานและค่าใช้จ่ายเวชศาสตร์ฟื้นฟูแยกตามกลุ่มโรค";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=physic/";   
               return $this->redirect($url.'physic4.mrt&d1='.$date1.'&d2='.$date2);                       
        }
            return $this -> render('/site/physic/index1',['sText'=>$this->sText,'mText'=>$this->mText,'names'=>$names,'model' => $model]);
}
     public function actionIndex5() {
        $names="รายงาน 5 อันดับโรคเวชศาสตร์ฟื้นฟูแยกตามกลุ่มโรค";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $group = $model->text1;
               switch ($group) {
                      case 1:
                         $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=physic/";   
                         return $this->redirect($url.'physic51.mrt&d1='.$date1.'&d2='.$date2);  
                      break;
                      case 2:
                        $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=physic/";   
                         return $this->redirect($url.'physic52.mrt&d1='.$date1.'&d2='.$date2);  
                      break;
                      case 3:
                        $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=physic/";   
                        return $this->redirect($url.'physic53.mrt&d1='.$date1.'&d2='.$date2);  
                      break;                  
                      default:
                      break;
               }                      
        }
            return $this -> render('/site/physic/index2',['sText'=>$this->sText,'mText'=>$this->mText,'names'=>$names,'model' => $model]);
}

}    

