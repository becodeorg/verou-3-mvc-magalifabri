<?php

class DatabaseManager
{
    private string $scheme;
    private string $host;
    private int $port;
    private string $user;
    private string $password;
    private string $dbname;

    public PDO $connection;

    public function __construct()
    {
        // on heroku
        if (!empty(getenv("DATABASE_URL"))) {
            $dbParams = parse_url(getenv("DATABASE_URL"));

            $this->scheme = 'pgsql';
            $this->host = $dbParams['host'];
            $this->port = $dbParams['port'];
            $this->user = $dbParams['user'];
            $this->password = $dbParams['pass'];
            $this->dbname = ltrim($dbParams["path"], "/");
        } else { // local
            require 'config_localhost.php';

            $this->scheme = $config['scheme'];
            $this->host = $config['host'];
            $this->port = $config['port'];
            $this->user = $config['user'];
            $this->password = $config['pass'];
            $this->dbname = $config['dbname'];
        }
    }

    public function connect(): void
    {
        try {
            $this->connection = new PDO(
                "{$this->scheme}:
                    host={$this->host};
                    port={$this->port};
                    dbname={$this->dbname}",
                $this->user,
                $this->password
            );

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
