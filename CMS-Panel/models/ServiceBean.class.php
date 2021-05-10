<?php


class ServiceBean
{
    private $id;
    private $title;
    private $text;
    private $pic;
    private $num;

    /**
     * ServiceBean constructor.
     * @param $id
     * @param $sTitle
     * @param $sText
     * @param $sPic
     */
    public function __construct($serviceArray)
    {
        $this->id = isset($serviceArray['id']) ? $serviceArray['id'] : null;
        $this->title = $serviceArray['title'];
        $this->text = $serviceArray['text'];
        $this->pic = isset($serviceArray['pic']) ? $serviceArray['pic'] : null;
        $this->num = isset($serviceArray['num']) ? $serviceArray['num'] : null;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|null $id
     */
    public function setId( $id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getPic()
    {
        return $this->pic;
    }

    /**
     * @param mixed $pic
     */
    public function setPic($pic)
    {
        $this->pic = $pic;
    }

    /**
     * @return mixed
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * @param mixed $num
     */
    public function setNum($num)
    {
        $this->num = $num;
    }




}