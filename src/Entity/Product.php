<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * @ApiResource
 */
class Product {
    /**
     * @ApiProperty(identifier=true)
     */
    public $id;

    public $name;
}
