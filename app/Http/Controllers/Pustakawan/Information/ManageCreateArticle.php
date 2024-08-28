<?php

namespace App\Http\Controllers\Pustakawan\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\Information\ArticleRequest;
use App\Http\Requests\Information\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageCreateArticle extends Controller
{
    public function show_create_article()
    {
        return view('pustakawan_views.informasi.buat-artikel', [
            'title' => 'Buat Artikel',
            'heading' => 'Buat Artikel'
        ]);
    }

    public function show_my_article()
    {
        return view('pustakawan_views.informasi.artikel-saya', [
            'title' => 'Artikel Saya',
            'heading' => 'Artikel Saya',
            'articles' => Article::where('author_id', auth()->user()->id)->get()
        ]);
    }

    public function show_edit_article($id)
    {
        $article = Article::findOrFail($id);
        return view('pustakawan_views.informasi.edit-artikel', [
            'title' => 'Edit Artikel',
            'heading' => 'Edit Artikel',
            'data' => $article
        ]);
    }

    // Logical Backend Here...

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
        $this->log('Membuat artikel baru milik-nya');
        return back()->withSuccess('Berhasil membuat artikel baru.');
    }

    public function update_article(UpdateArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $user = auth()->user();

        $validated_data = $request->validated();
        $validated_data['author_id'] = $user->id;
        $validated_data['penulis'] = $user->nama;

        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete('img/thumbnail/' . $article->thumbnail);

            $fileName = uniqid() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->storeAs('img/thumbnail', $fileName, 'public');
            $validated_data['thumbnail'] = $fileName;
        }

        $article->update($validated_data);

        $this->log('Memperbarui artikel milik-nya');
        return back()->withSuccess('Berhasil memperbarui artikel.');
    }


    public function delete_article($id)
    {
        $article = Article::findOrFail($id);

        if ($article->thumbnail) {
            Storage::disk('public')->delete('img/thumbnail/' . $article->thumbnail);
        }

        $article->delete();

        $this->log('Menghapus artikel milik-nya');
        return back()->withSuccess('Berhasil menghapus artikel');
    }
}
