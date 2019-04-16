<?php

namespace App\Query;

interface QueryInterface {
    public function getIdentifiers(): array;
    public function setIdentifiers(array $identifiers): void;
    public function getResourceClass(): string;
    public function setResourceClass(string $resourceClass): void;
    public function isCollection(): bool;
    public function setCollection(bool $collection): void;
}
