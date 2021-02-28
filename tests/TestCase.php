<?php

namespace Tests;


use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
  

    public function __construct(?string $name = null, array $data = [], string $dataname = ''){
        parent::__construct($name,$data,$dataname);
        parent::setUp();
        
    }
}
