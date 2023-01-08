<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Testimonial;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $categories=Category::orderBy('id','desc')->simplePaginate(3);
        $products=Product::where('quantity','>',0)->paginate(6);
        $partners=Partner::where('status',true)->paginate(6);
        $Testimonials=Testimonial::where('status',true)->paginate(6);
        return view('website.index',compact( 'categories','products','partners','Testimonials'));
    }
    public function logout(Request $request)
    {
        try {
            auth()->guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('message.something_wrong'));
        }
    }
}
