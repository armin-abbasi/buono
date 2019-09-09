<?php


namespace App\Library\Services;


use App\Library\Abstracts\Manageable;
use App\Models\Food;
use App\Models\Order;

class Orders implements Manageable
{

    /**
     * @return mixed
     */
    public function getAll()
    {
        return Order::with(Food::class)->paginate(5);
    }

    /**
     * @param array $input
     * @return mixed
     */
    public function create(array $input)
    {
        return Order::create($input);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id)
    {
        return Order::find($id)->toArray();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return Order::destroy($id);
    }

    /**
     * @param int $id
     * @param array $input
     * @return mixed
     */
    public function update(int $id, array $input)
    {
        $order = Order::findOrFail($id);
        return $order->update($input);
    }
}