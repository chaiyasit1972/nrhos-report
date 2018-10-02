<?php
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\mpdf\Pdf;
use kartik\helpers\Html;


?>
<div class="breadcrumbs">
    <div class="container">
        <h3 class="pull-left"><?=$mText;?></h3>
        <ul class="pull-right breadcrumb">
            <li><?=Html::a('Home',['/site/index']);?></li>
            <li><?=Html::a($mText,['/ipd-icu/index']);;?></li>
            <li class="active"><?=$names;?></li>
        </ul>
    </div>
</div>
<section class="service-info margin-left-5 margin-right-5 ">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?=$names;?>  ตั้งแต่ <?=Yii::$app->mycomponent->ShortDateThai($date1) ;?>   ถึงวันที่  
                      <?=Yii::$app->mycomponent->ShortDateThai($date2);?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                          <th class="text-center">รายการ</th>
                          <th class="text-center">จำนวน(คน)</th>                       
                      </tr>
                    </thead>
                    <tbody>
                     <?php                      
                        foreach ($dataProvider as $value1) {
                     ?>
                        <tr>
                            <td class="text-center"><?=$value1['pname'];?></td>                            
                            <td class="text-center"><?=  number_format($value1['cc']);?></td>                                                       
                        </tr> 
                     <?php   
                        }
                     ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->


            </div>
          </div>
        </section>
</div>