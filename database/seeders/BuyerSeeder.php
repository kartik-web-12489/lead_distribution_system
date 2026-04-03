<?php
namespace Database\Seeders;
use App\Models\Buyer;
use App\Models\Rule;
use Illuminate\Database\Seeder;
class BuyerSeeder extends Seeder {
    public function run() {
        $buyer1 = Buyer::create(['name' => 'Buyer 1', 'priority' => 1]);
        Rule::create(['buyer_id' => $buyer1->id, 'field' => 'gender', 'operator' => '=', 'value' => 'female']);
        $buyer2 = Buyer::create(['name' => 'Buyer 2', 'priority' => 2]);
        Rule::create(['buyer_id' => $buyer2->id, 'field' => 'gender', 'operator' => '=', 'value' => 'female']);
        Rule::create(['buyer_id' => $buyer2->id, 'field' => 'age', 'operator' => '<=', 'value' => '50']);
        Buyer::create(['name' => 'Buyer 3', 'priority' => 3]);
    }
}
