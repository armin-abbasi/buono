<?php


namespace Tests\Unit;


use App\Library\Abstracts\OrdersService;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class OrdersServiceTest extends TestCase
{
    /**
     * Test creating a new order
     */
    public function testCreateOrder()
    {
        $result = OrdersService::create([
            'title' => 'Test Order',
            'state' => 'INITIAL',
            'res_id' => 1,
            'foods' => [1, 2],
        ]);

        $this->assertInstanceOf(Model::class, $result);
    }
}