<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requirement".
 *
 * @property integer $requirement_id
 * @property string $requirement_time_limit
 * @property string $requirement_cost
 * @property integer $start_depot_id
 * @property integer $end_depot_id
 * @property string $requirement_path
 *
 * @property RoadSection $startDepot
 * @property Depot $endDepot
 * @property RequirementPassDepot[] $requirementPassDepots
 * @property Depot[] $depots
 */
class Requirement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requirement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['requirement_time_limit', 'requirement_cost'], 'number'],
            [['start_depot_id', 'end_depot_id'], 'integer'],
            [['requirement_path'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'requirement_id' => 'Requirement ID',
            'requirement_time_limit' => 'Requirement Time Limit',
            'requirement_cost' => 'Requirement Cost',
            'start_depot_id' => 'Start Depot ID',
            'end_depot_id' => 'End Depot ID',
            'requirement_path' => 'Requirement Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStartDepot()
    {
        return $this->hasOne(RoadSection::className(), ['road_section_id' => 'start_depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEndDepot()
    {
        return $this->hasOne(Depot::className(), ['depot_id' => 'end_depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequirementPassDepots()
    {
        return $this->hasMany(RequirementPassDepot::className(), ['requirement_id' => 'requirement_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepots()
    {
        return $this->hasMany(Depot::className(), ['depot_id' => 'depot_id'])->viaTable('requirement_pass_depot', ['requirement_id' => 'requirement_id']);
    }
}