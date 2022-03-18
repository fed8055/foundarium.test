<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Assert;
use Tests\TestCase;

class CarsTest extends TestCase
{
    private $insertId;

    public function testCreate(){
        $response = $this->post('api/cars/add', ['brand' => 'testBrand', 'model' => 'testModel', 'reg_num' => '123123']);
        $this->insertId = $response->content();
        Assert::assertNotEquals(false, $response->content());
    }

    public function testGetList(){
        $response = $this->get('api/cars/getAll');
        $response->assertOk();
    }

    public function testDelete(){
        $response = $this->post('api/cars/delete', ['id' => $this->insertId]);
        $response->assertSee(true);
    }
}
