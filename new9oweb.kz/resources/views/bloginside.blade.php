@include('layouts.childheader')
<?php $months_name = array("января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"); ?>
<?php $categor=DB::table('categories')->where('id', $post->category_id)->get()->toArray(); ?>
<!-- App Main Begin -->
<main role="main" class="app__main">

    <!-- Article Begin -->
    <article class="article">
        <div class="container -offset">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a href="/" class="breadcrumbs__link">Главная</a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="{{route('blog')}}" class="breadcrumbs__link">Блог</a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="{{route('blog')}}#{{$categor[0]->slug}}" class="breadcrumbs__link">{{$categor[0]->name}}</a>
                </li>
                <li class="breadcrumbs__item">
                    {{$post->title}}
                </li>
            </ul>
            <header class="section-header pb-3">
            </header>
            <div class="article__body">
                <div class="article__cover">
                    <img src="/storage/{{$post->image}}" class="article__img" alt="{{$post->title}}">
                    <div class="article__top">
                        <div class="article__category">{{$categor[0]->name}}</div>
                        <div class="article__date">{{date("d ".$months_name[date("m") - 2]." Y", strtotime($post->created_at))}}</div>
                    </div>
                    <div class="article__desc">
                        <h1 class="article__title">{{$post->title}}</h1>
                        <div class="article__tags">
                        <?php $tager=DB::table('blogtags')->join('tags', 'tags.id', '=', 'blogtags.id_tag')->where('blogtags.id_post', $post->id)->get()->toArray(); ?>
                        @foreach($tager as $tg)
                                <a href="/searchbytag?value={{$tg->title}}" class="blog__card-tag">
                                    {{$tg->title}}</a>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="article__text">
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </article>
    <!--/. Article End -->
    @php $sbor=array(); @endphp
    @foreach($tager as $tag)
        @php $tagerx=DB::table('blogtags')->where('id_tag', $tag->id_tag)->where('id_post',"!=", $post->id)->get()->toArray(); @endphp
        @foreach($tagerx as $tgx)
            @php
                $tagerPost=DB::table('posts')->where('id', $tgx->id_post)->where("status", "PUBLISHED")->get()->toArray();
                 if ($tagerPost!=null) array_push($sbor, $tagerPost[0]);
            @endphp
        @endforeach
    @endforeach
    <!--Сортировка массива-->
    @php
    foreach ($sbor as $n) { $uniquePostx[$n->slug] = $n; }
    if ($sbor!=null) $uniquePost=array_values($uniquePostx); else $uniquePost=array();
    $sortArray = array();
    if ($uniquePost!=null)
    {
        foreach($uniquePost as $person)
        {
            foreach($person as $key=>$value){
                if(!isset($sortArray[$key])){ $sortArray[$key] = array(); }
                $sortArray[$key][] = $value;
            }
        }
        array_multisort($sortArray["id"],SORT_DESC,$uniquePost);
    }
    @endphp
    <div class="container -offset">
        <div class="row" data-lg-gutter="60" vertical-gutter="30" vertical-lg-gutter="60">
            @php $counter=0; @endphp
            @foreach($uniquePost as $upst)
            @php $categorq=DB::table('categories')->where('id', $upst->category_id)->get()->toArray(); @endphp
            <div class="col-md-6">
                <div class="blog__card">
                    <img src="/storage/{{$upst->image}}" class="blog__card-img" alt="{{$upst->title}}">
                    <div class="blog__card-desc">
                        <div class="blog__card-date">{{date("d ".$months_name[date("m") - 2]." Y", strtotime($upst->created_at))}} - <a href="/blog#{{$categorq[0]->slug}}">{{$categorq[0]->name}}</a>
                        </div>
                        <a href="/blog/{{$upst->slug}}" class="blog__card-title">{{$upst->title}}</a>
                        @php $tagerq=DB::table('blogtags')->join('tags', 'tags.id', '=', 'blogtags.id_tag')->where('blogtags.id_post', $upst->id)->get()->toArray(); @endphp
                        <div class="blog__card-tags">
                            @foreach($tagerq as $tgq)
                                <a href="/searchbytag?value={{$tgq->title}}" class="blog__card-tag">{{$tgq->title}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
                @php $counter++; if($counter==2) break; @endphp
            @endforeach
        </div>
    </div>

</main>
<!--/. App Main End -->
@include('layouts.childfooter')
