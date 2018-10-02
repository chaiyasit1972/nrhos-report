<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class NcdClinicController extends Controller
{
    public $mText = "งานคลินิกผู้ป่วยโรคเรื้อรัง(NCD)";
    public $sText = "งานคลินิกพิเศษ";
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
        $names="งานคลินิกผู้ป่วยโรคเรื้อรัง(NCD)"; 
         return $this -> render('/site/ncd/index',['mText'=>$this->mText,'names'=>$names, 'sText' => $this->sText]);
    } 
    public function actionKpi1Index($year) {
        $model = new Formmodel();
        $names="รายงานอัตราผู้ป่วยเบาหวานรายใหม่จากกลุ่มเสี่ยงเบาหวาน"; 
        $namea = "รายงานรายละเอีดตัวชี้วัดกระทรวงปีงบประมาณ " . $year;
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;   
               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ncd/"; 
               return $this->redirect($url.'kpi1.mrt&d1='.$date1.'&d2='.$date2);                 
        }         
        return $this -> render('/site/ncd/clinic19',['mText' => $this->mText,'names' => $names,'model' => $model,
                            'sText'=>$this->sText,'namea' => $namea]);    
    }     
    public function actionKpi2Index($year) {
        $model = new Formmodel();        
        $names="รายงานอัตราผู้ป่วยความดันโลหิตสูงรายใหม่จากกลุ่มเสี่ยงและสงสัยป่วยความดันโลหิตสูง"; 
        $namea = "รายงานรายละเอีดตัวชี้วัดกระทรวงปีงบประมาณ " . $year;        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;   
               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ncd/"; 
               return $this->redirect($url.'kpi2.mrt&d1='.$date1.'&d2='.$date2);                 
        }         
        return $this -> render('/site/ncd/clinic19',['mText' => $this->mText,'names' => $names,'model' => $model,
                            'sText'=>$this->sText,'namea' => $namea]);   
    }       
    public function actionKpi3Index($year) {
        $model = new Formmodel();        
        $names="รายงานร้อยละของผู้ป่วยเบาหวานที่ควบคุมได้"; 
        $namea = "รายงานรายละเอีดตัวชี้วัดกระทรวงปีงบประมาณ " . $year;        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;   
               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ncd/"; 
               return $this->redirect($url.'kpi3.mrt&d1='.$date1.'&d2='.$date2);                 
        }         
        return $this -> render('/site/ncd/clinic19',['mText' => $this->mText,'names' => $names,'model' => $model,
                            'sText'=>$this->sText,'namea' => $namea]);   
    }  
        public function actionKpi4Index($year) {
        $model = new Formmodel();            
        $names="รายงานร้อยละของผู้ป่วยความดันโลหิตสูงที่ควบคุมได้"; 
        $namea = "รายงานรายละเอีดตัวชี้วัดกระทรวงปีงบประมาณ " . $year;        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;   
               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ncd/"; 
               return $this->redirect($url.'kpi4.mrt&d1='.$date1.'&d2='.$date2);                 
        }         
        return $this -> render('/site/ncd/clinic19',['mText' => $this->mText,'names' => $names,'model' => $model,
                            'sText'=>$this->sText,'namea' => $namea]);   
    }  
    public function actionKpi5Index($year) {
        $model = new Formmodel();        
        $names="รายงานร้อยละของผู้ป่วยเบาหวานที่ขึ้นทะเบียนได้รับการประเมินโอกาสเสี่ยงต่อโรคหัวใจและหลอดเลือด(CVD Risk)"; 
        $namea = "รายงานรายละเอีดตัวชี้วัดกระทรวงปีงบประมาณ " . $year;        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;   
               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ncd/"; 
               return $this->redirect($url.'kpi5.mrt&d1='.$date1.'&d2='.$date2);                 
        }         
        return $this -> render('/site/ncd/clinic19',['mText' => $this->mText,'names' => $names,'model' => $model,
                            'sText'=>$this->sText,'namea' => $namea]);   
    }  
        public function actionKpi6Index($year) {
        $model = new Formmodel();            
        $names="รายงานร้อยละของผู้ป่วยความดันโลหิตสูงที่ขึ้นทะเบียนได้รับการประเมินโอกาสเสี่ยงต่อโรคหัวใจและหลอดเลือด(CVD Risk)"; 
        $namea = "รายงานรายละเอีดตัวชี้วัดกระทรวงปีงบประมาณ " . $year;        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;   
               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ncd/"; 
               return $this->redirect($url.'kpi6.mrt&d1='.$date1.'&d2='.$date2);                 
        }         
        return $this -> render('/site/ncd/clinic19',['mText' => $this->mText,'names' => $names,'model' => $model,
                            'sText'=>$this->sText,'namea' => $namea]);   
    } 
        public function actionKpi7Index($year) {
        $model = new Formmodel();            
        $names="รายงานอัตราตายของผู้ป่วยโรคหลอดเลือดสมอง(ICD-10 : I60-I69)"; 
        $namea = "รายงานรายละเอีดตัวชี้วัดกระทรวงปีงบประมาณ " . $year;        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;   
               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ncd/"; 
               return $this->redirect($url.'kpi7.mrt&d1='.$date1.'&d2='.$date2);                 
        }         
        return $this -> render('/site/ncd/clinic19',['mText' => $this->mText,'names' => $names,'model' => $model,
                            'sText'=>$this->sText,'namea' => $namea]);   
    }    
        public function actionKpi8Index($year) {
        $model = new Formmodel();            
        $names="รายงานอัตราตายของผู้ป่วยโรคหลอดเลือดหัวใจ(ICD-10 : I20-I25)"; 
        $namea = "รายงานรายละเอีดตัวชี้วัดกระทรวงปีงบประมาณ " . $year;        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;   
               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ncd/"; 
               return $this->redirect($url.'kpi8.mrt&d1='.$date1.'&d2='.$date2);                 
        }         
        return $this -> render('/site/ncd/clinic19',['mText' => $this->mText,'names' => $names,'model' => $model,
                            'sText'=>$this->sText,'namea' => $namea]);   
    }       
}    

