<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;                                   
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    /**
     * Test to create the invoice from existing order
     *
     * @return void
     */
    public function test_create_invoice_successfully()
    {
        $user = User::factory()->create();
        $order = $user->orders()->create([
            'details'=>'faker order detail'
        ]);

        $response = $this->post('/api/invoices/'.$order->id);
        $response->assertStatus(200);
        $response->assertSee($order->invoice->invoice_number);
    }

     /**
     * Test to create the duplicate invoice from existing order
     *
     * @return void
     */
    public function test_duplicate_invoice_throws_error()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $order = $user->orders()->create([
            'details'=>'faker order detail'
        ]);

        $response = $this->post('/api/invoices/'.$order->id);
        $response->assertStatus(200);
        $response->assertSee($order->invoice->invoice_number);

        $response = $this->post('/api/invoices/'.$order->id);
        $response->assertStatus(422);
    }
}
