<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class PccController extends Controller
{
    public $mText = "งานข้อมูลบริการสุขภาพปฐมภูมิ(PCC)";
    public $sText = "งานบริการข้อมูล";    
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
        
         return $this -> render('/site/pcc/index',['mText'=>$this->mText,'sText'=>$this->sText]);
    } 
    public function actionPcc1Index() {
        $model = new Formmodel();               
        $names="รายงานจำนวนประชากร PCC (Type1,Type3) แยกตามสิทธิการรักษาพยาบาล"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pcc/"; 
                return $this->redirect($url.'pcc1.mrt&d1='.$date1);
        }
            return $this -> render('/site/pcc/pcc-index1',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names, 'model' => $model]);
    } 
    public function actionPcc2Index() {
        $model = new Formmodel();               
        $names="รายงานทะเบียนผู้ป่วยโรคเรื้อรัง(NCD) แยก PCC"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pcc/"; 
                return $this->redirect($url.'pcc2.mrt&d1='.$date1);
        }
            return $this -> render('/site/pcc/pcc-index1',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names, 'model' => $model]);
    } 
        public function actionPcc3Index() {
        $model = new Formmodel();               
        $names="รายงานสรุปการให้บริการผู้ป่วย PCC (จำนวนผู้ป่วย,มูลค่าใช้จ่าย,10 อันดับโรคสูงสุด) "; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pcc/"; 
                return $this->redirect($url.'pcc3.mrt&d1='.$date1.'&d2='.$date2);
        }
            return $this -> render('/site/pcc/pcc-index2',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names, 'model' => $model]);
    } 
        public function actionPcc4Index() {
        $model = new Formmodel();               
        $names="รายงานร้อยละของผู้ป่วยเบาหวานที่ควบคุมระดับน้ำตาลได้ดี (HbA1c < 7)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                    
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pcc/"; 
                return $this->redirect($url.'pcc4.mrt&d1='.$date1.'&d2='.$date2);
        }
            return $this -> render('/site/pcc/pcc-index2',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names, 'model' => $model]);
    }     
        public function actionPcc5Index() {
        $model = new Formmodel();               
        $names="รายงานร้อยละของผู้ป่วยเบาหวานที่ได้รับการตรวจไขมัน LDL และมีค่า LDL < 100 mg/dl "; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                    
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pcc/"; 
                return $this->redirect($url.'pcc5.mrt&d1='.$date1.'&d2='.$date2);
        }
            return $this -> render('/site/pcc/pcc-index2',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names, 'model' => $model]);
    }       
        public function actionPcc6Index() {
        $model = new Formmodel();               
        $names="รายงานร้อยละของผู้ป่วยเบาหวานที่ได้รับการตรวจภาวะแทรกซ้อนทางตา "; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                    
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pcc/"; 
                return $this->redirect($url.'pcc6.mrt&d1='.$date1.'&d2='.$date2);
        }
            return $this -> render('/site/pcc/pcc-index2',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names, 'model' => $model]);
    }  
        public function actionPcc7Index() {
        $model = new Formmodel();               
        $names="รายงานร้อยละของผู้ป่วยเบาหวานที่ได้รับการตรวจภาวะแทรกซ้อนทางเท้า "; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                    
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pcc/"; 
                return $this->redirect($url.'pcc7.mrt&d1='.$date1.'&d2='.$date2);
        }
            return $this -> render('/site/pcc/pcc-index2',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names, 'model' => $model]);
    }  
        public function actionPcc8Index() {
        $model = new Formmodel();               
        $names= "รายงานร้อยละของผู้ป่วยเบาหวานที่มีความดันโลหิตน้อยกว่า 140/90 mmHg "; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                    
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pcc/"; 
                return $this->redirect($url.'pcc8.mrt&d1='.$date1.'&d2='.$date2);
        }
            return $this -> render('/site/pcc/pcc-index2',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names, 'model' => $model]);
    }  
        public function actionPcc9Index() {
        $model = new Formmodel();               
        $names="รายงานร้อยละของประชากรอายุ 35 ปีขึ้นไป ได้รับการคัดกรองเบาหวาน "; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                    
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pcc/"; 
                return $this->redirect($url.'pcc9.mrt&d1='.$date1.'&d2='.$date2);
        }
            return $this -> render('/site/pcc/pcc-index2',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names, 'model' => $model]);
    }  
        public function actionPcc10Index() {
        $model = new Formmodel();               
        $names="รายงานร้อยละของประชากรอายุ 35 ปีขึ้นไป ได้รับการคัดกรองความดันโลหิตสูง "; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                    
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pcc/"; 
                return $this->redirect($url.'pcc10.mrt&d1='.$date1.'&d2='.$date2);
        }
            return $this -> render('/site/pcc/pcc-index2',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names, 'model' => $model]);
    }  
        public function actionPcc11Index() {
        $model = new Formmodel();               
        $names="รายงานร้อยละของผู้ป่วยความดันโลหิตสูงที่ควบคุมความดันโลหิตได้ดี "; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                    
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pcc/"; 
                return $this->redirect($url.'pcc11.mrt&d1='.$date1.'&d2='.$date2);
        }
            return $this -> render('/site/pcc/pcc-index2',['mText'=>$this->mText, 'sText' => $this->sText, 'names'=>$names, 'model' => $model]);
    }      
    
    
    
    
    
    
    
    
    
    
    
    
    
}    

