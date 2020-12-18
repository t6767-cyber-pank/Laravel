@include('layouts.header')
<script>
    function hideImages() {
        @foreach($pageWeCanPosts as $post)
        document.getElementById('im{{$post["slug"]}}').style.display = "none";
        @endforeach
    }
    function showImage(slug) {
        hideImages();
        document.getElementById(slug).style.display = "block";
    }
</script>
<div class="container">

    <!-- Social Bar Begin -->
    <div class="socialbar">
        <a href="{{setting('site.tweeterlink')}}" target="_blank" class="socialbar__link -tw">Twitter</a>
        <a href="{{setting('site.facebook')}}" target="_blank" class="socialbar__link -fb">Facebook</a>
        <a href="{{setting('site.instagramm')}}" target="_blank" class="socialbar__link -insta">Instagram</a>
    </div>
    <!--/. Social Bar End -->

</div>
<div style="background: azure;">
</div>
<!-- Fullpage Begin -->
<div id="fullpage">

    <!-- Entry Begin -->
    <section class="entry section fp-auto-height-responsive" id="section0">
        <div class="container section__offset">
            <div class="swiper-container jsEntrySlider">
                <div class="swiper-wrapper">
                    @foreach($pronasSlider as $slide)
                    <div class="swiper-slide">
                        <div class="row" vertical-gutter="40">
                            <div class="col-md-5 col-xl-4">
                                <div class="section__header">
                                    <div class="section__header-title">{{$slide["title"]}}</div>
                                </div>
                                <div class="entry__title">{!!$slide["except"]!!}</div>
                                <div class="entry__text">{!! $slide["body"] !!}</div>
                            </div>
                            <div class="col-md-7 col-xl-8">
                                <img src="/storage/{{$slide["image"]}}" class="entry__img" alt="{{$slide["title"]}}">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--/. Entry End -->

    <!-- Services Begin -->
    <section class="services section fp-auto-height-responsive" id="section1">
        <div class="container section__offset">
            <div class="section__header">
                <div class="section__header-title">{{$pagePochemuMy['title']}}</div>
                <a href="{{route('allWeCanAll')}}" class="button -white section__header-button">Все услуги</a>
            </div>
            <div class="row" vertical-gutter="40">
                <div class="col-md-6">
                    <div class="" id="services-list">
                        @php
                            $counter=1;
                            $postImage="";
                        @endphp
                        @foreach($pageWeCanPosts as $post)
                            @if($counter==1)
                                @php
                                $postImage="im".$post["slug"];
                                @endphp
                            @endif
                                @php
                                    $postImageX="im".$post["slug"];
                                @endphp
                            <div class="services__item">
                                <div class="services__item-header" data-toggle="collapse" onclick="showImage('{{$postImageX}}')" data-target="#collapse{{$counter}}" aria-expanded="false" aria-controls="collapse{{$counter}}">{{$post["title"]}}</div>
                                <div id="collapse{{$counter}}" class="collapse" data-parent="#services-list">
                                    <div class="services__item-body">
                                        {!! $post["except"] !!}
                                    </div>
                                    <a href="/allWeCan#{{$post["slug"]}}" class="button -blue services__button">Подробнее</a>
                                </div>
                            </div>
                            @php $counter++; @endphp
                        @endforeach
                    </div>
                </div>
                @foreach($pageWeCanPosts as $post)
                    @php
                        if (($post['image']!=null) && $post['image']!="[]") $imgx="/storage/".str_replace("\\", "/", json_decode($post['image'])[0]->download_link); else $imgx="static/img/general/app.svg";
                    @endphp
                <div id="im{{$post["slug"]}}" class="col-md-6 text-center">
                    <img src="{{$imgx}}" class="services__img" alt="{{$post['title']}}">
                </div>
                @endforeach
                <script> showImage('{{$postImage}}'); </script>
            </div>
        </div>
    </section>
    <!--/. Services End -->
    <!-- Works Begin -->
    <section class="works section fp-auto-height-responsive" id="section2">
        <div class="container section__offset">
            <div class="section__header">
                <div class="section__header-title">Портфолио</div>
                <a href="{{route('allPortfolio')}}" class="button -white section__header-button">Все проекты</a>
            </div>
            <div class="works__slider">
                <div class="swiper-container jsWorksSlider">
                    <div class="swiper-wrapper">
                        @foreach($pageProjects as $projkt)
                        <div class="swiper-slide">
                            <a href="/Portfolio/{{$projkt['slug']}}" class="works__item" style="background-image: url(storage/{{str_replace('\\', '/', $projkt['imagetoFrontpage'])}})">
                                <div class="works__content">
                                    <img src="/storage/{{$projkt['logo']}}" class="works__logo" alt="{{$projkt['title']}}">
                                    <div class="works__header">
                                        <div class="works__title">{{$projkt['title']}}</div>
                                        <div class="works__desc">{!! $projkt['excerpt'] !!}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="works__slider-controls">
                    <div class="works__slider-control -prev jsWorksSliderPrev"></div>
                    <div class="works__slider-control -next jsWorksSliderNext"></div>
                </div>
                <div class="works__pagination jsWorksPagination"></div>
            </div>
        </div>
    </section>
    <!--/. Works End -->

    <!-- Reviews Begin -->
    <section class="reviews section fp-auto-height-responsive" id="section3">
        <div class="container section__offset">
            <div class="section__header">
                <div class="section__header-title">Нам доверяют</div>
                <a href="{{route('rewues')}}" class="button -white section__header-button"> Все отзывы</a>
            </div>
            <div class="row" vertical-gutter="40">
                <div class="col-md-8">
                    <div class="reviews__row row" vertical-gutter="20">
                        @foreach($clients as $namdov)
                        <div class="col-6 col-sm-3">
                            <img src="/storage/{{$namdov["logo"]}}" class="reviews__client" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="reviews__videos">
                        @foreach($clientsvideo as $video)
                        <a href="#" class="reviews__video jsBmButton" data-target="#iframe-modal" data-toggle="modal" data-bmSrc="{{$video['videolink']}}">
                            <img src="/storage/{{$video['videoimage']}}" class="reviews__img" alt="{{$video['videotitle']}}">
                            <div class="reviews__video-cover">
                                <div class="reviews__title">{{$video['videotitle']}}</div>
                                <div class="reviews__subtitle">{!! $video['videodesc'] !!}</div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/. Reviews End -->

    <!-- News Begin -->
    <section class="news section fp-auto-height-responsive" id="section4">
        <div class="container section__offset">
            <div class="section__header">
                <div class="section__header-title">Читайте нас</div>
                <a href="{{route('blog')}}" class="button -white section__header-button">Все статьи</a>
            </div>
            <div class="row" vertical-gutter="40">
                @foreach($blognews as $news)
                <div class="col-sm-6">
                    <div class="news__item">
                        <div class="news__date">{{date("d.m.Y", strtotime($news['created_at']))}}</div>
                        <a href="/blog/{{$news['slug']}}" class="news__title">{{$news['title']}}</a>
                        <a href="/blog/{{$news['slug']}}">
                            <img src="/storage/{{$news['image']}}" class="news__img" alt="">
                        </a>
                        <?php $categor=DB::table('categories')->where('id', $news['category_id'])->get()->toArray(); ?>
                        <a href="/blog#{{$categor[0]->slug}}" class="news__all">{{$categor[0]->name}}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--/. News End -->

    <!-- Stats Begin -->
    <section class="stats section fp-auto-height-responsive" id="section5">
        <div class="container section__offset">
            <div class="section__header">
                <div class="section__header-title">Почему мы</div>
            </div>
            <div class="row" vertical-gutter="40">
                <div class="col-sm-6">
                    <div class="stats__text">
                        {!! setting('site.whyUs')!!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row" vertical-gutter="20">
                        <div class="col-6">
                            <div class="stats__item">
                                <div class="stats__title"><span class="js-counter">{{setting('site.profi')}}</span></div>
                                <div class="stats__text">
                                    Опытных профессионалов, готовых взяться за самые сложные задачи
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stats__item">
                                <div class="stats__title"><span class="js-counter">{{setting('site.projects')}}</span>+</div>
                                <div class="stats__text">
                                    Проектов реализовано не смотря ни на что
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stats__item">
                                <div class="stats__title"><span class="js-counter">{{setting('site.yearsonbusines')}}</span></div>
                                <div class="stats__text">
                                    Лет на рынке веб разработки и продвижения
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stats__item">
                                <div class="stats__title"><span class="js-counter">{{setting('site.kofe')}}</span></div>
                                <div class="stats__text">
                                    Чашки кофе было выпитой командой в процессе работы
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="stats__bottom">
                Давайте сделаем проект вместе <a href="/#anchor6" class="stats__scroll-down">Вниз</a>
            </div>
        </div>
    </section>
    <!--/. Stats End -->
@include('layouts.footer')
