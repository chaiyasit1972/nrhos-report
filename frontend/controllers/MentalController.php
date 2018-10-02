<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class MentalController extends Controller
{
    public $mText = "งานสุขภาพจิต";
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
         $names = "งานสุขภาพจิต";
         return $this -> render('/site/mental/index',['mText'=>$this->mText,'names'=>$names,'sText'=>$this->sText]);
    } 
     public function actionMental1Index() {
        $model = new Formmodel();
        $names="รายงานการฆ่าตัวตาย"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental1.mrt&d1='.$date1.'&d2='.$date2);                         
        }
            return $this -> render('/site/mental/mental1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    } 
     public function actionMental2Index() {
        $model = new Formmodel();
        $names="รายงานซึมเศร้าส่ง รพ.ศรีมหาโพธิ์"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental2.mrt&d1='.$date1.'&d2='.$date2);                         
        }
            return $this -> render('/site/mental/mental1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    } 
     public function actionMental3Index() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วยโรคซึมเศร้า(ICD-10 F32.x, F33.x, F34.1, F38.x และ F39.x)เข้าถึงบริการ"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental3.mrt&d1='.$date1.'&d2='.$date2);                         
        }
            return $this -> render('/site/mental/mental3a-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    }  
     public function actionMental3aIndex() {

            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental3a.mrt');   

    }      
     public function actionMental4Index() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วยโรคจิตเภท(ICD-10 F200 - F209)เข้าถึงบริการ"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental4.mrt&d1='.$date1.'&d2='.$date2);                         
        }
            return $this -> render('/site/mental/mental4a-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    }   
         public function actionMental4aIndex() {

            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental4a.mrt');   

    }   
     public function actionMental5Index() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วยโรคสมาธิสั้น(ICD-10 F900 - F909)เข้าถึงบริการ"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental5.mrt&d1='.$date1.'&d2='.$date2);                         
        }
            return $this -> render('/site/mental/mental5a-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    }    
     public function actionMental5aIndex() {

            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental5a.mrt');   

    }       
     public function actionMental6Index() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วยโรคออทิสติก(ICD-10 F840 - F849)เข้าถึงบริการ"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental6.mrt&d1='.$date1.'&d2='.$date2);                         
        }
            return $this -> render('/site/mental/mental6a-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    } 
     public function actionMental6aIndex() {

            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental6a.mrt');   

    }       
     public function actionMental7Index() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้ป่วยนอกจิตเวชที่มารับบริการจำแนกรายกลุ่มโรคและสิทธิ์"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental7.mrt&d1='.$date1.'&d2='.$date2);                         
        }
            return $this -> render('/site/mental/mental1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    } 
     public function actionMental8Index() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้ป่วยในจิตเวชที่มารับบริการจำแนกรายกลุ่มโรคและสิทธิ์"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental8.mrt&d1='.$date1.'&d2='.$date2);                         
        }
            return $this -> render('/site/mental/mental1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    } 
     public function actionMental9Index() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้รับการบำบัดสารเสพติด"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental9.mrt&d1='.$date1.'&d2='.$date2);                         
        }
            return $this -> render('/site/mental/mental1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    } 
     public function actionMental10Index() {
        $model = new Formmodel();
        $names="รายงานซึมเศร้าส่ง รพ.ศรีมหาโพธิ์ 2"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental10.mrt&d1='.$date1.'&d2='.$date2);                         
        }
            return $this -> render('/site/mental/mental1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    } 
     public function actionMental11Index() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้ป่วยโรคซึมเศร้า(ICD-10 F32.x, F33.x, F34.1, F38.x และ F39.x) แยกตามที่อยู่"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental11.mrt&d1='.$date1.'&d2='.$date2);                         
        }
            return $this -> render('/site/mental/mental1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    } 
     public function actionMental12Index() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้ป่วยโรคจิตเภท(ICD-10 F200 - F209) แยกตามที่อยู่"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental12.mrt&d1='.$date1.'&d2='.$date2);                         
        }
            return $this -> render('/site/mental/mental1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    } 
     public function actionMental13Index() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้ป่วยโรคสมาธิสั้น(ICD-10 F900 - F909) แยกตามที่อยู่"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental13.mrt&d1='.$date1.'&d2='.$date2);                         
        }
            return $this -> render('/site/mental/mental1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    } 
     public function actionMental14Index() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้ป่วยโรคออทิสติก(ICD-10 F840 - F849) แยกตามที่อยู่"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental14.mrt&d1='.$date1.'&d2='.$date2);                         
        }
            return $this -> render('/site/mental/mental1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    } 
     public function actionMental15Index() {
        $model = new Formmodel();
        $names="รายงานการบำบัดคลินิกอดบุหรี่และการบำบัดคลินิกเลิกสุรา"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental15.mrt&d1='.$date1.'&d2='.$date2);                         
        }
            return $this -> render('/site/mental/mental1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    } 
     public function actionMental16Index() {
        $model = new Formmodel();
        $names="รายงานการบำบัดคลินิกอดบุหรี่(ICD-10 : F171,F172) ที่สามารถเลิกบุหรี่ได้ตามระยะเวลา"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=mental/";   
            return $this->redirect($url.'mental16.mrt&d1='.$date1.'&d2='.$date2);                         
        }
            return $this -> render('/site/mental/mental1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
    } 


    
}    

