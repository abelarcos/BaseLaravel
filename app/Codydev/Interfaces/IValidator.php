<?php

namespace Codydev\Interfaces;

use Illuminate\Support\MessageBag;

interface IValidator{

    /**
     * @param $action
     * @return boolean
     */

    public function success($action);

    /**
     * @param $action
     * @return boolean
     */
    public function fails($action);


    /**
     * @param $parent
     * @param $key
     * @param $validations
     * @return mixed
     */
    public function add($parent, $key, $validations);

    /**
     * @param array $data
     * @return $this
     */

    public function with($data = []);

    /**
     * @return MessageBag
     */
    public function getErrors();

}