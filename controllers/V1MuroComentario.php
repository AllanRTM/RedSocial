<?php
/**
 * Created by PhpStorm.
 * User: kenneth
 * Date: 3/9/18
 * Time: 1:41 PM
 */
namespace app\controllers;
use yii\rest\ActiveController;

class V1MuroComentario extends ActiveController
{
    public $modelClass = "app\models\MuroComentario";
}