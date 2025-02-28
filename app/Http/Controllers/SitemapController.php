<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\News;
use App\Models\Antiquities;
use App\Models\Celebrities;

class SitemapController extends Controller
{
    public function generate()
    {
        // پاک کردن فایل sitemap.xml اگر وجود داشته باشد
        $sitemapPath = public_path('sitemap.xml');
        if (File::exists($sitemapPath)) {
            File::delete($sitemapPath);
        }

        // ایجاد محتوای XML
        $xmlContent = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xmlContent .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        // اضافه کردن روت‌های استاتیک
        $staticRoutes = [
            '/' => ['priority' => '1.0', 'changefreq' => 'daily'],
            '/Galary' => ['priority' => '0.8', 'changefreq' => 'daily'],
            '/News' => ['priority' => '0.8', 'changefreq' => 'daily'],
            '/Antiquities' => ['priority' => '0.8', 'changefreq' => 'daily'],
            '/Celebritise' => ['priority' => '0.8', 'changefreq' => 'daily'],
            '/about-us' => ['priority' => '0.8', 'changefreq' => 'daily'],
            '/owner' => ['priority' => '0.8', 'changefreq' => 'daily'],
            '/adminpanel' => ['priority' => '0.8', 'changefreq' => 'daily'],
        ];

        foreach ($staticRoutes as $route => $settings) {
            $xmlContent .= $this->generateUrlElement($route, now(), $settings['changefreq'], $settings['priority']);
        }

        // اضافه کردن روت‌های داینامیک
        $xmlContent .= $this->generateDynamicUrls();

        $xmlContent .= '</urlset>';

        // ذخیره فایل sitemap.xml
        File::put($sitemapPath, $xmlContent);

        return 'Sitemap generated successfully!';
    }

    /**
     * ایجاد تگ <url> برای هر آدرس
     */
    protected function generateUrlElement($loc, $lastmod, $changefreq, $priority)
    {
        return "
    <url>
        <loc>" . url($loc) . "</loc>
        <lastmod>" . $lastmod->toAtomString() . "</lastmod>
        <changefreq>" . $changefreq . "</changefreq>
        <priority>" . $priority . "</priority>
    </url>" . PHP_EOL;
    }

    /**
     * ایجاد تگ‌های <url> برای روت‌های داینامیک
     */
    protected function generateDynamicUrls()
    {
        $xmlContent = '';

        // اضافه کردن روت‌های News
        $newsItems = News::all();
        foreach ($newsItems as $news) {
            $Title_news = str_replace(' ', '-', $news->title);
            $loc = "/News/{$news->id}/{$Title_news}";
            $xmlContent .= $this->generateUrlElement($loc, $news->updated_at, 'weekly', '0.7');
        }

        // اضافه کردن روت‌های Antiquities
        $antiquitiesItems = Antiquities::all();
        foreach ($antiquitiesItems as $antiquity) {
            $celebrity_name = str_replace(' ', '-', $antiquity->name);
            $loc = "/Antiquities/{$antiquity->id}/{$celebrity_name}";
            $xmlContent .= $this->generateUrlElement($loc, $antiquity->updated_at, 'weekly', '0.7');
        }

        // اضافه کردن روت‌های Celebrities
        $celebritiesItems = Celebrities::all();
        foreach ($celebritiesItems as $celebrity) {
            $celebrity_name = str_replace(' ', '-', $celebrity->name);
            $loc = "/Celebritise/{$celebrity->id}/{$celebrity_name}";
            $xmlContent .= $this->generateUrlElement($loc, $celebrity->updated_at, 'weekly', '0.7');
        }

        return $xmlContent;
    }
}