<?php

declare(strict_types=1);

class AuthorModel
{
    private DatabaseManager $databaseManager;

    public function __construct()
    {
        require 'config_localhost.php';

        $this->databaseManager = new DatabaseManager(
            $config['scheme'],
            $config['host'],
            $config['port'],
            $config['user'],
            $config['pass'],
            $config['dbname']
        );

        $this->databaseManager->connect();
    }

    public function getArticlesInfo($id)
    {
        $dbConn = $this->databaseManager->connection;

        $query =
            'SELECT
                a.id,
                a.title
            FROM articles a
            WHERE a.author_id = :id';
        $stmt = $dbConn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    public function getAuthorInfo($id)
    {
        $dbConn = $this->databaseManager->connection;

        $query =
            'SELECT *
            FROM authors
            WHERE id = :id';
        $stmt = $dbConn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();

        return $result;
    }
}
