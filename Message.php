<?php
/**
 * Created by PhpStorm.
 * User: wouter
 * Date: 26-5-2015
 * Time: 15:05
 */

class Message {

    private $id;
    private $content;
    private $thread;

    function __construct($content, $thread)
    {
        $this->content = $content;
        $this->thread = $thread;
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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getThread()
    {
        return $this->thread;
    }

    /**
     * @param mixed $thread
     */
    public function setThread($thread)
    {
        $this->thread = $thread;
    }




}