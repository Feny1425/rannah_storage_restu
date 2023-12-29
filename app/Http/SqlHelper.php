<?php

namespace App\Http;

class SqlHelper
{
    /**
     * @throws \Exception
     */
    public static function getConcatSql($columns, $divider = " "): string
    {
        if (env('DB_CONNECTION') == 'sqlite') {
            return self::getConcatSqlite($columns, $divider);
        } else if (env('DB_CONNECTION') == 'mysql') {
            return self::getConcatMysql($columns, $divider);
        } else {
            throw new \Exception("Unsupported database type");
        }
    }

    public static function getConcatSqlite($columns, $divider = " "): string
    {
        $sql = "";
        for ($i = 0; $i < count($columns); $i++) {
            $sql .= $columns[$i];
            if ($i < count($columns) - 1) {
                $sql .= " || '$divider' || ";
            }
        }
        return $sql;
    }

    public static function getConcatMysql($columns, $divider = " "): string
    {
        $sql = "";
        for ($i = 0; $i < count($columns); $i++) {
            $sql .= $columns[$i];
            if ($i < count($columns) - 1) {
                $sql .= ", '$divider', ";
            }
        }
        return $sql;
    }
}