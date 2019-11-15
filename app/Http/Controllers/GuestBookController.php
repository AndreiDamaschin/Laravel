<?php
namespace App\Http\Controllers;
use App\GuestBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class GuestBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("guestBook.edit", ['text' => GuestBook::latest()->paginate(25), 'count' => GuestBook::count()]);
    }

    public function text(Request $request)
    {
        if($request->hasFile('attach')) 
        {
            $image = $request -> file('attach');
            $filename = $image -> getClientOriginalName();
            $image_resize = Image::make($image -> getRealPath());     
            if($image_resize->width() > 500 || $image_resize->height() > 500)
               if(($difference = $image_resize->width() / $image_resize->height()) >= 1)       
                  $image_resize -> resize(500, 500 / $difference);
               else
                  $image_resize -> resize(500 / ($image_resize->height() / $image_resize->width()), 500);
            $image_resize -> save($path = public_path('attach' .$filename));
        }
        else
           $path = '';
         
       GuestBook::create(['mess' => $request -> id ? $request -> id : '0', 'email' => $request -> email, 'text' => $request -> text, 'attach' => $path]);
       return view("guestBook.edit", ['text' => GuestBook::latest()->paginate(25), 'count' => GuestBook::count()]);
    }

    public function download($path)
    {
        return response()->download();
    }
}
