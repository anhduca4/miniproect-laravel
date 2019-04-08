<?php
namespace Tests\Feature\Api\V1\Auth;

use Tests\Feature\Api\V1\TestBase;

class LoginTest extends TestBase
{
    /**
     * Test login success.
     *
     * @return void
     */
    public function testLoginSuccess()
    {
        $response      = $this->post($this->url.'/auth/login', [
            'username'       => '0963988388',
            'password'       => 'secret',
            'client_id'      => $this->clientOauth->id,
            'client_secret'  => $this->clientOauth->secret,
        ]);

        $response->assertJson([
            'errors' => false,
        ])
        ->assertJsonStructure([
            'data' => [
                'user' => [
                    'id',
                    'name',
                    'username',
                    'email',
                    'avatar',
                    'birth_day',
                    'address',
                    'phone_number',
                    'created_at',
                    'updated_at',
                ],
                'token' => [
                    'token_type',
                    'expires_in',
                    'access_token',
                    'refresh_token',
                ],
            ],
        ])
        ->assertStatus(200);
    }

    /**
     * Test login success.
     *
     * @return void
     */
    public function testLoginFail()
    {
        $response      = $this->post($this->url.'/auth/login', [
            'username'       => '0963988',
            'password'       => 'secret',
            'client_id'      => $this->clientOauth->id,
            'client_secret'  => $this->clientOauth->secret,
        ]);
        $response->assertJson([
            'errors'      => true,
            'status_code' => 403,
        ])
        ->assertJsonStructure([
            'message',
            'status_code',
        ]);
    }
}
