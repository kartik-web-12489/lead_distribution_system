<?php
namespace App\Services;
use App\Models\Buyer;
class LeadMatcher {
    public function match($lead) {
        $buyers = Buyer::with('rules')->orderBy('priority')->get();
        foreach ($buyers as $buyer) {
            if ($buyer->rules->isEmpty()) return $buyer;
            $matched = true;
            $rules_result = [];
            foreach ($buyer->rules as $rule) {
                $val = $lead->{$rule->field};
                $rules_result[] = array('field' => $rule->field, 'value' => $val, 'result' => $this->checkrule($val, $rule->operator, $rule->value));
                if (!$this->checkrule($val, $rule->operator, $rule->value)) {
                    $matched = false;
                    break;
                }
            }
            if (count($rules_result) > 0) $buyer->rules_result = $rules_result;
            if ($matched) return $buyer;
        }
        return null;
    }
    private function checkrule($a, $op, $b) {
        return match ($op) {
            '=' => $a == $b,
            '!=' => $a != $b,
            '>' => $a > $b,
            '<' => $a < $b,
            '>=' => $a >= $b,
            '<=' => $a <= $b,
            default => false
        };
    }
}
