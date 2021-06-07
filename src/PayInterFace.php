<?php

namespace Wtf10029\Pay;

interface PayInterFace
{
    public function pay($order,$scene);

    public function refund($order);

    public function verify($data = null);

    public function success();
}