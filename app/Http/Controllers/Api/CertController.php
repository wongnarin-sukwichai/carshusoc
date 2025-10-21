<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use App\Models\Cert;
use App\Models\Enroll;
use App\Models\Canva;

class CertController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Cert::where('enroll_id', $id)->get();

        return response()->json($data);
    }

    public function showCert()
    {
        $data = DB::table('enrolls')
            ->where('enrolls.user_id', Auth::user()->id)
            // ->where('enrolls.status', '2')
            ->join('contents', 'enrolls.content_id', 'contents.id')
            ->join('sections', 'enrolls.section_id', 'sections.id')
            ->join('users', 'enrolls.user_id', 'users.id')
            ->select(
                'enrolls.*',
                'contents.title AS content_title',
                'contents.short_name',
                'sections.event_id',
                'sections.title',
                'users.email',
                'users.pic',
                'users.name',
                'users.surname'
            )
            ->orderBy('id', 'DESC')
            ->paginate(5);

        return response()->json($data);
    }

    public function certTrain(string $id)
    {
        $data = Enroll::find($id);

        // ✅ ถ้าไม่เจอข้อมูลเลย
        if (!$data || $data->certTrain == null) {
            return response()->json(404);
        }

        $res = public_path('/img/certs/cert-1.png');

        $image = (new ImageManager(new Driver()))->read($res);

        // เขียนข้อความ
        $image->text('The quick brown fox', 120, 100, function ($font) {
            $font->size(36);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
        });

        // ส่งไฟล์ออกเป็น response
        $png = $image->encodeByExtension('png');

        return response($png, 200, [
            'Content-Type'        => 'image/png',
            'Content-Disposition' => 'attachment; filename="certificate.png"',
        ]);
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
