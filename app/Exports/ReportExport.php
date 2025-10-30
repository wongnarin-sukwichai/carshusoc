<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ReportExport implements FromCollection, WithHeadings
{
    private $start;
    private $end;
    private $section_id;

    public function setData(string $start, string $end, int $section_id)
    {
        $this->start = $start;
        $this->end = $end;
        $this->section_id = $section_id;
        return $this;
    }

    public function collection()
    {

        $data = DB::table('enrolls')
            ->where('enrolls.section_id', $this->section_id)
            ->whereBetween('enrolls.created_at', [
                Carbon::parse($this->start)->startOfDay(),
                Carbon::parse($this->end)->endOfDay()
            ])
            ->join('contents', 'enrolls.content_id', 'contents.id')
            ->join('sections', 'enrolls.section_id', 'sections.id')
            ->join('users', 'enrolls.user_id', 'users.id')
            ->select(
                'enrolls.id',
                'enrolls.scoreTest',
                'enrolls.created_at',
                'contents.title AS content_title',
                'contents.short_name',
                'sections.title AS section_title',
                'sections.start',
                'sections.end',
                'sections.examdate',
                'sections.examtime',
                'sections.meet',
                'users.name',
                'users.surname',
                'users.email',
                'enrolls.pay',
                'enrolls.tag',
                'enrolls.other',
                'enrolls.comment',
            )
            ->orderBy('id', 'DESC')
            ->get();

        return $data;
    }

    public function headings(): array
    {
        return [
            'รหัสรายการ',
            'คะแนนสอบ',
            'วันที่',
            'หมวดหมู่',
            'ชื่อย่อ',
            'กิจกรรม',
            'วันเริ่มกิจกรรม',
            'วันสิ้นสุด',
            'วันที่สอบ/อบรม',
            'เวลาที่สอบ/อบรม',
            'สถานที่นัดหมาย',
            'ชื่อ',
            'นามสกุล',
            'อีเมล',
            'ค่าใช่บริการ',
            'ค่าไปรษณีย์',
            'ความคิดเห็นเจ้าหน้าที่',
            'ความคิดเห็นผู้ใช้บริการ',
        ];
    }
}
