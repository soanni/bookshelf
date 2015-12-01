<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;
use yii\imagine\Image;
use frontend\models\Author;
use Imagine\Image\Box;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_create
 * @property string $date_update
 * @property string $preview
 * @property string $date
 * @property string $author_id
 */
class Book extends \yii\db\ActiveRecord
{
    public $fileImage;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date', 'author_id'], 'required'],
            [['date_create', 'date_update', 'date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['name'],'filter','filter'=>'trim'],
            [['author_id'], 'in', 'range' => array_keys($this->getAuthorsList())],
            [['fileImage'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg','checkExtensionByMimeType' => false],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create','date_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_update'],
                ],
                'value' => new Expression('NOW()')
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => "Book's Title",
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'preview' => 'Preview',
            'date' => 'Date published',
            'author_id' => 'Author',
            'authorName' => 'Author',
        ];
    }

    public function beforeValidate(){
        if($this->date != null){
            $new_date_format = date('Y-m-d',strtotime($this->date));
            $this->date = $new_date_format;
        }
        return parent::beforeValidate();
    }

    ////////////////////////////////
    public static function getAuthorsList(){
        $droptions = Author::findBySql("SELECT id, CONCAT_WS(',',lastname,firstname) as name FROM authors")->asArray()->all();
        return ArrayHelper::map($droptions,'id','name');
    }

    public function upload($imageName)
    {
        if ($this->validate()) {
            $path = __DIR__ . '/../web/uploads/' . $imageName . '.' . $this->fileImage->extension;
            $thumb = __DIR__ . '/../web/uploads/thumbnails/' . $imageName . '.' . $this->fileImage->extension;
            $this->fileImage->saveAs($path);
            Image::frame($path)->thumbnail(new Box(100, 100))->save($thumb, ['quality' => 50]);
            //Image::thumbnail($path , 120, 120)->save($thumb, ['quality' => 50]);
            return true;
        } else {
            return false;
        }
    }

//    public function getImageThumbUrl(){
//        return realpath('@web/uploads/thumbnails') . DIRECTORY_SEPARATOR . $this->preview;
//    }

    public function getAuthor(){
        return $this->hasOne(Author::className(),['id'=>'author_id']);
    }

    public function getAuthorName(){
        return $this->author->authorName;
    }
}
