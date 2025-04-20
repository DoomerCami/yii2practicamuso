<?php

use app\models\Pedidos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PedidosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Pedidos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedidos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Pedidos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pedido',
            'id_usuario',
            'fecha_pedido',
            'estado',
            'total',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pedidos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_pedido' => $model->id_pedido]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
