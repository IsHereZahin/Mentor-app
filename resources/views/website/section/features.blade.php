    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">

          <div class="row" data-aos="zoom-in" data-aos-delay="100">

            @foreach ($features as $feature)
            <div class="col-lg-3 col-md-4">
                <div class="icon-box">
                  <i class="{{ $feature->classname }}" style="color: {{ $feature->color }};"></i>
                  <h3><a href="">{{ $feature->name }}</a></h3>
                </div>
              </div>
            @endforeach

          </div>

        </div>
    </section><!-- End Features Section -->
