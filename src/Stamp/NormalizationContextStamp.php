<?php

namespace App\Stamp;

use Symfony\Component\Messenger\Stamp\StampInterface;

final class NormalizationContextStamp implements StampInterface {
    /**
     * @var array
     */
    private $context;

    public function __construct(array $context = null) {
        $this->context = $context;
    }

    public function getContext() {
        return $this->context;
    }
}
