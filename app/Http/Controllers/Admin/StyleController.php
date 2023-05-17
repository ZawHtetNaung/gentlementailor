<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Style;
use App\CustomizeCategory;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class StyleController extends Controller
{
    //
    public function create()
    {
        return view('admin.categories.style.create');
    }

    public function create_style(Request $request)
    {
        logger($request->all());
        foreach($request->images as $image)
        {
                $manager = new ImageManager(['driver' => 'imagick']);
                $photo = $image->hashName();
                $path = 'assets/images/categories/style/'. $photo;
                $manager->make($image)
                ->resize(500,500)
                ->save(public_path($path));

                // start old store file
                // $photo = $image;

                // $name = $photo->getClientOriginalName();

                // $photo->move(public_path() . '/assets/images/categories/style/', $name);

                // $photo = $name;
                // end old store file
        }
        // dd($request->images[0]->hashName());
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
        if($request->pieces){
             $piece = $request->pieces;
        }else{
            $piece = "no";
        }

        $type_name = CustomizeCategory::find($request->type);
        logger($type_name);
        $style = Style::create([
            'category' => $request->category,
            'type_id' => $request->type,
            'type' => $type_name->name,
            'name' => $request->name,
            'colour' => $request->colour,
            'fabric' => $request->fabric,
            'fabric_type' => $request->fabric_type,
            'compostition' => $request->compostition,
            'softness' => $request->softness,
            'description' => $request->description,
            'photo_one' => $request->images[0]->hashName(),
            'pieces' =>$piece,
            'photo_two' => $photo2,
            'photo_three' => $photo3,
            'photo_four' => $photo4,
            'photo_five' => $photo5,
            'photo_six' => $photo6,
            'photo_seven' => $photo7,
            'photo_eight' => $photo8,
            'photo_nine' => $photo9,
            'photo_ten' => $photo10,
        ]);
        return response()->json("success");
    }

    public function list(){
        $styles= Style::all();
        return view('admin.categories.style.list',['styles' => $styles]);
    }

    public function edit_style_data($id)
    {
        // dd($id);
        $style_id = $id;
        return view('admin.categories.style.edit',compact('style_id'));
    }

    public function get_edit_style_data(Request $request)
    {
        logger($request->id);
        $styles = Style::find($request->id);
            logger($styles);
            return response()->json([
                'styles' => $styles
            ]);
    }
    public function store_edit_style_data(Request $request)
    {
        logger($request->all());
        if($request->pieces){
            $piece = $request->pieces;
       }else{
           $piece = "no";
       }
        $edit_style = Style::find($request->style_id);
        $edit_style->category = $request->category;
        $edit_style->type = $request->type;
        $edit_style->name = $request->name;
        $edit_style->pieces = $request->pieces;
        $edit_style->colour = $request->colour;
        $edit_style->fabric = $request->fabric;
        $edit_style->fabric_type = $request->fabric_type;
        $edit_style->compostition = $request->compostition;
        $edit_style->softness = $request->softness;
        $edit_style->description = $request->description;
        $edit_style->type_id = $request->type;
        if($request->remove_count > 0)
        {
            if($request->remove_count == 1)
            {
                if($request->photo1 == 'null')
                {
                    $edit_style->photo_one = null;
                }
                elseif($request->photo2 == 'null')
                {
                    $edit_style->photo_two = null;
                }
                elseif($request->photo3 == 'null')
                {
                    $edit_style->photo_three = null;

                }
                elseif($request->photo4 == 'null')
                {
                    $edit_style->photo_four = null;

                }

                elseif($request->photo5 == 'null')
                {
                    $edit_style->photo_five = null;

                }
                elseif($request->photo6 == 'null')
                {
                    $edit_style->photo_six = null;

                }
                elseif($request->photo7 == 'null')
                {
                    $edit_style->photo_seven = null;

                }
                elseif($request->photo8 == 'null')
                {
                    $edit_style->photo_eight = null;

                }
                elseif($request->photo9 == 'null')
                {
                    $edit_style->photo_nine = null;

                }
                elseif($request->photo10 == 'null')
                {
                    $edit_style->photo_ten = null;

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
                            $edit_style->photo_one = null;
                        $i++;
                    }

                    if($request->photo2 == 'null')

                    {
                        logger("TWO");
                            $edit_style->photo_two = null;
                        $i++;
                    }

                    if($request->photo3 == 'null')

                    {

                            $edit_style->photo_three = null;
                        $i++;
                    }

                    if($request->photo4 == 'null')

                    {

                            $edit_style->photo_four = null;
                        $i++;
                    }

                    if($request->photo5 == 'null')
                    {

                            $edit_style->photo_five = null;
                        $i++;
                    }
                    if($request->photo6 == 'null')
                    {

                            $edit_style->photo_six = null;
                        $i++;
                    }
                    if($request->photo7 == 'null')
                    {

                            $edit_style->photo_seven = null;
                        $i++;
                    }
                    if($request->photo8 == 'null')
                    {

                            $edit_style->photo_eight = null;
                        $i++;
                    }
                    if($request->photo9 == 'null')
                    {

                            $edit_style->photo_nine = null;
                        $i++;
                    }
                    if($request->photo10 == 'null')
                    {

                            $edit_style->photo_ten = null;
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

            $photo->move(public_path() . '/assets/images/categories/style/', $name);

            $photo = $name;


        }

        if(count($request->images) == 1)
        {
            logger("okok");
            if($request->photo1 == 'null')
            {
                logger("okokokok");
                $edit_style->photo_one = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo2 == 'null')
            {
                $edit_style->photo_two = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo3 == 'null')
            {
                $edit_style->photo_three = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo4 == 'null')
            {
                $edit_style->photo_four = $request->images[0]->getClientOriginalName();

            }

            elseif($request->photo5 == 'null')
            {
                $edit_style->photo_five = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo6 == 'null')
            {
                $edit_style->photo_six = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo7 == 'null')
            {
                $edit_style->photo_seven = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo8 == 'null')
            {
                $edit_style->photo_eight = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo9 == 'null')
            {
                $edit_style->photo_nine = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo10 == 'null')
            {
                $edit_style->photo_ten = $request->images[0]->getClientOriginalName();

            }
        }
        if(count($request->images) > 1)
        {
            for($i=0;$i<count($request->images);$i++)
            {
                if($request->photo1 == 'null' && !empty($request->images[$i]))

                {
                    logger("ONE");
                        $edit_style->photo_one = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

                if($request->photo2 == 'null' && !empty($request->images[$i]))

                {
                    logger("TWO");
                        $edit_style->photo_two = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

                if($request->photo3 == 'null' && !empty($request->images[$i]))

                {

                        $edit_style->photo_three = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

                if($request->photo4 == 'null' && !empty($request->images[$i]))

                {

                        $edit_style->photo_four = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

                if($request->photo5 == 'null' && !empty($request->images[$i]))
                {

                        $edit_style->photo_five = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo6 == 'null' && !empty($request->images[$i]))
                {

                        $edit_style->photo_six = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo7 == 'null' && !empty($request->images[$i]))
                {

                        $edit_style->photo_seven = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo8 == 'null' && !empty($request->images[$i]))
                {

                        $edit_style->photo_eight = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo9 == 'null' && !empty($request->images[$i]))
                {

                        $edit_style->photo_nine = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo10 == 'null' && !empty($request->images[$i]))
                {

                        $edit_style->photo_ten = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

            }
        }
        }
    }

        $edit_style->save();
        logger("style update data ------------------");
        return response()->json("success");
    }
    public function delete_style_data(Request $request)
    {

        $style = Style::find($request->style_id)->delete();
        return response()->json("success");
    }
    public function get_swiper_style_ajax_data(Request $request)
    {
      // dd($request->all());
      $styles = Style::find($request->style_id);
      // $styles->popular_count +=1;
      // $styles->save();

      return response()->json([
          'styles' => $styles
      ]);
    }

}
