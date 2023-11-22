<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Siteurl implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try {
            $response = Http::timeout(5)
                ->get($value);

                if ($response->clientError()) {
                    $fail('4xx client hatası. Linki, yanlış yazdınız veya hatalı.');
                }
                if ($response->serverError()) {
                    $fail('5xx server hatası. Linki, yanlış yazdınız veya hatalı.');
                }


            } catch(\Illuminate\Http\Client\ConnectionException $e) {
            $fail('Bu sayfaya ulaşılamıyor.');
        }
    }
}
