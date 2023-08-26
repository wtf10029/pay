<?php

namespace Wtf10029\Pay\Tests\Unit;

use Wtf10029\Pay\Tests\TestCase;

class BfPayTest extends TestCase
{

    public function testPay()
    {

        $this->appendResponse(
            200,
            ['Content-Type' => 'application/json'],
            json_encode(['message' => 'test request'])
        );

        $uri = 'htto://localhost/test';
        $this->assertEmpty($this->historyRequest());
        $this->http()->withAccessToken(false)->get($uri, [], ['base_uri' => '']);

        $historyRequest = $this->historyRequest();
        $this->assertCount(1, $historyRequest);

        if (count($historyRequest) == 1) {
            $request = $historyRequest[0]['request'];
            $this->assertRequestUri($uri, $request);
            $this->assertRequestMethod('GET', $request);

            $this->assertRequestWithQueryParams([], $request);
            $this->assertRequestWithoutHeaders(['X-Token'], $request);
        }
    }

}
