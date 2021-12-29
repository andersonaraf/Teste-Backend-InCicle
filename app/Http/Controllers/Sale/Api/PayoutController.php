<?php

namespace App\Http\Controllers\Sale\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sale\CustomerController;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SalesInformation;
use Illuminate\Http\Request;

class PayoutController extends Controller
{

    //
    public function save(Request $request){
        $customer = $this->checkCustomer($request->document);
        if (is_null($customer)) {
            $customerController = new CustomerController();
            $customer = $customerController->store($request);
        }
        $totalPrice = $this->totalPrice($request->products);
        try {
            \DB::beginTransaction();
            $sale = Sale::create([
                'customer_id' => $customer->id,
                'type' => mb_strtoupper($request->typePayOut),
                'card' => $request->card,
                'total_price' => $totalPrice,
                'buy_date' =>   $request->buyDate,
            ]);

            foreach ($request->products as $product) {
                SalesInformation::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product['id'],
                    'amount' => $product['amount'],
                ]);
            }
            \DB::commit();
        } catch (\Exception $exception) {
            \DB::rollBack();
            return response()->json('error', 405);
        }
        return response()->json($sale->id);
    }


    public function checkCustomer($document){
        $customer = Customer::where('document', $document)->first();
        return $customer;
    }


    public function totalPrice($products){
        $price = 0.0;
        foreach ($products as $product) {
            $price += Product::findOrFail($product['id'])->price * $product['amount'];
        }
        return $price;
    }
}
