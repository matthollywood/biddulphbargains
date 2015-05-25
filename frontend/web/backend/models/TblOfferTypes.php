<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_offer_types".
 *
 * @property integer $offer_id
 * @property string $offer_type
 *
 * @property TblOffers[] $tblOffers
 */
class TblOfferTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_offer_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['offer_type'], 'required'],
            [['offer_type'], 'string', 'max' => 255],
            [['offer_type'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'offer_id' => 'Offer ID',
            'offer_type' => 'Offer Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblOffers()
    {
        return $this->hasMany(TblOffers::className(), ['offer_type_id' => 'offer_id']);
    }
}
