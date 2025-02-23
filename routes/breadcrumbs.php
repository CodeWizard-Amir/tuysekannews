<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// تعریف Breadcrumb برای صفحه اصلی
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('صفحه اصلی', route('websitepages.home'));
});

Breadcrumbs::for('celebritise', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('مشاهیر', route('websitepages.Celebritise'));
});
Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('درباره تویسرکان', route('websitepages.About'));
});

Breadcrumbs::for('works', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('آثار تویسرکانی ها', route('websitepages.Antiquities'));
});
Breadcrumbs::for('galary', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('گالری تصاویر', route('websitepages.Galary'));
});

Breadcrumbs::for('news', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('اخبار', route('websitepages.News'));
});
Breadcrumbs::for('Each_news', function (BreadcrumbTrail $trail, $extra_routeData) {
    $trail->parent('news');
    $trail->push(mb_substr($extra_routeData->title,0,25)."...", route('websitepages.EachNews',['newsID'=>$extra_routeData->newsID ,'title'=>$extra_routeData->title]));
});

Breadcrumbs::for('celebrity', function (BreadcrumbTrail $trail, $extra_routeData) {
    $trail->parent('celebritise');
    $trail->push($extra_routeData->name, route('websitepages.celebrity',['celebrityID'=>$extra_routeData->celebrityID ,'name'=>$extra_routeData->name]));
});

Breadcrumbs::for('work', function (BreadcrumbTrail $trail, $extra_routeData) {
    $trail->parent('works');
    $trail->push($extra_routeData->name, route('websitepages.Antiquitiy',['id'=>$extra_routeData->id ,'name'=>$extra_routeData->name]));
});