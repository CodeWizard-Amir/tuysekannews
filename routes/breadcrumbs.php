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

Breadcrumbs::for('celebrity', function (BreadcrumbTrail $trail, $extra_routeData) {
    $trail->parent('celebritise');
    $trail->push($extra_routeData->name, route('websitepages.celebrity',['celebrityID'=>$extra_routeData->celebrityID ,'name'=>$extra_routeData->name]));
});