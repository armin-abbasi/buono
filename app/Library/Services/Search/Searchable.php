<?php


namespace App\Library\Services\Search;


trait Searchable
{
    /**
     * Set observer methods on boot.
     */
    public static function bootSearchable()
    {
        static::observe(ElasticSearchObserver::class);
    }

    /**
     * Return index name.
     * @return mixed
     */
    public function getSearchIndex()
    {
        return $this->getTable();
    }

    /**
     * Return search type if exists.
     * @return mixed
     */
    public function getSearchType()
    {
        if (property_exists($this, 'searchType')) {
            return $this->searchType;
        }

        return $this->getTable();
    }

    /**
     * Convert to array.
     * @return mixed
     */
    public function toSearchArray()
    {
        return $this->toArray();
    }
}