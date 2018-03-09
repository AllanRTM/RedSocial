<?php
/**
 * Created by PhpStorm.
 * User: kenneth
 * Date: 3/9/18
 * Time: 12:50 PM
 */
namespace  app\controllers;
use yii\rest\ActiveController;

class V1MuroController extends ActiveController
{
    public $modelClass = "app\models\Muro";
}