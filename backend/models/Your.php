<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_offers".
 *
 * @property integer $offer_id
 * @property integer $id
 * @property integer $offer_type_id
 * @property string $offer_description
 * @property string $offer_start_date
 * @property string $offer_end_date
 *
 * @property TblOfferTypes $offerType
 */
class Your extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_offers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'offer_type_id', 'offer_description', 'offer_start_date', 'offer_end_date'], 'required'],
            [['id', 'offer_type_id'], 'integer'],
            [['offer_start_date', 'offer_end_date'], 'safe'],
            [['offer_description'], 'string', 'max' => 8000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'offer_id' => 'Offer ID',
            'id' => 'ID',
            'offer_type_id' => 'Offer Type ID',
            'offer_description' => 'Offer Description',
            'offer_start_date' => 'Start Date',
            'offer_end_date' => 'End Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferType()
    {
        return $this->hasOne(TblOfferTypes::className(), ['offer_id' => 'offer_type_id']);
    }
}
