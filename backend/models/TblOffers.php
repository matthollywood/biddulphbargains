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
 * @property integer $active_status
 *
 * @property TblOfferTypes $offerType
 */
class TblOffers extends \yii\db\ActiveRecord
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
            [['id', 'offer_type_id', 'offer_description', 'offer_start_date', 'offer_end_date','active_status'], 'required'],
            [['store_user_id','id','active_status','active_status'], 'integer'],
            [['offer_start_date', 'offer_end_date','offer_type_id'], 'safe'],
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
            'id' => 'Store',
            'offer_type_id' => 'Offer Type',
            'offer_description' => 'Offer Description',
            'offer_start_date' => 'Offer Start Date',
            'offer_end_date' => 'Offer End Date',
			      'store_user_id' => 'User ID',
            'active_status' => 'Active Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferType()
    {
        return $this->hasOne(TblOfferTypes::className(), ['offer_id' => 'offer_type_id']);
    }

	public function getStoreName()
	{
		return $this->hasOne(TblStores::className(),['store_name' => 'id']);
	}


	public function getStoreId()
	{
		return $this->hasOne(TblStores::className(),['store_id'=>'store_user_id']);
	}

	public function beforeSave($insert = true) {
    if ($insert)
		$this->store_user_id = Yii::$app->user->id;
    return parent::beforeSave($insert);
}
}
