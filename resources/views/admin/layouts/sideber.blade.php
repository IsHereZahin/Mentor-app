    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav" class="pt-4">
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.hero')}}" aria-expanded="false"><i class="fas fa-bookmark"></i><span class="hide-menu">Hero</span></a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-align-left"></i><span class="hide-menu">About manage </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="{{ route('dashboard.about') }}" class="sidebar-link"><i class="fas fa-info"></i><span class="hide-menu"> About</span></a></li>
                            <li class="sidebar-item"><a href="{{ route('dashboard.testimonial.index') }}" class="sidebar-link"><i class="fas fa-quote-left"></i><span class="hide-menu"> Testimonial</span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.features.index')}}" aria-expanded="false"><i class="fas fa-list"></i><span class="hide-menu">Features</span></a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.courses.index')}}" aria-expanded="false"><i class="fas fa-folder"></i><span class="hide-menu">Courses</span></a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.trainer.index')}}" aria-expanded="false"><i class="fa fa-user-md"></i><span class="hide-menu">Trainers</span></a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.event.index')}}" aria-expanded="false"><i class="fa fa-folder"></i><span class="hide-menu">Events</span></a>
                    </li>

                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
