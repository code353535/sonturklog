<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use App\Models\Site;

class Urlcheck implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try {
            $value = trim($value);
            $response = Http::timeout(5)
                ->get($value);

                if ($response->clientError()) {
                    $fail('4xx client hatası. Linki, yanlış yazdınız veya hatalı.');
                }
                if ($response->serverError()) {
                    $fail('5xx server hatası. Linki, yanlış yazdınız veya hatalı.');
                }

                libxml_use_internal_errors(true);
                if (!simplexml_load_string($response->body())) {
                    $fail('Link, xml(rss) türünde olmalıdır.');
                    }

                    $feed = simplexml_load_string($response->body());
                        if(empty($feed->channel)){
                            $fail('Uyumsuz RSS Feed sayfası.');
                        }


            } catch(\Illuminate\Http\Client\ConnectionException $e) {
            $fail('Bu sayfaya ulaşılamıyor.');
        }
    }
}
