<?php

 use yii\helpers\Html;
 use miloschuman\highcharts\Highcharts;

 $male = json_encode($pman);
 $female = json_encode($pfman);
 $categories = ['0-4', '5-9', '10-14', '15-19',
    '20-24', '25-29', '30-34', '35-39', '40-44',
    '45-49', '50-54', '55-59', '60-64', '65-69',
    '70-74', '75-79', '80-84', '85-89', '90-94',
    '95-99', '100 + '];
$js_categories = implode("','", $categories);
$this->registerJs("
        var categories = ['$js_categories'];    
        $('#ch1').highcharts({
            colors: ['#ED921C', '#1F7CDB'],
            chart: {
                type: 'bar',

            },
            credits:{'enabled':false},
            title: {
                text: 'ปิรามิดประชากร  $pmoo       ในเขตรับผิดชอบ(บัญชี 1)  '
            },
            subtitle: {
                text: 'ประมวลผลจากฐานข้อมูล Hosxp '
            },
            xAxis: [{
                categories: categories,
                reversed: false,
                labels: {
                    step: 1
                }
            }, { 
                opposite: true,
                reversed: false,
                categories: categories,
                linkedTo: 0,
                labels: {
                    step: 1
                }
            }],
            yAxis: {
                title: {
                    text: null
                },
                labels: {
                    formatter: function () {
                        return (Math.abs(this.value));
                    }
                },

            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + ', อายุ ' + this.point.category + '</b><br/>' +
                        'ประชากร: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
                }
            },
            series: [{
                name: 'ชาย',
                data: $male
            }, {
                name: 'หญิง',
                data: $female
            }]
        });
    ");
            ?>
<div class="breadcrumbs">
    <div class="container">
        <h3 class="pull-left"><?=$mText;?></h3>
        <ul class="pull-right breadcrumb">
            <li><?=Html::a('Home',['/site/index']);?></li>
            <li><?=Html::a($sText,['/gen/index']);;?></li>
            <li><?=$dText;?></li>
            <li class="active"><?=$gText;?></li>
        </ul>
    </div>
</div>
<div class="margin-bottom-10"></div>
<div style="display: none">
    <?=
    Highcharts::widget([
        'scripts' => [
            'highcharts-more', // enables supplementary chart types (gauge, arearange, columnrange, etc.)
            //'modules/exporting', // adds Exporting button/menu to chart
            'themes/grid'        // applies global 'grid' theme to all charts
        ]
    ]);
    ?>
</div>
<div class="row margin-left-10 margin-right-10">
<div class="container">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div id="ch1"></div>
    </div>
    <div class="col-md-2"></div>            
</div>
</div>    
<div class="margin-bottom-10"></div>

   
