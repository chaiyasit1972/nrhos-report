<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use frontend\models\Formmodel;

class PctOptController extends Controller
{
    public $mText = "ข้อมูลระดับทีม";
    public $sText = " PCT - จักษุ";  
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
        $model = new Formmodel();        
        $names=" Cataract(H25-H28)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            return $this->redirect(['opt1_preview','name'=>$names,'d1'=>$date1,'d2'=>$date2]);
        }        
        return $this->render('/site/pct-opt/opt1-index',['names'=>$names,'mText'=>$this->mText,'sText' => $this->sText, 'model' => $model]);
    }
    public function actionOpt1_preview($name,$d1,$d2) {
       $names=$name;
        $date1=$d1;$date2=$d2; 
        $sql1="select 'จำนวนผู้ป่วย Cataract ทั้งหมด' as pnames,count(*) cc from an_stat where dchdate between '{$date1}' and '{$date2}'
                       and pdx between 'H25' and 'H28' and spclty in ('07');";
       try {
              $rawData1 = \Yii::$app->db1->createCommand($sql1)->queryAll();
            } catch (\yii\db\Exception $e) {
                  throw new \yii\web\ConflictHttpException('sql error');
         }                               
                $dataProvider1 = new \yii\data\ArrayDataProvider([
                     'allModels' => $rawData1,
                     'pagination' => [
                        'pageSize' => 10,
                      ],
                ]);          
        $sql2="select a.icd10,a.pnames,count(*) cc  from 
                     (select i.an,i.icd10,ic.name pnames from iptdiag i inner join icd101 ic on i.icd10=ic.`code` where i.diagtype=3
                     ) a 
                     inner join  
                    (select an,pdx from an_stat where dchdate between '{$date1}' and '{$date2}' 
                             and pdx between 'H25' and 'H28' and spclty in ('07')
                    ) b 
                    on a.an=b.an group by a.icd10 order by cc desc limit 10;";
       try {
              $rawData2 = \Yii::$app->db1->createCommand($sql2)->queryAll();
            } catch (\yii\db\Exception $e) {
                  throw new \yii\web\ConflictHttpException('sql error');
         }                               
                $dataProvider2 = new \yii\data\ArrayDataProvider([
                     'allModels' => $rawData2,
                     'pagination' => [
                        'pageSize' => 10,
                      ],
                ]);          
        $sql3="select 'จำนวนผู้ป่วย Cataract เสียชีวิตทั้งหมด' as pnames,count(*) cc  from 
                        (select an,death_date from death 
                        ) a 
                         inner join  
                        (select an,pdx from an_stat where dchdate between '{$date1}' and '{$date2}'  
                            and pdx between 'H25' and 'H28' and spclty in ('07')
                        ) b on a.an=b.an ;";   
       try {
              $rawData3 = \Yii::$app->db1->createCommand($sql3)->queryAll();
            } catch (\yii\db\Exception $e) {
                  throw new \yii\web\ConflictHttpException('sql error');
         }                               
                $dataProvider3 = new \yii\data\ArrayDataProvider([
                     'allModels' => $rawData3,
                     'pagination' => [
                        'pageSize' => 10,
                      ],
                ]); 
        $sql4="select 'จำนวนผู้ป่วย Cataract ส่งต่อ ทั้งหมด' as pnames,count(*) cc  from 
                        (select * from referout
                         ) a 
                         inner join  
                        (select an,pdx from an_stat where dchdate between '{$date1}' and '{$date2}'  
                                    and pdx between 'H25' and 'H28' and spclty in ('07')
                        ) b on a.vn=b.an ;";   
       try {
              $rawData4 = \Yii::$app->db1->createCommand($sql4)->queryAll();
            } catch (\yii\db\Exception $e) {
                  throw new \yii\web\ConflictHttpException('sql error');
         }                               
                $dataProvider4 = new \yii\data\ArrayDataProvider([
                     'allModels' => $rawData4,
                     'pagination' => [
                        'pageSize' => 10,
                      ],
                ]);                  
         $sql5="select 'จำนวนผู้ป่วย Cataract ที่ Re admit ภายใน 28 วัน' as pnames,count(*) cc from an_stat a 
                                       left outer join an_stat b on a.hn=b.hn and a.pdx=b.pdx and a.an>b.an
                                       left outer join patient p on a.hn=p.hn  left outer join icd101 i on i.code=a.pdx left outer join ipt ip on ip.an=a.an  
                                       left outer join ward w on w.ward=a.ward 
                                       where a.dchdate between '{$date1}' and '{$date2}' and a.lastvisit <= 28  and a.regdate-b.dchdate<=28  
                                       and a.pdx between 'H25' and 'H28' and a.spclty in ('07');";   
       try {
              $rawData5 = \Yii::$app->db1->createCommand($sql5)->queryAll();
            } catch (\yii\db\Exception $e) {
                  throw new \yii\web\ConflictHttpException('sql error');
         }                               
                $dataProvider5 = new \yii\data\ArrayDataProvider([
                     'allModels' => $rawData5,
                     'pagination' => [
                        'pageSize' => 10,
                      ],
                ]);                           
        return $this->render('/site/pct-opt/opt1-preview',['names'=>$names,'mText'=>$this->mText,'date1'=>$date1,'date2'=>$date2,
                      'dataProvider1'=>$dataProvider1,'dataProvider2'=>$dataProvider2,'dataProvider3'=>$dataProvider3,
                      'dataProvider4'=>$dataProvider4,'dataProvider5'=>$dataProvider5,'sText' => $this->sText
                      ]);             
        
    }                        
    public function actionIndex2() {
        $model = new Formmodel();        
        $names=" รายงาน 10 อันดับโรคผู้ป่วยทางตา ผู้ป่วยนอก(ICD10 H00-H59,Z010)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pct-opt/";   
               return $this->redirect($url.'opt2.mrt&d1='.$date1.'&d2='.$date2);    
        }        
        return $this->render('/site/pct-opt/opt2-index',['names'=>$names,'mText'=>$this->mText,'sText' => $this->sText, 'model' => $model]);
    }
    public function actionIndex3() {
        $model = new Formmodel();        
        $names=" รายงาน 10 อันดับโรคผู้ป่วยทางตา ผู้ป่วยใน(ICD10 H00-H59)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pct-opt/";   
               return $this->redirect($url.'opt3.mrt&d1='.$date1.'&d2='.$date2);    
        }        
        return $this->render('/site/pct-opt/opt2-index',['names'=>$names,'mText'=>$this->mText,'sText' => $this->sText, 'model' => $model]);
    }    
    public function actionIndex4() {
        $model = new Formmodel();        
        $names=" รายงานโรคทางตา ผู้ป่วยใน(ICD10 H00-H59) Refer"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pct-opt/";   
               return $this->redirect($url.'opt4.mrt&d1='.$date1.'&d2='.$date2);    
        }        
        return $this->render('/site/pct-opt/opt2-index',['names'=>$names,'mText'=>$this->mText,'sText' => $this->sText, 'model' => $model]);
    }       
    public function actionIndex5() {
        $model = new Formmodel();        
        $names=" รายงานโรคทางตาผู้ป่วยใน(ICD10 H00-H59) Readmit 28 วัน"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pct-opt/";   
               return $this->redirect($url.'opt5.mrt&d1='.$date1.'&d2='.$date2);    
        }        
        return $this->render('/site/pct-opt/opt2-index',['names'=>$names,'mText'=>$this->mText,'sText' => $this->sText, 'model' => $model]);
    }         
    public function actionIndex6() {
        $model = new Formmodel();        
        $names=" รายงานการประเมิน VA ผู้ป่วยโรคทางตาผู้ป่วยใน(ICD9 13.7)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pct-opt/";   
               return $this->redirect($url.'opt6.mrt&d1='.$date1.'&d2='.$date2);    
        }        
        return $this->render('/site/pct-opt/opt2-index',['names'=>$names,'mText'=>$this->mText,'sText' => $this->sText, 'model' => $model]);
    }  
    public function actionIndex7() {
        $model = new Formmodel();        
        $names=" รายงานการคัดกรองต้อกระจก(ICD10 Z010) และให้บริการตามนัด"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pct-opt/";   
               return $this->redirect($url.'opt7.mrt&d1='.$date1.'&d2='.$date2);    
        }        
        return $this->render('/site/pct-opt/opt2-index',['names'=>$names,'mText'=>$this->mText,'sText' => $this->sText, 'model' => $model]);
    }  
   public function actionIndex8() {
        $model = new Formmodel();        
        $names="รายงาน 20 อันดับโรค ผู้ป่วยรับส่งต่อ (Refer In)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;              
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pct-opt/";   
               return $this->redirect($url.'opt8.mrt&d1='.$date1.'&d2='.$date2);                    
        }        
        return $this->render('/site/pct-opt/opt2-index',['names'=>$names,'mText'=>$this->mText,'sText' => $this->sText, 'model' => $model]);
    }
   public function actionIndex9() {
        $model = new Formmodel();        
        $names="รายงาน 20 อันดับโรค ผู้ป่วยส่งต่อ (Refer Out)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;              
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pct-opt/";   
               return $this->redirect($url.'opt9.mrt&d1='.$date1.'&d2='.$date2);                    
        }        
        return $this->render('/site/pct-opt/opt2-index',['names'=>$names,'mText'=>$this->mText,'sText' => $this->sText, 'model' => $model]);
    }
   public function actionIndex10() {
        $model = new Formmodel();        
        $names="รายงานผู้ป่วยนอกโรคต้อหินปฐมภูมิ(ICD-10 H401)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;              
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pct-opt/";   
               return $this->redirect($url.'opt10.mrt&d1='.$date1.'&d2='.$date2);                    
        }        
        return $this->render('/site/pct-opt/opt2-index',['names'=>$names,'mText'=>$this->mText,'sText' => $this->sText, 'model' => $model]);
    }    
   public function actionIndex11() {
        $model = new Formmodel();        
        $names="รายงานรายชื่อผู้ป่วยนอก(คน)โรคต้อหินปฐมภูมิ(ICD-10 H401) มารับบริการครั้งแรกในช่วงเวลา"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;              
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pct-opt/";   
               return $this->redirect($url.'opt11.mrt&d1='.$date1.'&d2='.$date2);                    
        }        
        return $this->render('/site/pct-opt/opt2-index',['names'=>$names,'mText'=>$this->mText,'sText' => $this->sText, 'model' => $model]);
    }      
   public function actionIndex12() {
        $model = new Formmodel();        
        $names="รายงานจำนวนยอดผู้ป่วยในโรคทางตา(ICD-10 : H00-H59)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;              
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pct-opt/";   
               return $this->redirect($url.'opt12.mrt&d1='.$date1.'&d2='.$date2);                    
        }        
        return $this->render('/site/pct-opt/opt2-index',['names'=>$names,'mText'=>$this->mText,'sText' => $this->sText, 'model' => $model]);
    }      
}