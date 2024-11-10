<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Crawler\Crawler;
use Spatie\Sitemap\SitemapGenerator;

class SitemapGeneratorController extends Controller
{
    public function generate(Request $request): Application|Response|ResponseFactory
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        set_time_limit(300);

        $sitemap = SitemapGenerator::create($request->url)
            ->configureCrawler(function (Crawler $crawler) {
                $crawler->setTotalCrawlLimit(500);
            })
            ->getSitemap();

        return response($sitemap->render())
            ->header('Content-Type', 'text/xml');
    }

    public function index(): View|Factory|Application
    {
        return view('pages.sitemap-generator');
    }
}
