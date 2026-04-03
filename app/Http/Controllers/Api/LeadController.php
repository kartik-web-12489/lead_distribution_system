<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadLog;
use App\Services\LeadMatcher;
use Illuminate\Http\Request;
class LeadController extends Controller {
    public function store(Request $request, LeadMatcher $leadMatcher) {
        $lead = Lead::create($request->all());
        $buyer = $leadMatcher->match($lead);
        $lead->update([
            'buyer_id' => $buyer?->id,
            'status' => $buyer ? 'matched' : 'unmatched'
        ]);
        LeadLog::create([
            'lead_id' => $lead->id,
            'buyer_id' => $buyer?->id,
            'status' => $buyer ? 'matched' : 'unmatched',
            'meta' => $buyer->rules_result ?? [],
        ]);
        return response()->json($lead);
    }
}
