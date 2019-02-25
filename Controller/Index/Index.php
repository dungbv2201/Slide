<?php
/**
 * Created by PhpStorm.
 * User: vandung
 * Date: 25/02/2019
 * Time: 09:14
 */

namespace Dungbv\Slide\Controller\Index;


/**
 * Class Index
 * @package Dungbv\Slide\Controller\Index
 */
class Index
{
    protected $name;

    /**
     * Index constructor.
     * @param $names
     */
    public function __construct($names)
    {
        $this->name = $names;
    }
    public function helloWorld(){
        return $this->name;
    }
}
