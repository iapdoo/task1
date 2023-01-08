<?php

namespace App\Http\Controllers\Users\Testimonial;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class TestimonialController extends Controller
{
    public function index(){
        return view('website.Testimonial.testimonial' );
    }
    public function create(TestimonialRequest $request){
        try {
            $data = $request->all();
//            return dd($request);
            $data['user_id']=auth()->user()->id;
            $data['opinion']= ['en' => $request->opinion_en, 'ar' => $request->opinion_ar];
            Testimonial::create($data);
            return redirect()->back()->with(['success'=>trans('massage.success')]);
        }catch (\Exception $exception){
            return $exception;
            return redirect()->back()->withErrors(['error'=>trans('massage.error')]);
        }

    }
}
