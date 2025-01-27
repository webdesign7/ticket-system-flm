<?php

namespace App\Models;

use App\Observers\TicketObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[ObservedBy([TicketObserver::class])]
class Ticket extends Model
{
    use HasFactory;

    const STATUS = [
        'open' => 'Open',
        'closed' => 'Closed',
        'pending' => 'Pending',
        'resolved' => 'Resolved',
    ];

    const PRIORITY = [
        'low' => 'low',
        'medium' => 'medium',
        'high' => 'high',
    ];

    protected $fillable = ['title', 'description', 'status', 'priority', 'assigned_to', 'assigned_by', 'comment', 'is_resolved', 'attachment'];

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function assignedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
