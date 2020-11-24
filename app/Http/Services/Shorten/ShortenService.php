<?php


namespace App\Http\Services\Shorten;


use App\Models\ShortUrl;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\DB;
use Exception;


class ShortenService
{
    /** Shorten url and return token
     *
     * @param string
     * @return string|null
     */
    public function shorten(string $url)
    {
        try {
            $existingRecord = ShortUrl::whereDestinationUrl($url)->first();
            if (!is_null($existingRecord)) {
                return $existingRecord->token;
            }
            $lastRecord = ShortUrl::latest()->first();
            $token = null;
            if (is_null($lastRecord)) {
                $lastIdStmt = DB::select("SHOW TABLE STATUS LIKE 'short_urls'");
                $token = Hashids::encode($lastIdStmt[0]->Auto_increment);
            } else {
                $token = Hashids::encode(++$lastRecord->id);
            }
            $shortUrl = new ShortUrl;
            $shortUrl->destination_url = $url;
            $shortUrl->token = $token;
            $shortUrl->save();
            return $token;

        } catch (Exception $exception) {
            return null;
        }
    }

    /** Get url by token
     *
     * @param string
     * @return string|null
     */

    public function getTokenUrl(string $token)
    {
        try {
            $shortUrl = ShortUrl::where('token', '=', $token)->firstOrFail();
            return $shortUrl->destination_url;
        } catch (Exception $exception) {
            return null;
        }
    }
}
