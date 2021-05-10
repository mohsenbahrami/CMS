<?php

/**
 * Class PortfolioManager
 */
class PortfolioManager extends DBManager
{

    /**
     * @param PortfolioBean $port
     * @return bool
     */
    public function addPort(PortfolioBean $port)
    {
        $query = $this->db->prepare("INSERT INTO `portfolio` (`title`, `pic1`, `pic2`) VALUES (:title, :pic1, :pic2);");
        return $query->execute(array(
            "title" => $port->getTitle(),
            "pic1" => $port->getPic1(),
            "pic2" => $port->getPic2(),
        ));
    }

    /**
     * @param $id
     */
    public function deletePort($id){
        $query = $this->db->prepare( "DELETE FROM `portfolio` WHERE `id` = ?;" );
        $query->execute( array( $id ) );
    }

    /**
     * @param PortfolioBean $port
     * @return bool
     */
    public function editPort(PortfolioBean $port)
    {
        $query = $this->db->prepare("UPDATE `portfolio` SET `title`= :title, `pic1` = :pic1, `pic2` = :pic2  WHERE `id` = :id;");
        return $query->execute(array(
            "title" => $port->getTitle(),
            "pic1" => $port->getPic1(),
            "pic2" => $port->getPic2(),
            "id" => $port->getId(),

        ));
    }

    /**
     * @param $id
     * @return PortfolioBean
     */
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

    /**
     * @return array
     */
    public function getAllPort()
    {
        $query = $this->db->query("SELECT * FROM `portfolio` ORDER BY `id` ASC");
        $ports = $query->fetchAll(PDO::FETCH_ASSOC);

        return $ports;
    }
}