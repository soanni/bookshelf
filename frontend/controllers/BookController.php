<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Book;
use frontend\models\search\BookSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PermissionHelpers;
use yii\web\UploadedFile;

/**
 * BooksController implements the CRUD actions for Books model.
 */
class BookController extends Controller
{
    public function behaviors()
    {
        return [
            'actions' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index','view','update','delete','create'],
                'rules' => [
                    [
                        'actions' => ['index','view','update','delete','create'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function($rule,$action){return PermissionHelpers::requireStatus('Active');}
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Books models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Books model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderPartial('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Books model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Book();

        if ($model->load(Yii::$app->request->post())) {
            $model->fileImage = UploadedFile::getInstance($model, 'fileImage');
            if ($model->fileImage != null){
                $imageName = Yii::$app->security->generateRandomString();
                $model->preview = $imageName . '.' . $model->fileImage->extension;
            }
            $model->save();
            if ($model->fileImage != null){
                $model->upload($imageName);
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Books model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {
            $model->fileImage = UploadedFile::getInstance($model, 'fileImage');
            if ($model->fileImage != null){
                $imageName = Yii::$app->security->generateRandomString();
                $model->preview = $imageName . '.' . $model->fileImage->extension;
            }
            $model->save();
            if ($model->fileImage != null){
                $model->upload($imageName);
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Books model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionShow($id){
        return $this->renderPartial('viewImg', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Books model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Books the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
