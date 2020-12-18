@include('layouts.childheader')
<!-- App Main Begin -->
@php $months_name = array("января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"); @endphp
<main role="main" class="app__main">
    <!-- Search Results Begin -->
    <section class="search-results">
        <div class="container -offset">
            <div class="section-header pb-4">
                <ul class="breadcrumbs">
                    <li class="breadcrumbs__item">
                        <a href="/" class="breadcrumbs__link">Главная</a>
                    </li>
                    <li class="breadcrumbs__item">
                        Поиск по тэгам
                    </li>
                </ul>
                <div class="section-header__title pb-0">#{{$value}}</div>
            </div>
            <form action="/searchbytag" class="search -gray">
                <input type="search" name="value" class="search__input" placeholder="Поисковой запрос" value="{{$value}}">
                <button type="submit" class="button search__button"></button>
            </form>
            @php
            $pxxx=array();
            foreach ($ProjTag as $p)
            {
            $projct=DB::table('projects')->join('projecttags', 'projects.id', '=', 'projecttags.id_project')->where("projects.status", "PUBLISHED")->where('projecttags.id_tag', $p)->get()->toArray();
            $pxxx= array_merge($pxxx,$projct);
            }
            foreach ($pxxx as $n) { $unique[$n->slug] = $n; }
            if ($pxxx!=null) $uniqueProj = array_values($unique); else $uniqueProj=array();

            $pxxxPost=array();
            foreach ($postTag as $p)
            {
            $postxxc=DB::table('posts')->join('blogtags', 'posts.id', '=', 'blogtags.id_post')->where("posts.status", "PUBLISHED")->where('blogtags.id_tag', $p)->get()->toArray();
            $pxxxPost= array_merge($pxxxPost,$postxxc);
            }
            foreach ($pxxxPost as $n) { $uniquePostx[$n->slug] = $n; }
            if ($pxxxPost!=null) $uniquePost=array_values($uniquePostx); else $uniquePost=array();

            @endphp
            <div class="project-list">
                @foreach($uniqueProj as $proj)
                <div class="project-list__item">
                    <a href="/Portfolio/{{$proj->slug}}" class="project-list__img">
                        <img src="/storage/{{$proj->image}}" alt="{{$proj->title}}">
                    </a>
                    <div class="project-list__content">
                        <a href="/Portfolio/{{$proj->slug}}" class="project-list__title">{{$proj->title}}</a>
                        <?php $projectcategors=DB::table('projectcategors')->where('id', $proj->id_projcat)->get()->toArray(); ?>
                        <a href="/Portfolio#{{$projectcategors[0]->slug}}" class="project-list__category">{{$projectcategors[0]->title}}</a>
                        <div class="project-list__text">{!! $proj->excerpt !!}</div>
                        <div class="project-list__date">{{date("d ".$months_name[date("n") - 2]." Y", strtotime($proj->created_at))}}</div>
                    </div>
                </div>
                @endforeach
                @foreach($uniquePost as $proj)
                        <div class="project-list__item">
                            <a href="/blog/{{$proj->slug}}" class="project-list__img">
                                <img src="/storage/{{$proj->image}}" alt="{{$proj->title}}">
                            </a>
                            <div class="project-list__content">
                                <a href="/blog/{{$proj->slug}}" class="project-list__title">{{$proj->title}}</a>
                                <?php $categor=DB::table('categories')->where('id', $proj->category_id)->get()->toArray(); ?>
                                <a href="/blog#{{$categor[0]->slug}}" class="project-list__category">{{$categor[0]->name}}</a>
                                <div class="project-list__text">{!! $proj->excerpt !!}</div>
                                <div class="project-list__date">{{date("d ".$months_name[date("n") - 2]." Y", strtotime($proj->created_at))}}</div>
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
