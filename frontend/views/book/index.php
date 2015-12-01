<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </br>
    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                //'attribute' => 'img',
                'format' => 'raw',
                'label' => 'Image',
                'value' => function ($data) {
                    return Html::img('@web/uploads/thumbnails/' . $data->preview);
                },
            ],
            ['attribute' => 'authorName'],
            'date',
            'date_create',
            [
                'class' => ActionColumn::className(),
                'header' => 'Actions',
                'buttons' => [
                    'view' => function($url, $model, $key){
//                        $view_url = Yii::$app->getUrlManager()->createUrl(['book/view','id'=>$key]);
//                        return Html::a('View',$view_url,['class'=>'showModalButton','aria-label' => Yii::t('yii', 'See'),]);
                        $options =[
                            'title' => Yii::t('yii', 'View'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',
                            'class' => 'viewModal'
                        ];
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                    }
                ]
            ],
        ],
    ]); ?>

</div>
