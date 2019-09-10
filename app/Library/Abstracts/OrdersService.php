<?php


namespace App\Library\Abstracts;


use Illuminate\Support\Facades\Facade;

/**
 * Class OrdersService
 * @method static array getAll()
 * @method static mixed create(array $input)
 * @method static array get(int $id)
 * @method static boolean delete(int $id)
 * @method static mixed update(int $id, array $input)
 */
class OrdersService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ordersService';
    }
}