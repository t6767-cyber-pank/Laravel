@include('layouts.childheader')
<!-- App Main Begin -->
<main role="main" class="app__main">

    <!-- Vacancy List Begin -->
    <section class="vacancy-list">
        <div class="container -offset">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a href="/" class="breadcrumbs__link">Главная</a>
                </li>
                <li class="breadcrumbs__item">
                    Вакансии
                </li>
            </ul>
            <div class="section-header">
                <div class="section-header__title">Вакансии</div>
            </div>
            @foreach($vacancy as $vacan)
            <a href="vacancy/{{$vacan['ttt']}}" class="vacancy-list__item">
                <div class="row" vertical-gutter="10">
                    <div class="col-sm-6">
                        <div class="vacancy-list__title">{{$vacan['title']}}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="vacancy-list__text">{{$vacan['category']}}</div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </section>
    <!--/. Vacancy List End -->

</main>
<!--/. App Main End -->
@include('layouts.childfooter')
