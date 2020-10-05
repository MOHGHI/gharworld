<?php

namespace App\Http\Controllers\Frontend;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cities=City::get();
        return view('theme.home',compact('cities'));
    }
    public function search(LocationRequest $request)
    {
       if($request->type=="real-estate"){
        $properties=Property::where('type','!=','room')->where('city_id','=',$request->city_id)->paginate(21);
        return view('theme.search-result',compact('properties'));
       }
    if($request->type=="room"){
        $properties=Property::where('type','=','room')->where('city_id','=',$request->city_id)->paginate(21);
        return view('theme.search-result',compact('properties'));
    }
       
    }
}
