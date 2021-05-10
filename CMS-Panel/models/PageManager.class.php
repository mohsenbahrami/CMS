<?php

/**
 * Class PageManager
 */
class PageManager extends DBManager
{
    /**
     * @param PageBean $page
     * @return bool
     */
    public function addPage(PageBean $page)
    {
        $query = $this->db->prepare("INSERT INTO `page` (`title`, `content`) VALUES (:title, :content);");
        return $query->execute(array(
            "title" => $page->getTitle(),
            "content" => $page->getContent(),
        ));
    }

    /**
     * @param PageBean $page
     * @return bool
     */
    public function editPage(PageBean $page)
    {
        $query = $this->db->prepare("UPDATE `page` SET  `content` = :content  WHERE `title` = :title;");
        return $query->execute(array(
            "content" => $page->getContent(),
            "title" => $page->getTitle(),
        ));
    }

    /**
     * @param $title
     * @return PageBean
     */
    public function getPageByTitle($title)
    {
        $query = $this->db->prepare("SELECT * FROM `page` WHERE `title`=:title");
        $query->execute(array(
            'title' => $title
        ));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $page = new PageBean();
        $page->setTitle($result['title']);
        $page->setContent($result['content']);
        return $page;
    }
}