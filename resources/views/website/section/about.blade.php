    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                    <img src="{{ asset('images/about') }}/{{ $about->image ?? ''}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3>{{ $about->title ?? ''}}</h3>
                    <p class="fst-italic">{{ $about->description ?? ''}}</p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i>{{ $about->title1 ?? ''}}</li>
                        <li><i class="bi bi-check-circle"></i>{{ $about->title2 ?? ''}}</li>
                        <li><i class="bi bi-check-circle"></i>{{ $about->title3 ?? ''}}</li>
                    </ul>
                    <p>{{ $about->description1 ?? ''}}</p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->
          <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
        <div class="container">

          <div class="row counters">

            <div class="col-lg-3 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Students</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
              <p>Courses</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
              <p>Events</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
              <p>Trainers</p>
            </div>

          </div>

        </div>
      </section><!-- End Counts Section -->
