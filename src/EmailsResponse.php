<?php namespace NetForce\Sdk\EmailsSaude;

use Nano7\Support\Arr;

class EmailsResponse
{
    /**
     * @var array
     */
    protected $status = [];

    /**
     * @param $status
     */
    public function __construct($status)
    {
        $this->status = (array) $status;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function isOK($email)
    {
        return Arr::get($this->status, $email, false);
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->status;
    }
}