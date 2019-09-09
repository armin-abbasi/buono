<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Libraries\Api\Response;
use App\Library\Services\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var Orders $service
     */
    private $service;

    /**
     * OrderController constructor.
     * @param Orders $ordersService
     */
    public function __construct(Orders $ordersService)
    {
        $this->service = $ordersService;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->service->getAll();

        return (new Response(0, trans('messages.general.get'), $data, 200))->toJson();
    }

    /**
     * @param CreateOrderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateOrderRequest $request)
    {
        $input = array_merge($request->all(), ['state' => 'INIT']);

        $data = $this->service->create($input);

        return (new Response(0, trans('messages.general.created'), $data, 201))->toJson();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        $data = $this->service->get($id);

        return (new Response(0, trans('messages.general.get'), $data, 200))->toJson();
    }

    /**
     * @param $id
     * @param UpdateOrderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $data = $this->service->update($id, $request->all());

        return (new Response(0, trans('messages.general.updated'), $data, 200))->toJson();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = $this->service->delete($id);

        return (new Response(0, trans('messages.general.deleted'), $data, 202))->toJson();
    }

    /**
     * @param $id
     * @param UpdateOrderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function updateState($id, UpdateOrderRequest $request)
    {
        $data = $this->service->update($id, $request->only('state'));

        return (new Response(0, trans('messages.general.updated'), $data, 200))->toJson();
    }
}
