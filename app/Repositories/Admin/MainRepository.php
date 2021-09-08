<?php


namespace App\Repositories\Admin;


use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Model;

class MainRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }
    /** get count all orders */
    public static function getCountOrders(){
        $count = \DB::table('orders')
            ->where('status', 0)
            ->get()
            ->count();
        return $count;
    }
    /** get count all users */
    public static function  getCountUser()
    {
        $count = \DB::table('users')
            ->get()
            ->count();
        return $count;
    }

    /** get count all products */
    public static function getCountProducts(){
            $count = \DB::table('products')
                ->get()
                ->count();
            return $count;
    }

    /** get count all categories */
    public static function getCountCategories(){
        $count = \DB::table('categories')
            ->get()
            ->count();
        return $count;
    }
}
