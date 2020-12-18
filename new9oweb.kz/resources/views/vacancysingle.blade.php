@include('layouts.childheader')
<!-- App Main Begin -->
<main role="main" class="app__main">

    <!-- Vacancy Begin -->
    <section class="vacancy-single">
        <div class="container -offset">
            <div class="section-header">
                <ul class="breadcrumbs">
                    <li class="breadcrumbs__item">
                        <a href="/" class="breadcrumbs__link">Главная</a>
                    </li>
                    <li class="breadcrumbs__item">
                        <a href="/vacancy" class="breadcrumbs__link">Вакансии</a>
                    </li>
                    <li class="breadcrumbs__item">
                        {{$post->title}}
                    </li>
                </ul>
                <div class="section-header__title">{{$post->title}}</div>
            </div>
            <div class="vacancy-single__items">
                <div class="vacancy-single__item">
                    <div class="row" vertical-gutter="20">
                        <div class="col-sm-4">
                            <div class="vacancy-single__title">Чем предстоит заниматься:</div>
                        </div>
                        <div class="col-sm-8">
                            <div class="vacancy-single__text">
                                {!! $post->blok1 !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vacancy-single__item">
                    <div class="row" vertical-gutter="20">
                        <div class="col-sm-4">
                            <div class="vacancy-single__title">Что потребуется:</div>
                        </div>
                        <div class="col-sm-8">
                            <div class="vacancy-single__text">
                                {!! $post->blok2 !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vacancy-single__item">
                    <div class="row" vertical-gutter="20">
                        <div class="col-sm-4">
                            <div class="vacancy-single__title">Условия работы:</div>
                        </div>
                        <div class="col-sm-8">
                            <div class="vacancy-single__text">
                                {!! $post->blok3 !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vacancy-single__item">
                    <div class="row" vertical-gutter="20">
                        <div class="col-sm-4">
                            <div class="vacancy-single__title">Будет плюсом, если:</div>
                        </div>
                        <div class="col-sm-8">
                            <div class="vacancy-single__text">
                                {!! $post->blok4 !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cta-banner">
                <div class="cta-banner__left">
                    <div class="cta-banner__title">Напишите нам</div>
                    <a href="#" class="cta-banner__email" data-target="#modal-ctaVacancy" data-toggle="modal">{{setting('contacts.vacancyemail')}}</a>
                </div>
                <a href="#" class="button cta-banner__button" data-target="#modal-ctaVacancy" data-toggle="modal">Оставить заявку</a>
            </div>
        </div>
    </section>
    <!--/. Vacancy End -->
    <!-- Modal Cta Begin2 -->
    <div id="modal-ctaVacancy" class="modal -wide fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal__dialog" role="document">
            <div class="modal-content modal__content">
                <div class="container -offset modal__container">
                    <div class="modal__header">
                        <button type="button" class="modal__burger" data-dismiss="modal"></button>
                        <div class="modal__header-title">Заявка</div>
                        <div class="modal__header-right">
                            <div class="lang">
                                <a href="#" class="lang__link -active">Ru</a>
                                <a href="#" class="lang__link">En</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal__body">
                        <div class="cta modal__cta">
                            <form id="cta__form" class="cta__form" method="post" name="myForm" action="{{ url('/vacancy') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row align-items-center mb-md-4">
                                    <div class="col-md-6">
                                        <div class="cta__label">Меня зовут: *</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="control">
                                            <input type="text" name="name" class="control__input" value="" placeholder="Введите свое имя">
                                            <input type="hidden" name="idvac" value="{{$post->id}}">
                                            <input type="hidden" name="mailvac" value="{{setting('contacts.vacancyemail')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-md-4">
                                    <div class="col-md-6">
                                        <div class="cta__label">Я хочу работать у вас: *</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="control">
                                            <input type="text" name="usluga" class="control__input" value="{{$post->title}}" readonly placeholder="Введите свое имя">
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-md-4">
                                    <div class="col-md-6">
                                        <div class="cta__label">Напишите мне на: *</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="control">
                                            <input type="text" name="email" id="emailform1" oninput="proverkaPress(document.getElementById('phoneform1'), document.getElementById('emailform1'), document.getElementById('submitform1'))" class="control__input" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-md-4">
                                    <div class="col-md-6">
                                        <div class="cta__label">Или позвоните мне по номеру:</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="control has-error">
                                            <input type="text" id="phoneform1" name="telephone" oninput="proverkaPress(document.getElementById('phoneform1'), document.getElementById('emailform1'), document.getElementById('submitform1'))" class="control__input" placeholder="+7 ___ ___ __ __">
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-md-4">
                                    <div class="col-md-6">
                                        <div class="cta__label">Также прикрепляю резюме:</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="file-uploader">
                                            <label class="file-uploader__label" id="fileform1show">Прикрепить файл</label>
                                            <input type="file" class="file-uploader__input" id="formfile1" onchange="var filename = document.getElementById('formfile1').value.replace(/^.*[\\\/]/, ''); document.getElementById('fileform1show').innerHTML=filename; if(filename=='') document.getElementById('fileform1show').innerHTML='Прикрепить файл';" name="logo" accept=".jpg, .jpeg, .png, .doc, .docx, .xls, xlsx, .pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="submitform1" class="button -white cta__form-button">Обсудить</button>
                                    <div class="cta__form-desc">* Поля, обязательные для заполнения</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/. Modal Cta End2 -->
</main>
<!--/. App Main End -->
@include('layouts.childfooter')
<script>
    proverkaPress(document.getElementById('phoneform1'), document.getElementById('emailform1'), document.getElementById('submitform1'));
</script>
