<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "nureport".
 *
 * @property integer $id
 * @property string $station
 * @property string $rname
 * @property string $rcontroller
 * @property string $rdate
 * @property string $status
 */
class Nureport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nureport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rdate'], 'safe'],
            [['station', 'rcontroller'], 'string', 'max' => 50],
            [['rname'], 'string', 'max' => 300],
            [['status'], 'string', 'max' => 1],
            [['ext'], 'string', 'max' => 350],            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ลำดับที่',
            'station' => 'หน่วยงาน',
            'rname' => 'ชื่อรายงาน',
            'rcontroller' => 'Controller',
            'rdate' => 'วันที่',
            'status' => 'สถานะ',
            'ext' => 'หมายเหตุ',
        ];
    }
}
