<section id="footer" class="py-4 bg-dark">

    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <h3 class="text-white mb-3">تواصل معنا</h3>
            </div>

            <div class="col-md-6 text-white">

                <p class="text-white m-0">
                    {!! setting('contact_us_text') !!}
                </p>

                <p style="font-size: 1.2rem;">تواصل معنا عن طريق</p>
                <a href="" class="text-white mx-2"><i class="fab fa-facebook text-white"></i></a>
                <a href="" class="text-white mx-2"><i class="fab fa-twitter text-white"></i></a>
                <a href="" class="text-white mx-2"><i class="fab fa-instagram text-white"></i></a>

                <p class="mt-2">copy rights reserved 2021</p>
            </div>

            <div class="col-md-6">
                <form method="post" action="{{ route('contact_us_requests.store') }}">
                    @method('post')
                    @csrf

                    <div class="form-group">
                        <input type="text" name="name" class="form-control" required id="" placeholder="@lang('contact_us_requests.name')">
                    </div>

                    <div class="form-group">
                        <input type="text" name="email" class="form-control" required placeholder="@lang('contact_us_requests.email')">
                    </div>

                    <div class="form-group">
                        <textarea name="message" class="form-control" required placeholder="@lang('contact_us_requests.message')"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary btn-block">ارسل</button>
                    </div>

                </form>
            </div>

        </div><!-- end of row -->

    </div><!-- end of container -->
</section>