<?php

use yii\helpers\Html;
use yii\grid\GridView;
//use kartik\grid\GridView;
//use kartik\detail\DetailView;

//use app\assets\AppAsset;
use backend\assets\AdminLteAsset;

//AppAsset::register($this);
$asset      = AdminLteAsset::register($this);
$baseUrl    = $asset->baseUrl;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NureportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แบบฟอร์มการจัดการรายงาน';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
     <br />
    <p>
        <?= Html::a('Create Nureport', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'ลำดับที่'],
                'station',
                'rname',
                'rcontroller',
                //'rdate',
              [  
                'attribute' => 'rdate',  
                'contentOptions' => ['style' =>'text-align:center;vertical-align:middle;']    
               ],               
              [   
                'headerOptions' => ['style'=>'text-align:center'],        
                'attribute'=>'status',   
                'value'=>function($model){
                      if($model->status == 1){
                              return 'New';
                      }else{
                             return 'Update';
                      }   
                },
                'contentOptions' => ['style' =>'text-align:center;vertical-align:middle;']        
              ],     
              [
                'headerOptions' => ['style'=>'text-align:center'],        
                'attribute'=>'ext',                     
                'value'=>function($data){
                     return is_null($data['ext'])?'':$data['ext'];
                 },   
              ],           
              ['class' => 'yii\grid\ActionColumn']
                        
        ],
    ]); ?>
</div>
