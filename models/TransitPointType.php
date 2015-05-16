<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transit_point_type".
 *
 * @property integer $transit_point_type_id
 * @property string $transit_point_type_name
 *
 * @property TransitPoint $transitPoint
 */
class TransitPointType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transit_point_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transit_point_type_id'], 'required'],
            [['transit_point_type_id'], 'integer'],
            [['transit_point_type_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'transit_point_type_id' => 'Transit Point Type ID',
            'transit_point_type_name' => 'Transit Point Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransitPoint()
    {
        return $this->hasOne(TransitPoint::className(), ['transit_point_id' => 'transit_point_type_id']);
    }
}
