<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// صفحه اصلی
Breadcrumbs::for('Home', function (BreadcrumbTrail $trail) {
    $trail->push('صفحه اصلی', route('Home'));
});

// مشاهیر
Breadcrumbs::for('show.galary', function (BreadcrumbTrail $trail) {
    $trail->parent('home'); // ارث‌بری از صفحه اصلی
    $trail->push('گالری تصاویر', route('show.galary'));
});

// مشاهیر / بوعلی سینا
// Breadcrumbs::for('famous.show', function (BreadcrumbTrail $trail, $name) {
//     $trail->parent('famous.index'); // ارث‌بری از مشاهیر
//     $trail->push($name, route('famous.show', $name));
// });