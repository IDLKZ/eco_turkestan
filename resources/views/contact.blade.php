@extends("layouts.front.front-layout")
@section("main")
    <!-- Quote Start -->
    <div class="container-fluid quote my-5 py-5" data-parallax="scroll" data-image-src="/images/bg-6.jpg">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7 my-2">
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
                <div class="col-lg-5 my-2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d94357.77327408775!2d69.58059553116401!3d42.34933655879392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38a91c1dfaac40e1%3A0x9da582dcd21a80bf!2z0JDQutC40LzQsNGCINCz0L7RgNC-0LTQsCDQqNGL0LzQutC10L3Rgg!5e0!3m2!1sen!2skz!4v1685462246634!5m2!1sen!2skz" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->
@endsection
