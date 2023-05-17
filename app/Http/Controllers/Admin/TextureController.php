<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use App\TextureSubCategory;
use App\Http\Controllers\Controller;
use App\Texture;
use App\Package;
use App\MainTexture;
use App\FabricPattern;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class TextureController extends Controller
{
    //
    public function create()
    {
        return view('admin.categories.texture.create');
    }

    public function store_texture(Request $request)
    {
      logger("ininin");
        logger($request->all());


        foreach($request->images as $image)
        {
                $manager = new ImageManager(['driver' => 'imagick']);
                $photo = $image->hashName();
                $path = 'assets/images/categories/texture/'. $photo;
                $manager->make($image)
                ->resize(500,500)
                ->save(public_path($path));
                // start old store file
                // $photo = $image;

                // $name = $photo->getClientOriginalName();

                // $photo->move(public_path() . '/assets/images/categories/texture/', $name);

                // $photo = $name;
                // end old store file

        }
        if(!empty($request->images[1]))
        {
            logger("no");
            $photo2 = $request->images[1]->hashName();

        }
        else
        {
            logger("has");
            $photo2 = null;

        }
        if(!empty($request->images[2]))
        {
            logger("no");
            $photo3 = $request->images[2]->hashName();

        }
        else
        {
            logger("has");
            $photo3 = null;

        }
        if(!empty($request->images[3]))
        {
            logger("no");
            $photo4 = $request->images[3]->hashName();

        }
        else
        {
            logger("has");
            $photo4 = null;

        }
        if(!empty($request->images[4]))
        {
            logger("no");
            $photo5 = $request->images[4]->hashName();

        }
        else
        {
            logger("has");
            $photo5 = null;

        }
        if(!empty($request->images[5]))
        {
            logger("no");
            $photo6 = $request->images[5]->hashName();

        }
        else
        {
            logger("has");
            $photo6 = null;

        }
        if(!empty($request->images[6]))
        {
            logger("no");
            $photo7 = $request->images[6]->hashName();

        }
        else
        {
            logger("has");
            $photo7 = null;

        }

        if(!empty($request->images[7]))
        {
            logger("no");
            $photo8 = $request->images[7]->hashName();

        }
        else
        {
            logger("has");
            $photo8 = null;

        }
        if(!empty($request->images[8]))
        {
            logger("no");
            $photo9 = $request->images[8]->hashName();

        }
        else
        {
            logger("has");
            $photo9 = null;

        }
        if(!empty($request->images[9]))
        {
            logger("no");
            $photo10 = $request->images[9]->hashName();

        }
        else
        {
            logger("has");
            $photo10 = null;

        }
        if($request->wstatus == 'true')
        {
            logger("wwww");
            $crating = 0;
            $wrating = $request->rating;
        }
        if($request->cstatus == 'true')
        {
            logger("cccc");
            $crating = $request->rating;
            $wrating = 0;
        }
        logger($wrating);
        logger($crating);
        logger("whate");
        $texture = Texture::create([
            'name' => $request->name,
            'main_texture_id' => $request->main_id,
            'sub_category_id' => $request->sub_id,
            'price' =>$request->price,
            'photo_one' => $request->images[0]->hashName(),
            'photo_two' => $photo2,
            'photo_three' => $photo3,
            'photo_four' => $photo4,
            'photo_five' => $photo5,
            'photo_six' => $photo6,
            'photo_seven' => $photo7,
            'photo_eight' => $photo8,
            'photo_nine' => $photo9,
            'photo_ten' => $photo10,
            'made_in' => $request->made_in,
            'composition' => $request->composition,
            'color_id' => $request->color_id,
            'softness' => $request->softness,
            'description' => $request->description,
            'warm_rating' => $wrating,
            'cool_rating' => $crating,
            'threating' => $request->threat,
            'pattern_id' => $request->pattern_id,
            'package_id' => $request->package_id
        ]);
        return response()->json("success");
        logger("outttttt");
    }

    public function list(){
        $textures= Texture::all();
        return view('admin.categories.texture.list',['textures' => $textures]);
    }

    public function edit_texture_data($id)
    {
        // dd($id);
        $texture_id = $id;
        return view('admin.categories.texture.edit',compact('texture_id'));
    }

    public function get_edit_texture_data(Request $request)
    {
        logger($request->id);
        $textures = Texture::find($request->id);
            logger($textures);
            return response()->json([
                'textures' => $textures
            ]);
    }
    public function store_edit_texture_data(Request $request)
    {
        logger($request->all());
        $edit_texture = Texture::find($request->texture_id);
        $edit_texture->name = $request->name;
        $edit_texture->price = $request->price;
        $edit_texture->main_texture_id = $request->main_id;
        $edit_texture->sub_category_id = $request->sub_id;

        $edit_texture->made_in = $request->made_in;
        $edit_texture->color_id = $request->color;
        $edit_texture->composition = $request->composition;
        $edit_texture->softness = $request->softness;
        $edit_texture->description = $request->description;
        $edit_texture->threating = $request->threat;
        $edit_texture->pattern_id = $request->pattern_id;
        $edit_texture->package_id = $request->package_id;


        if($request->wstatus == 'true')
        {
            logger("wwww");
            $crating = 0;
            $wrating = $request->rating;
        }
        if($request->cstatus == 'true')
        {
            logger("cccc");
            $crating = $request->rating;
            $wrating = 0;
        }
        $edit_texture->warm_rating = $wrating;
        $edit_texture->cool_rating = $crating;
        if($request->remove_count > 0)
        {
            if($request->remove_count == 1)
            {
                if($request->photo1 == 'null')
                {
                    $edit_texture->photo_one = null;
                }
                elseif($request->photo2 == 'null')
                {
                    $edit_texture->photo_two = null;
                }
                elseif($request->photo3 == 'null')
                {
                    $edit_texture->photo_three = null;

                }
                elseif($request->photo4 == 'null')
                {
                    $edit_texture->photo_four = null;

                }

                elseif($request->photo5 == 'null')
                {
                    $edit_texture->photo_five = null;

                }
                elseif($request->photo6 == 'null')
                {
                    $edit_texture->photo_six = null;

                }
                elseif($request->photo7 == 'null')
                {
                    $edit_texture->photo_seven = null;

                }
                elseif($request->photo8 == 'null')
                {
                    $edit_texture->photo_eight = null;

                }
                elseif($request->photo9 == 'null')
                {
                    $edit_texture->photo_nine = null;

                }
                elseif($request->photo10 == 'null')
                {
                    $edit_texture->photo_ten = null;

                }
            }
            elseif($request->remove_count > 1)
            {
                logger("delete one more");
                for($i=0;$i<$request->remove_count;$i++)
                {
                    if($request->photo1 == 'null')

                    {
                        logger("ONE");
                            $edit_texture->photo_one = null;
                        $i++;
                    }

                    if($request->photo2 == 'null')

                    {
                        logger("TWO");
                            $edit_texture->photo_two = null;
                        $i++;
                    }

                    if($request->photo3 == 'null')

                    {

                            $edit_texture->photo_three = null;
                        $i++;
                    }

                    if($request->photo4 == 'null')

                    {

                            $edit_texture->photo_four = null;
                        $i++;
                    }

                    if($request->photo5 == 'null')
                    {

                            $edit_texture->photo_five = null;
                        $i++;
                    }
                    if($request->photo6 == 'null')
                    {

                            $edit_texture->photo_six = null;
                        $i++;
                    }
                    if($request->photo7 == 'null')
                    {

                            $edit_texture->photo_seven = null;
                        $i++;
                    }
                    if($request->photo8 == 'null')
                    {

                            $edit_texture->photo_eight = null;
                        $i++;
                    }
                    if($request->photo9 == 'null')
                    {

                            $edit_texture->photo_nine = null;
                        $i++;
                    }
                    if($request->photo10 == 'null')
                    {

                            $edit_texture->photo_ten = null;
                        $i++;
                    }
                }
            }
        }

        if($request->upload_count > 0)
        {

        if($request->images != null)
        {
        foreach($request->images as $image)
        {
            $photo = $image;

            $name = $photo->getClientOriginalName();

            $photo->move(public_path() . '/assets/images/categories/texture/', $name);

            $photo = $name;


        }

        if(count($request->images) == 1)
        {
            logger("okok");
            if($request->photo1 == 'null')
            {
                logger("okokokok");
                $edit_texture->photo_one = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo2 == 'null')
            {
                $edit_texture->photo_two = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo3 == 'null')
            {
                $edit_texture->photo_three = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo4 == 'null')
            {
                $edit_texture->photo_four = $request->images[0]->getClientOriginalName();

            }

            elseif($request->photo5 == 'null')
            {
                $edit_texture->photo_five = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo6 == 'null')
            {
                $edit_texture->photo_six = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo7 == 'null')
            {
                $edit_texture->photo_seven = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo8 == 'null')
            {
                $edit_texture->photo_eight = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo9 == 'null')
            {
                $edit_texture->photo_nine = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo10 == 'null')
            {
                $edit_texture->photo_ten = $request->images[0]->getClientOriginalName();

            }
        }
        if(count($request->images) > 1)
        {
            for($i=0;$i<count($request->images);$i++)
            {
                if($request->photo1 == 'null' && !empty($request->images[$i]))

                {
                    logger("ONE");
                        $edit_texture->photo_one = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

                if($request->photo2 == 'null' && !empty($request->images[$i]))

                {
                    logger("TWO");
                        $edit_texture->photo_two = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

                if($request->photo3 == 'null' && !empty($request->images[$i]))

                {

                        $edit_texture->photo_three = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

                if($request->photo4 == 'null' && !empty($request->images[$i]))

                {

                        $edit_texture->photo_four = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

                if($request->photo5 == 'null' && !empty($request->images[$i]))
                {

                        $edit_texture->photo_five = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo6 == 'null' && !empty($request->images[$i]))
                {

                        $edit_texture->photo_six = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo7 == 'null' && !empty($request->images[$i]))
                {

                        $edit_texture->photo_seven = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo8 == 'null' && !empty($request->images[$i]))
                {

                        $edit_texture->photo_eight = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo9 == 'null' && !empty($request->images[$i]))
                {

                        $edit_texture->photo_nine = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo10 == 'null' && !empty($request->images[$i]))
                {

                        $edit_texture->photo_ten = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

            }
        }
    }
}
        $edit_texture->save();
        return response()->json("success");
    }
    public function delete_texture_data(Request $request)
    {
        // dd($request->texture_id);
        $texture = Texture::find($request->texture_id)->delete();
        return response()->json("success");
    }
    public function show_add_main_texture()
    {
        return view('admin.main_texture.create');
    }
    public function show_main_texture_list()
    {
        $textures = MainTexture::all();
        return view('admin.main_texture.list',compact('textures'));
    }
    public function store_main_texture_data(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('add_main_texture')
                        ->withErrors($validator)
                        ->withInput();
        }

        MainTexture::create([
            'name' => $request->name,
        ]);
        alert("Successfully Added!");
        return redirect()->route('main_texture_list');
    }
    public function delete_main_texture_data(Request $request)
    {
        $texture = MainTexture::find($request->texture_id)->delete();
        return response()->json("success");
    }
    public function update_main_texture_data(Request $request,$id)
    {
        // dd($request->all());
        $main = MainTexture::find($id);
        $main->name = $request->name;
        $main->save();
        return  back();

    }
    // Texture Sub
    public function show_add_main_texture_sub()
    {
        $main_texture = MainTexture::all();
        return view('admin.texture_subcategory.create',compact('main_texture'));
    }
    public function show_main_texture_sub_list()
    {
        $textures = TextureSubCategory::all();
        $mains = MainTexture::all();
        return view('admin.texture_subcategory.list',compact('textures','mains'));
    }
    public function store_main_texture_sub_data(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'main_texture_id' => 'required|not_in:0'
        ]);
        if ($validator->fails()) {
            return redirect('add_main_texture_sub')
                        ->withErrors($validator)
                        ->withInput();
        }

        TextureSubCategory::create([
            'main_texture_id' => $request->main_texture_id,
            'name' => $request->name,
        ]);
        alert("Successfully Added!");
        return redirect()->route('main_texture_sub_list');
    }
    public function delete_main_texture_sub_data(Request $request)
    {
        $texture = TextureSubCategory::find($request->texture_sub_id)->delete();
        return response()->json("success");
    }
    public function update_main_texture_sub_data(Request $request,$id)
    {
        // dd($request->all());
        $main = TextureSubCategory::find($id);
        $main->main_texture_id = $request->main_texture_id;
        $main->name = $request->name;
        $main->save();
        return  back();

    }
    public function get_main_texture_data()
    {
        $main_textures = MainTexture::all();
        // dd($main_textures);
        logger("Main Texture Data");
        // logger($main_textures);
        return response()->json([
            'main_textures' => $main_textures
        ]);
    }
    public function get_main_texture_sub_data(Request $request)
    {
        logger($request->main_id);
        $subcate = TextureSubCategory::where('main_texture_id',$request->main_id)->get();
        return response()->json([
            'main_textures_sub' => $subcate
        ]);
    }
    public function get_main_texture_sub_all_data()
    {
        $sub_all = TextureSubCategory::all();
        return response()->json([
            'main_textures_sub' => $sub_all
        ]);
    }
    public function increase_count_texture_data(Request $request)
    {
        $texture = Texture::find($request->grand_id);
        $texture->popular_count +=1;
        $texture->save();
        $test = Texture::orderBy('popular_count', 'desc')->get();
        logger($test);
        return response()->json([
            'textures' => $texture
        ]);
    }
    public function create_fabric_pattern_data()
    {
      $textures = TextureSubCategory::all();
      $mains = MainTexture::all();
      return view('admin.pattern.create',compact('textures','mains'));
    }
    public function get_sub_data_ajax_data(Request $request)
    {
      // dd($request->category_id);
        $subs = TextureSubCategory::where('main_texture_id',$request->category_id)->get();
        // dd($subs);
        return response()->json([
          "subs" => $subs
        ]);
    }
    public function store_fabric_pattern_data(Request $request)
    {
      // dd($request->all());
      $validator = Validator::make($request->all(), [
        'pattern' => 'required',
        'main_texture_id' => 'required|not_in:0',
        'sub_category_id' => 'required|not_in:0'
    ]);
    if ($validator->fails()) {
        return redirect('create_fabric_pattern')
                    ->withErrors($validator)
                    ->withInput();
    }
      $pattern = FabricPattern::create([
        'main_texture_id' => $request->main_texture_id,
        'sub_category_id' => $request->sub_category_id,
        'name' => $request->pattern
      ]);
      return redirect()->route('show_fabric_pattern');
    }
    public function show_fabric_pattern_data()
    {
      $patterns = FabricPattern::all();
      $subs = TextureSubCategory::all();
      $mains = MainTexture::all();
      return view('admin.pattern.list',compact('patterns','subs','mains'));
    }
    public function delete_fabric_pattern_data(Request $request)
    {
      $delete = FabricPattern::find($request->pattern_id)->delete();
      return response()->json("success");
    }
    public function update_fabric_pattern_data(Request $request,$id)
    {
      // dd($id);
      $update = FabricPattern::find($id);
      $update->main_texture_id = $request->main_texture_id;
      $update->sub_category_id = $request->sub_category_id;
      $update->name = $request->pattern;
      $update->save();
      return back();
    }
    public function get_pattern_sub_data(Request $request)
    {
      logger("pattern for");
      logger($request->sub_id);
      $patterns = FabricPattern::where('sub_category_id',$request->sub_id)->get();
      return response()->json([
        'patterns' => $patterns
      ]);
    }
    public function get_pattern_all_data()
    {
      $patterns = FabricPattern::all();
      return response()->json([
        'patterns' => $patterns
      ]);
    }
    public function get_package_data()
    {
      $packages = Package::all();
      return response()->json([
        'packages' => $packages
      ]);
    }
    public function get_swiper_photo_texture_data(Request $request)
    {
      $textures = Texture::find($request->texture_id);
      $textures->popular_count +=1;
      $textures->save();

      return response()->json([
          'textures' => $textures
      ]);
    }
}
