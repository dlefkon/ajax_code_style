<?php

namespace '/current/dir';
 
use /entities/MakeEntity.php;

//mysql db
// table car has two fields, make and model which are foreign key constraints in innodb shema
// 

// routing

// /services/carServiceClass.php
// car service
public class carService() {
    
  __construct() {
    
  }
 
  public function getById( integer $id) {}
  
  public function getMakeById( integer $id ) {
   
    return $this-getOrmManager()->getRepository('make_repository')->find( $id );
  }
 
  /*
  * Returns array of car model objects given a make entity
  * @param MakeEntity
  * return array
  */
  protected function getModelsFromMake( MakeEntity $make_entity ) {
   
    $make_service = new makeService();
    $model_objects_array = $this->getORMManager()->findAll( $this-getRepository('make_repository') ); 
    return $model_objects_array;
    
 }
  
}

// controller
$car_make_value = $_GET['make'];
$car_service = new carService();

$make_object = $car_service->getById( $car_make_value );
$car_model_objects_array = $car_service->getModelsFromMake($make_object);

echo json_encode( $car_model_objects_array );
exit;                                  
  
  
