<!-- Cta Begin -->
<section class="cta">
    <div class="container -offset">
        <div class="section-header">
            <div class="section-header__title">Сделать проект</div>
        </div>
        <form id="cta__form" class="cta__form" method="post" name="myForm" action="{{ url('/') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row align-items-center mb-md-4">
                <div class="col-md-6">
                    <div class="cta__label">Меня зовут: *</div>
                </div>
                <div class="col-md-6">
                    <div class="control">
                        <input type="text" name="name" class="control__input" value="" placeholder="Введите свое имя">
                    </div>
                </div>
            </div>
            <div class="row align-items-center mb-md-4">
                <div class="col-md-6">
                    <div class="cta__label">Я хочу заказать у вас: *</div>
                </div>
                <div class="col-md-6">
                    <div class="control">
                        <select class="jsSelectPicker" name="usluga" title="Разработку сайта">
                            @foreach($pageWeCanPosts as $postz)
                                <option value="{{$postz["title"]}}">{{$postz["title"]}}</option>
                            @endforeach
                        </select>
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
                    <div class="cta__label">Или позвоните по номеру:</div>
                </div>
                <div class="col-md-6">
                    <div class="control has-error">
                        <input type="text" id="phoneform1" name="telephone" oninput="proverkaPress(document.getElementById('phoneform1'), document.getElementById('emailform1'), document.getElementById('submitform1'))" class="control__input" placeholder="+7 ___ ___ __ __">
                    </div>
                </div>
            </div>
            <div class="row align-items-center mb-md-4">
                <div class="col-md-6">
                    <div class="cta__label">Также прикрепляю файл:</div>
                </div>
                <div class="col-md-6">
                    <div class="file-uploader">
                        <label class="file-uploader__label" id="fileform1show">Прикрепить файл</label>
                        <input type="file" id="formfile1" onchange="var filename = document.getElementById('formfile1').value.replace(/^.*[\\\/]/, ''); document.getElementById('fileform1show').innerHTML=filename; if(filename=='') document.getElementById('fileform1show').innerHTML='Прикрепить файл';" name="logo" accept=".jpg, .jpeg, .png, .doc, .docx, .xls, xlsx, .pdf" class="file-uploader__input">
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" id="submitform1" class="button -white cta__form-button">Обсудить</button>
                <div class="cta__form-desc">* Поля, обязательные для заполнения</div>
            </div>
        </form>
        <div class="cta__bottom">
            <p class="cta__bottom-left">{{setting('site.Copiright')}}</p>
            <p class="cta__bottom-right">{{setting('site.CopirightRight')}}</p>
        </div>
    </div>
