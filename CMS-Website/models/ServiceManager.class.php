<?php


class ServiceManager extends DBManager
{

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

    public function getAllServices()
    {
        $query = $this->db->query("SELECT * FROM `service` ORDER BY `id` DESC");
        $services = $query->fetchAll(PDO::FETCH_ASSOC);

        return $services;
    }
}