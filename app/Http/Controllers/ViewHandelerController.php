<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Antiquities;
use App\Models\Baner;
use App\Models\Celebrities;
use App\Models\Galary;
use App\Models\News;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\OpenGraph;

class ViewHandelerController extends Controller
{
    public function Home()
    {

        $celebritise = Celebrities::get()->take(12);
        $baners = Baner::get();
        $firstpicure = Galary::inRandomOrder()->first();
        $works = Antiquities::get();
        $news = News::get()->take(8);
        $secondpicture = Galary::whereNotIn("id", [$firstpicure?->id])->inRandomOrder()->first();
        $galary = Galary::whereNotIn("id", [$secondpicture?->id, $firstpicure?->id])->get();

        // SEO Works ==================================================================================================================================
        $page_description = "تویسرکان | شهر زیبای گردو و طبیعت بکر در همدان
        تویسرکان، شهر سرسبز و خوش‌آب‌وهوای استان همدان، به‌عنوان قطب تولید گردو در ایران شناخته می‌شود. با جاذبه‌های طبیعی، باغ‌های زیبا و آثار تاریخی، مقصدی ایده‌آل برای گردشگران است .";
        SEOMeta::setTitle('تویسرکان | صفحه اصلی', false);
        SEOMeta::setDescription($page_description);
        SEOMeta::addKeyword([
            "تویسرکان",
            "گردوی تویسرکان",
            "جاذبه‌های تویسرکان",
            "طبیعت تویسرکان",
            "همدان تویسرکان",
            "سفر به تویسرکان",
            "گردشگری تویسرکان",
            "باغ‌های تویسرکان",
            "آب‌وهوای تویسرکان",
            "تویسرکان گردو",
            "تویسرکان تاریخی",
            "جاهای دیدنی تویسرکان",
            "تویسرکان طبیعت بکر",
            "تویسرکان مقصد گردشگری",
            "تویسرکان استان همدان",
            "تویسرکان روستاهای زیبا",
            "تویسرکان آبشار",
            "تویسرکان کوهستان",
            "تویسرکان محصولات محلی",
            "تویسرکان سوغاتی",
            "تویسرکان گردو مرغوب",
            "تویسرکان جاذبه‌های طبیعی",
            "تویسرکان باغات سرسبز",
            "تویسرکان آب‌وهوای خنک",
            "تویسرکان مقصد طبیعت‌گردی",
            "تویسرکان جاذبه‌های تاریخی",
            "تویسرکان فرهنگ و هنر",
            "تویسرکان غذاهای محلی",
            "تویسرکان اقامتگاه بوم‌گردی",
            "تویسرکان مسیرهای کوهنوردی"
        ]);
        // END seo work ==================================================================================================================================
        return view("pages.home", compact("celebritise", "news", "baners", "works", "galary", "firstpicure", "secondpicture"));
    }
    public function Galary()
    {
        $galaryImages = Galary::get();
        // SEO WOrks =================================================================
        SEOMeta::setTitle('تویسرکان', false);
        SEOMeta::setTitle('گالری تصاویر تویسرکان | طبیعت بکر و جاذبه‌های دیدنی', false);
        SEOMeta::setDescription('گالری تصاویر تویسرکان: تصاویر زیبا از طبیعت بکر، جاذبه‌های گردشگری و مکان‌های دیدنی تویسرکان. بهترین عکس‌ها از شهر گردوهای خوش‌طعم.');
        SEOMeta::addKeyword([
            "گالری تویسرکان",
            "تصاویر تویسرکان",
            "طبیعت تویسرکان",
            "جاذبه‌های گردشگری تویسرکان",
            "عکس‌های تویسرکان",
            "مناظر تویسرکان",
            "تویسرکان زیبا",
            "تویسرکان طبیعت بکر",
            "تویسرکان جاذبه‌های طبیعی",
            "تویسرکان عکس‌های دیدنی"
        ]);
        OpenGraph::setTitle('گالری تصاویر تویسرکان | طبیعت بکر و جاذبه‌های دیدنی');
        OpenGraph::setDescription('گالری تصاویر تویسرکان: تصاویر زیبا از طبیعت بکر، جاذبه‌های گردشگری و مکان‌های دیدنی تویسرکان.');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        // =================================================================

        return view("pages.Galary", compact('galaryImages'));
    }
    public function Celebritise()
    {
        $celebritise = Celebrities::get();
        // =================================================================
        SEOMeta::setTitle('شخصیت‌های معروف تویسرکان | مشاهیر و بزرگان شهر', false);
        SEOMeta::setDescription('معرفی شخصیت‌های معروف و مشاهیر تویسرکان. آشنایی با بزرگان، هنرمندان و چهره‌های سرشناس این شهر تاریخی.');
        SEOMeta::addKeyword([
            "شخصیت‌های معروف تویسرکان",
            "مشاهیر تویسرکان",
            "بزرگان تویسرکان",
            "چهره‌های سرشناس تویسرکان",
            "تویسرکان مشاهیر",
            "تویسرکان بزرگان",
            "هنرمندان تویسرکان",
            "تویسرکان چهره‌های مطرح",
            "تویسرکان شخصیت‌های تاریخی",
            "تویسرکان افراد مشهور"
        ]);

        // Open Graph تنظیمات
        OpenGraph::setTitle('شخصیت‌های معروف تویسرکان | مشاهیر و بزرگان شهر');
        OpenGraph::setDescription('معرفی شخصیت‌های معروف و مشاهیر تویسرکان. آشنایی با بزرگان، هنرمندان و چهره‌های سرشناس این شهر تاریخی.');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        // =================================================================
        return view("pages.Celebritise", compact("celebritise"));
    }
    public function Each_Celebrity($celebrityID)
    {
        $celebrity = Celebrities::where("celebrityID", $celebrityID)->firstOrFail();
        $news = News::inRandomOrder()->get()->take(5);
        $celebritise = Celebrities::get()->except($celebrity->id)->take(5);

        // SEO Works ==================================================================================================================================
        SEOMeta::setTitle('تویسرکان' . ' | ' . $celebrity->name, false);
        SEOMeta::setDescription($celebrity->description);
        SEOMeta::addMeta('article:published_time', $celebrity->created_at->toW3CString());
        SEOMeta::addKeyword(['اخبار', 'تویسرکان', 'اخبار مهم تویسرکان']);
        // تنظیم Open Graph تگ‌ها
        OpenGraph::setTitle($celebrity->name);
        OpenGraph::setDescription($celebrity->description);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'fa_IR');
        OpenGraph::addImage(url('/') . "/" . $celebrity->picture);

