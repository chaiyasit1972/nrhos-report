<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "so_recv".
 *
 * @property string $prov_id
 * @property string $amp_id
 * @property string $tmb_id
 * @property string $moo_id
 * @property string $moo
 * @property string $moo_name
 * @property string $hospsub
 * @property string $cupcode
 * @property string $pcc_code
 */
class SoRecv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'so_recv';
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
            [['prov_id', 'amp_id', 'tmb_id', 'moo_id', 'moo', 'hospsub', 'cupcode'], 'required'],
            [['prov_id', 'moo'], 'string', 'max' => 2],
            [['amp_id'], 'string', 'max' => 4],
            [['tmb_id'], 'string', 'max' => 6],
            [['moo_id'], 'string', 'max' => 8],
            [['moo_name'], 'string', 'max' => 100],
            [['hospsub', 'cupcode', 'pcc_code'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prov_id' => 'Prov ID',
            'amp_id' => 'Amp ID',
            'tmb_id' => 'Tmb ID',
            'moo_id' => 'Moo ID',
            'moo' => 'Moo',
            'moo_name' => 'Moo Name',
            'hospsub' => 'Hospsub',
            'cupcode' => 'Cupcode',
            'pcc_code' => 'Pcc Code',
        ];
    }
}
