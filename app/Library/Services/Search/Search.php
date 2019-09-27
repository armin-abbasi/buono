<?php


namespace App\Library\Services\Search;


use App\Models\Order;
use Elasticsearch\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class Search
{
    /**
     * @var Client $service
     */
    private $service;

    /**
     * @var Order $model
     */
    private $model;

    /**
     * Search constructor.
     * @param Client $elasticSearchClient
     * @param Order $model
     */
    public function __construct(Client $elasticSearchClient, Order $model)
    {
        $this->service = $elasticSearchClient;
        $this->model = $model;
    }

    /**
     * @param string $query
     * @return Collection
     */
    public function find(string $query): Collection
    {
        return $this->getCollection($this->searchOnElasticSearch($query));
    }

    /**
     * @param string $query
     * @return array
     */
    private function searchOnElasticSearch(string $query = ''): array
    {
        $items = $this->service->search([
            'index' => $this->model->getSearchIndex(),
            'type' => $this->model->getSearchType(),
            'body' => [
                'query' => [
                    'multi_match' => [
                        'fields' => ['title^2', 'state'],
                        'query' => $query,
                    ]
                ]
            ]
        ]);

        return $items;
    }

    /**
     * @param array $items
     * @return mixed
     */
    private function getCollection(array $items)
    {
        $ids = Arr::pluck($items['hits']['hits'], '_id');

        return $this->model->findMany($ids);
    }
}