
    <!-- Main content -->
    <div class="app-content content">
        <div class="content-wrapper" style="margin: auto">

            <section class="content">
                <div id="test" class="testim">
                    <div class="t-overlay">

                        <div class="container">
                            <h2 class="special-hiding special-hidingh">{{trans('admin.What_Our_Clinets_Say')}}</h2>
                            <div class="slider">
                                <div class="active">
                                    <q>{{trans('admin.Clinets_one')}}</q>
                                    <p>Ibrahim </p>
                                </div>
                                @foreach($Testimonials as $Testimonial)
                                <div>
                                    <q>{{$Testimonial->opinion}}</q>
                                    <p>{{$Testimonial->user->name}}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!--    end testimonial-->
                <!-- /.row -->
            </section>
        </div>
    </div>



