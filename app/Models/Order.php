<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Supplier;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "company_id",
        "supplier_id",
        "code",
        "order_date"
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'order_date' => 'datetime',
    ];

    /**
     * Get the company that own this order.
     *
     * @return BelongsTo
     */
    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class, "company_id", "id");
    }

    /**
     * Get the supplier that own this order.
     *
     * @return BelongsTo
     */
    public function supplier() : BelongsTo
    {
        return $this->belongsTo(Supplier::class, "supplier_id", "id");
    }

    /**
     * Get list of items associated to this order.
     *
     * @return HasMany
     */
    public function items() : HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
