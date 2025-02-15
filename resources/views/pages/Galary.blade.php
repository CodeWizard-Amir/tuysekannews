@extends('layout.mainlayout')
@section('title', "تویسرکان | گالری تصاویر ")

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.min.css">
@endsection
@section('body')
@include('components.mobile-menu')

    @include('layout.header')
    @include('components.website-path',["breadcrumbs_name"=> "galary","heading_content"=>"گالری تصاویر"])
    <div class="my-gallery flex justify-between flex-wrap w-full !p-3 xl:w-3/4 mx-auto my-5" itemscope
        itemtype="http://schema.org/ImageGallery">
        @foreach ($galaryImages as $key =>$item)
        @if ($key % 3 == 0)
        <figure class="!w-full p-1 h-[250px] lg:h-[400px]" itemprop="associatedMedia" itemscope
            itemtype="http://schema.org/ImageObject">
            <a href="{{ url('/') }}/{{$item?->picture}}" itemprop="contentUrl" data-size="1200x800">
                <img class="w-full h-full" src="{{ url('/') }}/{{$item?->picture}}" itemprop="thumbnail"
                    alt="{{$item?->name}}" />
            </a>
        </figure>
    @else
        <figure class="!w-[50%] p-1 h-[200px] lg:h-[400px]" itemprop="associatedMedia" itemscope
            itemtype="http://schema.org/ImageObject">
            <a href="{{ url('/') }}/{{$item->picture}}" itemprop="contentUrl" data-size="1200x800">
                <img class="w-full h-full" src="{{ url('/') }}/{{$item->picture}}" itemprop="thumbnail"
                    alt="تصویر 1" />
            </a>
        </figure>
    @endif
        @endforeach
  
    </div>


    <!-- PhotoSwipe container -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="بستن"></button>
                    <button class="pswp__button pswp__button--share" title="اشتراک‌گذاری"></button>
                    <button class="pswp__button pswp__button--fs" title="تمام‌صفحه"></button>
                    <button class="pswp__button pswp__button--zoom" title="زوم"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="قبلی"></button>
                <button class="pswp__button pswp__button--arrow--right" title="بعدی"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js"></script>
    <script>
        $(document).ready(function() {
            var initPhotoSwipeFromDOM = function(gallerySelector) {
                var parseThumbnailElements = function(el) {
                    var thumbElements = el.childNodes,
                        numNodes = thumbElements.length,
                        items = [],
                        figureEl,
                        linkEl,
                        size,
                        item;

                    for (var i = 0; i < numNodes; i++) {
                        figureEl = thumbElements[i]; // <figure> element

                        if (figureEl.nodeType !== 1) {
                            continue;
                        }

                        linkEl = figureEl.children[0]; // <a> element
                        size = linkEl.getAttribute('data-size').split('x');

                        // ایجاد شیء اسلاید
                        item = {
                            src: linkEl.getAttribute('href'),
                            w: parseInt(size[0], 10),
                            h: parseInt(size[1], 10)
                        };

                        if (figureEl.children.length > 1) {
                            item.title = figureEl.children[1].innerHTML; // محتوای <figcaption>
                        }

                        if (linkEl.children.length > 0) {
                            item.msrc = linkEl.children[0].getAttribute('src'); // آدرس تصویر کوچک
                        }

                        item.el = figureEl; // ذخیره لینک به عنصر برای getThumbBoundsFn
                        items.push(item);
                    }

                    return items;
                };

                var closest = function closest(el, fn) {
                    return el && (fn(el) ? el : closest(el.parentNode, fn));
                };

                var onThumbnailsClick = function(e) {
                    e = e || window.event;
                    e.preventDefault ? e.preventDefault() : e.returnValue = false;

                    var eTarget = e.target || e.srcElement;

                    var clickedListItem = closest(eTarget, function(el) {
                        return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
                    });

                    if (!clickedListItem) {
                        return;
                    }

                    var clickedGallery = clickedListItem.parentNode,
                        childNodes = clickedListItem.parentNode.childNodes,
                        numChildNodes = childNodes.length,
                        nodeIndex = 0,
                        index;

                    for (var i = 0; i < numChildNodes; i++) {
                        if (childNodes[i].nodeType !== 1) {
                            continue;
                        }

                        if (childNodes[i] === clickedListItem) {
                            index = nodeIndex;
                            break;
                        }
                        nodeIndex++;
                    }

                    if (index >= 0) {
                        openPhotoSwipe(index, clickedGallery);
                    }
                    return false;
                };

                var openPhotoSwipe = function(index, galleryElement, disableAnimation) {
                    var pswpElement = document.querySelectorAll('.pswp')[0],
                        gallery,
                        options,
                        items;

                    items = parseThumbnailElements(galleryElement);

                    options = {
                        index: index,
                        bgOpacity: 0.7,
                        showHideOpacity: true
                    };

                    if (disableAnimation) {
                        options.showAnimationDuration = 0;
                    }

                    gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
                    gallery.init();
                };

                var galleryElements = document.querySelectorAll(gallerySelector);
                for (var i = 0, l = galleryElements.length; i < l; i++) {
                    galleryElements[i].setAttribute('data-pswp-uid', i + 1);
                    galleryElements[i].onclick = onThumbnailsClick;
                }
            };

            initPhotoSwipeFromDOM('.my-gallery');
        });
    </script>
@endsection
