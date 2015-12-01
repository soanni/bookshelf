<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Book;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fileImage')->fileInput() ?>

    <?= $form->field($model, 'date')->widget(DatePicker::className(),['clientOptions' => ['dateFormat' => 'yy-mm-dd']]);?>

    <?= $form->field($model, 'author_id')->dropDownList(Book::getAuthorsList(),['prompt' => 'Please select One'])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
