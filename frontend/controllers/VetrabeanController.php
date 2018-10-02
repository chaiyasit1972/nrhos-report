<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class VetrabeanController extends Controller
{
    public $mText = "งานห้องบัตร(เวชระเบียน)";
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
        $names="งานห้องบัตร(เวชระเบียน)"; 
         return $this -> render('/site/vetrabean/index',['mText'=>$this->mText,'names'=>$names,'sText' => $this->sText]);
    } 
      public function actionVetrabean3Index() {
        $names="รายงานผู้ป่วยที่มารับบริการไม่ได้ลงบัญชี 1";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                         $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=vetrabean/";   
                         return $this->redirect($url.'vetrabean3.mrt&d1='.$date1.'&d2='.$date2);              
        }
        return $this -> render('/site/vetrabean/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText' => $this->sText]);    
     }  
      public function actionVetrabean4Index() {
        $names="รายงานสถิติเปรียบเทียบผลการดำเนินการด้านการรักษาพยาบาล ผู้ป่วยนอก";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                         $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=vetrabean/";   
                         return $this->redirect($url.'vetrabean4.mrt&d1='.$date1.'&d2='.$date2);              
        }
        return $this -> render('/site/vetrabean/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText' => $this->sText]);    
     }       
      public function actionVetrabean5Index() {
        $names="รายงานสถิติเปรียบเทียบผลการดำเนินการด้านการรักษาพยาบาล ผู้ป่วยใน";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $bed = $model->text1;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=vetrabean/";   
                        return $this->redirect($url.'vetrabean5.mrt&d1='.$date1.'&d2='.$date2.'&bed='.$bed);              
        }
        return $this -> render('/site/vetrabean/index2',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText' => $this->sText]);    
     }   
      public function actionVetrabean6Index() {
        $names="รายงานสถิติเปรียบเทียบผลการดำเนินการด้านการรักษาพยาบาล ผู้ป่วยอุบัติเหตุและฉุกเฉิน";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                         $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=vetrabean/";   
                         return $this->redirect($url.'vetrabean6.mrt&d1='.$date1.'&d2='.$date2);              
        }
        return $this -> render('/site/vetrabean/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText' => $this->sText]);    
     }   
      public function actionVetrabean7Index() {
        $names="รายงานสถิติเปรียบเทียบผลการดำเนินการด้านการรักษาพยาบาล ผู้ป่วยคลอด";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                         $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=vetrabean/";   
                         return $this->redirect($url.'vetrabean7.mrt&d1='.$date1.'&d2='.$date2);              
        }
        return $this -> render('/site/vetrabean/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText' => $this->sText]);    
     }   
      public function actionVetrabean8Index() {
        $names="รายงานสถิติเปรียบเทียบผลการดำเนินการด้านการรักษาพยาบาล อนามัยแม่และเด็ก";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                         $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=vetrabean/";   
                         return $this->redirect($url.'vetrabean8.mrt&d1='.$date1.'&d2='.$date2);              
        }
        return $this -> render('/site/vetrabean/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText' => $this->sText]);    
     }   
      public function actionVetrabean9Index() {
        $names="รายงานแสดงจำนวนผู้ป่วยนอกจำแนกตามแผนกการรักษา";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                         $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=vetrabean/";   
                         return $this->redirect($url.'vetrabean9.mrt&d1='.$date1.'&d2='.$date2);              
        }
        return $this -> render('/site/vetrabean/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText' => $this->sText]);    
     }   
      public function actionVetrabean10Index() {
        $names="รายงานแสดงจำนวนผู้ป่วยในจำแนกตามแผนกการรักษา";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                         $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=vetrabean/";   
                         return $this->redirect($url.'vetrabean10.mrt&d1='.$date1.'&d2='.$date2);              
        }
        return $this -> render('/site/vetrabean/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText' => $this->sText]);    
     }   
      public function actionVetrabean11Index() {
        $names="รายงานสถิติผู้ป่วยนอก - ผู้ป่วยใน จำแนกตามสิทธิการรักษาพยาบาล";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                         $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=vetrabean/";   
                         return $this->redirect($url.'vetrabean11.mrt&d1='.$date1.'&d2='.$date2);              
        }
        return $this -> render('/site/vetrabean/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText' => $this->sText]);    
     }   
      public function actionVetrabean12Index() {
        $names="รายงาน 10 อันดับ กลุ่มโรคหลัก(PDX) ผู้ป่วยนอก";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                         $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=vetrabean/";   
                         return $this->redirect($url.'vetrabean12.mrt&d1='.$date1.'&d2='.$date2);              
        }
        return $this -> render('/site/vetrabean/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText' => $this->sText]);    
     }   
      public function actionVetrabean13Index() {
        $names="รายงาน 10 อันดับ กลุ่มโรคหลัก(PDX) ผู้ป่วยใน";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                         $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=vetrabean/";   
                         return $this->redirect($url.'vetrabean13.mrt&d1='.$date1.'&d2='.$date2);              
        }
        return $this -> render('/site/vetrabean/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText' => $this->sText]);    
     }   
      public function actionVetrabean14Index() {
        $names="รายงาน 10 อันดับกลุ่มโรค ผู้ป่วยเสียชีวิต";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                         $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=vetrabean/";   
                         return $this->redirect($url.'vetrabean14.mrt&d1='.$date1.'&d2='.$date2);              
        }
        return $this -> render('/site/vetrabean/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText' => $this->sText]);    
     }   
      public function actionVetrabean15Index() {
        $names="รายงาน 10 อันดับกลุ่มโรคหลัก(PDX)ผู้ป่วยใน แยกตามแผนกการรักษา";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                         $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=vetrabean/";   
                         return $this->redirect($url.'vetrabean15.mrt&d1='.$date1.'&d2='.$date2);              
        }
        return $this -> render('/site/vetrabean/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText' => $this->sText]);    
     }   
      public function actionVetrabean16Index() {
        $names="รายงานสัดส่วนการกระจายของผู้ป่วยตามระดับ Adj.RW";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                         $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=vetrabean/";   
                         return $this->redirect($url.'vetrabean16.mrt&d1='.$date1.'&d2='.$date2);              
        }
        return $this -> render('/site/vetrabean/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText' => $this->sText]);    
     }   
      public function actionVetrabean17Index() {
        $names="รายงานดัชนี Case Mix Index (CMI)";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                         $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=vetrabean/";   
                         return $this->redirect($url.'vetrabean17.mrt&d1='.$date1.'&d2='.$date2);              
        }
        return $this -> render('/site/vetrabean/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText' => $this->sText]);    
     }        
     
}    

