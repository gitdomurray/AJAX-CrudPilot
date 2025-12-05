<?php
class Conexao
{
    private static $instancia;
    public static function getConexao()
    {
        if (!isset(self::$instancia)) {
            try {
                self::$instancia = new PDO("mysql:host=localhost;dbname=corrida;charset=utf8mb4", "root", "bancodedados");
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro: " . $e->getMessage());
            }
        }
        return self::$instancia;
    }
}
