
    <div class="container">
        <h2 class=" price-head h1 uppercase head-border-center text-center">{{trans('partner.partner')}} </h2>
        <div class="row">
            @foreach($partners as $partner )
                <div class="col-lg-4">
<div class="main-partner">
                            <div class="partner">
                                <div class="partner-logo">
                                     <img src="{{asset( $partner-> logo)}}"  >
                                </div>
                            </div>


                            <div class="partner-head">
                               <h2>{{ $partner->name}}</h2>
                                <div class="partner-p">
                                    <ul class="list-unstyled confgration ">
                                        <li>
                                            <p>{{ $partner-> description }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
</div>

                </div>
            @endforeach
            <div class="clearfix"></div>
            <div class="align-content-center" style="text-align: center">

            </div>

        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="align-content-center text-center">
                    {{$partners->render()}}
                </div>
            </div>
        </div>
    </div>

