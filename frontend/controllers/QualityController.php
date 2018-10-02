<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class QualityController extends Controller
{    
    public $mText = "งานบริการข้อมูล";
    public $sText = "ข้อมูลระดับทีม";    
    public $dText = "ทีมงานคุณภาพ";
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
        $names="ทีมงานคุณภาพ"; 
         return $this -> render('/site/quality/index',['mText'=>$this->mText, 'sText' => $this->sText,'names'=>$names]);
    } 
    public function actionIndex1() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้รับบริการผู้ป่วยนอก(ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่] )"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=quality/";   
            return $this->redirect($url.'quality1.mrt&&d1='.$date1.'&d2='.$date2);              

        }
            return $this -> render('/site/quality/quality-index1',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model]);
    }     
    public function actionIndex2() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้รับบริการผู้ป่วยนอก(ในเขตอำเภอ[ ไม่รวม 20 ชุมชน + 14 หมู่] )"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=quality/";   
            return $this->redirect($url.'quality2.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/quality/quality-index1',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model]);
    } 
    public function actionIndex3() {
        $model = new Formmodel();
        $names="รายงาน 5 อันดับโรค ผู้ป่วยนอก(ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่]) แยกตามชุมชน/หมู่บ้าน"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=quality/";   
            return $this->redirect($url.'quality3.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/quality/quality-index1',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model]);
    }      
    public function actionIndex4() {
        $model = new Formmodel();
        $names="รายงาน 5 อันดับโรค ผู้ป่วยนอก(ในเขตอำเภอ[ไม่รวม 20 ชุมชน + 14 หมู่]) แยกตามสถานบริการ/ตำบล"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=quality/";   
            return $this->redirect($url.'quality4.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/quality/quality-index1',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model]);
    }  
    public function actionIndex5() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้รับบริการผู้ป่วยใน(ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่])"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=quality/";   
            return $this->redirect($url.'quality5.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/quality/quality-index1',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model]);
    }     
    public function actionIndex6() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้รับบริการผู้ป่วยใน(ในเขตอำเภอ[ ไม่รวม 20 ชุมชน + 14 หมู่])"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=quality/";   
            return $this->redirect($url.'quality6.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/quality/quality-index1',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model]);
    }      
    public function actionIndex7() {
        $model = new Formmodel();
        $names="รายงาน 5 อันดับโรค ผู้ป่วยใน(ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่]) แยกตามชุมชน/หมู่บ้าน"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=quality/";   
            return $this->redirect($url.'quality7.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/quality/quality-index1',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model]);
    }  
    public function actionIndex8() {
        $model = new Formmodel();
        $names="รายงาน 5 อันดับโรค ผู้ป่วยใน(ในเขตอำเภอ[ไม่รวม 20 ชุมชน + 14 หมู่]) แยกตามสถานบริการ/ตำบล"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=quality/";   
            return $this->redirect($url.'quality8.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/quality/quality-index1',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model]);
    }     
 
    public function actionIndex9() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้ป่วยนอกทั้งหมด(ทุกแผนกยกเว้นงานส่งเสริมสุขภาพ)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=quality/";   
            return $this->redirect($url.'quality9.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/quality/quality-index1',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model]);
    }    
    public function actionIndex10() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้ป่วยนอก(ทุกแผนกยกเว้นงานส่งเสริมสุขภาพ) เฉพาะผู้ป่วยที่อาศัยอยู่อำเภอนางรอง(ไม่รวม 20 ชุมชน + 14 หมู่)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=quality/";   
            return $this->redirect($url.'quality10.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/quality/quality-index1',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model]);
    }      
    public function actionIndex11() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้ป่วยนอก(ทุกแผนกยกเว้นงานส่งเสริมสุขภาพ) เฉพาะผู้ป่วยที่อาศัยอยู่ตำบลนางรอง(20 ชุมชน + 14 หมู่)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=quality/";   
            return $this->redirect($url.'quality11.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/quality/quality-index1',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model]);
    }  
    public function actionIndex12() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้มารับบริการอุบัติเหตุฉุกเฉิน(ER) ทั้งหมด แยก รับ refer และ มาเอง "; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=quality/";   
            return $this->redirect($url.'quality12.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/quality/quality-index1',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model]);
    }  
    public function actionIndex13() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้ป่วยในทั้งหมด แยกตามแผนก"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=quality/";   
            return $this->redirect($url.'quality13.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/quality/quality-index1',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model]);
    }
    public function actionIndex14() {
        $model = new Formmodel();
        $names="รายงานอัตราการครองเตียง"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $bed = $model->text1;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=quality/";   
            return $this->redirect($url.'quality14.mrt&d1='.$date1.'&d2='.$date2.'&b1='.$bed);                
        }
            return $this -> render('/site/quality/quality-index2',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model]);
    }    
    public function actionIndex15() {
        $model = new Formmodel();
        $names="รายงานรับการส่งต่อ(refer in) ที่มีค่า RW <= 0.5 โรงพยาบาลเครือข่าย"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=quality/";   
            return $this->redirect($url.'quality15.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/quality/quality-index1',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model]);
    }     
    public function actionIndex16() {
        $model = new Formmodel();
        $names="รายงานการส่งต่อ(refer out) ที่มีค่า RW <= 0.5 โรงพยาบาลแม่ข่าย"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=quality/";   
            return $this->redirect($url.'quality16.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/quality/quality-index1',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model]);
    }     
    
    
}    

