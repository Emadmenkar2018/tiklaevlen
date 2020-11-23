<?php
namespace App;

class DenemeProp implements \Vanilo\Properties\Contracts\PropertyType
{
    public function getName(): string
    {
        return __('Select');
    }

    public function transformValue(string $value, ?array $settings)
    {
        return $stars;
    }
}
