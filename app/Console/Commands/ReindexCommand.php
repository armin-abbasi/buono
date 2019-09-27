<?php

namespace App\Console\Commands;

use App\Models\Order;
use Elasticsearch\Client;
use Illuminate\Console\Command;

class ReindexCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:reindex';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Indexes all rows';

    /**
     * @var Client $service
     */
    private $service;

    /**
     * Create a new command instance.
     *
     * @param Client $elasticSearchClient
     */
    public function __construct(Client $elasticSearchClient)
    {
        parent::__construct();

        $this->service = $elasticSearchClient;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Indexing all orders. This might take a while...');

        foreach (Order::cursor() as $order) {
            $this->service->index([
                'index' => $order->getSearchIndex(),
                'type' => $order->getSearchType(),
                'id' => $order->getKey(),
                'body' => $order->toSearchArray(),
            ]);

            $this->output->write('.');
        }

        $this->info("\nDone!");
    }
}
