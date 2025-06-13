<?php

namespace App\Http\Controllers;

use App\Services\NksApiService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $nksApiService;

    // ✅ Constructor injection - Best practice
    public function __construct(NksApiService $nksApiService)
    {
        $this->nksApiService = $nksApiService;
    }

    public function index()
    {
        try {
            $apiResponse = $this->nksApiService->getInsights();

            $latestNews = collect($apiResponse['data'] ?? [])
                ->take(3)
                ->values()
                ->toArray();

            return view('homepage', compact('latestNews'));
        } catch (\Exception $e) {
            \Log::error('Latest news fetch error: ' . $e->getMessage());
            return view('homepage', ['latestNews' => []]);
        }
    }
}
