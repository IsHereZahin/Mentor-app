@extends('website.layouts.app')
@section('content')
    <!-- top navbar -->
    @include('website.components.navbar')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
          <div class="container">
            <h2>About Us</h2>
            <p>{{$about->headdescription}}</p>
          </div>
        </div><!-- End Breadcrumbs -->
    @include('website.section.about')
        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">

              <div class="section-title">
                <h2>Testimonials</h2>
                <p>What are they saying</p>
              </div>

              <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">



                @foreach ($testimonial as $data=>$testimonial)
                  <div class="swiper-slide">
                    <div class="testimonial-wrap">
                      <div class="testimonial-item">
                        <img src="{{ asset('images/testimonial') }}/{{ $testimonial->image ?? ''}}" class="testimonial-img" alt="">
                        <h3>{{ $testimonial->name ?? ''}}</h3>
                        <h4>{{ $testimonial->title ?? ''}}</h4>
                        <p>
                          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                          {{ $testimonial->comment ?? ''}}
                          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->
                @endforeach

                {{--
                <div class="swiper-slide">
                    <div class="testimonial-wrap">
                      <div class="testimonial-item">
                        <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                        <h3>Sara Wilsson</h3>
                        <h4>Designer</h4>
                        <p>
                          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                          Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                      </div>
                    </div>
                </div><!-- End testimonial item -->
                --}}

                </div>
                <div class="swiper-pagination"></div>
              </div>




            </div>
          </section><!-- End Testimonials Section -->

        </main><!-- End #main -->
    @include('website.components.footer')

@endsection

