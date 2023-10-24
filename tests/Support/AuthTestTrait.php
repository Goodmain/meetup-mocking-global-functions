<?php

namespace App\Tests\Support;

use phpmock\functions\FixedValueFunction;
use phpmock\MockBuilder;
use RonasIT\Support\Traits\MockClassTrait;

trait AuthTestTrait
{
    use MockClassTrait;

    public function mockOpensslRandomPseudoBytes(): void
    {
        $builder = new MockBuilder();
        $builder->setNamespace('App\Services')
            ->setName('openssl_random_pseudo_bytes')
            ->setFunctionProvider(new FixedValueFunction('5qw6rdsyd4sa65d4zxfc65ds4fc'));

        $mock = $builder->build();
        $mock->enable();
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
