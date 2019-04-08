<?php
namespace Tests\Feature\Api\V1\Auth;

use Tests\Feature\Api\V1\TestBaseAuth;

class UserTest extends TestBaseAuth
{
    /**
     * Test login success.
     *
     * @return void
     */
    public function testGetMeSuccess()
    {
        $response      = $this->withHeaders($this->headers)->get($this->url.'/auth/me', [], $this->headers);

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
            ],
        ])
        ->assertStatus(200);
    }

    /**
     * Test get me not auth.
     *
     * @return void
     */
    public function testGetMeNotAuth()
    {
        $response      = $this->get($this->url.'/auth/me', [], $this->headers);

        $response->assertJson([
            'errors'      => true,
            'status_code' => 401,
        ])
        ->assertJsonStructure([
            'message',
            'status_code',
        ])
        ->assertStatus(401);
    }

    /**
     * Test login success.
     *
     * @return void
     */
    public function testUpdateSuccess()
    {
        $response      = $this->withHeaders($this->headers)->put($this->url.'/auth/update', [
            'birth_day'      => '1991-05-05',
            'password'       => 'secret',
            'name'           => 'Nguyen Anh Duc',
            'address'        => 'Test String',
            'phone_number'   => '0963988388',
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
            ],
        ])
        ->assertStatus(200);
    }
}
