<?php

namespace App\Query;

final class Query implements QueryInterface {
    /**
     * @var array
     */
    private $identifiers;

    /**
     * @var string
     */
    private $resourceClass;

    /**
     * @var bool
     */
    private $isCollection = false;

    public function getIdentifiers(): array {
        return $this->identifiers;
    }

    public function setIdentifiers(array $identifiers): void {
        $this->identifiers = $identifiers;
    }

    public function getResourceClass(): string {
        return $this->resourceClass;
    }

    public function setResourceClass(string $resourceClass): void {
        $this->resourceClass = $resourceClass;
    }

    public function isCollection(): bool {
        return $this->isCollection;
    }

    public function setCollection(bool $collection): void {
        $this->isCollection = $collection;
    }
}
