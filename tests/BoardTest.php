<?php
class BoardTest extends TestCase
{
    private $Auth;

    public function setUp()
    {
        $this->Auth = ['HTTP_Authorization' => env('AUTH_TOKEN', '')];
        parent::setUp();
    }

    /**
     * /boards [GET]
     */
    public function testShouldReturnAllBoards()
    {
        $this->get("boards", $this->Auth);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                'user_id',
                'name',
                'created_at',
                'updated_at'
            ]],
            'links' => [
                'first',
                'last',
                'prev',
                'next'
            ],
            'meta' => [
                'from',
                'to',
                'per_page',
                'current_page',
                'last_page',
                'total',
                'path'
            ]
        ]);

    }

    /**
     * /boards/id [GET]
     */
    public function testShouldReturnBoard()
    {
        $this->get("boards/2", $this->Auth);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'user_id',
                'name',
                'created_at',
                'updated_at',
            ]
        );

    }

    /**
     * /boards [POST]
     */
    public function testShouldCreateBoard()
    {
        $parameters = [
            'user_id' => 1,
            'name' => 'Apple iPhone Z',
        ];
        $this->post("boards", $parameters, $this->Auth);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => [
                'user_id',
                'name',
                'created_at',
                'updated_at'
            ],
            'status'
        ]);

    }

    /**
     * /boards/id [PUT]
     */
    public function testShouldUpdateBoard()
    {
        $parameters = [
            'user_id' => 1,
            'name' => 'iPhone A',
        ];
        $this->put("boards/6", $parameters, $this->Auth);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => [
                'user_id',
                'name',
                'created_at',
                'updated_at'
            ],
            'status'
        ]);
    }

}