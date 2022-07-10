<?php

namespace Library\Database;

use PDO;

class Connection
{
    protected PDO $pdo;

    public function __construct(array $config)
    {
        $this->pdo = new PDO(
            "mysql:host={$config['host']};dbname={$config['dbname']};charset=UTF8",
            $config['user'],
            $config['password'], [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }
    public function getResults(string $sql, ?array $parameters = null): array
    {
        $query = $this->pdo->prepare($sql);
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function getUniqueResult(string $sql, ?array $parameters = null): array|false
    {
        $query = $this->pdo->prepare($sql);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function execute(string $sql, ?array $parameters = null): string
    {
        $query = $this->pdo->prepare($sql);
        $query->execute($parameters);

        return $this->pdo->lastInsertId();
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    public function setPdo(PDO $pdo): void
    {
        $this->pdo = $pdo;
    }
}
