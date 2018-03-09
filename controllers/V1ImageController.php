<?php
/**
 * Created by PhpStorm.
 * User: kenneth
 * Date: 3/7/18
 * Time: 9:25 AM
 */

namespace app\controllers;


use yii\rest\ActiveController;

class V1ImageController extends ActiveController
{
   public $modelClass = "app\models\Image";
}