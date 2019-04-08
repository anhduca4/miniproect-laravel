<?php
namespace Tests\Feature\Api\V1;

class UserTest extends TestBaseAuth
{
    /**
     * Test get all users.
     *
     * @return void
     */
    public function testGetIndexSuccess()
    {
        $response = $this->withHeaders($this->headers)->get($this->url.'/users', [], $this->headers);

        $response->assertJson([
            'errors' => false,
        ])
        ->assertJsonStructure([
            'data' => [
                'data',
                'current_page',
                'from',
                'last_page',
                'per_page',
                'to',
                'total',
            ],
        ])
        ->assertStatus(200);
    }

    /**
     * Test get all users.
     *
     * @return void
     */
    public function testCreateUsersSuccess()
    {
        $data = [
            'username'     => str_random(10),
            'password'     => str_random(10),
            'name'         => str_random(10),
            'birth_day'    => '1991-05-05',
            'address'      => str_random(10),
            'phone_number' => str_random(10),
            'email'        => str_random(10).'@gmail.com',
        ];
        $response = $this->withHeaders($this->headers)->post($this->url.'/users', $data, $this->headers);

        $response->assertJson([
            'errors' => false,
        ])
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'username',
                'email',
                'birth_day',
                'address',
                'phone_number',
                'created_at',
                'updated_at',
            ],
        ])
        ->assertStatus(200);
    }

    /**
     * Test get all users.
     *
     * @return void
     */
    public function testCreateUsersInvalidData()
    {
        $data = [
        ];
        $response = $this->withHeaders($this->headers)->post($this->url.'/users', $data, $this->headers);

        $response->assertJson([
            'errors'      => true,
            'status_code' => 422,

        ])
        ->assertJsonStructure([
            'message',
            'data',
            'status_code',
        ])
        ->assertStatus(422);
    }

    /**
     * Test show user.
     *
     * @return void
     */
    public function testShowSuccess()
    {
        $response = $this->withHeaders($this->headers)->get($this->url.'/users/1', [], $this->headers);

        $response->assertJson([
            'errors' => false,
        ])
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'username',
                'email',
                'birth_day',
                'address',
                'phone_number',
                'created_at',
                'updated_at',
            ],
        ])
        ->assertStatus(200);
    }

    /**
     * Test show user.
     *
     * @return void
     */
    public function testShowNotFoundUser()
    {
        $response = $this->withHeaders($this->headers)->get($this->url.'/users/0', [], $this->headers);

        $response->assertJson([
            'errors'      => true,
            'status_code' => 404,
        ])
        ->assertJsonStructure([
            'message',
        ])
        ->assertStatus(404);
    }

    /**
     * Update user success.
     *
     * @return void
     */
    public function testUpdateUserSuccess()
    {
        $data = [
            'password'  => str_random(10),
            'name'      => str_random(10),
            'birth_day' => '1991-05-05',
            'address'   => str_random(10),
        ];
        $response = $this->withHeaders($this->headers)->put($this->url.'/users/2', $data, $this->headers);

        $response->assertJson([
            'errors' => false,
        ])
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'username',
                'email',
                'birth_day',
                'address',
                'phone_number',
                'created_at',
                'updated_at',
            ],
        ])
        ->assertStatus(200);
    }

    /**
     * Update user with invalid data.
     *
     * @return void
     */
    public function testUpdateUserInvalidData()
    {
        $data = [
        ];
        $response = $this->withHeaders($this->headers)->put($this->url.'/users/2', $data, $this->headers);

        $response->assertJson([
            'errors'      => true,
            'status_code' => 422,
        ])
        ->assertJsonStructure([
            'message',
            'data',
            'status_code',
        ])
        ->assertStatus(422);
    }

    /**
     * Test delete user success.
     *
     * @return void
     */
    public function testDeleteUserSuccess()
    {
        $response = $this->withHeaders($this->headers)->delete($this->url.'/users/2', [], $this->headers);
        $response->assertJson([
            'errors' => false,
        ])
        ->assertJsonStructure([
            'data',
        ])
        ->assertStatus(200);
    }
}
