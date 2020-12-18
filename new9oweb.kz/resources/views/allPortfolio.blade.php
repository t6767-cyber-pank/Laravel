@include('layouts.childheader')
<!-- App Main Begin -->
<main role="main" class="app__main">

    <!-- Projects Begin -->
    <section class="projects">
        <div class="container -offset">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a href="/" class="breadcrumbs__link">Главная</a>
                </li>
                <li class="breadcrumbs__item">
                    Проекты
                </li>
            </ul>
            <div class="section-header text-center text-lg-left">
                <div class="section-header__title pb-0">Проекты</div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav projects__tabs" role="tablist">
                        @foreach($projectCategories as $proc)
                        <li class="projects__tabs-item">
                            <a class="" id="t{{$proc['slug']}}" href="/Portfolio#{{$proc['slug']}}">{{$proc['title']}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content">
                        @foreach($projectCategories as $proc)
                        <div class="tab-pane" id="{{$proc['slug']}}" role="tabpanel">
                            <div class="row" vertical-gutter="30" id="row{{$proc['slug']}}">
                                <?php $portfoliocat= DB::table('projects')->where('id_projcat', $proc['id'])->where("status", "PUBLISHED")->orderBy('id', 'desc')->limit(6)->get()->toArray(); ?>
                                <?php $xCount=count($portfoliocat); if($xCount<6) $styleShowMore="display: none;"; else $styleShowMore=""; ?>
                                <script>
                                    let lastProd{{$proc['id']}}=0;
                                    function setlastProd<?=$proc['id']?>(x, sum) {
                                        if (x=='<?=$proc['id']?>') { lastProd{{$proc['id']}}=sum; }
                                    }
                                </script>
                                @foreach($portfoliocat as $portcat)
                                <div class="col-sm-6 col-xl-4">
                                    <div class="projects__card">
                                        <a href="/Portfolio/{{$portcat->slug}}" class="projects__img">
                                            <img src="/storage/{{$portcat->image}}" alt="">
                                        </a>
                                        <div class="projects__desc">
                                            <div class="projects__subtitle">{{$portcat->title}}</div>
                                            <a href="javascript:void(0);" class="projects__title">{{$proc['title']}}</a>
                                        </div>
                                    </div>
                                </div>
                                        <script>setlastProd<?=$proc['id']?>('<?=$proc['id']?>', '<?=$portcat->id?>');</script>
                                @endforeach
                            </div>
                            <div id="button{{$proc['slug']}}">
                            <form>
                            <button type="button" onclick="ajaxReq(lastProd<?=$proc['id']?>, 'row<?=$proc['slug']?>', 'button<?=$proc['slug']?>', <?=$proc['id']?>, '<?=$proc['title'] ?>');" class="button projects__button" style="{{$styleShowMore}}">Показать еще</button>
                            </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/. Projects End -->

    <script>
        function ajaxReq(lastprod, ldiv, buttonid, procid, projcattitle) {
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/ajaxRequest',
                data:{'lastprod':lastprod, 'ldiv':ldiv, 'buttonid':buttonid, 'procid':procid, 'projcattitle':projcattitle},
                success:function(data){
                    data=JSON.parse(data);
                    document.getElementById(ldiv).insertAdjacentHTML('beforeend', data[0]);
                    document.getElementById(buttonid).innerHTML=data[1];
                }
            });
        }

        function hashKoder(hash) {
            switch (hash) {
                @foreach($projectCategories as $proc)
                case "#{{$proc['slug']}}":
                    @foreach($projectCategories as $pr)
                    @if ($proc['slug']==$pr['slug'])
                    document.getElementById('t{{$pr["slug"]}}').className='projects__tabs-link active';
                    document.getElementById('{{$pr["slug"]}}').style.display="block";
                    @else
                    document.getElementById('t{{$pr["slug"]}}').className='projects__tabs-link';
                    document.getElementById('{{$pr["slug"]}}').style.display="none";
                    @endif
                    @endforeach
                    break;
                @endforeach
                default:
                    <?php $i=0; ?>
                    @foreach($projectCategories as $proc)
                    @if ($i < 1)
                        document.getElementById('t{{$proc["slug"]}}').className='projects__tabs-link active';
                        document.getElementById('{{$proc["slug"]}}').style.display="block";
                        <?php $i++; ?>
                    @else
                        document.getElementById('t{{$proc["slug"]}}').className='projects__tabs-link';
                        document.getElementById('{{$proc["slug"]}}').style.display="none";
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

        </main>
<!--/. App Main End -->
@include('layouts.childfooter')
