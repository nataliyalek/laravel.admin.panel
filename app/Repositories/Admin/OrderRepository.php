<?php


namespace App\Repositories\Admin;


use App\Repositories\CoreRepository;
use App\Models\Admin\Order as Model;

class OrderRepository extends CoreRepository
{

    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllOrders($perpage){
        $orders = $this->startCondition()::withTrashed()
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('order_products', 'order_products.order_id', '=', 'orders.id')
            ->select('orders.id', 'orders.user_id', 'orders.status', 'orders.created_at',
                'orders.updated_at', 'orders.currency', 'users.name',
                \DB::raw('ROUND(SUM(order_products.price),2) as sum'))
            ->groupBY('orders.id')
            ->orderBy('orders.status')
            ->orderBY('orders.id')
            ->paginate($perpage);

        return $orders;
    }
}
