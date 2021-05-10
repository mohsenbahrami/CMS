<?php


class PageManager extends DBManager
{

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