<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use frontend\models\Formmodel;

class PctGyneController extends Controller
{
    public $mText = "ข้อมูลระดับทีม";
    public $sText = "PCT นรีเวชกรรม";
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
        $names="โรค PPH(O72-O723)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            return $this->redirect(['ops1_preview','name'=>$names,'d1'=>$date1,'d2'=>$date2]);
        }        
        return $this->render('/site/pct-gyne/gyne1-index',['names'=>$names,'mText'=>$this->mText, 'sText' => $this->sText, 'model' => $model]);
    }
    public function actionOps1_preview($name,$d1,$d2) {
        $names=$name;
        $date1=$d1;$date2=$d2; 
        $sql1="select 'จำนวนผู้ป่วย PPH ทั้งหมด' as pnames,count(*) cc from an_stat where dchdate between '{$date1}' and '{$date2}'
                       and pdx between 'O72' and 'O723' and pdx not like 'Z%' and spclty in ('03','04');";
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
                     (select i.an,i.icd10,ic.name pnames from iptdiag i inner join icd101 ic on i.icd10=ic.`code`
                             where i.diagtype=3 and i.icd10 not like 'Z%'
                     ) a 
                     inner join  
                    (select an,pdx from an_stat where dchdate between '{$date1}' and '{$date2}' and pdx between 'O72' and 'O723'
                             and pdx not like 'Z%' and spclty in ('03','04')
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
        $sql3="select 'จำนวนผู้ป่วย PPH เสียชีวิตทั้งหมด' as pnames,count(*) cc  from 
                        (select an,death_date from death 
                        ) a 
                         inner join  
                        (select an,pdx from an_stat where dchdate between '{$date1}' and '{$date2}'  
                            and pdx between 'O72' and 'O723' and pdx not like 'Z%' and spclty in ('03','04')
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
        $sql4="select 'จำนวนผู้ป่วย PPH ส่งต่อ ทั้งหมด' as pnames,count(*) cc  from 
                        (select * from referout
                         ) a 
                         inner join  
                        (select an,pdx from an_stat where dchdate between '{$date1}' and '{$date2}'  
                        and pdx between 'O72' and 'O723' and pdx not like 'Z%' and spclty in ('03','04')
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
         $sql5="select 'จำนวนผู้ป่วย PPH ที่ Re admit ภายใน 28 วัน' as pnames,count(*) cc from an_stat a 
                                       left outer join an_stat b on a.hn=b.hn and a.pdx=b.pdx and a.an>b.an
                                       left outer join patient p on a.hn=p.hn  left outer join icd101 i on i.code=a.pdx left outer join ipt ip on ip.an=a.an  
                                       left outer join ward w on w.ward=a.ward 
                                       where a.dchdate between '{$date1}' and '{$date2}' and a.lastvisit <= 28  and a.regdate-b.dchdate<=28  
                                       and a.pdx between 'O72' and 'O723' and a.pdx not like 'Z%' and a.spclty in ('03','04');";   
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
        return $this->render('/site/pct-gyne/gyne1-preview',['names'=>$names,'mText'=>$this->mText,'date1'=>$date1,'date2'=>$date2,
                      'dataProvider1'=>$dataProvider1,'dataProvider2'=>$dataProvider2,'dataProvider3'=>$dataProvider3,
                      'dataProvider4'=>$dataProvider4,'dataProvider5'=>$dataProvider5, 'sText' => $this->sText
                      ]);            
    }
    public function actionIndex2() {
        $model = new Formmodel();        
        $names=" โรค Pre-eclampsia(O14-O142,O149-O1493)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            return $this->redirect(['ops2_preview','name'=>$names,'d1'=>$date1,'d2'=>$date2]);
        }        
        return $this->render('/site/pct-gyne/gyne2-index',['names'=>$names,'mText'=>$this->mText,'sText' =>$this->sText, 'model' => $model]);
    }
    public function actionOps2_preview($name,$d1,$d2) {
        $names=$name;
        $date1=$d1;$date2=$d2; 
        $sql1="select 'จำนวนผู้ป่วย Pre-eclampsia ทั้งหมด' as pnames,count(*) cc from an_stat where dchdate between '{$date1}' and '{$date2}'
                       and ((pdx between 'O14' and 'O142') or (pdx between 'O149' and 'O1493')) and spclty in ('03','04');";
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
                     (select i.an,i.icd10,ic.name pnames from iptdiag i inner join icd101 ic on i.icd10=ic.`code` 
                             where i.diagtype=3 and i.icd10 not like 'Z%'
                     ) a 
                     inner join  
                    (select an,pdx from an_stat where dchdate between '{$date1}' and '{$date2}' and
                            ((pdx between 'O14' and 'O142') or (pdx between 'O149' and 'O1493'))
                             and spclty in ('03','04')
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
        $sql3="select 'จำนวนผู้ป่วย Pre-eclampsia เสียชีวิตทั้งหมด' as pnames,count(*) cc  from 
                        (select an,death_date from death 
                        ) a 
                         inner join  
                        (select an,pdx from an_stat where dchdate between '{$date1}' and '{$date2}'  
                            and ((pdx between 'O14' and 'O142') or (pdx between 'O149' and 'O1493')) and spclty in ('03','04')
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
        $sql4="select 'จำนวนผู้ป่วย Pre-eclampsia ส่งต่อ ทั้งหมด' as pnames,count(*) cc  from 
                        (select * from referout
                         ) a 
                         inner join  
                        (select an,pdx from an_stat where dchdate between '{$date1}' and '{$date2}'  
                        and ((pdx between 'O14' and 'O142') or (pdx between 'O149' and 'O1493')) and spclty in ('03','04')
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
         $sql5="select 'จำนวนผู้ป่วย Pre-eclampsia ที่ Re admit ภายใน 28 วัน' as pnames,count(*) cc from an_stat a 
                                       left outer join an_stat b on a.hn=b.hn and a.pdx=b.pdx and a.an>b.an
                                       left outer join patient p on a.hn=p.hn  left outer join icd101 i on i.code=a.pdx left outer join ipt ip on ip.an=a.an  
                                       left outer join ward w on w.ward=a.ward 
                                       where a.dchdate between '{$date1}' and '{$date2}' and a.lastvisit <= 28  and a.regdate-b.dchdate<=28  
                                       and ((a.pdx between 'O14' and 'O142') or (a.pdx between 'O149' and 'O1493')) and a.spclty in ('03','04');";   
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
        return $this->render('/site/pct-gyne/gyne2-preview',['names'=>$names,'mText'=>$this->mText,'date1'=>$date1,'date2'=>$date2,
                      'dataProvider1'=>$dataProvider1,'dataProvider2'=>$dataProvider2,'dataProvider3'=>$dataProvider3,
                      'dataProvider4'=>$dataProvider4,'dataProvider5'=>$dataProvider5,'sText' => $this->sText
                      ]);            
    }        
    public function actionIndex3() {
        $model = new Formmodel();        
        $names="รายงาน 20 อันดับโรค ผู้ป่วยรับส่งต่อ (Refer In)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pct-gyne/";   
               return $this->redirect($url.'gyne3.mrt&d1='.$date1.'&d2='.$date2);                
        }        
        return $this->render('/site/pct-gyne/gyne3-index',['names'=>$names,'mText'=>$this->mText, 'sText' => $this->sText, 'model' => $model]);
    }    
    public function actionIndex4() {
        $model = new Formmodel();        
        $names="รายงาน 20 อันดับโรค ผู้ป่วยส่งต่อ (Refer Out)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pct-gyne/";   
               return $this->redirect($url.'gyne4.mrt&d1='.$date1.'&d2='.$date2);                
        }        
        return $this->render('/site/pct-gyne/gyne3-index',['names'=>$names,'mText'=>$this->mText, 'sText' => $this->sText, 'model' => $model]);
    }     

}