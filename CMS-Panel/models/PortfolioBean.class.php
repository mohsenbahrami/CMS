<?php


class PortfolioBean
{
    private $id;
    private $title;
    private $pic1;
    private $pic2;

    /**
     * PortfolioBean constructor.
     * @param $portArray
     */
    public function __construct($portArray)
    {
        $this->id = isset($portArray['id']) ? $portArray['id'] : null;
        $this->title = $portArray['title'];
        $this->pic1 = isset($portArray['pic1']) ? $portArray['pic1'] : null;
        $this->pic2 =  isset($portArray['pic2']) ? $portArray['pic2'] : null;
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
    public function setId($id)
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
    public function getPic1()
    {
        return $this->pic1;
    }

    /**
     * @param mixed $pic1
     */
    public function setPic1($pic1)
    {
        $this->pic1 = $pic1;
    }

    /**
     * @return mixed
     */
    public function getPic2()
    {
        return $this->pic2;
    }

    /**
     * @param mixed $pic2
     */
    public function setPic2($pic2)
    {
        $this->pic2 = $pic2;
    }




}