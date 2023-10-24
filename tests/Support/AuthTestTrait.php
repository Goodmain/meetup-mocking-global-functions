<?php

namespace App\Tests\Support;

use App\Services\UserService;
use phpmock\phpunit\PHPMock;
use RonasIT\Support\Traits\MockClassTrait;

trait AuthTestTrait
{
    use MockClassTrait, PHPMock;

    public function mockOpensslRandomPseudoBytes(): void
    {
        $time = $this->getFunctionMock('App\Services', 'openssl_random_pseudo_bytes');
        $time->expects($this->once())->willReturn('5qw6rdsyd4sa65d4zxfc65ds4fc');
    }

    public function decodeJWTToken($token)
    {
        return json_decode(
            base64_decode(
                str_replace(
                    '_',
                    '/',
                    str_replace('-', '+', explode('.', $token)[1])
                )
            )
        );
    }
}
