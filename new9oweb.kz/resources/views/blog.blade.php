@include('layouts.childheader')
<?php $categorx=DB::table('categories')->orderBy('name', 'asc')->get()->toArray(); ?>
<?php $months_name = array("января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"); ?>
<!-- App Main Begin -->
<main role="main" class="app__main">

    <!-- Blog Begin -->
    <section class="blog">
        <div class="container -offset">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a href="/" class="breadcrumbs__link">Главная</a>
                </li>
                <li class="breadcrumbs__item">
                    Блог
                </li>
            </ul>
            <div class="section-header">
                <div class="section-header__title">Блог</div>
                <div class="blog__links">
                    <a href="/blog#all" style="text-decoration: none;" id="tall" class="button blog__link -active">Все</a>
                    @foreach($categorx as $catx)
                        <a href="/blog#{{$catx->slug}}" style="text-decoration: none;" id="t{{$catx->slug}}" class="button blog__link">{{$catx->name}}</a>
                    @endforeach
                </div>
            </div>
            <div id="rowall">
            <div class="row" data-lg-gutter="60" vertical-gutter="30" vertical-lg-gutter="60">
                @foreach($blognews as $bl)
                    <?php $categor=DB::table('categories')->where('id', $bl['category_id'])->get()->toArray(); ?>
                    <div class="col-md-6">
                        <div class="blog__card">
                            <img src="/storage/{{$bl['image']}}" class="blog__card-img" alt="{{$bl['title']}}">
                            <div class="blog__card-desc">
                                <div class="blog__card-date">{{date("d ".$months_name[date("n") - 1]." Y", strtotime($bl['created_at']))}} - <a href="/blog#{{$categor[0]->slug}}">{{$categor[0]->name}}</a>
                                </div>
                                <a href="/blog/{{$bl['slug']}}" class="blog__card-title">{{$bl['title']}}</a>
                                <?php $tager=DB::table('blogtags')->join('tags', 'tags.id', '=', 'blogtags.id_tag')->where('blogtags.id_post', $bl['id'])->get()->toArray(); ?>
                                <div class="blog__card-tags">
                                @foreach($tager as $tg)
                                <a href="/searchbytag?value={{$tg->title}}" class="blog__card-tag">{{$tg->title}}</a>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <?php
                    $xCount=count($blognews);
                    if($xCount<3) $styleShowMore="display: none;"; else $styleShowMore="";
                    if ($xCount>0) $end=end($blognews)['id']; else $end=0;
                    if ($xCount>0) $first=$blognews[0]['id']; else $first=0;
                    ?>
                <div class="col-md-6" id="podpisall">
                    <div class="subscribe">
                        <div class="subscribe__title">Подпишитесь на нас</div>
                        <div class="subscribe__text">Иногда мы отправляем полезные и интересные новости digital рынка</div>
                        <form class="subscribe__form">
                            <input type="text" class="subscribe__input" id="podpiskaall" placeholder="Введите E-Mail">
                            <button type="button" onclick="ajaxPodpiska('<?=$first?>', document.getElementById('podpiskaall').value)" id="butpodpiskaall" class="subscribe__button" ></button> <!--data-target="#modal-successRas" data-toggle="modal"-->
                        </form>
                    </div>
                </div>
            </div>
                <div id="butall">
                    <form>
                        <button type="button" onclick="ajaxReq('<?=$end?>', 'podpisall', 'butall')" class="button projects__button" style="{{$styleShowMore}}">Показать еще</button>
                    </form>
                </div>
            </div>

            @foreach($categorx as $ct)
            <div id="row{{$ct->slug}}" style="display: none">
                <div class="row" data-lg-gutter="60" vertical-gutter="30" vertical-lg-gutter="60">
                    <?php $blognewsx= DB::table('posts')->where("category_id", $ct->id)->where("status", "PUBLISHED")->limit(3)->orderBy('id', 'desc')->get()->toArray(); ?>
                @foreach($blognewsx as $bl)
                    <div class="col-md-6">
                        <div class="blog__card">
                            <img src="/storage/{{$bl->image}}" class="blog__card-img" alt="{{$bl->title}}">
                            <div class="blog__card-desc">
                                <div class="blog__card-date">{{date("d ".$months_name[date("n") - 1]." Y", strtotime($bl->created_at))}}- <a href="/blog#{{$ct->slug}}">{{$ct->name}}</a>
                                </div>
                                <a href="/blog/{{$bl->slug}}" class="blog__card-title">{{$bl->title}}</a>
                                <?php $tager=DB::table('blogtags')->join('tags', 'tags.id', '=', 'blogtags.id_tag')->where('blogtags.id_post', $bl->id)->get()->toArray(); ?>
                                <div class="blog__card-tags">
                                @foreach($tager as $tg)
                                    <a href="/searchbytag?value={{$tg->title}}" class="blog__card-tag">{{$tg->title}}</a>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                        <?php $xCount=count($blognewsx);
                        if($xCount<3) $styleShowMore="display: none;"; else $styleShowMore="";
                        if ($xCount>0) $end=end($blognewsx)->id; else $end=0;
                        ?>
                    <div class="col-md-6" id="podpis{{$ct->slug}}">
                        <div class="subscribe">
                            <div class="subscribe__title">Подпишитесь на нас</div>
                            <div class="subscribe__text">Иногда мы отправляем полезные и интересные новости digital рынка</div>
                            <form class="subscribe__form">
                                <input type="text" class="subscribe__input" id="podpisk<?=$ct->slug?>" placeholder="Введите E-Mail">
                                <button type="button" onclick="ajaxPodpiska('<?=$first?>', document.getElementById('podpisk<?=$ct->slug?>').value)" id="butpodpisk<?=$ct->slug?>" class="subscribe__button"></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="but{{$ct->slug}}">
                    <form>
                        <button type="button" onclick="ajaxReq('<?=$end?>', 'podpis<?=$ct->slug?>', 'but<?=$ct->slug?>')" class="button projects__button" style="{{$styleShowMore}}">Показать еще</button>
                    </form>
                </div>
            </div>
            @endforeach

        </div>
    </section>
    <!--/. Blog End -->
    <script>
        function ajaxReq(id, kuda, but) {
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/ajaxRequestPostBlog',
                data:{'id':id, 'kuda':kuda, 'but':but},
                success:function(data){
                    data=JSON.parse(data);
                    document.getElementById(kuda).insertAdjacentHTML('beforebegin', data[0]);
                    document.getElementById(but).innerHTML=data[1];
                }
            });
        }

        function ajaxPodpiska(id, kuda) {
            emailPress=ff(kuda);
            if(emailPress==0) alert("Пожалуйста проверьте правильность ввода email");
            else
            {
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/ajaxRequestPodpiska',
                data:{'id':id, 'kuda':kuda},
                success:function(data){
                    data=JSON.parse(data);
                    $("#modal-successRas").modal();
                }
            });
            }
        }

        function hashKoder(hash) {
            switch (hash) {
                @foreach($categorx as $proc)
                case "#{{$proc->slug}}":
                    @foreach($categorx as $pr)
                    @if ($proc->slug==$pr->slug)
                    document.getElementById('t{{$pr->slug}}').className='button blog__link -active';
                    document.getElementById('row{{$pr->slug}}').style.display="block";
                    @else
                    document.getElementById('t{{$pr->slug}}').className='button blog__link';
                    document.getElementById('row{{$pr->slug}}').style.display="none";
                    @endif
                    @endforeach
                    document.getElementById('tall').className='button blog__link';
                    document.getElementById('rowall').style.display="none";
                        break;
                @endforeach
                default:
                    @foreach($categorx as $proc)
                    document.getElementById('t{{$proc->slug}}').className='button blog__link';
                    document.getElementById('row{{$proc->slug}}').style.display="none";
                    @endforeach
                    document.getElementById('tall').className='button blog__link -active';
                    document.getElementById('rowall').style.display="block";
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

<!-- Modal Success Begin -->
<div id="modal-successRas" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal__content">
            <button type="button" class="close modal__close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&#10005;</span>
            </button>
            <div class="modal__success">
                <h2>Спасибо! Вы не пожалеете.</h2>
                <p>Вы подписались на нашу рассылку!</p>
            </div>
        </div>
    </div>
</div>
<!--/. Modal Success End -->

@include('layouts.childfooter')
