<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Carbon;

use App\Models\Cert;
use App\Models\Enroll;
use App\Models\Canva;
use App\Models\Score;

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
        // $data = Enroll::find($id);

        $data = DB::table('enrolls')
            ->where('enrolls.id', $id)
            ->join('users', 'enrolls.user_id', 'users.id')
            ->join('sections', 'enrolls.section_id', 'sections.id')
            ->select(
                'enrolls.*',
                'users.name',
                'users.surname',
                'sections.title',
                'sections.start',
                'sections.end'
            )
            ->first();

        // ✅ ถ้าไม่เจอข้อมูลเลย
        if (!$data || $data->certTrain == null) {
            return response()->json([
                'message' => 'Certificate not found.'
            ], 404);
        }

        $temp = Canva::where('id', $data->canva_id)->first()->pic;
        $res = public_path('/img/certs/' . $temp);

        $image = (new ImageManager(new Driver()))->read($res);

        $image->text($data->name . '  ' . $data->surname, 550, 620, function ($font) {
            $font->file(public_path('fonts/FCIconicRegular.ttf'));
            $font->size(140);
            $font->align('left');
            $font->valign('top');
            $font->color('#D0872E');
        });

        // หลักสูตร
        if ($data->canva_id == 3) {
            $image->text('"' . $data->title . '"', 500, 835, function ($font) {
                $font->file(public_path('fonts/FCIconicRegular.ttf'));
                $font->size(45);
                $font->color('#D0872E');
                $font->align('left');
                $font->valign('top');
            });
        } else {
            $image->text('"' . $data->title . '"', 500, 835, function ($font) {
                $font->file(public_path('fonts/FCIconicRegular.ttf'));
                $font->size(45);
                $font->color('#D0872E');
                $font->align('left');
                $font->valign('top');
            });
        }

        // ระหว่างวันที่
        $image->text(Carbon::parse($data->start)->format('j F Y') . ' - ' . Carbon::parse($data->end)->format('j F Y'), 950, 890, function ($font) {
            $font->file(public_path('fonts/FCIconicRegular.ttf'));
            $font->size(40);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
        });

        // ให้ไว้วันที่
        $image->text(Carbon::parse($data->send)->format('j F Y'), 900, 930, function ($font) {
            $font->file(public_path('fonts/FCIconicRegular.ttf'));
            $font->size(40);
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

    public function certTest(string $id)
    {
        $data = DB::table('enrolls')
            ->where('enrolls.id', $id)
            ->join('users', 'enrolls.user_id', 'users.id')
            ->join('sections', 'enrolls.section_id', 'sections.id')
            ->select(
                'enrolls.*',
                'users.name',
                'users.surname',
                'sections.title',
                'sections.start',
                'sections.examdate'
            )
            ->first();

        // ✅ ถ้าไม่เจอข้อมูลเลย
        if (!$data || $data->certTest == null) {
            return response()->json([
                'message' => 'Certificate not found.'
            ], 404);
        }

        $total = $data->listen + $data->reading + $data->conver + $data->grammar;

        $code = Score::where('setscore', $data->setScore)->get();

        foreach($code As $r) {
            if ($total >= $r->ept_start && $total <= $r->ept_end) {
                $result = $r->cefr;
                break;
            }
        }

        $temp = Canva::where('id', $data->canva_id)->first()->pic;
        $res = public_path('/img/certs/' . $temp);

        $image = (new ImageManager(new Driver()))->read($res);

        $image->text($data->name . '  ' . $data->surname, 250, 575, function ($font) {
            $font->file(public_path('fonts/FCIconicRegular.ttf'));
            $font->size(40);
            $font->align('left');
            $font->valign('top');
            $font->color('#000000');
        });

        // วันที่สอบ
        $image->text(Carbon::parse($data->examdate)->format('j F Y'), 250, 655, function ($font) {
            $font->file(public_path('fonts/FCIconicRegular.ttf'));
            $font->size(40);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
        });

         // listen
        $image->text($data->listen, 950, 920, function ($font) {
            $font->file(public_path('fonts/FCIconicRegular.ttf'));
            $font->size(40);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
        });

         // reading
        $image->text($data->reading, 950, 1005, function ($font) {
            $font->file(public_path('fonts/FCIconicRegular.ttf'));
            $font->size(40);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
        });

         // conver
        $image->text($data->conver, 950, 1090, function ($font) {
            $font->file(public_path('fonts/FCIconicRegular.ttf'));
            $font->size(40);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
        });

         // grammar
        $image->text($data->grammar, 950, 1175, function ($font) {
            $font->file(public_path('fonts/FCIconicRegular.ttf'));
            $font->size(40);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
        });

         // total
        $image->text($total, 950, 1250, function ($font) {
            $font->file(public_path('fonts/FCIconicRegular.ttf'));
            $font->size(40);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
        });

         // CEFR
        $image->text($result, 950, 1335, function ($font) {
            $font->file(public_path('fonts/FCIconicRegular.ttf'));
            $font->size(40);
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
