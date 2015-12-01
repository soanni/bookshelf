<?php
    use yii\helpers\Html;
    /* @var $this yii\web\View */
    /* @var $model frontend\models\Books */
?>
<div class="books-view">
    <?= Html::img('@web/uploads/' . $model->preview,['height'=> '450', 'width' => '300']) ?>
</div>
