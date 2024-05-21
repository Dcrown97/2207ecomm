<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Size;
use App\Models\Specification;
use App\Models\Tag;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ImageFacade;

class ProductsController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->search;
        if (null != $search && !empty($search)) {
            $products = Product::whereRaw('name LIKE \'%' . $search . '%\'')->paginate(20);
        } else {
            $products = Product::paginate(20);
        }
        $cats = Category::all();
        return view('products.index', ['products' => $products, 'categories' => $cats]);
    }

    public function add_size(Request $request)
    {
        $request->validate([
            'size' => 'required|integer',
            'cost_ngn' => 'required|integer',
            'cost_dol' => 'required|integer'
        ]);

        if (null == $request->id || empty($request->id)) $size = new Size();
        else $size = Size::find($request->id);

        $size->size = $request->size;
        $size->product_id = $request->product_id;
        $size->measure = $request->measure;
        $size->quantity = $request->quantity;
        $size->cost_ngn = $request->cost_ngn;
        $size->cost_dol = $request->cost_dol;
        if ($size->save()) {
            return back()->with('success', 'Size added successfully');
        } else {
            return back()->withInput()->with('failed', ['Data could not be saved! Please try again']);
        }
    }

    public function add_spec(Request $request)
    {
        $request->validate([
            'heading' => 'required|string'
        ]);

        if (null == $request->id || empty($request->id)) $spec = new Specification();
        else $spec = Specification::find($request->id);

        $spec->heading = $request->heading;
        $spec->product_id = $request->product_id;
        $spec->value = $request->value;
        if ($spec->save()) {
            return back()->with('success', 'Specification added successfully');
        } else {
            return back()->withInput()->with('failed', ['Data could not be saved! Please try again']);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:products',
            'category_id' => 'required|integer'
        ]);

        if (null == $request->id || empty($request->id)) $product = new Product();
        else $product = Product::find($request->id);

        $name = '';

        if (null !== $request->image && !empty($request->image)) {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $arr_ext = array('jpg', 'jpeg', 'png', 'gif');
            if (in_array($ext, $arr_ext)) {
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/img/products');
                $image->move($destinationPath, $name);
            } else {
                return back()->withInput()->with('errors', ['Invalid image format. We accept only JPG, JPEG, PNG and GIF files.']);
            }
        }


        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;

        if ($product->save()) {
            if (!empty($request->tags)) {
                if (null != $request->tags && !empty($request->tags)) {
                    $tags = explode(',', $request->tags);
                    for ($i = 0; $i < count($tags); $i++) {
                        $tag = Tag::where('name', $tags[$i])->first();
                        if (null == $tag || empty($tag)) {
                            $tag = new Tag();
                            $tag->name = $tags[$i];
                            $tag->save();
                        }
                        $product->tags()->sync($tag->id, false);
                    }
                }
                if (!empty($name)) {
                    $image = new Image();
                    $image->product_id = $product->id;
                    $image->file_path = $name;
                    $image->save();
                }
                return redirect()->route('view.product', $product->id)->with('success', 'Product Updated Successfully!');
            }
        } else {
            return back()->withInput()->with('failed', ['An error occurred and category not saved']);
        }
    }

    public function store_image(Request $request)
    {

        $image = new Image();

        if (null !== $request->image && !empty($request->image)) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $arr_ext = array('jpg', 'jpeg', 'png', 'gif');
            if (in_array($ext, $arr_ext)) {
                $name = $file->getClientOriginalName();
                $destinationPath = public_path('/img/products');
                $file->move($destinationPath, $name);
            } else {
                return back()->withInput()->with('failed', ['Invalid image format. We accept only JPG, JPEG, PNG and GIF files.']);
            }
        } else {
            return back()->withInput()->with('failed', ['You must upload an image']);
        }

        $image->product_id = $request->product_id;
        $image->file_path = $name;

        if ($image->save()) {
            return back()->with('success', 'Image added Successfully!');
        } else {
            return back()->with('failed', ['An error occurred and image could not save']);
        }
    }

    public function view($id = null)
    {
        if ($id == null) return back()->with('failed', ['Invalid URL!']);
        $products = Product::find($id);
        $tags = Tag::all();
        if ($products == null) return back()->with('failed', ['Product not found!']);
        return view('products.view', ['product' => $products, 'tags' => $tags]);
    }

    public function post($id = null)
    {
        if ($id == null) return back()->with('failed', ['Invalid URL!']);
        $products = Product::find($id);
        if ($products == null) return back()->with('failed', ['Product not found!']);
        if ($products->images->isEmpty())  return back()->with('failed', ['No Image not found! You must upload at least one picture of this product']);
        if ($products->sizes->isEmpty())  return back()->with('failed', ['No size/Price found! You must add product size and price']);
        $products->posted = 1;
        if ($products->save()) {
            return back()->with('success', 'Product posted Successfully!');
        } else {
            return back()->with('failed', ['An error occurred and product could not be posted!']);
        }
    }

    public function delete($id = null)
    {
        if ($id == null) return back()->with('failed', ['Invalid URL!']);
        $product = Product::find($id);
        foreach ($product->images as $image) {
            $image->delete();
        }
        foreach ($product->comments as $comment) {
            $comment->delete();
        }
        foreach ($product->reviews as $rev) {
            $rev->delete();
        }
        foreach ($product->sizes as $size) {
            $size->delete();
        }
        foreach ($product->specifications as $spec) {
            $spec->delete();
        }
        $product->delete();
        return redirect()->route('products')->with('success', 'Deleted Successfully');
    }

    public function delete_image($id = null)
    {
        if ($id == null) return back()->with('failed', ['Invalid URL!']);
        $image = Image::find($id);
        $image->delete();
        return back()->with('success', 'Deleted Successfully');
    }

    public function delete_size($id = null)
    {
        if ($id == null) return back()->with('failed', ['Invalid URL!']);
        $size = Size::find($id);
        $size->delete();
        return back()->with('success', 'Deleted Successfully');
    }

    public function delete_spec($id = null)
    {
        if ($id == null) return back()->with('failed', ['Invalid URL!']);
        $size = Specification::find($id);
        $size->delete();
        return back()->with('success', 'Deleted Successfully');
    }

    public function remove_tag($product_id = null, $tag_id)
    {
        if ($product_id == null || $tag_id == null) return back()->with('failed', ['Invalid URL!']);
        $product = Product::find($product_id);
        $product->tags()->detach($tag_id);
        return back()->with('success', 'Tag Removed Successfully');
    }

    public function add_tag(Request $request)
    {
        if (null == $request->product_id || empty($request->product_id)) return back()->with('failed', ['Something is terribly wrong here!']);
        if (null == $request->tags || empty($request->tags)) return back()->with('failed', ['you need to select tags first']);
        $product = Product::find($request->product_id);
        if ($product == null) return back()->with('failed', ['No such products found']);
        foreach ($request->tags as $tag) {
            $product->tags()->sync($tag, false);
        }
        return back()->with('success', 'Tag Added Successfully');
    }
}
