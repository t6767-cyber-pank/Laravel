@include('layouts.childheader')
<!-- App Main Begin -->
<main role="main" class="app__main">
<?php $projectcategors=DB::table('projectcategors')->where('id', $post->id_projcat)->get()->toArray(); ?>
<!-- Project Begin -->
    <article class="project">
        <div class="container -offset">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a href="/" class="breadcrumbs__link">Главная</a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="{{route('allPortfolio')}}#{{$projectcategors[0]->slug}}" class="breadcrumbs__link">{{$projectcategors[0]->title}}</a>
                </li>
                <li class="breadcrumbs__item">
                    {{$post->title}}
                </li>
            </ul>
            <header class="section-header text-center text-lg-left pb-3">
                <div class="section-header__title">{{$post->title}}</div>
            </header>
            <div class="project__top">
                <a href="http://{{$post->linkproject}}" target="_blank" class="project__link">{{$post->linkproject}}</a>
                <img src="/storage/{{$post->logo}}" class="project__logo" alt="">
            </div>
            <div class="project__body">
                <!--<div class="project__subtitle">{{$post->tags}}</div>-->
                <div class="project__img">
                    <img src="/storage/{{$post->image}}" alt="">
                </div>
                {!! $post->body !!}
            </div>
        </div>
        <div class="project__mission">
            <div class="container -offset">
                <div class="row" vertical-gutter="30">
                    <div class="col-md-5">
                        <div class="project__mission-item">
                            <h4>Задача</h4>
                            {!! $post->Task !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="project__mission-item">
                            <h4>Предпроектные исследования</h4>
                            {!! $post->projectresearch !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container -offset">
            <div class="text-center">
                <img src="/storage/{{$post->mapsite}}" alt="">
            </div>
        </div>
        <div class="project__desc">
            <div class="container -offset">
                <div class="project__item">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="project__title">Решение</h4>
                        </div>
                        <div class="col-md-8">
                            <?php $solutions= DB::table('solutions')->where('id_project', $post->id)->get()->toArray();?>
                            @foreach($solutions as $solut)
                                    @php
                                        if (($solut->icon!=null) && $solut->icon!="[]") $imgxz=str_replace("\\", "/", json_decode($solut->icon)[0]->download_link); else $imgxz="";
                                    @endphp
                                <div class="project__solution">
                                <div class="project__solution-icon">
                                    <img src="/storage/{{$imgxz}}" alt="">
                                </div>
                                {!! $solut->description !!}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="project__slider">
                <div class="container -offset">
                    <h4 class="project__title">Дизайн</h4>
                </div>
                <div class="project-slider">
                    <div class="swiper-container js-project-slider">
                        <div class="swiper-wrapper">
                            <?php $sliderprojects= DB::table('sliderprojects')->where('id_project', $post->id)->get()->toArray(); ?>
                            @foreach($sliderprojects as $slide)
                                <div class="swiper-slide">
                                <img src="/storage/{{$slide->picture}}" class="project-slider__img" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="project-slider__controls">
                        <div class="project-slider__control -prev js-project-prev"></div>
                        <div class="project-slider__control -next js-project-next"></div>
                    </div>
                    <div class="project-slider__pagination js-project-pagination"></div>
                </div>
            </div>
            <div class="container -offset">
                <div class="project__item -no-border">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="project__title">Платформа и интеграции</h4>
                        </div>
                        <div class="col-md-8">
                            <?php $projecttags= DB::table('projecttags')->where('id_project', $post->id)->get()->toArray(); ?>
                                @foreach($projecttags as $prot)
                                    <?php $projecttagsx= DB::table('tags')->where('id', $prot->id_tag)->get()->toArray(); ?>
                                    <a href="/searchbytag?value={{$projecttagsx[0]->title}}"><div class="project__tag">{{$projecttagsx[0]->title}}</div></a>
                                @endforeach
                        </div>
                    </div>
                </div>
                <div class="project__item">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="project__title">Отзыв клиента</h4>
                        </div>
                        <?php $otzivprojects=DB::table('otzivprojects')->where('id_project', $post->id)->get()->toArray(); ?>
                        <div class="col-md-8">
                            @foreach($otzivprojects as $otz)
                            <div class="project__review">
                                <div class="project__review-author">
                                    <?php $clients=DB::table('clients')->where('id', $otz->id_client)->get()->toArray(); ?>
                                    <img src="/storage/{{$clients[0]->avatar}}" class="project__review-ava" alt="">
                                    <div class="project__review-desc">
                                        <div class="project__review-name">{{$clients[0]->name}}</div>
                                        <div class="project__review-position">{{$clients[0]->company}}</div>
                                    </div>
                                </div>
                                <div class="project__review-text">
                                   {!! $otz->otziv !!}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="project__item">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="project__title">Команда</h4>
                        </div>
                        <div class="col-md-8">
                            <div class="row" vertical-gutter="20" vertical-lg-gutter="40">
                                <?php $projectteams=DB::table('projectteams')->where('id_project', $post->id)->get()->toArray(); ?>
                                    @foreach($projectteams as $proj)
                                    <div class="col-6 col-md-4">
                                        <?php $tea=DB::table('teams')->where('id', $proj->id_team)->get()->toArray(); ?>
                                        <div class="project__team">
                                        <div class="project__team-name">{{$tea[0]->name}}</div>
                                        <div class="project__team-position">{{$tea[0]->dolg}}</div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <!--/. Project End -->

    <div class="container -offset">
        <div class="section-header pb-3">
            <h2 class="">Похожие проекты</h2>
        </div>
        <div class="row" vertical-gutter="30">
            <?php $projectFriends=DB::table('projects')->where('id_projcat', $post->id_projcat)->where('id', '!=', $post->id)->orderBy('id', 'desc')->limit(4)->get()->toArray(); ?>
            @foreach($projectFriends as $profriend)
            <div class="col-sm-6 col-xl-3">
                <div class="projects__card">
                    <a href="/Portfolio/{{$profriend->slug}}" class="projects__img">
                        <img src="/storage/{{$profriend->image}}" alt="">
                    </a>
                    <div class="projects__desc">
                        <div class="projects__subtitle">{{$profriend->title}}</div>
                        <a href="/Portfolio#{{$projectcategors[0]->slug}}" class="projects__title">{{$projectcategors[0]->title}}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</main>
<!--/. App Main End -->
@include('layouts.childfooter')
