<?php
/**
 * @package ImpressPages
 * @copyright   Copyright (C) 2011 ImpressPages LTD.
 * @license see ip_license.html
 */

namespace IpUpdate\Library\Model;


class Db
{
    const DRIVER_PDO_MYSQL = 0; 
    const DRIVER_MYSQL = 1;
    
    /**
     *
     * @param array $configuration configuration parsed using configuration parser
     */
    public function connect($cf, $driver = self::DRIVER_PDO_MYSQL)
    {
        switch($driver) {
            case self::DRIVER_PDO_MYSQL:
                try {
                    return new \PDO('mysql:host='.$cf['DB_SERVER'].';dbname='.$cf['DB_DATABASE'], $cf['DB_USERNAME'], $cf['DB_PASSWORD']);
                } catch (PDOException $e) {
                    throw new \Exception($e->getMessage());
                }
            break;
            case self::DRIVER_MYSQL:
                $connection = mysql_connect($cf['DB_SERVER'], $cf['DB_USERNAME'], $cf['DB_PASSWORD']);
                if ($connection) {
                    mysql_select_db($cf['DB_DATABASE']);
                    mysql_query("SET CHARACTER SET ".$cf['MYSQL_CHARSET']);
                    return $connection;
                } else {
                    throw new \Exception("Can\'t connect to database.");
                }
            break;
            default:
                throw new \Exception("Unknown driver");
            break;
        }

    }

}