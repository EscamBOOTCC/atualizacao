<?php
namespace app\repositories;


use App\database\ConnectionFactory;
use App\models\Trabalhador;


class TrabalhadorRepository
{


   private $conn;


   public function __construct()
   {
       $this->conn = ConnectionFactory::getConnection();
   }
   public function findById($id){
      
   }


  
}
