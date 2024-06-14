<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ImageFacade;

class CategoriesController extends Controller
{
    //
    public function index()
    {
        return view('categories.index', ['categories' => Category::all()]);
    }

    public function add()
    {
        return view('categories.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        if (isset($request->id)) $category = Category::find($request->id);
        else $category = new Category();

        if (null !== $request->image && !empty($request->image)) {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $arr_ext = array('jpg', 'jpeg', 'png', 'gif');
            if (in_array($ext, $arr_ext)) {
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/img/categories');
                $image->move($destinationPath, $name);
            } else {
                return back()->withInput()->with('errors', ['Invalid image format. We accept only JPG, JPEG, PNG and GIF files.']);
            }
        }

        // if (null !== $request->image && !empty($request->image)) {
        //     $image = $request->image;
        //     $ext = $image->getClientOriginalExtension();
        //     $arr_ext = array('jpg', 'jpeg', 'png', 'gif');

        //     if (in_array($ext, $arr_ext)) {
        //         $name = time() . '.' . $image->getClientOriginalExtension();
        //         $destinationPath = public_path('/img/categories');

        //         // Resize the image
        //         $img = ImageFacade::make($image->getRealPath());
        //         $img->resize(456, 273, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->save($destinationPath . '/' . $name);

        //         // Alternatively, you can move the original image without resizing
        //         // $image->move($destinationPath, $name);

        //     } else {
        //         return back()->withInput()->with('failed', ['Invalid image format. We accept only JPG, JPEG, PNG, and GIF files.']);
        //     }
        // }

        $category->name = $request->name;
        if (!empty($name)) $category->image = $name;
        if (null != $request->id && !empty($request->id)) $category->id = $request->id;

        if ($category->save()) {
            return redirect()->route('categories')->with('success', 'Category Created Successfully!');
        } else {
            return back()->with('failed', ['An error occurred and category not saved']);
        }
    }

    public function view($id = null)
    {
        if ($id == null) return back()->with('failed', ['Invalid URL!']);
        $category = Category::find($id);
        if ($category == null) return back()->with('failed', ['Category not found!']);
        return view('categories.view', ['category' => $category]);
    }

    public function delete($id = null)
    {
        if ($id == null) return back()->with('failed', ['Invalid URL!']);
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories')->with('success', 'Deleted Successfully');
    }
}
