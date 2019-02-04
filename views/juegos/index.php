<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Juegos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="juegos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuevo Juego', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <div class="col_md_8">
        <table class="table">
            <tbody>
                <?php foreach ($juegos as $juego): ?>
                <a href="<?= Url::to(['juegos/view', 'id' => $juego->id]) ?>">
                    <tr>
                        <div class="">
                            <td><img src="<?= Html::encode($juego->imagen) ?>" width="150" height="75"></td>
                            <td><?= Html::encode($juego->titulo) ?></td>
                            <td><?= Html::encode($juego->descripcion) ?></td>
                            <td></td>
                        </div>
                    </tr>
                </a>

                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>
