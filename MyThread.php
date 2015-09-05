<?php
/**
 * Created by PhpStorm.
 * User: wouter
 * Date: 26-5-2015
 * Time: 14:53
 */

class MyThread {

    private $id;
    private $name;
    private $amountOfComments;

    function __construct($name){
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAmountOfComments()
    {
        return $this->amountOfComments;
    }

    /**
     * @param mixed $amountOfComments
     */
    public function setAmountOfComments($amountOfComments)
    {
        $this->amountOfComments = $amountOfComments;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }




}