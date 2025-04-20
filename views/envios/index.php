<?php

use app\models\Envios;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\EnviosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Envios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="envios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Envios'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_envio',
            'id_pedido',
            'direccion_envio:ntext',
            'fecha_envio',
            'empresa_envio',
            //'numero_guia',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Envios $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_envio' => $model->id_envio]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
