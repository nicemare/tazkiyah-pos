<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "outlet".
 *
 * @property integer $id
 * @property string $label
 * @property string $address
 * @property double $latitude
 * @property double $longitude
 * @property string $phone
 * @property string $status
 *
 * @property Employee[] $employees
 * @property Order[] $orders
 */
class Outlet extends \common\components\coremodels\ZeedActiveRecord
{
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'outlet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label'], 'required'],
            [['address'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['label'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'label' => Yii::t('app', 'Label'),
            'address' => Yii::t('app', 'Address'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'phone' => Yii::t('app', 'Phone'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['outlet_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['outlet_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\activequery\OutletQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\activequery\OutletQuery(get_called_class());
    }

    public static function getStatusAsList($index = '')
    {
        $return = [
            static::STATUS_INACTIVE => Yii::t('app', 'Inactive'), 
            static::STATUS_ACTIVE => Yii::t('app', 'Active')
        ];

        return (empty($index) ? $return : $return[$index]);
    }

    /**
     * Get all outlet as list used in dropdown
     * @return array of object 
     */
    public static function getAllAslist()
    {
        return self::find()->
            select(['label', 'id'])->
            orderBy('label')->
            indexBy('id')->
            column();
    }
}
