<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Texture;
use App\ReadyToWear;
use App\Style_Category;
use Intervention\Image\ImageManager;

class ReadyController extends Controller
{
    //
    public function get_ready_to_wear_data()
    {
      $readys = ReadyToWear::all();
      return view('admin.readytowear.list',compact('readys'));
    }
    public function create_ready_to_wear_data(Request $request)
    {
      // dd($request->all());


      return view('admin.readytowear.create');
    }
    public function get_grand_texture_data(Request $request)
    {
        // dd($request->all());
        $grands = Texture::where('sub_category_id',$request->sub_id)->get();
        return response()->json([
         'textures' => $grands
        ]);
    }
    public function store_ready_to_wear_data(Request $request)
    {
      logger($request->all());
      foreach($request->images as $image)
      {
              $manager = new ImageManager(['driver' => 'imagick']);
              $photo = $image->hashName();
              $path = 'assets/images/categories/ready/'. $photo;
              $manager->make($image)
              ->resize(1920,1080)
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

      $texture = ReadyToWear::create([
          'name' => $request->name,
          'main_texture_id' => $request->main_id,
          // 'sub_texture_id' => $request->sub_id,
          'price' =>$request->price,
          'photo_one' => $request->images[0]->hashName(),
          'photo_two' => $photo2,
          'photo_three' => $photo3,
          'photo_four' => $photo4,
          'photo_five' => $photo5,
          // 'texture_id' => $request->texture_id,
          'style_id' => $request->style_id,
          'description' => $request->description,
          // 'package_id' => $request->package_id,
          'stock_qty' => $request->stock_qty,
          'made_in' => $request->made_in,
          'composition' => $request->composition,
          'softness' => $request->softness,
      ]);
      return response()->json("success");
    }
    public function edit_ready_to_wear_data(Request $request,$id)
    {
        // dd($id);
        $ready_id = $id;
        return view('admin.readytowear.edit',compact('ready_id'));
    }
    public function get_edit_ready_to_wear_data(Request $request)
    {
        // dd($request->id);
        logger($request->id);
        $readys = ReadyToWear::find($request->id);
            return response()->json([
                'readys' => $readys
            ]);
    }
    public function get_main_texture_from_ready_data()
    {
      $main_textures = MainTexture::all();
      // dd($main_textures);
      logger("Main Texture Data");
      // logger($main_textures);
      return response()->json([
          'main_textures' => $main_textures
      ]);
    }
    public function get_grand_texture_all_data()
    {
      $textures = Texture::all();
      return response()->json([
        'grand_textures' => $textures
    ]);
    }
    public function store_edit_ready_to_wear_data(Request $request)
    {
      logger($request->all());
              $edit_rdw = ReadyToWear::find($request->ready_id);
              $edit_rdw->name = $request->name;
              $edit_rdw->price = $request->price;
              $edit_rdw->main_texture_id = $request->main_id;
              // $edit_rdw->sub_texture_id = $request->sub_id;
              // $edit_rdw->texture_id = $request->texture_id;
              $edit_rdw->style_id = $request->style_id;
              $edit_rdw->description = $request->description;
              $edit_rdw->package_id = $request->package_id;

              $edit_rdw->made_in = $request->made_in;
              $edit_rdw->composition = $request->composition;
              $edit_rdw->softness = $request->softness;
              if($request->remove_count > 0)
              {
                  if($request->remove_count == 1)
                  {
                      if($request->photo1 == 'null')
                      {
                          $edit_rdw->photo_one = null;
                      }
                      elseif($request->photo2 == 'null')
                      {
                          $edit_rdw->photo_two = null;
                      }
                      elseif($request->photo3 == 'null')
                      {
                          $edit_rdw->photo_three = null;

                      }
                      elseif($request->photo4 == 'null')
                      {
                          $edit_rdw->photo_four = null;

                      }

                      elseif($request->photo5 == 'null')
                      {
                          $edit_rdw->photo_five = null;

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
                                  $edit_rdw->photo_one = null;
                              $i++;
                          }

                          if($request->photo2 == 'null')

                          {
                              logger("TWO");
                                  $edit_rdw->photo_two = null;
                              $i++;
                          }

                          if($request->photo3 == 'null')

                          {

                                  $edit_rdw->photo_three = null;
                              $i++;
                          }

                          if($request->photo4 == 'null')

                          {

                                  $edit_rdw->photo_four = null;
                              $i++;
                          }

                          if($request->photo5 == 'null')
                          {

                                  $edit_rdw->photo_five = null;
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
                  $manager = new ImageManager(['driver' => 'imagick']);
                  $photo = $image->hashName();
                  $path = 'assets/images/categories/ready/'. $photo;
                  $manager->make($image)
                  ->resize(1920,1080)
                  ->save(public_path($path));
                  // $photo = $image;

                  // $name = $photo->getClientOriginalName();

                  // $photo->move(public_path() . '/assets/images/categories/ready/', $name);

                  // $photo = $name;


              }

              if(count($request->images) == 1)
              {
                  logger("okok");
                  if($request->photo1 == 'null')
                  {
                      logger("okokokok");
                      $edit_rdw->photo_one = $request->images[0]->hashName();

                  }
                  elseif($request->photo2 == 'null')
                  {
                      $edit_rdw->photo_two = $request->images[0]->hashName();

                  }
                  elseif($request->photo3 == 'null')
                  {
                      $edit_rdw->photo_three = $request->images[0]->hashName();

                  }
                  elseif($request->photo4 == 'null')
                  {
                      $edit_rdw->photo_four = $request->images[0]->hashName();

                  }

                  elseif($request->photo5 == 'null')
                  {
                      $edit_rdw->photo_five = $request->images[0]->hashName();

                  }

              }
              if(count($request->images) > 1)
              {
                  for($i=0;$i<count($request->images);$i++)
                  {
                      if($request->photo1 == 'null' && !empty($request->images[$i]))

                      {
                          logger("ONE");
                              $edit_rdw->photo_one = $request->images[$i]->hashName();
                          $i++;
                      }

                      if($request->photo2 == 'null' && !empty($request->images[$i]))

                      {
                          logger("TWO");
                              $edit_rdw->photo_two = $request->images[$i]->hashName();
                          $i++;
                      }

                      if($request->photo3 == 'null' && !empty($request->images[$i]))

                      {

                              $edit_rdw->photo_three = $request->images[$i]->hashName();
                          $i++;
                      }

                      if($request->photo4 == 'null' && !empty($request->images[$i]))

                      {

                              $edit_rdw->photo_four = $request->images[$i]->hashName();
                          $i++;
                      }

                      if($request->photo5 == 'null' && !empty($request->images[$i]))
                      {

                              $edit_rdw->photo_five = $request->images[$i]->hashName();
                          $i++;
                      }

                  }
              }
          }
      }
              $edit_rdw->save();
              return response()->json("success");
    }
    public function get_style_category_data()
    {
      $styles = Style_Category::all();
      return response()->json([
          'styles' => $styles
      ]);
    }
    public function get_swiper_photo_ready_data(Request $request)
    {
        $readys = ReadyToWear::find($request->ready_id);
        $readys->popular_count +=1;
        $readys->save();

        return response()->json([
            'readys' => $readys
        ]);
    }
    public function delete_ready_to_wear_data(Request $request)
    {
      $ready = ReadyToWear::find($request->rtw_id)->delete();
      return response()->json("success");
    }
}