</section>
<!--/. Cta End -->
<script>
    var emailpattern = /^[a-z0-9._-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i;
    var phonepatern = /^\+[7](\+)?([- _():=+]?\d[- _():=+]?){10,14}$/;
    var telPress=0;
    var emailPress=0;

    function ph(value) {
        var OK = phonepatern.exec(value);
        if (!OK) { return 0; }
        else { return 1; }
    }

    function ff(value) {
        var OK = emailpattern.exec(value);
        if (!OK) { return 0; } else { return 1; }
    }

    function proverkaPress(element, element1, element2) {
        telPress=ph(element.value);
        emailPress=ff(element1.value);
        if((telPress==1) && (emailPress==1)) element2.disabled = false; else element2.disabled = true;
    }
</script>
</main>
<!--/. App Main End -->

</div>
<!--/. App Wrapper End -->

</div>
<!--/. App End -->

<!-------------------------------- CONTENT ENDS HERE -------------------------------->

<!-- Modals Begin -->
<noindex>

    <!-- Modal Cta Begin -->
    <div id="modal-cta" class="modal -wide fade" tabindex="-1" role="dialog">
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
                            <form id="cta__form" class="cta__form" method="post" name="myForm" action="{{ url('/') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row align-items-center mb-md-4">
                                    <div class="col-md-6">
                                        <div class="cta__label">Меня зовут: *</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="control">
                                            <input type="text" name="name" class="control__input" value="" placeholder="Введите свое имя">
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-md-4">
                                    <div class="col-md-6">
                                        <div class="cta__label">Я хочу заказать у вас: *</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="control">
                                            <select class="jsSelectPicker" name="usluga" title="Разработку сайта">
                                                @foreach($pageWeCanPosts as $postz)
                                                    <option value="{{$postz["title"]}}">{{$postz["title"]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-md-4">
                                    <div class="col-md-6">
                                        <div class="cta__label">Напишите мне на: *</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="control">
                                            <input type="text" name="email" id="emailform2" oninput="proverkaPress(document.getElementById('phoneform2'), document.getElementById('emailform2'), document.getElementById('submitform2'))" class="control__input" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-md-4">
                                    <div class="col-md-6">
                                        <div class="cta__label">Или позвоните по номеру:</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="control has-error">
                                            <input type="text" id="phoneform2" name="telephone" oninput="proverkaPress(document.getElementById('phoneform2'), document.getElementById('emailform2'), document.getElementById('submitform2'))" class="control__input" placeholder="+7 ___ ___ __ __">
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-md-4">
                                    <div class="col-md-6">
                                        <div class="cta__label">Также прикрепляю файл:</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="file-uploader">
                                            <label class="file-uploader__label" id="fileform2show">Прикрепить файл</label>
                                            <input type="file" class="file-uploader__input" id="formfile2" onchange="var filename = document.getElementById('formfile2').value.replace(/^.*[\\\/]/, ''); document.getElementById('fileform2show').innerHTML=filename; if(filename=='') document.getElementById('fileform2show').innerHTML='Прикрепить файл';" name="logo" accept=".jpg, .jpeg, .png, .doc, .docx, .xls, xlsx, .pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="submitform2" class="button -white cta__form-button">Обсудить</button>
                                    <div class="cta__form-desc">* Поля, обязательные для заполнения</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/. Modal Cta End -->

    <!-- Modal Menu Begin -->
    <div id="modal-menu" class="modal -wide fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal__dialog" role="document">
            <div class="modal-content modal__content">
                <div class="container -offset modal__container">
                    <div class="modal__header">
                        <button type="button" class="modal__burger" data-dismiss="modal"></button>
                        <div class="modal__header-title">Меню</div>
                        <div class="modal__header-right">
                            <a href="#" class="button modal__header-button" data-target="#modal-cta" data-toggle="modal">Оставить заявку</a>
                            <div class="lang">
                                <a href="#" class="lang__link -active">Ru</a>
                                <a href="#" class="lang__link">En</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal__body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="modal__menu">
                                    <a href="/" class="modal__menu-link">Главная</a>
                                    <a href="/agency" class="modal__menu-link">Агентство</a>
                                    <a href="/allWeCan" class="modal__menu-link">Услуги</a>
                                    <a href="/Portfolio" class="modal__menu-link">Портфолио</a>
                                    <a href="/blog" class="modal__menu-link">Блог</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="modal__text">
                                    <h2>Ключевые компетенции</h2>
                                    <?php $projectcategorsx=DB::table('projectcategors')->where('showmemu', '>', 0)->get()->toArray(); ?>
                                    @foreach($projectcategorsx as $proj)
                                        <a href="/Portfolio#{{$proj->slug}}" style="font-size: 1.125rem; font-weight: 500; color: #fff;"><h3>{{$proj->title}}</h3></a>
                                    @endforeach
                                    <?php
                                    $servicesx=DB::table('services')->where("status", "PUBLISHED")->where('showmemu', '>', '0')->get()->toArray();
                                    ?>
                                    @foreach($servicesx as $proj)
                                        <a href="/allWeCan#{{$proj->slug}}" style="font-size: 1.125rem; font-weight: 500; color: #fff;"><h3>{{$proj->title}}</h3></a>
                                    @endforeach
                                </div>
                                <form action="/search" class="search modal__search">
                                    <input type="search" id="search1" class="search__input" name="value" placeholder="Поиск">
                                    <button type="submit" class="button search__button"></button>
                                </form>

                            </div>
                        </div>
                        <div class="modal__info">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="modal__submenu">
                                        <a href="#" class="modal__submenu-link">Контакты</a>
                                        <a href="/vacancy" class="modal__submenu-link">Вакансии</a>
                                        <a href="{{route('rewues')}}" class="modal__submenu-link">Отзывы</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="modal__phone">{{setting('contacts.telephone')}}</a>
                                    <div class="social modal__social">
                                        <a href="{{setting('site.facebook')}}" class="social__link">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="{{setting('site.instagramm')}}" class="social__link">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                        <a href="{{setting('site.vk')}}" class="social__link">
                                            <i class="fa fa-vk"></i>
                                        </a>
                                        <a href="{{setting('site.tweeterlink')}}" class="social__link">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="{{setting('site.youtobe')}}" class="social__link">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal__bottom">
                        <div class="modal__bottom-item">{{setting('site.Copiright')}}</div>
                        <div class="modal__bottom-item">{{setting('site.CopirightRight')}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/. Modal Menu End -->

    <!-- Modal Success Begin -->
    <div id="modal-success" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content modal__content">
                <button type="button" class="close modal__close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&#10005;</span>
                </button>
                <div class="modal__success">
                    <h2>Спасибо!</h2>
                    <p>Наш менеджер перезвонит Вам!</p>
                </div>
            </div>
        </div>
    </div>
    <!--/. Modal Success End -->

    <!-- Modal Iframe Begin -->
    <div id="iframe-modal" class="modal bm-modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <div class="bm-modal__embed">
                        <iframe class="bm-modal__embed-item jsBmEmbedItem" frameborder="0" src=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/. Modal Iframe End -->

</noindex>
<!--/. Modals End -->
<script>
    proverkaPress(document.getElementById('phoneform1'), document.getElementById('emailform1'), document.getElementById('submitform1'));
    proverkaPress(document.getElementById('phoneform2'), document.getElementById('emailform2'), document.getElementById('submitform2'));
</script>
<!-- Main scripts. You can replace it, but I recommend you to leave it here -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/childstatic/js/main.js"></script>
<script src="/childstatic/js/separate-js/scripts.js"></script>

</body>

</html>
