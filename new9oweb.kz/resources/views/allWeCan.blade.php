@include('layouts.childheader')
<!-- App Main Begin -->
<main role="main" class="app__main">

    <!-- Services Begin -->
    <section class="services">
        <div class="container -offset">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a href="/" class="breadcrumbs__link">Главная</a>
                </li>
                <li class="breadcrumbs__item">
                    Услуги
                </li>
            </ul>
            <div class="section-header text-center text-lg-left">
                <div class="section-header__title pb-0">Услуги</div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav services__tabs" role="tablist">
                        @foreach($pageWeCanPosts as $proc)
                            <li class="services__tabs-item">
                                <a class="" id="t{{$proc['slug']}}" href="/allWeCan#{{$proc['slug']}}">{{$proc['title']}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="services__body">
                        <div class="tab-content">
                            @foreach($pageWeCanPosts as $post)
                                    <div class="tab-pane fade show active" id="b{{$post['slug']}}" role="tabpanel">
                                        {!! $post["body"] !!}
                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/. Services End -->

    <!-- Projects Begin -->
    <?php $im=1; ?>
    @foreach($pageWeCanPosts as $post)
        <?php
        $portfoliocat= DB::table('projects')->where('post_id', $post["id"])->where("status", "PUBLISHED")->limit(4)->orderBy('id', 'desc')->get()->toArray();
        ?>
    <div class="container -offset" id="portFace{{$post["id"]}}">
        <div class="section-header">
            <div class="section-header__title">Кейсы</div>
        </div>
        <div class="row" vertical-gutter="30">
            @foreach($portfoliocat as $portf)
            <div class="col-sm-6 col-xl-3">
                <div class="projects__card">
                    <a href="/Portfolio/{{$portf->slug}}" class="projects__img">
                        <img src="/storage/{{$portf->image}}" alt="">
                    </a>
                    <div class="projects__desc">
                        <div class="projects__subtitle">{{$portf->title}}</div>
                        <?php $projectcategors=DB::table('projectcategors')->where('id', $portf->id_projcat)->get()->toArray(); ?>
                        <a href="/Portfolio#{{$projectcategors[0]->slug}}" class="projects__title">{{$projectcategors[0]->title}}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endforeach
    <!--/. Projects End -->
</main>
<!--/. App Main End -->
<script>
    function hideKeys() {
        @foreach($pageWeCanPosts as $post)
        document.getElementById('portFace{{$post["id"]}}').style.display = "none";
        @endforeach
    }
    function showKeys(portFace) {
        hideKeys();
        document.getElementById(portFace).style.display = "block";
    }

    function hashKoder(hash) {
        switch (hash) {
            @foreach($pageWeCanPosts as $proc)
            case "#{{$proc['slug']}}":
                @foreach($pageWeCanPosts as $pr)
                @if ($proc['slug']==$pr['slug'])
                document.getElementById('t{{$pr["slug"]}}').className='services__tabs-link active';
                document.getElementById('b{{$pr["slug"]}}').style.display="block";
                showKeys('portFace{{$pr["id"]}}');
                @else
                document.getElementById('t{{$pr["slug"]}}').className='services__tabs-link';
                document.getElementById('b{{$pr["slug"]}}').style.display="none";
                @endif
                    @endforeach
                    break;
            @endforeach
            default:
                <?php $i=0; ?>
                @foreach($pageWeCanPosts as $proc)
                @if ($i < 1)
                document.getElementById('t{{$proc["slug"]}}').className='services__tabs-link active';
                document.getElementById('b{{$proc["slug"]}}').style.display="block";
                showKeys('portFace{{$proc["id"]}}');
                <?php $i++; ?>
                @else
                document.getElementById('t{{$proc["slug"]}}').className='services__tabs-link';
                document.getElementById('b{{$proc["slug"]}}').style.display="none";
                @endif
                    @endforeach
                    break;
        }
    }

    var hash = window.location.hash;
    hashKoder(hash);

    function locationHashChanged() {
        var hash = window.location.hash;
        hashKoder(hash);
    }

    function changeHash(h)
    {
        window.location.hash=h;
        var hash = window.location.hash;
        hashKoder(hash);
    }
    window.onhashchange = locationHashChanged;
</script>

@include('layouts.childfooter')
