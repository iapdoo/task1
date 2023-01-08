<?php

namespace App\Http\Controllers\Admin\Testimonial;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function ShowIndex(){
        $testimonials=Testimonial::all();
        return view('admin.Testimonial.index',compact('testimonials'));
    }
    public function destroy($id){
        $testimonials=Testimonial::find($id);
        $testimonials->delete();
        session()->flash('success','massage Deleted successful');
        return back();
    }
    public function changeStatus($testimonial_id)
    {
        try {
            $testimonial = Testimonial::find($testimonial_id);
            if (!$testimonial) {
                return redirect()->route('testimonial.showindex')->with(['error' => 'هذا المنتج غير موجود ']);
            }
            $active = $testimonial->status == 0 ? 1 : 0;
            $testimonial->update([$testimonial->status=$active]);
            return redirect()->route('testimonial.showindex')->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $exception) {
            return redirect()->route('testimonial.showindex')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
