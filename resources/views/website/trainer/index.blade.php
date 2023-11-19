@extends('website.layouts.app')
@section('content')
    <!-- top navbar -->
    @include('website.components.navbar')
    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
          <div class="container">
            <h2>Trainers</h2>
            <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
          </div>
        </div><!-- End Breadcrumbs -->

        @include('website.section.trainer')

      </main><!-- End #main -->
    @include('website.components.footer')

@endsection

