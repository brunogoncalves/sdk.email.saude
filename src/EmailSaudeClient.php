<?php namespace NetForce\Sdk\EmailsSaude;

use Nano7\Sdk\SdkClient;

class EmailSaudeClient extends SdkClient
{
    /**
     * @var array
     */
    protected $endpoints = [
        'production' => 'https://us-central1-netforce-api.cloudfunctions.net/emailssaude', // http://api.com/{version}
        'sandbox' => 'https://us-central1-netforce-api.cloudfunctions.net/emailssaude', // http://api.sandbox.api.com/{version}
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