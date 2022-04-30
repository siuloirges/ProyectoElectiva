<?php
require_once  "C:/UwAmp/www/ProyectoElectiva/lib/php-activerecord/ActiveRecord.php";
require_once 'C:/UwAmp/www/ProyectoElectiva/lib/config.php';

class Lab extends ActiveRecord\Model {
    public static $table_name = "lab";
}
