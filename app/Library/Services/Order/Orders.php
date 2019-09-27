<?php


namespace App\Library\Services\Order;


use App\Library\Abstracts\Manageable;
use App\Models\Order;

class Orders implements Manageable
{

    /**
     * @return mixed
     */
    public function getAll()
    {
        return Order::with('foods')->paginate(5);
    }

    /**
     * @param array $input
     * @return mixed
     */
    public function create(array $input)
    {
        $order = Order::create($input);

        $this->attach($order, $input['foods']);

        return $order;
    }

    /**
     * @param Order $order
     * @param array $foods
     */
    public function attach(Order $order, array $foods)
    {
        $order->foods()->attach($foods);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id)
    {
        return Order::findOrFail($id)->toArray();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id): bool
    {
        $order = Order::findOrFail($id);

        $order->foods()->detach($order->foods()->get()->toArray());

        return $order->delete();
    }

    /**
     * @param int $id
     * @param array $input
     * @return mixed
     */
    public function update(int $id, array $input): bool
    {
        $order = Order::findOrFail($id);

        if (!empty($input['foods'])) {
            $order->foods()->sync($input['foods']);
        }

        return $order->update($input);
    }
}