@extends("layouts.front.front-layout")
@section("main")
    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="/images/bg-2.jpeg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">
                                       Реестр зеленых насаждений города Шымкент
                                    </h1>
                                    <a href="" class="btn btn-primary py-sm-3 px-sm-4">Интерактивная карта насаждений</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="/images/bg-4.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">
                                        Создание здоровой и привлекательной окружающей среды
                                    </h1>
                                    <a href="" class="btn btn-primary py-sm-3 px-sm-4">Интерактивная карта насаждений</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Top Feature Start -->
    <div class="container-fluid top-feature py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 py-2 my-2 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-map text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>Интерактивная карта</h4>
                                <span>Просматривайте всю информацию о текущих насаждениях города не выходя из дома</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 py-2 my-2 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-tree text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>Большая база насаждений</h4>
                                <span>
                                    Узнайте какие насаждения присутствуют в городе
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 py-2 my-2 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-phone text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>Готовы ответить на ваши вопросы</h4>
                                <span>Остались вопросы? Задавайте мы ответим на них!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Feature End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-3 col-md-5 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" data-wow-delay="0.1s" src="/images/bg-1.jpg">
                </div>
                <div class="col-lg-6 col-md-7 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="display-1 text-primary mb-0">>100k</h1>
                    <p class="text-primary mb-4">Насаждений</p>
                    <h1 class="display-5 mb-4">Наша миссия</h1>
                    <p class="mb-4">
                        Наша миссия также включает планы развития зеленых насаждений города. Мы стремимся увеличить площадь парковых зон и садов, расширить зоны пешеходных аллей и велосипедных дорожек, а также создать вертикальные сады и крышные сады. Мы также осознаем важность повышения осведомленности горожан о значимости зеленых насаждений и активно проводим образовательные мероприятия и кампании.                    </p>
                    <a class="btn btn-primary py-3 px-4" href="">Напишите нам</a>
                </div>
                <div class="col-lg-3 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <i class="fas fa-laptop text-primary fa-3x mb-3"></i>
                                <h4 class="mb-3">Online</h4>
                                <span>На интерактивной карте вы можете узнать о насаждениях города</span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <i class="fa fa-users fa-3x text-primary mb-3"></i>
                                <h4 class="mb-3">Внесите свой вклад</h4>
                                <span>Будем строить зеленое будущее вместе</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-fluid facts my-5 py-5" data-parallax="scroll" data-image-src="/images/bg-5.jpg">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">1000000</h1>
                    <span class="fs-5 fw-semi-bold text-light">Насаждений</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">200</h1>
                    <span class="fs-5 fw-semi-bold text-light">Видов насаждений</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">100</h1>
                    <span class="fs-5 fw-semi-bold text-light">Команды</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">8</h1>
                    <span class="fs-5 fw-semi-bold text-light">Категорий</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->




    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Наши цели</p>
                <h1 class="display-5 mb-5">Над чем мы работаем</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="/images/service-1.jpg" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-tree-city fs-2"></i>
                            </div>
                            <h4 class="mb-3">Красивый вид</h4>
                            <p class="mb-4">
                                Зеленые насаждения города Шымкент: Создание здоровой и привлекательной окружающей среды
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded d-flex  h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="/images/service-2.jpg" alt="">
                        </div>
                        <div class="service-text rounded p-5" style="width: 100%">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-square-plus fs-2"></i>
                            </div>
                            <h4 class="mb-3">Экологическая выгода</h4>
                            <p class="mb-4">
                                <i class="fas fa-check text-green-500 px-1"></i>Улучшение качества воздуха<br>
                                <i class="fas fa-check text-green-500 px-1"></i>Снижение уровня шума<br>
                                <i class="fas fa-check text-green-500 px-1"></i>Создание приятной атмосферы<br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="/images/service-3.jpg" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-tree fs-2"></i>
                            </div>
                            <h4 class="mb-3">Разнообразие зеленых насаждений</h4>
                            <p class="mb-4">
                                <i class="fas fa-check text-green-500 px-1"></i>Парки и скверы <br>
                                <i class="fas fa-check text-green-500 px-1"></i>Аллеи и бульвары <br>
                                <i class="fas fa-check text-green-500 px-1"></i>Цветочные клумбы и розарии <br>
                                <i class="fas fa-check text-green-500 px-1"></i>Декоративные деревья и кустарники <br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="/images/service-4.jpg" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-seedling fs-2"></i>
                            </div>
                            <h4 class="mb-3">Создание преимуществ </h4>
                            <p class="mb-4">
                                <i class="fas fa-check text-green-500 px-1"></i>Создание уединенных зон для отдыха и релаксации <br>
                                <i class="fas fa-check text-green-500 px-1"></i>Поддержка биоразнообразия и экосистемы <br>
                                <i class="fas fa-check text-green-500 px-1"></i>Повышение физической активности и здоровья горожан <br>
                                <i class="fas fa-check text-green-500 px-1"></i>Снижение температуры в городской среде <br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="/images/service-5.jpg" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-laptop fs-2"></i>
                            </div>
                            <h4 class="mb-3">Зеленые технологии</h4>
                            <p class="mb-4">
                                <i class="fas fa-check text-green-500 px-1"></i>Регулярное обслуживание и уход за растениями <br>
                                <i class="fas fa-check text-green-500 px-1"></i>Правильный выбор видов растений и их расположение <br>
                                <i class="fas fa-check text-green-500 px-1"></i>Внедрение инновационных методов орошения и удобрения <br>
                                <i class="fas fa-check text-green-500 px-1"></i>Вовлечение сообщества и граждан в заботу о зеленых насаждениях <br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <i class="fa-solid fa-chart-line fs-2"></i>
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-mountain-city fs-2"></i>
                            </div>
                            <h4 class="mb-3">Планы развития зеленых насаждений города</h4>
                            <p class="mb-4">
                                <i class="fas fa-check text-green-500 px-1"></i>Увеличение площади парковых зон и садов <br>
                                <i class="fas fa-check text-green-500 px-1"></i>Повышение осведомленности о значимости зеленых насаждений <br>
                                <i class="fas fa-check text-green-500 px-1"></i>Будем строить зеленое будущее вместе <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Quote Start -->
    <div class="container-fluid quote my-5 py-5" data-parallax="scroll" data-image-src="/images/bg-6.jpg">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="bg-white rounded p-4 p-sm-5 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="display-5 text-center mb-5">Приглашаем вас стать частью зеленой программы нашего города</h1>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-light border-0" id="gname" placeholder="ФИО">
                                    <label for="gname">Ваше Имя</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control bg-light border-0" id="gmail" placeholder="Email">
                                    <label for="gmail">Email</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-light border-0" id="cname" placeholder="Телефон">
                                    <label for="cname">Ваш Телефон</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-light border-0" id="cage" placeholder="Тема">
                                    <label for="cage">Тема вашего сообщения</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control bg-light border-0" placeholder="Ваш текст" id="message" style="height: 100px"></textarea>
                                    <label for="message">Текст письма</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary py-3 px-4" type="submit">Отправить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->



    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Содействие</p>
                <h1 class="display-5 mb-5">Содействие и помощь в развитии</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded d-flex justify-content-center">
                        <img style="max-height: 200px" class="img-fluid" src="https://static.tildacdn.com/tild6338-3734-4365-a434-666461343839/_.png" alt="">
                        <div class="team-text">
                            <h6 class="mb-0">Министерство Экологии и Природных Ресурсов Казахстана</h6>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded d-flex justify-content-center">
                        <img style="max-height: 200px" class="img-fluid" src="https://yt3.googleusercontent.com/ytc/AL5GRJUCpfDphilgnBZO8nxW9P8r3_uFLlMXzTSNEuno=s900-c-k-c0x00ffffff-no-rj" alt="">
                        <div class="team-text">
                            <h6 class="mb-0">Жасыл Ел</h6>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded d-flex justify-content-center">
                        <img style="max-height: 200px" class="img-fluid" src="https://www.gov.kz/uploads/2020/2/5/a2771b439d27f513634fdbf9a2f12388_original.54774.png" alt="">
                        <div class="team-text">
                            <h6 class="mb-0">Акимат города Шымкент</h6>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="fs-5 fw-bold text-primary">Мнения</p>
                    <h1 class="display-5 mb-5">Мнение о нашей программе: Реестр зеленых насаждений города Шымкент</h1>
                    <p class="mb-4">
                        Программа нашей организации по продвижению зеленых насаждений для устойчивого развития города  вызывает интерес и привлекает внимание не только общественности, но и государственных деятелей, экспертов международных программ и отчественных организаций.
                        В этом блоге мы рассмотрим, какие отзывы и мнения высказывают  о нашей программе и ее значимости для города
                    </p>

                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item">
                            <img class="img-fluid rounded mb-3" src="https://flomaster.club/uploads/posts/2023-01/1673511804_flomaster-club-p-chelovek-v-kostyume-risunok-vkontakte-6.png" alt="">
                            <p class="fs-5">
                                Важность создания и развития зеленых насаждений для городской среды и благополучия населения признается многими государственными деятелями. Многие из них выражают свою поддержку и положительное отношение к нашей программе, основанной на принципах экологической устойчивости и заботы о здоровье горожан.
                            </p>
                            <h4>Эксперт 1</h4>
                            <span>Международный деятель программы</span>
                        </div>
                        <div class="testimonial-item">
                            <img class="img-fluid rounded mb-3" src="http://versia61.ru/assets/images/advokats/no-foto-women.jpg" alt="">
                            <p class="fs-5">
                                Важность создания и развития зеленых насаждений для городской среды и благополучия населения признается многими государственными деятелями. Многие из них выражают свою поддержку и положительное отношение к нашей программе, основанной на принципах экологической устойчивости и заботы о здоровье горожан.
                            </p>
                            <h4>Эксперт 2</h4>
                            <span>Международный деятель программы</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

@endsection
