<?php

namespace App\Stamp;

use Symfony\Component\Messenger\Stamp\StampInterface;

final class FilterStamp implements StampInterface {
    /**
     * @var array
     */
    private $filters;

    public function __construct(array $filters = null) {
        $this->filters = $filters;
    }

    public function getFilters() {
        return $this->filters;
    }
}
