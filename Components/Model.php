<?php
/**
 * Created by iKNSA.
 * Author: Khalid Sookia <khalidsookia@gmail.com>
 * Date: 03/12/16
 * Time: 17:51
 */

namespace Romenys\Framework\Components;


class Model
{
    public function __construct($data = [])
    {
        if (!empty($data)) $this->hydrate($data);

        if (method_exists($this, "setCreatedAt") && empty($data["createdAt"])) $this->setCreatedAt("NOW");
    }

    public function hydrate(array $data)
    {
        foreach ($data as $name => $value) {
            $method = 'set'.ucfirst($name);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function toArray($data = null)
    {
        $data = is_null($data) ? $this : $data;

        if (is_array($data) || is_object($data)) {
            $result = array();

            foreach ($data as $key => $value) {
                $result[$key] = $this->toArray($value);
            }

            return $result;
        }

        return $data;
    }
}
