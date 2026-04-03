<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LeadLog extends Model {
    protected $fillable = [
        'lead_id',
        'buyer_id',
        'status',
        'meta',
    ];
    protected function casts(): array {
        return [
            'meta' => 'array',
        ];
    }
    public function lead() {
        return $this->belongsTo(Lead::class);
    }
    public function buyer() {
        return $this->belongsTo(Buyer::class);
    }
}
