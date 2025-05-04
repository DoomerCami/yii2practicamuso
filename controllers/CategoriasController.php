<?php

namespace app\controllers;

use app\models\Categorias;
use app\models\CategoriasSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * CategoriasController implements the CRUD actions for Categorias model.
 */
class CategoriasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Categorias models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CategoriasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categorias model.
     * @param int $id_categoria Id Categoria
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_categoria)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_categoria),
        ]);
    }

    /**
     * Creates a new Categorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Categorias();
        $message = '';

        if($this->request->isPost){
           $transaction = Yii::$app->db->beginTransaction();
           try{
            if($model->load($this->request->post())){
                $model->imageFile = UploadedFile::getInstance($model,'imageFile');
                if($model->save() && (!$model->imageFile || $model->upload())){
                    $transaction->commit();
                    return $this->redirect(['view', 'id_categoria' => $model->id_categoria]);
                }else{
                    $message = 'Error al guardar la imagen';
                    $transaction->rollBack();
                }
            }else{
                $message = 'Error al cargar la imagen';
                $transaction->rollBack();
            }
           }catch (\Exception $e){
               $transaction->rollBack();
               $message = 'Error al guardar la categoria';
           }
        }else{
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'message' => $message,
        ]);
    }

    /**
     * Updates an existing Categorias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_categoria Id Categoria
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_categoria)
    {
        $model = $this->findModel($id_categoria);
        $message='';
        if($this->request->isPost && $model->load($this->request->post())){
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if($model->save() && (!$model->imageFile || $model->upload())){
                return $this->redirect(['view', 'id_categoria' => $model->id_categoria]);
            }else{
                $message = 'Error al guardar la imagen';
            }
        }

        return $this->render('update', [
            'model' => $model,
            'mensaje' => $message,
        ]);
    }

    /**
     * Deletes an existing Categorias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_categoria Id Categoria
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_categoria)
    {
        $model = $this->findModel($id_categoria);
        $model->deleteimagen_url();
        $model->delete();
         return $this->redirect(['index']);
    }

    /**
     * Finds the Categorias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_categoria Id Categoria
     * @return Categorias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_categoria)
    {
        if (($model = Categorias::findOne(['id_categoria' => $id_categoria])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
