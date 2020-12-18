<!-- Footer Begin -->
<footer class="footer">
    <div class="container">
        <div class="footer__main">
            <div class="row" vertical-gutter="30">
                <div class="col-md-3 col-lg-2">
                    <a href="/"><img src="/storage/{{setting('site.logo')}}" alt="9OWEB"></a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="/" class="footer__link">Главная</a>
                    <a href="/agency" class="footer__link">Агентство</a>
                    <a href="/allWeCan" class="footer__link">Услуги</a>
                    <a href="/Portfolio" class="footer__link">Портфолио</a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="/blog" class="footer__link">Блог</a>
                    <a href="/vacancy" class="footer__link">Вакансии</a>
                    <a href="{{route('rewues')}}" class="footer__link">Отзывы</a>
                    <a href="#" class="footer__link">Контакты</a>
                </div>
                <div class="col-md-3 col-lg-3">
                    <a href="tel:{{setting('contacts.telephone')}}" class="footer__link">{{setting('contacts.telephone')}}</a>
                    <a href="mailto:{{  setting('contacts.mail') }}" class="footer__link">{{  setting('contacts.mail') }}</a>
                    <div class="social">
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
                    <form action="/search" class="search modal__search">
                        <input type="search" id="search1" oninput="searcher('search1', 'search2')" name="value" class="search__input" placeholder="Поиск">
                        <button type="submit" class="button search__button"></button>
                    </form>
                </div>
                <div class="col-md-3 d-none d-lg-block">
                    <button type="button" class="footer__map bmd-modalButton" data-toggle="modal" data-bmdSrc="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d726.6567200729929!2d76.90668762922029!3d43.23828199869613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x388369300f80f817%3A0x843ca8aed6cb2197!2sAiz%20Ex!5e0!3m2!1sru!2skz!4v1583492601301!5m2!1sru!2skz"
                            data-bmdWidth="600" data-bmdHeight="450" data-target="#iframe-modal">
                        <img src="/storage/{{setting('contacts.sitemapimage')}}" alt="9OWEB">
                    </button>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <p class="footer__left">{{setting('site.Copiright')}}</p>
            <p class="footer__right">{{setting('site.CopirightRight')}}</p>
        </div>
    </div>
</footer>
<!--/. Footer End -->

</div>
<!--/. App Wrapper End -->

</div>
<!--/. App End -->

<!-------------------------------- CONTENT ENDS HERE -------------------------------->
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
                                                @php
                                                    $pageWeCanPosts= DB::table('services')->where("status", "PUBLISHED")->get()->toArray();
                                                @endphp
                                                @foreach($pageWeCanPosts as $postz)
                                                    <option value="{{$postz->title}}">{{$postz->title}}</option>
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
                                    @php
                                        $projectcategorsx=DB::table('projectcategors')->where('showmemu', '>', 0)->get()->toArray();
                                    @endphp
                                    @foreach($projectcategorsx as $proj)
                                        <a href="/Portfolio#{{$proj->slug}}" style="font-size: 1.125rem; font-weight: 500; color: #fff;"><h3>{{$proj->title}}</h3></a>
                                    @endforeach
                                    <?php
                                    $servicesx=DB::table('services')->where("status", "PUBLISHED")->where('showmemu', '>', 0)->get()->toArray();
                                    ?>
                                    @foreach($servicesx as $proj)
                                        <a href="/allWeCan#{{$proj->slug}}" style="font-size: 1.125rem; font-weight: 500; color: #fff;"><h3>{{$proj->title}}</h3></a>
                                    @endforeach
                                </div>
                                <form class="search modal__search" action="/search">
                                    <input type="search" oninput="searcher('search2', 'search1')" id="search2" name="value" class="search__input" placeholder="Поиск">
                                    <button type="submit" class="button search__button"></button>
                                </form>
                            </div>
                        </div>
                        <div class="modal__info">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="modal__submenu">
                                        <a href="#" class="modal__submenu-link">Контакты</a>
                                        <a href="/vacancy" class="modal__submenu-link">Вакансии</a>
                                        <a href="{{route('rewues')}}" class="modal__submenu-link">Отзывы</a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <a href="tel:{{setting('contacts.telephone')}}" class="modal__phone">{{setting('contacts.telephone')}}</a>
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
                        <iframe class="bm-modal__embed-item js-iframe-video" frameborder="0" src=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/. Modal Iframe End -->

    <!-- Video Modal Begin -->
    <div class="video-modal">
        <div class="video-modal__content">
            <iframe class="video-modal__iframe" width="100%" height="100%" frameborder="0" allowfullscreen src=></iframe>
            <a href="#" class="video-modal__close">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="24" height="24">
                    <path fill="currentColor" d="M30.3448276,31.4576271 C29.9059965,31.4572473 29.4852797,31.2855701 29.1751724,30.980339 L0.485517241,2.77694915 C-0.122171278,2.13584324 -0.104240278,1.13679247 0.52607603,0.517159487 C1.15639234,-0.102473494 2.17266813,-0.120100579 2.82482759,0.477288136 L31.5144828,28.680678 C31.9872448,29.1460053 32.1285698,29.8453523 31.8726333,30.4529866 C31.6166968,31.0606209 31.0138299,31.4570487 30.3448276,31.4576271 Z"></path>
                    <path fill="currentColor" d="M1.65517241,31.4576271 C0.986170142,31.4570487 0.383303157,31.0606209 0.127366673,30.4529866 C-0.12856981,29.8453523 0.0127551942,29.1460053 0.485517241,28.680678 L29.1751724,0.477288136 C29.8273319,-0.120100579 30.8436077,-0.102473494 31.473924,0.517159487 C32.1042403,1.13679247 32.1221713,2.13584324 31.5144828,2.77694915 L2.82482759,30.980339 C2.51472031,31.2855701 2.09400353,31.4572473 1.65517241,31.4576271 Z"></path>
                </svg>
            </a>
        </div>
        <div class="video-modal__overlay"></div>
    </div>
    <!--/. Video Modal End -->

</noindex>
<!--/. Modals End -->
<script>
    proverkaPress(document.getElementById('phoneform2'), document.getElementById('emailform2'), document.getElementById('submitform2'));
</script>

<script>
    function searcher(id1, id2) {
        document.getElementById(id2).value=document.getElementById(id1).value
    }
</script>
<!-- Main scripts. You can replace it, but I recommend you to leave it here -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/childstatic/js/main.js"></script>
<script src="/childstatic/js/separate-js/scripts.js"></script>

</body>

</html>
