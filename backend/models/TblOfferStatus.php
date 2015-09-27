<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_offer_status".
 *
 * @property integer $offer_status
 * @property string $offer_status_type
 *
 * @property TblOfferStatus[] $tblOfferStatus
 */
class TblOfferStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_offer_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['offer_status','offer_status_type'], 'required'],
            [['offer_status_type'], 'string', 'max' => 10],
            [['offer_status','offer_status_type'], 'unique'],
			[['offer_status'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'offer_status' => 'Status ID',
            'offer_status_type' => 'Status',
        ];
    }

    public function getTblOfferStatus()
    {
      return $this->hasOne(TblOffers::className(), ['offer_status' => 'active_status']);
    }


}
