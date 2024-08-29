<?php

namespace App\Http\Controllers\Pustakawan\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Information\ImageRequest;
use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManagePopup extends Controller
{
    public function show_popup()
    {
        return view('pustakawan_views.image.popup', [
            'title' => 'Popup',
            'heading' => 'Popup',
            'popups' => Popup::orderBy('urutan_ke')->get()
        ]);
    }

    public function upload_popup(ImageRequest $request)
    {
        $validated_data = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/img/popup', $filename);
            $validated_data['popup_file'] = $filename;
            Popup::create($validated_data);
        }

        $this->log('Menambahkan gambar popup baru');
        return redirect()->back()->withSuccess('Gambar berhasil diupload!');
    }

    public function delete_popup($id)
    {
        $popup = Popup::findOrFail($id);
        $file_path = 'public/img/popup/' . $popup->popup_file;

        if (Storage::exists($file_path)) {
            Storage::delete($file_path);
        }

        $popup->delete();

        $this->log('Menghapus data gambar popup');
        return back()->withSuccess('Popup berhasil dihapus!');
    }
}
