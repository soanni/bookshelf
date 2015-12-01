<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use frontend\models\Book;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\BooksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['showLabels' => false]
    ]); ?>

    <div class="form-group kv-fieldset-inline">
        <div class="col-sm-3">
            <?= $form->field($model, 'author_id')->dropDownList(Book::getAuthorsList(),['prompt'=>'Please select author']) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Book title']) ?>
        </div>
    </div>

    <div class="form-group kv-fieldset-inline">
        <?= Html::activeLabel($model, 'date_begin', [
            'label'=>'Publish date begin from',
            'class'=>'col-sm-2 control-label'
        ]); ?>
        <div class="col-sm-2">
            <?= $form->field($model, 'date_begin')->widget(DatePicker::className(),['clientOptions' => ['dateFormat' => 'yy-mm-dd']]);; ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'date_end')->widget(DatePicker::className(),['clientOptions' => ['dateFormat' => 'yy-mm-dd']]);; ?>
        </div>
        <div class="col-sm-3">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
