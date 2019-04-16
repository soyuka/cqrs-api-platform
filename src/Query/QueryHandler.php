<?php

namespace App\Query;

use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\OperationDataProviderTrait;
use ApiPlatform\Core\DataProvider\SubresourceDataProviderInterface;
use Symfony\Component\Messenger\Envelope;

final class QueryHandler {
    use OperationDataProviderTrait;

    public function __construct(CollectionDataProviderInterface $collectionDataProvider, ItemDataProviderInterface $itemDataProvider, SubresourceDataProviderInterface $subresourceDataProvider = null)
    {
        $this->collectionDataProvider = $collectionDataProvider;
        $this->itemDataProvider = $itemDataProvider;
        $this->subresourceDataProvider = $subresourceDataProvider;
    }

    public function __invoke(Query $query) {

        if ($query->isCollection()) {
            return $this->collectionDataProvider->getCollection($query->getResourceClass());
        }

        return $this->itemDataProvider->getItem($query->getResourceClass(), $query->getIdentifiers());
    }
}
