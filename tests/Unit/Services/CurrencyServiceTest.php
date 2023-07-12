<?php

namespace Tests\Unit\Services;

use App\Contracts\CurrencyRepository;
use App\Contracts\CurrencyService;
use Tests\TestCase;

class CurrencyServiceTest extends TestCase
{
    public function testExchange()
    {
        $this->mock(CurrencyRepository::class, function ($mock) {
            $mock->shouldReceive('getExchangeRate')
                ->once()
                ->with('USD', 'JPY')
                ->andReturn(111.801);
        });

        $currencyService = app(CurrencyService::class);
        $result = $currencyService->exchange('USD', 'JPY', 1234.00);
        $this->assertEquals(137962.434, $result);
    }
}
