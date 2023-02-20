<?php

namespace App\Observers;

use App\Enums\OrderRuleEnum;
use App\Models\Order;

class OrderObserver
{

    protected $request;

    public function __construct()
    {
        $this->request = app('request');
    }

    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {


        $this->orderRule($order);

    }



    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function saved(Order $order)
    {
        $this->orderRule($order);
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }

    private function orderRule(Order $order){

        if ($this->request->products_for_create){

            $price_count = array_map( function   ($arr)
            {
                $arr['price'] = $arr['price']* $arr['count'];

                return $arr;
            }, $this->request->products_for_create);

            $sum = array_sum(array_column($price_count, 'price'));

            if ($sum < OrderRuleEnum::OrderSumMin->value){
                if ($this->request->isMethod('post')){
                    $order->forceDelete();
                }

                return redirect()->back()->withErrors(['sum'=>'The sum must be at least '.OrderRuleEnum::OrderSumMin->value ]);
            }

            $order_product = array_map( function   ($arr)
            {
                unset($arr['title']);
                unset($arr['price']);

                return $arr;
            }, $this->request->products_for_create);

            $order->sum = $sum;
            $order->products()->sync($order_product);
            $order->saveQuietly();
        }
    }

}
