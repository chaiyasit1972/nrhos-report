<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;
use kartik\select2\Select2;

$asset = frontend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;

?>

<div class="breadcrumbs">
    <div class="container">
        <h4 class="pull-left"><?=$mText;?></h4>
        <ul class="pull-right breadcrumb">
            <li><?=Html::a('Home',['/site/index']);?></li>
            <li><?=Html::a($names,['/service/index5']);;?></li>
        </ul>
    </div>
</div>
<div class="margin-bottom-10"></div>       
<div class="row margin-left-5 margin-right-5">
    <div class="col-md-4">
        <div id="myCarousel" class="carousel slide carousel-v1">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?= $baseUrl ?>/assets/img/qof1.jpg" alt="">
                </div>
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/qof2.jpg" alt="">
                </div>           
            </div>

            <div class="carousel-arrow">
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div> 
    </div>    
    <div class="col-md-8">
        <div class="tag-box tag-box-v3 form-page">  
            <?php
            $form = ActiveForm::begin([
                        'id' => 'login-form-inline',
                        'type' => ActiveForm::TYPE_INLINE,
                        'options' => [                           
                            'class' => 'sky-form',
                            //'target' => '_blank'
                        ],
                        'formConfig' => [
                            'labelSpan' => 1,
                            'deviceSize' => ActiveForm::SIZE_SMALL,
                        ]
            ]);
            ?>           
            <div class="panel">
                <div class="panel-body"><div class="headline col col-md-3 indent has-error"> 
                        <label class="control-labell" for="inputError"><h4>เลือกปีงบประมาณ :</h4></label>
                </div>
                <div class="col col-md-4 indent headline has-error">
                      <label class="control-labell" for="inputError"><h4>
                                <?php
                                            echo Select2::widget([
                                                'model' => $model,
                                                'attribute' => 'select1',
                                                'name' => 'select1',
                                                'data' => [
                                                    '60' => '2560',                        
                                                    '61' => '2561',
                                                    '62' => '2562',
                                                    '63' => '2563',                                                    
                                                ],
                                                'size' => Select2::SMALL,
                                                'theme' => 'krajee',
                                                'options' => ['placeholder' => '========  เลือกปีงบประมาณ ======='],
                                                'pluginOptions' => [
                                                    'allowClear' => true
                                                ],
                                            ]);
                                ?>    
                          </h4></label>
                    </div>                                                           
                    <div class="col col-md-3 text-right">
                    <?php echo Html::submitButton('ตกลง', ['class' => 'btn-u btn-u-red']); ?>
                    </div>
                </div>     
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div> 
        
    </div>
    
    