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
     * @return string
     */
    public function allOk()
    {
        $emails = [];
        foreach ($this->status as $email => $status) {
            if ($status) {
                $emails[$email] = true;
            }
        }

        return implode(',', array_keys($emails));
    }

    /**
     * Retorna todos os e-mails com erro.
     *
     * @return string
     */
    public function allError()
    {
        $emails = [];
        foreach ($this->status as $email => $status) {
            if (! $status) {
                $emails[$email] = false;
            }
        }

        return implode(',', array_keys($emails));
    }
}