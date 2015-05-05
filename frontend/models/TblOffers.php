<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "tbl_offers".
 *
 * @property integer $offer_id
 * @property integer $id
 * @property integer $offer_type_id
 * @property string $offer_description
 * @property string $start_date
 * @property string $end_date
 * @property integer $store_id
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
            [[ 'offer_type', 'offer_description', 'start_date', 'end_date'], 'required'],
            [[ 'offer_type'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['offer_description'], 'string', 'max' => 8000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            
            'id' => 'ID',
            'offer_type' => 'Offer Type',
            'offer_description' => 'Offer Description',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
			   ];
    }
	    public function getofferId()
    {
        return $this->getPrimaryKey();
    }
	
	public function beforeSave($insert = true) {
    if ($insert) 
		$this->id = Yii::$app->user->id;
    return parent::beforeSave($insert);
}
	
}





