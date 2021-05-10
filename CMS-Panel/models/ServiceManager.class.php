<?php

/**
 * Class ServiceManager
 */
class ServiceManager extends DBManager
{
    /**
     * @param ServiceBean $service
     * @return bool
     */
    public function addService(ServiceBean $service)
    {
        $query = $this->db->prepare("INSERT INTO `service` (`title`, `text`, `pic`, `num`) VALUES (:title, :text, :pic, :num);");
        return $query->execute(array(
            "title" => $service->getTitle(),
            "text" => $service->getText(),
            "pic" => $service->getPic(),
            "num" => $service->getNum(),
        ));
    }

    /**
     * @param ServiceBean $service
     * @return bool
     */
    public function editService(ServiceBean $service)
    {
        $query = $this->db->prepare("UPDATE `service` SET  `title`= :title, `text` = :text, `pic` = :pic  WHERE `num` = :num;");
        return $query->execute(array(
            "title" => $service->getTitle(),
            "text" => $service->getText(),
            "pic" => $service->getPic(),
            "num" => $service->getNum(),
        ));
    }

    /**
     * @param $num
     * @return ServiceBean
     */
    public function getServiceByNum($num)
    {
        $query = $this->db->prepare("SELECT * FROM `service` WHERE `num`=:num");
        $query->execute(array(
            'num' => $num
        ));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $service = new ServiceBean($result);
        return $service;
    }

    /**
     * @return array
     */
    public function getAllServices()
    {
        $query = $this->db->query("SELECT * FROM `service` ORDER BY `id` DESC");
        $services = $query->fetchAll(PDO::FETCH_ASSOC);

        return $services;
    }
}