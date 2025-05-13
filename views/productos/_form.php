<?php

use app\models\Categorias;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Productos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="productos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'talla')->dropDownList([ 'S' => 'S', 'M' => 'M', 'L' => 'L', 'XL' => 'XL', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <div class="mb-3">
        <?= Html::label('Seleccione la categoria', 'categorias-search', ['class' => 'form-label']) ?>
        <div class="input-group">
            <input type="text" id="categorias-search" placeholder="Buscar categoria..." class="form-control">
            <a href="<?= Yii::$app->urlManager->createUrl(['categorias/create']) ?>" class="btn btn-primary">
                <i class="bi bi-chevron-double-left"></i>
                Nueva categoria</a>
        </div>
        <?= Html::activeListBox($model, 'id_categoria', ArrayHelper::map(Categorias::find()->orderBy(['nombre_categoria' => SORT_ASC])->all(),
            'id_categoria',
            function($categorias) {
                return $categorias->nombre_categoria;
            }
        ), [
            'prompt' => 'Seleccione una categoría',
            'class' => 'form-control mt-2',
            'id' => 'categorias-select' // aqui fue carajo mrda
        ]) ?>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script> 
    document.querySelector("#categorias-search").addEventListener('input', function(){
        let categorias = document.querySelectorAll("#categorias-select option");
        categorias.forEach(categoria => {
            if (categoria.text.toLowerCase().includes(this.value.toLowerCase())) {
                categoria.style.display = 'block'; 
            } else {
                categoria.style.display = 'none';
            }
        });
    });
</script>
