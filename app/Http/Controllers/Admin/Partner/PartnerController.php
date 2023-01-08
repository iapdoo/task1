<?php

namespace App\Http\Controllers\Admin\Partner;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function index()
    {
        $partners=Partner::all();
        return view('Admin.Partner.index',compact('partners'));
    }
    public function create()
    {
        return view('Admin.Partner.create');
    }

    public function store(PartnerRequest $request)
    {
        try {
            if ($request->has('logo')) {
                $filePath = UploadImage('partners', $request->logo);
            }
            $partner=new Partner();
            $partner->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $partner->description = ['en' => $request->description_en, 'ar' => $request->description_ar];
            $partner->logo = $filePath;
            $partner->save();
            return redirect()->route('Partner.index')->with(['success'=>trans('massage.success')]);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['error'=>trans('massage.error')]);
        }
    }
    public function edit($partner_id)
    {
        try {
            $partners=Partner::find($partner_id);
            if (!$partners){
                return redirect()->back()->withErrors(['error'=>trans('massage.error')]);
            }else{
                return view('Admin.Partner.edit',compact('partners' ));
            }

        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['error'=>trans('massage.error')]);
        }
    }


    public function update(PartnerRequest $request, $partner_id)
    {
        try {
            $partners=Partner::find($partner_id);

            if (!$partners){
                return redirect()->back()->withErrors(['error'=>trans('massage.no')]);
            }else{
                    if (!$request->has('status')) {
                        $request->request->add(['status' => false]);
                    } else {
                        $request->request->add(['status' => true]);
                    }
                $partners->update([
                    $partners->name = ['en' => $request->name_en, 'ar' => $request->name_ar],
                    $partners->description = ['en' => $request->description_en, 'ar' => $request->description_ar],
                    $partners->status = $request->status,
                ]);
                if ($request->has('logo')) {
                    $filePath = UploadImage('partners', $request->logo);
                    File::delete($partners->logo);

                    $partners->update([
                        $partners->logo = $filePath,
                    ]);
                }
                return redirect()->route('Partner.index')->with(['success'=>trans('massage.update')]);
            }
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['error'=>trans('massage.error')]);
        }
    }
    public function destroy($partner_id)
    {
        try {
            $partner = Partner::find($partner_id);
            if (!$partner) {
                return redirect()->back()->withErrors(['error'=>trans('massage.no')]);
            }

            $deleteImage= Str::after($partner->logo,'images/') ;
            $deleteImage=base_path('public/images/'.$deleteImage);
            unlink($deleteImage);
            $partner->delete();
            return redirect()->route('Partner.index')->with(['success'=>trans('massage.delete')]);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error'=>trans('massage.error')]);
        }
    }
}
