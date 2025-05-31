<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::query()
                ->select(['id', 'nama_kategori', 'keterangan'])
                ->latest();

            return DataTables::of($categories)
                ->addIndexColumn()
                ->addColumn('keterangan', function ($category) {
                    return $category->keterangan ?? 'Tidak ada keterangan';
                })
                ->addColumn('action', function ($category) {
                    $editUrl = route('edit_category', $category->id);
                    $showUrl = '';

                    return '
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-location"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.891 2.006l.106 -.006l.13 .008l.09 .016l.123 .035l.107 .046l.1 .057l.09 .067l.082 .075l.052 .059l.082 .116l.052 .096c.047 .1 .077 .206 .09 .316l.005 .106c0 .075 -.008 .149 -.024 .22l-.035 .123l-6.532 18.077a1.55 1.55 0 0 1 -1.409 .903a1.547 1.547 0 0 1 -1.329 -.747l-.065 -.127l-3.352 -6.702l-6.67 -3.336a1.55 1.55 0 0 1 -.898 -1.259l-.006 -.149c0 -.56 .301 -1.072 .841 -1.37l.14 -.07l18.017 -6.506l.106 -.03l.108 -.018z" /></svg> Aksi
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="' . $showUrl . '">Detail</a></li>
                                <li><a class="dropdown-item" href="' . $editUrl . '">Edit</a></li>
                            </ul>
                        </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return back();
    }
}
