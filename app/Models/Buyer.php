<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Buyer extends Model {
    protected $fillable = ['name', 'priority'];
    public function rules() {
        return $this->hasMany(Rule::class);
    }
}
