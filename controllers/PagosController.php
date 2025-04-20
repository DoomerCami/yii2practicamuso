<?php

namespace app\controllers;

use app\models\Pagos;
use app\models\PagosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PagosController implements the CRUD actions for Pagos model.
 */
class PagosController extends Controller
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
     * Lists all Pagos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PagosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pagos model.
     * @param int $id_pago Id Pago
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pago)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pago),
        ]);
    }

    /**
     * Creates a new Pagos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pagos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pago' => $model->id_pago]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pagos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pago Id Pago
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pago)
    {
        $model = $this->findModel($id_pago);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pago' => $model->id_pago]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pagos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pago Id Pago
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pago)
    {
        $this->findModel($id_pago)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pagos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pago Id Pago
     * @return Pagos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pago)
    {
        if (($model = Pagos::findOne(['id_pago' => $id_pago])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
