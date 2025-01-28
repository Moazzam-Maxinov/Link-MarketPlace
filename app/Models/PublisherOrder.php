<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublisherOrder extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'publisher_orders';

    // Primary key
    protected $primaryKey = 'id';

    // Indicates if the IDs are auto-incrementing
    public $incrementing = true;

    // Data type of the primary key
    protected $keyType = 'int';

    // Timestamps (created_at and updated_at)
    public $timestamps = true;

    // Fillable attributes for mass assignment
    protected $fillable = [
        'ordered_by',
        'ordered_to',
        'site_id',
        'requested_url',
        'link_text',
        'price',
        'status',
        'notes',
        'approved_at',
        'rejected_at',
        'is_completed',
    ];

    // Attributes to be cast to native types
    protected $casts = [
        'price' => 'decimal:2',
        'is_completed' => 'boolean',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];

    // Relationships
    public function orderedBy()
    {
        return $this->belongsTo(User::class, 'ordered_by');
    }

    public function orderedTo()
    {
        return $this->belongsTo(User::class, 'ordered_to');
    }

    public function site()
    {
        return $this->belongsTo(Website::class, 'site_id');
    }
}
