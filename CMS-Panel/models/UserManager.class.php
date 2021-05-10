<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class UserManager extends DBManager
{
    /**
     * @param UserBean $user
     * @return bool
     */
    public function addUser(UserBean $user)
    {
        $query = $this->db->prepare("INSERT INTO `user` (`name`, `email`, `username`, `password`, `status`) VALUES (:name, :email, :username, :password, :status);");
        return $query->execute(array(
            "name" => $user->getName(),
            "email" => $user->getEmail(),
            "username" => $user->getUsername(),
            "password" => $user->getPassword(),
            "status" => $user->getStatus(),
        ));
    }

    /**
     * @param $userName
     * @return UserBean
     */
    public function getUserByUsername($userName)
    {
        $query = $this->db->prepare("SELECT * FROM `user` WHERE username=:username");
        $query->execute(array(
            'username' => $userName
        ));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $user = new UserBean($result);
        return $user;
    }

    /**
     * @return array
     */
    public function getAllUsers()
    {
        $query = $this->db->query("SELECT * FROM `user` ORDER BY `id` DESC");
        $users = $query->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    /**
     * @param UserBean $user
     * @return bool
     */
    public function editUser(UserBean $user)
    {
        $query = $this->db->prepare("UPDATE `user` SET `name`= :name, `email`= :email, `username` = :username WHERE `id` = :id;");
        return $query->execute(array(
            "name" => $user->getName(),
            "email" => $user->getEmail(),
            "username" => $user->getUsername(),
            "id" => $user->getId()
        ));
    }

    /**
     * @param $loginArray
     * @return UserBean
     */
    public function verify_login($loginArray)
    {
        $query = $this->db->prepare("SELECT * FROM `user` WHERE `username` =:username AND  `password` =:password");
        $query->execute(array(
            ":username" => $loginArray['username'],
            ":password" => md5($loginArray['password'])
        ));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result)
            $user = new UserBean($result);

        return $user;
    }

    /**
     * @param $col
     * @param $val
     * @return bool
     */
    public function verify_existence($col, $val)
    {
        $valid = false;
        $query = $this->db->prepare("SELECT * FROM `user` WHERE `" . $col . "`=?;");
        $query->execute(array($val));

        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        if (empty($data)) {
            $valid = true;
        }
        return $valid;
    }

    /**
     * @param $id
     */
    public function adminUser( $id ) {
        $query = $this->db->prepare( "UPDATE `user` SET `status` = 1 WHERE `id` = ?;" );
        $query->execute( array( $id ) );
    }

    /**
     * @param $id
     */
    public function moderatUser( $id ) {
        $query = $this->db->prepare( "UPDATE `user` SET `status` = 0 WHERE `id` = ?;" );
        $query->execute( array( $id ) );
    }

    /**
     * @param $id
     */
    public function deleteUser( $id ) {
        $query = $this->db->prepare( "DELETE FROM `user` WHERE `id` = ?;" );
        $query->execute( array( $id ) );
    }

    /**
     * @param $pass
     * @param $username
     */
    public function editUserPassword($pass, $username)
    {
        $query = $this->db->prepare("UPDATE `user` SET `password`= :password WHERE `username` = :username;");
        $query->execute(array(
            "password" => md5($pass),
            "username" => $username,
        ));
    }

    /**
     * @return int
     */
    public function GetUserCounts()
    {
        $query = $this->db->query("SELECT * FROM `user` ORDER BY `id` DESC");
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        return count($users);
    }
}