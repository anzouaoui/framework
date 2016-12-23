<?php
/**
 * Created by iKNSA.
 * Author: Khalid Sookia <khalidsookia@gmail.com>
 * Date: 23/12/16
 * Time: 13:36
 */

namespace Romenys\Framework\Components;

use Romenys\Framework\Components\DB\DB;

class Manager
{
    private $db;

    public function __construct(DB $db = null)
    {
        if (empty($db)) {
            $db = new DB(); $this->db = $db->connect();
        } else {
            $this->setDb($db);
        }
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $db
     *
     * @return Manager
     */
    public function setDb(DB $db)
    {
        $this->db = $db->connect();

        return $this;
    }
}