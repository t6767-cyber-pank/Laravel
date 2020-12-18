@include('layouts.childheader')
<!-- App Main Begin -->
<main role="main" class="app__main">

    <!-- Reviews Begin -->
    <section class="reviews">
        <div class="container -offset">
            <div class="section-header pb-4">
                <ul class="breadcrumbs">
                    <li class="breadcrumbs__item">
                        <a href="/" class="breadcrumbs__link">Главная</a>
                    </li>
                    <li class="breadcrumbs__item">
                        Отзывы
                    </li>
                </ul>
                <div class="section-header__title pb-0">Отзывы</div>
            </div>
            <div class="row" vertical-gutter="30">
                @foreach($clientsvideo as $client)
                <div class="col-md-6">
                    <a href="javascript:void(0);" class="reviews__video js-video-modal" data-youtube-id="{{$client['videolink']}}">
                        <img src="/storage/{{$client['videoimage']}}" class="reviews__img" alt="{{$client['videotitle']}}">
                        <div class="reviews__video-cover">
                            <div class="reviews__title">{{$client['videotitle']}}</div>
                            <div class="reviews__subtitle">{!! $client['videodesc'] !!}</div>
                        </div>
                    </a>
                </div>
                    @endforeach
                    @php
                        $xCount=count($clientsvideo);
                        if($xCount<4) $styleShowMore="display: none;"; else $styleShowMore="";
                        if ($xCount>0) $end=end($clientsvideo)['id']; else $end=0;
                    @endphp
                <div id="end"></div>
            </div>
            <div id="butx">
                <script>
                    $(document).ready(function() {
                        $('.back-modal').on('click', function() {
                            $('.modal-video').hide();
                        });
                    });
                </script>
                <form>
                    <button type="button" onclick="ajaxReq('{{$end}}')" class="button reviews__button" style="{{$styleShowMore}}">Показать еще</button>
                </form>
            </div>
        </div>
    </section>
    <!--/. Reviews End -->
    <script>
        function ajaxReq(id) {
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/ajaxRequestRewues',
                data:{'id':id},
                success:function(data){
                    data=JSON.parse(data);
                    document.getElementById("end").insertAdjacentHTML('beforebegin', data[0]);
                    document.getElementById("butx").innerHTML=data[1];
                }
            });
        }
    </script>
</main>
<!--/. App Main End -->
@include('layouts.childfooter')
