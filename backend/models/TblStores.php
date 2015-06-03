<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_stores".
 *
 * @property integer $store_id
 * @property string $store_name
 * @property integer $user_id
 *
 * @property User $user
 */
class TblStores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_stores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['store_name', 'user_id'], 'required'],
            [['user_id','store_id'], 'integer'],
            [['store_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'store_id' => 'Store ID',
            'store_name' => 'Store Name',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
