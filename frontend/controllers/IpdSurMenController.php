<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class IpdSurMenController extends Controller
{
    public $mText = "งานศัลยกรรมทั่วไป-ชาย (อาคาร 4 ชั้น 3)";
    public $sText = "งานผู้ป่วยใน";
    public $mName = ""; 
    
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
        $model = new Formmodel();
        $names="รายงานแผนกศัลยกรรมทั่วไป-ชาย  (อาคาร 4 ชั้น 3)"; 
            return $this -> render('/site/ipd-sur-men/index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    } 
        public function actionIpd1Index() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วยเด็กอายุต่ำกว่า 14 ปี Admit ที่ตึกศัลยกรรม(อาคาร 4 ชั้น 3)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd_sur_men/";   
               return $this->redirect($url.'ipd1.mrt&d1='.$date1.'&d2='.$date2);  
        }
            return $this -> render('/site/ipd-sur-men/ipd1_index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]); 
    }     
        public function actionIpd2Index() {
        $model = new Formmodel();
        $names="รายงานการส่งต่อผู้ป่วย(refer-out) อาคาร 4 ชั้นที่ 3 (ศัลยกรรมชาย)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd_sur_men/";   
               return $this->redirect($url.'ipd2.mrt&d1='.$date1.'&d2='.$date2);  
        }
            return $this -> render('/site/ipd-sur-men/ipd1_index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]); 
    }       
        public function actionIpd3Index() {
        $model = new Formmodel();
        $names="รายงานส่งต่อผู้ป่วย(refer-out) ทีมีค่า Adjrw < 0.5"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd_sur_men/";   
               return $this->redirect($url.'ipd3.mrt&d1='.$date1.'&d2='.$date2);  
        }
            return $this -> render('/site/ipd-sur-men/ipd1_index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]); 
    }     
        public function actionIpd4Index() {
        $model = new Formmodel();
        $names="รายงานการรับ การส่งต่อผู้ป่วย(refer-in)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd_sur_men/";   
               return $this->redirect($url.'ipd4.mrt&d1='.$date1.'&d2='.$date2);  
        }
            return $this -> render('/site/ipd-sur-men/ipd1_index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]); 
    }     
        public function actionIpd5Index() {
        $model = new Formmodel();
        $names="รายงานสาเหตุการตาย(ตามรหัสโรค ICD-10"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd_sur_men/";   
               return $this->redirect($url.'ipd5.mrt&d1='.$date1.'&d2='.$date2);  
        }
            return $this -> render('/site/ipd-sur-men/ipd1_index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]); 
    }       
        public function actionIpd6Index() {
        $model = new Formmodel();
        $names="รายงาน 5 อันดับโรคผู้ป่วยศัลยกรรมชาย"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd_sur_men/";   
               return $this->redirect($url.'ipd6.mrt&d1='.$date1.'&d2='.$date2);  
        }
            return $this -> render('/site/ipd-sur-men/ipd1_index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]); 
    }      
        public function actionIpd7Index() {
        $model = new Formmodel();
        $names="รายงานผู้รับบริการผ่าตัดศัลยกรรมชาย"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd_sur_men/";   
               return $this->redirect($url.'ipd7.mrt&d1='.$date1.'&d2='.$date2);  
        }
            return $this -> render('/site/ipd-sur-men/ipd1_index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]); 
    }       
        public function actionKpi1Index() {
        $model = new Formmodel();
        $names="รายงานอัตราไส้ติ่งแตกในผู้ป่วยไส้ติ่งอักเสบ"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd_sur_men/";   
               return $this->redirect($url.'kpi61_1.mrt&d1='.$date1.'&d2='.$date2);  
        }
            return $this -> render('/site/ipd-sur-men/ipd1_index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]); 
    }      
        public function actionKpi2Index() {
        $model = new Formmodel();
        $names="รายงานร้อยละของผู้ที่เสียชีวิตภายใน รพ. ของภาวะขาดเลือดที่ขาหรือแขน"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd_sur_men/";   
               return $this->redirect($url.'kpi61_2.mrt&d1='.$date1.'&d2='.$date2);  
        }
            return $this -> render('/site/ipd-sur-men/ipd1_index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]); 
    }   
        public function actionKpi3Index() {
        $model = new Formmodel();
        $names="รายงานอัตราการเสียชีวิตของผู้ป่วย UGIB(ICD-10 : K922)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd_sur_men/";   
               return $this->redirect($url.'kpi61_3.mrt&d1='.$date1.'&d2='.$date2);  
        }
            return $this -> render('/site/ipd-sur-men/ipd1_index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]); 
    }   
        public function actionKpi4Index() {
        $model = new Formmodel();
        $names="รายงานอัตราการเสียชีวิตของผู้ป่วย NF(ICD-10 : M726"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd_sur_men/";   
               return $this->redirect($url.'kpi61_4.mrt&d1='.$date1.'&d2='.$date2);  
        }
            return $this -> render('/site/ipd-sur-men/ipd1_index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]); 
    }   

    
    
}    

