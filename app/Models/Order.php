<?php

namespace App\Models;

use App\Library\Services\Search\Searchable;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use Searchable;

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'title',
        'state',
        'res_id',
    ];

    /**
     * @var string $searchType
     */
    public $searchType = 'orders';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function foods()
    {
        return $this->belongsToMany(Food::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'res_id');
    }
}
