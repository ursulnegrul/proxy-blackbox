<?php

namespace Blackbox;

class IP
{

    private $DB;

    /**
     * IP constructor pointing to Blocklist Database
     *
     * @param \PDO $DB
     */

    public function __construct(\PDO $DB)
    {
        $this->DB = $DB;
    }


    /**
     * @param $ip
     *
     * @return bool|null (Null if invalid IP, else Bool)
     */

    public function exists($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $Query = $this->DB->prepare('SELECT start FROM IP WHERE start <= ? AND end >= ?');
            $Query->execute([ip2long($ip), ip2long($ip)]);
            return $Query->fetch() ? true : false;
        }

        return null;
    }
}
