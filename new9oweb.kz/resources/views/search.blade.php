@include('layouts.childheader')
<!-- App Main Begin -->
<?php $months_name = array("января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"); ?>
<main role="main" class="app__main">

    <!-- Search Results Begin -->
    <section class="search-results">
        <div class="container -offset">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a href="/" class="breadcrumbs__link">Главная</a>
                </li>
                <li class="breadcrumbs__item">
                    Поиск
                </li>
            </ul>
            <div class="section-header pb-4">
                <div class="section-header__title pb-0">Поиск</div>
            </div>
            <form action="/search" class="search -gray">
                <input type="search" class="search__input" name="value" placeholder="Поисковой запрос" value="{{$value}}">
                <button type="submit" class="button search__button"></button>
            </form>
            <div class="search-tags">
                <div class="search-tags__title">Так же интересные теги</div>
                <div class="search-tags__list">
                        @foreach($ProjectsWithTags as $px)
                        @php $tags=DB::table('tags')->where('id', $px)->get()->toArray(); @endphp
                        <a href="/searchbytag?value={{$tags[0]->title}}" class="search-tags__item">{{$tags[0]->title}}</a>
                        @endforeach
                </div>
            </div>
            <div class="project-list">
                @foreach($Projects as $proj)
                <div class="project-list__item">
                    <a href="/Portfolio/{{$proj['slug']}}" class="project-list__img">
                        <img src="/storage/{{$proj['image']}}" alt="{{$proj['title']}}">
                    </a>
                    <div class="project-list__content">
                        <a href="/Portfolio/{{$proj['slug']}}" class="project-list__title">{{$proj['title']}}</a>
                        <?php $projectcategors=DB::table('projectcategors')->where('id', $proj['id_projcat'])->get()->toArray(); ?>
                        <a href="/Portfolio#{{$projectcategors[0]->slug}}" class="project-list__category">{{$projectcategors[0]->title}}</a>
                        @php
                        $strEx=str_replace("$value", "<b style='background: #3497D2; color: white;'>$value</b>", $proj['excerpt']);
                        @endphp
                        <div class="project-list__text">{!! $strEx !!}</div>
                        <div class="project-list__date">{{date("d ".$months_name[date("n") - 2]." Y", strtotime($proj['created_at']))}}</div>
                    </div>
                </div>
                @endforeach
                    @foreach($posts as $post)
                        <div class="project-list__item">
                            <a href="/blog/{{$post['slug']}}" class="project-list__img">
                                <img src="/storage/{{$post['image']}}" alt="{{$post['title']}}">
                            </a>
                            <div class="project-list__content">
                                <a href="/blog/{{$post['slug']}}" class="project-list__title">{{$post['title']}}</a>
                                <?php $categor=DB::table('categories')->where('id', $post['category_id'])->get()->toArray(); ?>
                                <a href="/blog#{{$categor[0]->slug}}" class="project-list__category">{{$categor[0]->name}}</a>
                                @php
                                    $strEx=str_replace("$value", "<b style='background: #3497D2; color: white;'>$value</b>", $post['excerpt']);
                                @endphp
                                <div class="project-list__text">{!! $strEx !!}</div>
                                <div class="project-list__date">{{date("d ".$months_name[date("n") - 2]." Y", strtotime($post['created_at']))}}</div>
                            </div>
                        </div>
                    @endforeach
            </div>
            <div>
    </section>
    <!--/. Search Results End -->

</main>
<!--/. App Main End -->
@include('layouts.childfooter')
