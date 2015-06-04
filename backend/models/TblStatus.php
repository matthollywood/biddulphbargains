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
class TblStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_category','status','status_id'], 'required'],
            [['offer_type'], 'string', 'max' => 255],
            [['offer_type','status','status_id'], 'unique'],
			[['status','status_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'Status ID',
            'status_category' => 'Status',
			'status' => 'Status Number'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStoreOwners()
    {
        return $this->hasMany(StoreOwners::className(), ['status' => 'status']);
    }
}
