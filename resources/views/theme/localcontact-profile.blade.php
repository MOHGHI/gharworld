@extends('theme.client')
@section('main-content')
    <div class="my-5"></div>
    <div class="container-fluid">
        <!-- Search Result Section end -->
        <section class="search-result-section">
            <div class="container-fluid py-5">
                <div class="row my-3 py-5 justify-content-center"
                    style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);">

                    <div class="card shadow" style="width: 70rem;">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{$localcontact->image!=null ? asset('storage/' . $localcontact->image) : asset('assets/img/person-avatar.png')}}" class="img-thumbnail"
                                    alt="{{ $localcontact->name }}" style="width:100%; height:auto">
                            </div>
                            <div class="col-md-6 text-center font-weight-bold py-5 text-black">
                                <h2>{{ $localcontact->name }}</h2>
                                <h4 class="text-capitalize py-3">{{ $localcontact->profession->name}} </h4>
                                <h5><i class="fa fa-map-marker py-2"> </i> {{ $localcontact->city->name.", ".$localcontact->address_line }} </h5>
                                <h5><i class="fa fa-phone py-2" > </i><a href="tel:{{ $localcontact->contact}}" class=" text-dark"> {{ $localcontact->contact}}</a>  </h5>
                                <h5><i class="fa fa-envelope-o py-2 "> </i><a href="mailto:{{ $localcontact->email}}" class="text-dark"> {{ $localcontact->email}}</a></h5>
                                <h5><i class="fa fa-graduation-cap py-2"> </i>{{ $localcontact->qualification}}</a></h5>
                                <div class=" pl-md-2 text-left mr-4" style="height:180px; solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
                                    {!! $localcontact->about !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Search Result Section end -->
    </div>

    @include('theme.partials.pagefooter')
@endsection
