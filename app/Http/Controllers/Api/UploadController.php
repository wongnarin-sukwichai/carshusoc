<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Carbon;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('file');                                                 //ดึงไฟล์รูปภาพ 
        $manager = new ImageManager(new Driver());
        $thumbnail = $manager->read($image)->resize(319, 319);                           //Resize รูปภาพ
        $image_name = uniqid() . '.' . $image->getClientOriginalExtension();            //ตั้งชื่อใหม่ให้รูปภาพ / ข้างหลังคือการดึงชื่อนามสกุลไฟล์เดิมมาต่อท้าย

        $serv_path = "img/profiles/";                                                 //สร้าง Path สำหรับ save file 
        $serv_thumb = "img/profiles/thumbnails/";

        $chkPath = public_path($serv_path);                                             //public_path ตือ folder public
        $chkThumb = public_path($serv_thumb);

        if (!File::exists($chkPath)) File::makeDirectory($chkPath, 0777, true);         //Check ว่ามี folder ไหม ถ้าไม่มีให้สร้าง folder ขึ้นมาใหม่
        if (!File::exists($chkThumb)) File::makeDirectory($chkThumb, 0777, true);

        $image->move($chkPath, $image_name);                                           //ถ้าไม่ได้ resize ให้ใช้คำสั่ง move และ , พร้อมตั้งชื่อไฟล์
        $thumbnail->save($chkThumb . $image_name);                                     //ถ้า resize ให้ใช้ save และ

        return response()->json($image_name);
    }

    public function uploadContent(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('file');                                                 //ดึงไฟล์รูปภาพ 
        $manager = new ImageManager(new Driver());
        $thumbnail = $manager->read($image)->resize(319, 319);                           //Resize รูปภาพ
        $image_name = uniqid() . '.' . $image->getClientOriginalExtension();            //ตั้งชื่อใหม่ให้รูปภาพ / ข้างหลังคือการดึงชื่อนามสกุลไฟล์เดิมมาต่อท้าย

        $serv_path = "img/contents/";                                                 //สร้าง Path สำหรับ save file 
        $serv_thumb = "img/contents/thumbnails/";

        $chkPath = public_path($serv_path);                                             //public_path ตือ folder public
        $chkThumb = public_path($serv_thumb);

        if (!File::exists($chkPath)) File::makeDirectory($chkPath, 0777, true);         //Check ว่ามี folder ไหม ถ้าไม่มีให้สร้าง folder ขึ้นมาใหม่
        if (!File::exists($chkThumb)) File::makeDirectory($chkThumb, 0777, true);

        $image->move($chkPath, $image_name);                                           //ถ้าไม่ได้ resize ให้ใช้คำสั่ง move และ , พร้อมตั้งชื่อไฟล์
        $thumbnail->save($chkThumb . $image_name);                                     //ถ้า resize ให้ใช้ save และ

        return response()->json($image_name);
    }

    public function uploadComplete(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:doc,docx,xls,xlsx,pdf'
        ]);

        $file = $request->file('file');                                                 //ดึงไฟล์รูปภาพ 
        $file_name = uniqid() . '.' . $file->getClientOriginalExtension();            //ตั้งชื่อใหม่ให้รูปภาพ / ข้างหลังคือการดึงชื่อนามสกุลไฟล์เดิมมาต่อท้าย

        $date = Carbon::now()->format('Y/m/d');
        $serv_path = "files/completes/{$date}";                                                 //สร้าง Path สำหรับ save file 

        $chkPath = public_path($serv_path);                                             //public_path ตือ folder public

        if (!File::exists($chkPath)) File::makeDirectory($chkPath, 0777, true);         //Check ว่ามี folder ไหม ถ้าไม่มีให้สร้าง folder ขึ้นมาใหม่

        $file->move($chkPath, $file_name);                                           //ถ้าไม่ได้ resize ให้ใช้คำสั่ง move และ , พร้อมตั้งชื่อไฟล์

        return response()->json($file_name);
    }

    public function uploadWork(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:doc,docx,xls,xlsx,pdf'
        ]);

        $file = $request->file('file');                                                
        $file_name = uniqid() . '.' . $file->getClientOriginalExtension();            

        $date = Carbon::now()->format('Y/m/d');
        $serv_path = "files/works/{$date}";                                                

        $chkPath = public_path($serv_path);                                             

        if (!File::exists($chkPath)) File::makeDirectory($chkPath, 0777, true);        

        $file->move($chkPath, $file_name);

        return response()->json($file_name);
    }

    public function uploadPayment(Request $request)
    {

        $file = $request->file('file');                                                
        $file_name = uniqid() . '.' . $file->getClientOriginalExtension();            

        $date = Carbon::now()->format('Y/m/d');
        $serv_path = "files/payments/{$date}";                                                

        $chkPath = public_path($serv_path);                                             

        if (!File::exists($chkPath)) File::makeDirectory($chkPath, 0777, true);        

        $file->move($chkPath, $file_name);                                           

        return response()->json($file_name);
    }

    public function uploadCert(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,JPG,JPEG,png,PNG,pdf'
        ]);

        $file = $request->file('file');                                                
        $file_name = uniqid() . '.' . $file->getClientOriginalExtension();            

        $date = Carbon::now()->format('Y/m/d');
        $serv_path = "files/certs/{$date}";                                                

        $chkPath = public_path($serv_path);                                             

        if (!File::exists($chkPath)) File::makeDirectory($chkPath, 0777, true);        

        $file->move($chkPath, $file_name);                                           

        return response()->json($file_name);
    }

    public function uploadReceipt(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,JPG,JPEG,png,PNG,pdf'
        ]);

        $file = $request->file('file');                                                
        $file_name = uniqid() . '.' . $file->getClientOriginalExtension();            

        $date = Carbon::now()->format('Y/m/d');
        $serv_path = "files/receipts/{$date}";                                                

        $chkPath = public_path($serv_path);                                             

        if (!File::exists($chkPath)) File::makeDirectory($chkPath, 0777, true);        

        $file->move($chkPath, $file_name);                                           

        return response()->json($file_name);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
