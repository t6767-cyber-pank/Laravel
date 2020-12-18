@include('layouts.agencyheader')
<!-- App Main Begin -->
<main role="main" class="app__main">

    <!-- Team Begin -->
    <section class="team">
        <div class="container -offset">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-header pb-lg-0">
                        <div class="section-header__title">{{$teamPage['title']}}</div>
                        <div class="section-header__subtitle">{!! $teamPage['except'] !!}</div>
                        <div class="section-header__text">{!! $teamPage['body'] !!}</div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="team__slider">
                        <div class="swiper-container js-team-slider">
                            <div class="swiper-wrapper">
                                @foreach($team as $tt)
                                <div class="swiper-slide">
                                    <div class="team__card">
                                        <img src="/storage/{{$tt['photo']}}" class="team__img" alt="">
                                        <div class="team__desc">
                                            <div class="team__name">{{$tt['name']}}</div>
                                            <div class="team__position">{{$tt['dolg']}}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="team__pagination js-team-slider-pagination"></div>
                    </div>
                    <!--<div class="team__list">
                    <div class="row" data-gutter="15" vertical-gutter="15">
                        <div class="col-md-4 col-lg-6 col-xl-4">
                            <div class="team__card">
                                <img src="childstatic/img/content/team.png" class="team__img" alt="">
                                <div class="team__desc">
                                    <div class="team__name">Alibek Kulseitov</div>
                                    <div class="team__position">Html 5 Developer</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-6 col-xl-4">
                            <div class="team__card">
                                <img src="childstatic/img/content/team.png" class="team__img" alt="">
                                <div class="team__desc">
                                    <div class="team__name">Alibek Kulseitov</div>
                                    <div class="team__position">Html 5 Developer</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-6 col-xl-4">
                            <div class="team__card">
                                <img src="childstatic/img/content/team.png" class="team__img" alt="">
                                <div class="team__desc">
                                    <div class="team__name">Alibek Kulseitov</div>
                                    <div class="team__position">Html 5 Developer</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-6 col-xl-4">
                            <div class="team__card">
                                <img src="childstatic/img/content/team.png" class="team__img" alt="">
                                <div class="team__desc">
                                    <div class="team__name">Alibek Kulseitov</div>
                                    <div class="team__position">Html 5 Developer</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-6 col-xl-4">
                            <div class="team__card">
                                <img src="childstatic/img/content/team.png" class="team__img" alt="">
                                <div class="team__desc">
                                    <div class="team__name">Alibek Kulseitov</div>
                                    <div class="team__position">Html 5 Developer</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-6 col-xl-4">
                            <div class="team__card">
                                <img src="childstatic/img/content/team.png" class="team__img" alt="">
                                <div class="team__desc">
                                    <div class="team__name">Alibek Kulseitov</div>
                                    <div class="team__position">Html 5 Developer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                </div>
            </div>
        </div>
    </section>
    <!--/. Team End -->

    <!-- Achievements Begin -->
    <section class="achievements">
        <div class="container -offset">
            <div class="row align-items-center">
                <div class="col-lg-5 order-md-last">
                    <div class="section-header text-lg-right pb-lg-0">
                        <div class="section-header__title">{{$nagradi['title']}}</div>
                        <div class="section-header__subtitle">{!! $nagradi['except'] !!}</div>
                        <div class="section-header__text">{!! $nagradi['body'] !!}</div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row" vertical-gutter="20" vertical-lg-gutter="40" data-lg-gutter="40">
                        @foreach($revards as $rev)
                            @php
                                if (($rev['icon']!=null) && $rev['icon']!="[]") $ic=str_replace("\\", "/", json_decode($rev['icon'])[0]->download_link); else $ic="";
                            @endphp
                        <div class="col-sm-6">
                            <div class="achievements__item">
                                <div class="achievements__icon" style="background: url('/storage/{{$ic}}');"></div>
                                <div class="achievements__desc">
                                    <div class="achievements__title">{{$rev['title']}}</div>
                                    <div class="achievements__text">{!! $rev['body'] !!}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/. Achievements End -->

    <!-- Features Begin -->
    <section class="features">
        <div class="container -offset">
            <div class="section-header -horizontal">
                <div class="section-header__title">{{$instrument['title']}}</div>
                <div class="section-header__desc">
                    <div class="section-header__subtitle">{!! $instrument['except'] !!}</div>
                    <div class="section-header__text">{!! $instrument['body'] !!}</div>
                </div>
            </div>
            <div class="features__list">
                <div class="row" vertical-gutter="40" vertical-lg-gutter="50">
                    @foreach($instruments as $instr)
                    <div class="col-md-6 col-lg-4">
                        <div class="features__item">
                            <div class="features__title">{{$instr['title']}}</div>
                            {!! $instr['body'] !!}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--/. Features End -->
    <!-- Vacancy Begin -->
    <section class="vacancy">
        <div class="container -offset">
            <div class="section-header">
                <div class="section-header__title">Вакансии</div>
            </div>
            <div class="row" vertical-gutter="30">
                @foreach($Vacancy as $vac)
                <div class="col-md-6 col-lg-4">
                    <a href="/vacancy/{{$vac['id']}}" class="vacancy__card" style="background-image: url('/storage/{{str_replace('\\', '/', $vac['image'])}}')">
                        <div class="vacancy__title">Вакансии 9oweb</div>
                        <div class="vacancy__subtitle">{{$vac['title']}}</div>
                        <div class="vacancy__button">Откликнуться</div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--/. Vacancy Begin End -->

</main>
<!--/. App Main End -->
@include('layouts.agencyfooter')
