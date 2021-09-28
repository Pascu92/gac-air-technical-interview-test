<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class AirMockUp
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     */
    public function getAirBooking(): object
    {
        $response = $this->client->request('GET', 'https://airmockupapi.gac.travel/', [
            'auth_basic' => ['demo', 'demo']
        ]);
        $content = new \SimpleXMLElement($response->getContent());

        return $content;
    }
}