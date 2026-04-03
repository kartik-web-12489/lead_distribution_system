<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Lead extends Model {
    protected $fillable = ['name', 'email', 'gender', 'age', 'type', 'buyer_id', 'status'];
    protected $attributes = [
        'status' => 'pending',
    ];
    public function buyer() {
        return $this->belongsTo(Buyer::class);
    }
}
