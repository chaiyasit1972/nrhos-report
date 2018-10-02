<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii2assets\fullscreenmodal\FullscreenModal;
use yii\widgets\Pjax;

$asset = frontend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;

?>
<div class="margin-bottom-10"></div>       
<div class="row margin-left-10 margin-right-10">
    <div class="col-md-1"></div>
           <div class="col-md-10">
                <div class="tab-pane fade in active" id="alert-1">
                    <div class="margin-bottom-15"></div>
                    <div class="alert alert-info fade in">
                        <strong>Warning!</strong> ยังไม่พบว่ามีรายงาน นะครับ.
                    </div>
                </div>
           </div>
    <div class="col-md-1"></div>    
</div>

