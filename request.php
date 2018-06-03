<?php

include_once __DIR__ . '/abstraction.php';

class Request extends Record{

    const DRIVER = 'mssql';
    const DB = 'Sandbox';
    const TABLE = 'tbl_web_access';

    public $id;
    public $ip_address;
    public $platform;
    public $browser;
    public $version;
    public $responseCode;
    public $requestDate;
    public $requestMethod;
    public $query;
    public $endpoint;

    public function __construct($id = null)
    {
        parent::__construct(self::DRIVER,self::DB,self::TABLE,$id);
    }
    public static function lastRequest(){
        $results = $GLOBALS['db']
            ->driver(self::DRIVER)
            ->database(self::DB)
            ->table(self::TABLE)
            ->select("id")
            ->orderBy("id desc")
            ->get("value");
        return new self($results);
    }
}