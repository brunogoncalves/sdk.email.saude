<?php namespace NetForce\Sdk\EmailsSaude;

use Nano7\Sdk\SdkClient;

class EmailSaudeClient extends SdkClient
{
    /**
     * @var array
     */
    protected $endpoints = [
        'production' => 'http://emails.ms.netforce.app', // http://api.com/{version}
        'sandbox' => 'http://emails.ms.sandbox.netforce.app', // http://api.sandbox.api.com/{version}
    ];

    /**
     * Checar saude dos e-mails.
     *
     * @param $emails
     * @return EmailsResponse
     */
    public function check($emails)
    {
        $emails = is_array($emails) ? implode(',', $emails) : $emails;

        $response = $this->responseJson($this->client->request('get', $this->uri('check', [$emails])));

        return new EmailsResponse($response);
    }
}