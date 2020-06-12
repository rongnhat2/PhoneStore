<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Session;
use Hash;
use DB;

class GalleryController extends Controller
{
    private $gallery;

    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }


    public function index()
    {
        $gallery = $this->gallery->all();
        return view('admin.gallery.index', compact('gallery'));
    }

    public function create()
    {
        return view('admin.gallery.add');
    }

    public function store(Request $request){
    	try {
            DB::beginTransaction();

	        $image = $request->image;
        // dd($image);
	        foreach ($image as $key => $value) {
	            $imageitem = time() . $value->getClientOriginalName();
	        	// dd($imageitem);
	            $value->move(public_path('images'), $imageitem);
	            $this->gallery->create([
	                'image_url'               => 'images/'.$imageitem,
	                'image_name'              =>  $value->getClientOriginalName(),
	                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	            ]);
	        }

            Session::flash('success', 'Thêm Ảnh Thành Công');
            DB::commit();
            return redirect()->route('gallery.index');
        } catch (\Exception $exception) {
            // dd($exception);
            Session::flash('error', 'Đã Có Lỗi Sảy Ra');
            return redirect()->route('gallery.index');
            DB::rollBack();
        }
    }

    public function getLibrary()
    {
        $gallery = $this->gallery->all();
        return $gallery;
    }
}
