<?php

namespace Blackbox;

class Blocklist
{

    public $DB;

    public function __construct(\PDO $DB)
    {
        $this->DB = $DB;
    }


    /**
     * @param $ip
     *
     * @return bool
     */
    public function exists($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $Query = $this->DB->prepare('SELECT start FROM IP WHERE start <= INET_ATON(?) AND end >= INET_ATON(?)');
            $Query->execute([$ip, $ip]);

            return $Query->fetch() ? true : false;
        }

        return false;
    }
}
