<?php


namespace App\Library\Services\Search;


use Elasticsearch\Client;
use Illuminate\Database\Eloquent\Model;

class ElasticSearchObserver
{
    /** @var Client $service */
    private $service;

    /**
     * ElasticSearchObserver constructor.
     * @param Client $elasticSearchClient
     */
    public function __construct(Client $elasticSearchClient)
    {
        $this->service = $elasticSearchClient;
    }

    /**
     * @param Model $model
     */
    public function saved($model)
    {
        $this->service->index([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->getKey(),
            'body' => $model->toSearchArray(),
        ]);
    }

    public function deleted($model)
    {
        $this->service->delete([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->getKey(),
        ]);
    }
}