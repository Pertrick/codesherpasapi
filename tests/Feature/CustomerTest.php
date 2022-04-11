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
        $response->assertCreated();
    }

    public function test_show_all_customer()
    {
        $customer = Customer::factory(3)->create();
        $this->withExceptionHandling();
        $response =$this->getJson(route('all.customers'));
        $response->assertStatus(200);
       
    }

    public function test_show_single_customer()
    {
        $customer = Customer::factory(1)->create();
        $this->withExceptionHandling();
        $response =$this->get(route('single.customer', $customer[0]['id']));

        $response->assertStatus(200);
        
    }

    public function test_update_single_customer()
    {
        $customer = Customer::factory(1)->create();
        $this->withExceptionHandling();

        $newCustomer = Customer::factory(1)->create();

        $response =$this->putJson(route('update.customer',$customer[0]['id']), [
            'name' => 'Test Name',
            'surname' => 'Test Surname',
            'email' => time().'@example.com',
            'birthday' => now(),
        ]);
        
        $response->assertStatus(200);
       
    }

    public function test_delete_single_customer()
    {
        $customer = Customer::factory(1)->create();
        $this->withExceptionHandling();
        $response =$this->delete(route('delete.customer',$customer[0]['id']));
        $response->assertStatus(204);
        
    }
    
}
