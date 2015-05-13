<?php
namespace frontend\models;
use yii\db\ActiveRecord;

class Catcount extends ActiveRecord
{

	public static function tableName()
	{
		return 'tbl_offers';
	}
}

?>