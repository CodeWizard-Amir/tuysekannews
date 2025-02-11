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
Breadcrumbs::for('celebrity', function (BreadcrumbTrail $trail, $celebrity) {
    $trail->parent('celebritise');
    $trail->push($celebrity->name, route('websitepages.celebrity',['celebrityID'=>$celebrity->celebrityID ,'name'=>$celebrity->name]));
});