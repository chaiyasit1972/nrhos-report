<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use kartik\select2\Select2;
use kartik\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;
?>
<div class="breadcrumbs">
    <div class="container">
        <h3 class="pull-left"><?=$mText;?></h3>
        <ul class="pull-right breadcrumb">
            <li><?=Html::a('Home',['/site/index']);?></li>
            <li><?=Html::a($mText,['/ipd-eent/index']);;?></li>
            <li class="active"><?=$names;?></li>
        </ul>
    </div>
</div>

<div class="container content">
    <div class="row">
        <div class="col-md-12">
            <?php
            $form = ActiveForm::begin([
                        'id' => 'login-form-inline',
                        'type' => ActiveForm::TYPE_INLINE,
                        'options' => [                           
                            'class' => 'sky-form',
                            'target' => '_blank'
                        ],
                        'formConfig' => [
                            'labelSpan' => 1,
                            'deviceSize' => ActiveForm::SIZE_SMALL,
                        ]
            ]);
            ?>     
        <div class="panel panel-sea margin-bottom-5">            
            <div class="panel-heading">
                <h3><?= $names; ?></h3>
            </div><label class="label"></label>
            <div class="panel">
                <div class="panel-body">
                    <div class="col-md-5 text-right">
                        <div class="form-group">
                            <label class="label">วันที่รับบริการ :
                                <?= DatePicker::widget([
                                              'model' => $model,
                                              'attribute' => 'date1',
                                              'name' =>'date1', 
                                              'language' => 'th',
                                              'dateFormat' => 'yyyy-MM-dd',       
                                              'options' => [
                                                    'style' => 'width:120px;height:36px;text-align:center;',
                                                    'placeholder' => '    /  /  ',  
                                                    'class' => 'form-control state-success'
                                              ],       
                                       ]); 
                                ?>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="label">---
                                <?= DatePicker::widget([
                                              'model' => $model,
                                              'attribute' => 'date2',
                                              'name' =>'date2', 
                                              'language' => 'th',
                                              'dateFormat' => 'yyyy-MM-dd',
                                              'options' => [
                                                    'style' => 'width:120px;height:36px;text-align:center;',
                                                    'placeholder' => '    /  /  ',
                                                    'class' => 'form-control state-success'
                                              ],
                                       ]);
                                 ?> 
                            </label>
                        </div>
                    </div>
                    <div class="col col-md-4 indent">
                           <label class="label">   
                                <?php
                                            echo Select2::widget([
                                                'attribute' => 'select1',                                                
                                                'name' => 'select1',
                                                'model' => $model,
                                                'data' => [
                                                    '0' => 'ทั้งหมด',
                                                    '1' => 'ผ่าตัดใหญ่',
                                                    '2' => 'ผ่าตัดเล็ก',
                                                    '4' => 'ตรวจพิเศษ'
                                                ],
                                                'size' => Select2::SMALL,
                                                'theme' => 'krajee',
                                                'options' => ['placeholder' => '============== เลือกชนิดการผ่าตัด =============='],
                                                'pluginOptions' => [
                                                    'allowClear' => true
                                                ],
                                            ]);
                                ?>    
                           </label>
                    </div> 
                    <div class="col-md-2 text-right">
                    <?php echo Html::submitButton('Previews', ['class' => 'btn-u btn-u-red']); ?>
                    </div>
                </div>     
            </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />