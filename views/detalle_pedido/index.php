<?php

use app\models\Detalle_Pedido;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\Detalle_PedidoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Detalle Pedidos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle--pedido-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Detalle Pedido'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_detalle',
            'id_pedido',
            'id_producto',
            'cantidad',
            'subtotal',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Detalle_Pedido $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_detalle' => $model->id_detalle]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