        // تنظیم Twitter Card تگ‌ها
        TwitterCard::setTitle($celebrity->name);
        TwitterCard::setSite('@yourtwitterhandle');
        TwitterCard::setDescription($celebrity->description);
        TwitterCard::setUrl(url()->current());
        TwitterCard::setImage(url('/') . "/" . $celebrity->picture);
        // END seo work ==================================================================================================================================

        return view("pages.Each_celebrity", compact("celebrity", "news", "celebritise"));
    }
    public function News()
    {
        $newses = News::paginate(6);
        $sliderNewses = News::inRandomOrder()->get()->take(5);
        $sliderNewsesTop = News::inRandomOrder()->get()->first();
        $sliderNewsesDwon = News::whereNotIn('id', [$sliderNewsesTop?->id])->inRandomOrder()->get()->first();
        $latestNews = News::orderBy('created_at', 'desc')->get();
        $evenIdNews = $latestNews->filter(fn($news) => $news->id % 2 == 0)->take(2);
        $oddIdNews = $latestNews->filter(fn($news) => $news->id % 2 != 0)->take(4);
        // =============================================================================
        SEOMeta::setTitle('آخرین اخبار تویسرکان | تازه‌ترین رویدادها و اطلاعیه‌ها', false);
        SEOMeta::setDescription('آخرین اخبار و تازه‌ترین رویدادهای تویسرکان: اطلاعیه‌ها، گزارش‌ها و اخبار مهم درباره شهر تویسرکان و جاذبه‌های آن.');
        SEOMeta::addKeyword([
            "اخبار تویسرکان",
            "آخرین اخبار تویسرکان",
            "تازه‌ترین اخبار تویسرکان",
            "رویدادهای تویسرکان",
            "اطلاعیه‌های تویسرکان",
            "تویسرکان اخبار مهم",
            "تویسرکان گزارش‌ها",
            "تویسرکان رویدادهای فرهنگی",
            "تویسرکان اخبار گردشگری",
            "تویسرکان اخبار تاریخی"
        ]);

        // Open Graph تنظیمات
        OpenGraph::setTitle('آخرین اخبار تویسرکان | تازه‌ترین رویدادها و اطلاعیه‌ها');
        OpenGraph::setDescription('آخرین اخبار و تازه‌ترین رویدادهای تویسرکان: اطلاعیه‌ها، گزارش‌ها و اخبار مهم درباره شهر تویسرکان و جاذبه‌های آن.');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        // ==================================================================================================

        return view('pages.news', compact("newses", "evenIdNews", "oddIdNews", "sliderNewses", "sliderNewsesTop", "sliderNewsesDwon"));
    }

    public function Each_news($newsID)
    {

        $news = News::where('newsID', $newsID)->firstOrFail();
        $news->increment('seen'); // افزایش view_count
        $news->save();
        $celebritise = Celebrities::get()->take(5);
        $relatedNews = News::whereNotIn('id', [$news->id])->where('newsCategoryID', $news->newsCategoryID)->get()->take(8);
        // SEO Works ==================================================================================================================================
        SEOMeta::setTitle('تویسرکان' . ' | ' . $news->title, false);
        SEOMeta::setDescription($news->description);
        SEOMeta::addMeta('article:published_time', $news->created_at->toW3CString());
        SEOMeta::addKeyword(['اخبار', 'تویسرکان', 'اخبار مهم تویسرکان']);
        // تنظیم Open Graph تگ‌ها
        OpenGraph::setTitle($news->title);
        OpenGraph::setDescription($news->description);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'fa_IR');
        OpenGraph::addImage(url('/') . "/" . $news->picture);

        // تنظیم Twitter Card تگ‌ها
        TwitterCard::setTitle($news->title);
        TwitterCard::setSite('@yourtwitterhandle');
        TwitterCard::setDescription($news->description);
        TwitterCard::setUrl(url()->current());
        TwitterCard::setImage(url('/') . "/" . $news->picture);
        // END seo work ==================================================================================================================================
        return view("pages.Each_news", compact('news', 'relatedNews', 'celebritise'));
    }
    public function Antiquities()
    {
        $works = Antiquities::get();
        // ======================================================================
        SEOMeta::setTitle('آثار تاریخی تویسرکان | جاذبه‌های گردشگری و میراث فرهنگی', false);
        SEOMeta::setDescription('آثار تاریخی و جاذبه‌های گردشگری تویسرکان: معرفی میراث فرهنگی، بناهای تاریخی و مکان‌های دیدنی این شهر زیبا.');
        SEOMeta::addKeyword([
            "آثار تاریخی تویسرکان",
            "جاذبه‌های گردشگری تویسرکان",
            "میراث فرهنگی تویسرکان",
            "تویسرکان بناهای تاریخی",
            "تویسرکان مکان‌های دیدنی",
            "تویسرکان جاذبه‌های فرهنگی",
            "تویسرکان گردشگری",
            "تویسرکان تاریخچه",
            "تویسرکان معماری تاریخی",
            "تویسرکان میراث باستانی"
        ]);

        // Open Graph تنظیمات
        OpenGraph::setTitle('آثار تاریخی تویسرکان | جاذبه‌های گردشگری و میراث فرهنگی');
        OpenGraph::setDescription('آثار تاریخی و جاذبه‌های گردشگری تویسرکان: معرفی میراث فرهنگی، بناهای تاریخی و مکان‌های دیدنی این شهر زیبا.');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        // ======================================================================
        return view('pages.works', compact("works"));
    }

    public function Each_work($id)
    {
        $work = Antiquities::findOrFail($id);
        $otherWorks = Antiquities::get();
        $news = News::inRandomOrder()->get()->take(5);
        $celebritise = Celebrities::inRandomOrder()->get()->take(5);

        // SEO Works ==================================================================================================================================
        SEOMeta::setTitle('تویسرکان' . ' | ' . $work->name, false);
        SEOMeta::setDescription($work->description);
        SEOMeta::addMeta('article:published_time', $work->created_at->toW3CString());
        SEOMeta::addKeyword(['آثار','اثر'.$work->name, $work->name, $work->W_category()->first()->name,'آثار'.$work->W_category()->first()->name,'تویسرکان','آثار تویسرکان']);
        // تنظیم Open Graph تگ‌ها
        OpenGraph::setTitle($work->name);
        OpenGraph::setDescription($work->description);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'fa_IR');
        OpenGraph::addImage(url('/') . "/" . $work->picture);

        // تنظیم Twitter Card تگ‌ها
        TwitterCard::setTitle($work->name);
        TwitterCard::setSite('@yourtwitterhandle');
        TwitterCard::setDescription($work->description);
        TwitterCard::setUrl(url()->current());
        TwitterCard::setImage(url('/') . "/" . $work->picture);
        // END seo work ==================================================================================================================================

        return view('pages.Each_work', compact('work', 'news', 'celebritise', 'otherWorks'));
    }

    public function About()
    {
        $about = About::get()->first();
        // =======================================================================================
        SEOMeta::setTitle('درباره تویسرکان | تاریخچه، فرهنگ و جاذبه‌های شهر گردو', false);
        SEOMeta::setDescription('تویسرکان، شهر زیبای استان همدان، به‌عنوان قطب تولید گردو در ایران شناخته می‌شود. این شهر با طبیعت بکر، باغ‌های سرسبز و آثار تاریخی، مقصدی ایده‌آل برای گردشگران است.');
        SEOMeta::addKeyword([
            "درباره تویسرکان",
            "تاریخچه تویسرکان",
            "فرهنگ تویسرکان",
            "جاذبه‌های تویسرکان",
            "تویسرکان شهر گردو",
            "طبیعت تویسرکان",
            "تویسرکان استان همدان",
            "تویسرکان باغات سرسبز",
            "تویسرکان آثار تاریخی",
            "تویسرکان گردشگری",
            "تویسرکان غذاهای محلی",
            "تویسرکان سوغاتی",
            "تویسرکان اقامتگاه‌های بوم‌گردی",
            "تویسرکان مسیرهای کوهنوردی",
            "تویسرکان آب‌وهوای خنک"
        ]);

        // Open Graph تنظیمات
        OpenGraph::setTitle('درباره تویسرکان | تاریخچه، فرهنگ و جاذبه‌های شهر گردو');
        OpenGraph::setDescription('تویسرکان، شهر زیبای استان همدان، به‌عنوان قطب تولید گردو در ایران شناخته می‌شود. این شهر با طبیعت بکر، باغ‌های سرسبز و آثار تاریخی، مقصدی ایده‌آل برای گردشگران است.');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        return view('pages.About_US', compact('about'));
    }

    public function owner()
    {
        // ===============================================================

        SEOMeta::setTitle('استاد محمود صلواتی | پژوهشگر ادبیات فارسی و فرهنگ عامه تویسرکان', false);
        SEOMeta::setDescription('استاد محمود صلواتی، پژوهشگر برجسته ادبیات فارسی، فرهنگ عامه تویسرکان و قرآن پژوهی. نویسنده کتاب‌ها و مقالات علمی‌پژوهشی متعدد و عاشق کهن شهر تویسرکان.');
        SEOMeta::addKeyword([
            "محمود صلواتی",
            "استاد محمود صلواتی",
            "پژوهشگر ادبیات فارسی",
            "فرهنگ عامه تویسرکان",
            "قرآن پژوهی",
            "تویسرکان",
            "ادبیات فارسی",
            "مقاله‌های علمی پژوهشی",
            "کتاب‌های محمود صلواتی",
            "تویسرکان فرهنگی",
            "تویسرکان تاریخی",
            "غم غربت در شعر دوره صفویه",
            "پژوهشگر تویسرکانی",
            "محمود صلواتی بیوگرافی",
            "تویسرکان جاذبه‌های فرهنگی"
        ]);
        
        // Open Graph تنظیمات
        OpenGraph::setTitle('استاد محمود صلواتی | پژوهشگر ادبیات فارسی و فرهنگ عامه تویسرکان');
        OpenGraph::setDescription('استاد محمود صلواتی، پژوهشگر برجسته ادبیات فارسی، فرهنگ عامه تویسرکان و قرآن پژوهی. نویسنده کتاب‌ها و مقالات علمی‌پژوهشی متعدد و عاشق کهن شهر تویسرکان.');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        // ===============================================================
        return view('pages.owner');
    }
}
