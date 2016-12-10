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

    public function toArray()
    {
        return (array) $this;
    }
}
