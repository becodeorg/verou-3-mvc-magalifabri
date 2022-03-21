<?php

declare(strict_types=1);

class AuthorModel
{
    private DatabaseManager $databaseManager;

    public function __construct()
    {
        $this->databaseManager = new DatabaseManager();
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
