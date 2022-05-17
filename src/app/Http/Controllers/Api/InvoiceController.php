<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
   /**
    * Create the invoice from order
    *
    * @param Order $order
    * @return integer|JsonResponse
    */
    public function store(Order $order) :int|JsonResponse
    {
        if ($order->invoice()->exists()) {
            return response()->json(['error' => 'Order already has an invoice'], 422);
        }

        $invoice = DB::transaction(function() use($order)
        {
            $invoice = $order->invoice()->create();;
            $order->pushStatus(2);

            return $invoice;
        });

        return $invoice->invoice_number;
    }
}
