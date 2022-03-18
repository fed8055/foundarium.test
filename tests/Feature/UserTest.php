<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Assert;
use Tests\TestCase;

class UserTest extends TestCase
{
    private $userInsertId;
    private $historyInsertId;

    public function testCreate(){
        $response = $this->post('api/users/add', ['name' => 'test', 'email' => 'test@test.ru', 'password' => '123123']);
        $this->userInsertId = $response->content();
        Assert::assertNotEquals(false, $response->content());
    }

    public function testGetList(){
        $response = $this->get('api/users/getAll');
        $response->assertOk();
    }

    public function testNewCar(){
        $response = $this->post('api/users/newCar', ['user_id' =>  $this->userInsertId, 'car_id' => '1']);
        $this->historyInsertId = $response->content();
        Assert::assertNotEquals(false, $response->content());
    }

    public function testGetHistory(){
        $response = $this->get('api/users/history');
        $response->assertOk();
    }

    public function testDeleteCar(){
        $response = $this->post('api/users/deleteCar', ['id' => $this->historyInsertId]);
        $response->assertSee(true);
    }

    public function testDelete(){
        $response = $this->post('api/users/delete', ['id' => $this->userInsertId]);
        $response->assertSee(true);
    }



}
