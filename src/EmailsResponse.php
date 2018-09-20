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
    public function isOk($email)
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

    /**
     * Retorna todos os e-mails ok.
     *
     * @param bool $str
     * @return string|array
     */
    public function allOk($str = true)
    {
        $emails = [];
        foreach ($this->status as $email => $status) {
            if ($status) {
                $emails[$email] = true;
            }
        }

        $emails = array_keys($emails);
        if (! $str) {
            return $emails;
        }

        return implode(',', $emails);
    }

    /**
     * Retorna todos os e-mails com erro.
     *
     * @param bool $str
     * @return array|string
     */
    public function allError($str = false)
    {
        $emails = [];
        foreach ($this->status as $email => $status) {
            if (! $status) {
                $emails[$email] = false;
            }
        }


        $emails = array_keys($emails);
        if (! $str) {
            return $emails;
        }

        return implode(',', $emails);
    }
}