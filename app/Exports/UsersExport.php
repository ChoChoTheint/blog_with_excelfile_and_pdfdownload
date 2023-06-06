<?php

namespace App\Exports;

use App\Post;
use GuzzleHttp\Psr7\Request;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Post::select('id','title','description','email','file')->get();
    }
    public function map($posts): array
    {
        return [
            $posts->id,
            $posts->title,
            $posts->description,
            $posts->email,
            public_path('storage/file/' . $posts->file),
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Description',
            'Email',
            'Image',
        ];
}
}
