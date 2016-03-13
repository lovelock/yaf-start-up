<?php

class UserModel
{
    const TABLE_NAME = 'yaf_user';

    public static function addNewUser($name, $email, $age, $gender)
    {
        $sql = "INSERT INTO `".static::TABLE_NAME."` (`name`, `email`, `age`, `gender`) values (:name, :email, :age, :gender)";
        $stmt = static::getInstance()->prepare($sql);
        $stmt->execute([
            ':name'   => $name,
            ':email'  => $email,
            ':age'    => $age,
            ':gender' => $gender,
        ]);

        return $stmt->rowCount();
    }

    public static function updateEmail($id, $email)
    {
        $sql = "UPDATE `".static::TABLE_NAME."` SET `email` = :email";
        $stmt = static::getInstance()->prepare($sql);
        $stmt->execute([
            ':email' => $email,
        ]);

        return $stmt->rowCount();
    }

    public static function showAll($start, $limit)
    {
        $sql = "SELECT * FROM `".static::TABLE_NAME."` ORDER BY `id` limit :start, :limit";
        $stmt = static::getInstance()->prepare($sql);
        $stmt->bindParam(':start', $start, \PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
