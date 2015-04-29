<?php
/**
 * Created by PhpStorm.
 * User: Gergely Muranyi
 * Date: 29/04/2015
 * Time: 12:18
 */

namespace Application\Entity;


class Demonstrate {

    protected $demonstrate;

    /**
     * @return mixed
     */
    public function getDemonstrate()
    {
        return $this->demonstrate;
    }

    /**
     * @param mixed $demonstrate
     */
    public function setDemonstrate($demonstrate)
    {
        $this->demonstrate = $demonstrate;
        return $this;
    }


}