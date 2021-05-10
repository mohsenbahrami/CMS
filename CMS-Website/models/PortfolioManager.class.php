<?php


class PortfolioManager extends DBManager
{

    public function getPortById($id)
    {
        $query = $this->db->prepare("SELECT * FROM `portfolio` WHERE `id`=:id");
        $query->execute(array(
            'id' => $id
        ));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $port = new PortfolioBean($result);
        return $port;
    }

    public function getAllPort()
    {
        $query = $this->db->query("SELECT * FROM `portfolio` ORDER BY `id` ASC");
        $ports = $query->fetchAll(PDO::FETCH_ASSOC);

        return $ports;
    }
}