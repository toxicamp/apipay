<?php

namespace Payments\Collection;

class Dto
{
    private $result;

    public function __construct($array)
    {
        $this->init($array);
    }

    private function init($array)
    {
        $this->toCollection($array);
        foreach ($array as $key => $item)
        {
            request()->request->add([$key => $item]);
        }

    }

    private function toCollection($array)
    {
        $this->result = collect($array);
    }

    public function getResult()
    {
        return $this->result;
    }
}
