<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadLog;
use App\Services\LeadMatcher;
use Illuminate\Http\Request;
class LeadWebController extends Controller {
    public function store(Request $request, LeadMatcher $matcher) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer|min:1',
        ]);
        $lead = Lead::create($validated);
        $buyer = $matcher->match($lead);
        if ($buyer) {
            $lead->update([
                'buyer_id' => $buyer->id,
                'status' => 'matched',
            ]);
            LeadLog::create([
                'lead_id' => $lead->id,
                'buyer_id' => $buyer?->id,
                'status' => $buyer ? 'matched' : 'unmatched',
                'meta' => $buyer->rules_result ?? [],
            ]);
            return back()->with('success', 'Lead assigned successfully!');
        }
        $lead->update(['status' => 'unmatched']);
        return back()->with('error', 'No buyer matched for this lead.');
    }
}
