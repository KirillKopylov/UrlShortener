<?php


namespace App\Http\Controllers\Shorten;


use App\Http\Requests\Shorten\ShortenRequest;
use App\Http\Services\Shorten\ShortenService;

class ShortenController
{
    private $shortenService;

    public function __construct(ShortenService $shortenService)
    {
        $this->shortenService = $shortenService;
    }

    public function index()
    {
        return view('shorten.index');
    }

    public function shorten(ShortenRequest $shortenRequest)
    {
        $token = $this->shortenService->shorten($shortenRequest->destination_url);
        if (is_null($token)) {
            return back()->withErrors('Unable to shorten url');
        }
        return back()->with(['token' => $token]);
    }

    public function redirectWithToken(string $token)
    {
        $url = $this->shortenService->getTokenUrl($token);
        if (is_null($url)) {
            return back()->withErrors('Unable to fetch url for token');
        }
        return redirect($url);
    }
}
