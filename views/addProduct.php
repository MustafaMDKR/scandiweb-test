<?php

use app\core\form\Form;
?>
<div class="container m-3 d-grid gap-3">
    <h1 class="mb-2"> <i class="bi bi-stars p-2" style="font-size: 3rem; color: #FC7521;"></i> Add New Product...</h1>
    <?php $form = Form::begin('', 'post') ?>
    <div class="row">
        <div class="col">
            <?= $form->inField($model, 'name', 'pencil-square') ?>
        </div>
        <div class="col">
            <?= $form->inField($model, 'sku', 'qr-code') ?>
        </div>
    </div>
    <?= $form->inField($model, 'description', 'chat-square-text') ?>
    <div class="row">
        <div class="col">
            <?= $form->inField($model, 'price', 'cash-coin')->numField()?>
        </div>
        <div class="col">
            <?= $form->selField($model, 'type', 'list-stars') ?>
        </div>
    </div>

    <div id="sizeView" class="">
        <?= $form->inField($model, 'size', 'device-hdd') ?>
    </div>
    <div id="weightView" class="">
        <?= $form->inField($model, 'weight', 'speedometer2')->numField() ?>
    </div>
    
    <div id="dimensionView" class="row ">
        <div class="col-sm">
            <?= $form->inField($model, 'width', 'unity')->numField() ?>
        </div>
        <span class="col-auto align-self-center" style="font-size: 2rem; color: #FC7521;"> X </span>
        <div class="col-sm">
            <?= $form->inField($model, 'height', 'unity')->numField() ?>
        </div>
        <span class="col-auto align-self-center" style="font-size: 2rem; color: #FC7521;"> X </span>
        <div class="col-sm">
            <?= $form->inField($model, 'length', 'unity')->numField() ?>
        </div>
    </div>

    <div class="row justify-content-center">
        <button class="btn btn-primary m-2 col-md-5" type="submit">Save</button>
        <a href="/" class="btn btn-danger m-2 col-md-5">Cancel</a>
    </div>
    <?php Form::end() ?>
</div>