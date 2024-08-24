<?php

namespace App\Http\Controllers\Pustakawan\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\Information\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ManageCreateArticle extends Controller
{
    public function show_create_article()
    {
        return view('pustakawan_views.informasi.buat-artikel', [
            'title' => 'Buat Artikel',
            'heading' => 'Buat Artikel'
        ]);
    }

    public function post_article(ArticleRequest $request)
    {
        $validated_data = $request->validated();
        $user = auth()->user();
        $validated_data['author_id'] = $user->id;
        $validated_data['penulis'] = $user->nama;

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('img/thumbnail', $fileName, 'public');
            $validated_data['thumbnail'] = $fileName;
        }

        Article::create($validated_data);
        return back()->withSuccess('Berhasil membuat artikel baru');
    }
}
