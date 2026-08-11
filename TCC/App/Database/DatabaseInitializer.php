<?php

namespace App\Database;

use PDO;

class DatabaseInitializer
{

    public function init(PDO $Connection)
    {
        $Connection->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME);
        $Connection->exec("USE " . DB_NAME);

        $scriptPath = __DIR__ . '/Scripts/ScriptBD.sql';

        if (file_exists($scriptPath)) 
        {
            $sql = file_get_contents($scriptPath);
            
            try 
            {
                $Connection->exec($sql);

            }catch (\Exception $e) {
                error_log("Erro ao inicializar banco de dados: " . $e->getMessage());
            }
        }
    }
}
