<?php
namespace Tests\Feature\Api\V1;

use Tests\TestCase;
use Laravel\Passport\Client;

class TestBase extends TestCase
{
    public $url = '/api/v1';

    public $clientOauth = 1;

    public function setUp(): void
    {
        parent::setUp();
        $this->clientOauth = Client::first();
    }
}
