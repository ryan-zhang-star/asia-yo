<?php

namespace Tests\Unit\Controllers;

use App\Contracts\CurrencyService;
use Illuminate\Support\Arr;
use Tests\TestCase;

class CurrencyControllerTest extends TestCase
{
    public function testExchange()
    {
        $requestData = [
            'source' => 'USD',
            'target' => 'JPY',
            'amount' => '$1,234.00',
        ];

        $this->mock(CurrencyService::class, function ($mock) {
            $mock->shouldReceive('exchange')
                ->once()
                ->with('USD', 'JPY', 1234.00)
                ->andReturn(137962.43);
        });

        $response = $this->getJson('/api/exchange?' . Arr::query($requestData));
        $response->assertOk();
        $response->assertJson([
            'msg' => 'success',
            'amount' => '$137,962.43',
        ]);
    }
}
