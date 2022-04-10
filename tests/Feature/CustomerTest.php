<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Customer;


class CustomerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_customer()
    {
       $customer = [
        'name' => 'Test Name',
        'surname' => 'Test Surname',
        'email' => time().'@example.com',
        'birthday' => now(),
       ];

        $this->withExceptionHandling();
        $response =$this->post(route('store.customer'), $customer);
        
        $response->assertStatus(201);
        $response->assertJson(['status' => true]);
        $response->assertJson(['message' => "Customer successfully created"]);
    }

    public function test_show_all_customer()
    {
        $customer = Customer::factory(3)->create();
        $this->withExceptionHandling();
        $response =$this->get(route('all.customers'));
        
        $response->assertStatus(201);
        $response->assertJson(['status' => true]);
    }

    public function test_show_single_customer()
    {
        $customer = Customer::factory(1)->create();

        $this->withExceptionHandling();
        $response =$this->get(route('single.customer', $customer[0]['id']));

        $response->assertStatus(201);
        $response->assertJson(['status' => true]);
    }

    public function test_update_single_customer()
    {
        $customer = Customer::factory(1)->create();
        $this->withExceptionHandling();
        $response =$this->put(route('update.customer',$customer[0]['id'],[
            'name' => 'Test Name',
            'surname' => "Test Surname",
            'email' => time().'@example.com',
            'birthday' => "2000-12-34",
        ]));

        $response->assertStatus(201);
        $response->assertJson(['status' => true]);
    }

    public function test_delete_single_customer()
    {
        $customer = Customer::factory(1)->create();
        $this->withExceptionHandling();
        $response =$this->delete(route('delete.customer',$customer[0]['id']));

        $response->assertStatus(201);
        $response->assertJson(['status' => true]);
    }
    
}
