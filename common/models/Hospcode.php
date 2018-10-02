<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hospcode".
 *
 * @property string $amppart
 * @property string $chwpart
 * @property string $hospcode
 * @property string $hosptype
 * @property string $name
 * @property string $tmbpart
 * @property string $moopart
 * @property string $sss_code
 * @property string $sss_code_sub
 * @property string $hospcode506
 * @property integer $hospital_type_id
 * @property integer $bed_count
 * @property string $po_code
 * @property integer $hospital_level_id
 * @property string $hospital_phone
 * @property string $hospital_fax
 * @property string $hos_guid
 * @property string $hos_guid_ext
 */
class Hospcode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hospcode';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db1');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hospcode'], 'required'],
            [['hospital_type_id', 'bed_count', 'hospital_level_id'], 'integer'],
            [['amppart', 'chwpart', 'tmbpart', 'moopart'], 'string', 'max' => 2],
            [['hospcode', 'po_code'], 'string', 'max' => 5],
            [['hosptype', 'hospital_phone', 'hospital_fax'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 100],
            [['sss_code', 'sss_code_sub'], 'string', 'max' => 12],
            [['hospcode506'], 'string', 'max' => 15],
            [['hos_guid'], 'string', 'max' => 38],
            [['hos_guid_ext'], 'string', 'max' => 64],
            [['hospcode'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'amppart' => 'Amppart',
            'chwpart' => 'Chwpart',
            'hospcode' => 'Hospcode',
            'hosptype' => 'Hosptype',
            'name' => 'Name',
            'tmbpart' => 'Tmbpart',
            'moopart' => 'Moopart',
            'sss_code' => 'Sss Code',
            'sss_code_sub' => 'Sss Code Sub',
            'hospcode506' => 'Hospcode506',
            'hospital_type_id' => 'Hospital Type ID',
            'bed_count' => 'Bed Count',
            'po_code' => 'Po Code',
            'hospital_level_id' => 'Hospital Level ID',
            'hospital_phone' => 'Hospital Phone',
            'hospital_fax' => 'Hospital Fax',
            'hos_guid' => 'Hos Guid',
            'hos_guid_ext' => 'Hos Guid Ext',
        ];
    }
}
