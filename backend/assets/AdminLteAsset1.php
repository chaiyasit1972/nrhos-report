<?php
namespace backend\assets;

use yii\base\Exception;
use yii\web\AssetBundle;

/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class AdminLteAsset1 extends AssetBundle
{
    public $sourcePath = '@vendor/bower/adminlte/dist';
    public $css = [
       'jvectormap/jquery-jvectormap-1.2.2.css',
       'css/bootstrap.min.css',        
       '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
       '//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
       'daterangepicker/daterangepicker.css',
       'datepicker/datepicker3.css',
       'iCheck/all.css',
       'colorpicker/bootstrap-colorpicker.min.css',
       'timepicker/bootstrap-timepicker.min.css',
       'select2/select2.min.css',
       'css/AdminLTE.min.css',
       'css/skins/_all-skins.min.css',
    ];
    public $js = [
	'jQuery/jquery-2.2.3.min.js',
	'jvectormap/jquery-jvectormap-1.2.2.min.js',        
	'js/bootstrap.min.js',
	'select2/select2.full.min.js',
	'input-mask/jquery.inputmask.js',
	'input-mask/jquery.inputmask.date.extensions.js',
	'input-mask/jquery.inputmask.extensions.js',
	'daterangepicker/daterangepicker.js',
	'datepicker/bootstrap-datepicker.js',
	'colorpicker/bootstrap-colorpicker.min.js',
	'timepicker/bootstrap-timepicker.min.js',
	'slimScroll/jquery.slimscroll.min.js',
	'iCheck/icheck.min.js',
	'fastclick/fastclick.js',
	'js/app.min.js',
	'js/demo.js',
	'//cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
	'sparkline/jquery.sparkline.min.js',
	'jvectormap/jquery-jvectormap-world-mill-en.js',
	'chartjs/Chart.min.js',
	//'js/pages/dashboard21.js',
		
    ];
    public $depends = [
        'app\assets\FontawesomeAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
    ];

    /**
     * @var string|bool Choose skin color, eg. `'skin-blue'` or set `false` to disable skin loading
     * @see https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html#layout
     */
    public $skin = '_all-skins';

    /**
     * @inheritdoc
     */
    public function init()
    {
        // Append skin color file if specified
        if ($this->skin) {
            if (('_all-skins' !== $this->skin) && (strpos($this->skin, 'skin-') !== 0)) {
                throw new Exception('Invalid skin specified');
            }

            $this->css[] = sprintf('css/skins/%s.min.css', $this->skin);
        }

        parent::init();
    }
}
