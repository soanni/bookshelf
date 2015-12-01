<?php

namespace frontend\models;

use Yii;
use common\models\User;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\db\Expression;

/**
 * This is the model class for table "profile".
 *
 * @property string $id
 * @property string $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $birthdate
 * @property string $gender_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Gender $gender
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'gender_id'], 'required'],
            [['user_id', 'gender_id'], 'integer'],
            [['first_name', 'last_name'], 'string'],
            [['birthdate', 'created_at', 'updated_at'], 'safe'],
            [['gender_id'], 'in', 'range' => array_keys($this->getGenderList())]
        ];
    }

    public function beforeValidate(){
        if($this->birthdate != null){
            $new_date_format = date('Y-m-d',strtotime($this->birthdate));
            $this->birthdate = $new_date_format;
        }
        return parent::beforeValidate();
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birthdate' => 'Birthdate',
            'gender_id' => 'Gender',
            'created_at' => 'Member Since',
            'updated_at' => 'Last Updated',
            'genderName' => Yii::t('app','Gender'),
            'userLink' => Yii::t('app','User'),
            'profileIdLink' => Yii::t('app','Profile')
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_id']);
    }

    public function getGenderName(){
        return $this->gender->gender_name;
    }

    public static function getGenderList(){
        $droptions = Gender::find()->asArray()->all();
        return ArrayHelper::map($droptions,'id','gender_name');
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id' => 'user_id']);
    }

    public function getUserName(){
        return $this->user->username;
    }

    public function getUserId(){
        return $this->user ? $this->user->id : 'none';
    }

    public function getUserLink(){
        $url = Url::to(['user/view', 'id' => $this->UserId]);
        $options = [];
        return Html::a($this->getUserName(),$url, $options);
    }

    public function getProfileIdLink(){
        $url = Url::to(['profile/update', 'id' => $this->id]);
        $options = [];
        return Html::a($this->id,$url,$options);
    }

}
