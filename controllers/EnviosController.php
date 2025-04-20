<?php

namespace app\controllers;

use app\models\Envios;
use app\models\EnviosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EnviosController implements the CRUD actions for Envios model.
 */
class EnviosController extends Controller
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
     * Lists all Envios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EnviosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Envios model.
     * @param int $id_envio Id Envio
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_envio)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_envio),
        ]);
    }

    /**
     * Creates a new Envios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Envios();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_envio' => $model->id_envio]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Envios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_envio Id Envio
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_envio)
    {
        $model = $this->findModel($id_envio);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_envio' => $model->id_envio]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Envios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_envio Id Envio
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_envio)
    {
        $this->findModel($id_envio)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Envios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_envio Id Envio
     * @return Envios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_envio)
    {
        if (($model = Envios::findOne(['id_envio' => $id_envio])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
