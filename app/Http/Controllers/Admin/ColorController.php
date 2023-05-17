<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{

    public function create()
    {
        return view('admin.categories.color.create');
    }

    public function create_color(Request $request)
    {
        logger($request->all());
        foreach($request->images as $image)
        {

                $photo = $image;

                $name = $photo->getClientOriginalName();

                $photo->move(public_path() . '/assets/images/categories/color/', $name);

                $photo = $name;

        }
        if(!empty($request->images[1]))
        {
            logger("no");
            $photo2 = $request->images[1]->getClientOriginalName();

        }
        else
        {
            logger("has");
            $photo2 = null;

        }
        if(!empty($request->images[2]))
        {
            logger("no");
            $photo3 = $request->images[2]->getClientOriginalName();
        }
        else
        {
            logger("has");
            $photo3 = null;

        }
        if(!empty($request->images[3]))
        {
            logger("no");
            $photo4 = $request->images[3]->getClientOriginalName();

        }
        else
        {
            logger("has");
            $photo4 = null;

        }
        if(!empty($request->images[4]))
        {
            logger("no");
            $photo5 = $request->images[4]->getClientOriginalName();

        }
        else
        {
            logger("has");
            $photo5 = null;

        }
        if(!empty($request->images[5]))
        {
            logger("no");
            $photo6 = $request->images[5]->getClientOriginalName();

        }
        else
        {
            logger("has");
            $photo6 = null;

        }
        if(!empty($request->images[6]))
        {
            logger("no");
            $photo7 = $request->images[6]->getClientOriginalName();

        }
        else
        {
            logger("has");
            $photo7 = null;

        }

        if(!empty($request->images[7]))
        {
            logger("no");
            $photo8 = $request->images[7]->getClientOriginalName();

        }
        else
        {
            logger("has");
            $photo8 = null;

        }
        if(!empty($request->images[8]))
        {
            logger("no");
            $photo9 = $request->images[8]->getClientOriginalName();

        }
        else
        {
            logger("has");
            $photo9 = null;

        }
        if(!empty($request->images[9]))
        {
            logger("no");
            $photo10 = $request->images[9]->getClientOriginalName();

        }
        else
        {
            logger("has");
            $photo10 = null;

        }
        $color = Color::create([
            'name' => $request->name,
            'price' =>$request->price,
            'photo_one' => $request->images[0]->getClientOriginalName(),
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
        $colors= Color::all();
        return view('admin.categories.color.list',['colors' => $colors]);
    }

    public function edit_color_data($id)
    {
        // dd($id);
        $color_id = $id;
        return view('admin.categories.color.edit',compact('color_id'));
    }

    public function get_edit_color_data(Request $request)
    {
        logger($request->id);
        $colors = Color::find($request->id);
            logger($colors);
            return response()->json([
                'colors' => $colors
            ]);
    }
    public function store_edit_color_data(Request $request)
    {
        logger($request->all());
        $edit_color = Color::find($request->color_id);
        $edit_color->name = $request->name;
        $edit_color->price = $request->price;

        if($request->remove_count > 0)
        {
            if($request->remove_count == 1)
            {
                if($request->photo1 == 'null')
                {
                    $edit_color->photo_one = null;
                }
                elseif($request->photo2 == 'null')
                {
                    $edit_color->photo_two = null;
                }
                elseif($request->photo3 == 'null')
                {
                    $edit_color->photo_three = null;

                }
                elseif($request->photo4 == 'null')
                {
                    $edit_color->photo_four = null;

                }

                elseif($request->photo5 == 'null')
                {
                    $edit_color->photo_five = null;

                }
                elseif($request->photo6 == 'null')
                {
                    $edit_color->photo_six = null;

                }
                elseif($request->photo7 == 'null')
                {
                    $edit_color->photo_seven = null;

                }
                elseif($request->photo8 == 'null')
                {
                    $edit_color->photo_eight = null;

                }
                elseif($request->photo9 == 'null')
                {
                    $edit_color->photo_nine = null;

                }
                elseif($request->photo10 == 'null')
                {
                    $edit_color->photo_ten = null;

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
                            $edit_color->photo_one = null;
                        $i++;
                    }

                    if($request->photo2 == 'null')

                    {
                        logger("TWO");
                            $edit_color->photo_two = null;
                        $i++;
                    }

                    if($request->photo3 == 'null')

                    {

                            $edit_color->photo_three = null;
                        $i++;
                    }

                    if($request->photo4 == 'null')

                    {

                            $edit_color->photo_four = null;
                        $i++;
                    }

                    if($request->photo5 == 'null')
                    {

                            $edit_color->photo_five = null;
                        $i++;
                    }
                    if($request->photo6 == 'null')
                    {

                            $edit_color->photo_six = null;
                        $i++;
                    }
                    if($request->photo7 == 'null')
                    {

                            $edit_color->photo_seven = null;
                        $i++;
                    }
                    if($request->photo8 == 'null')
                    {

                            $edit_color->photo_eight = null;
                        $i++;
                    }
                    if($request->photo9 == 'null')
                    {

                            $edit_color->photo_nine = null;
                        $i++;
                    }
                    if($request->photo10 == 'null')
                    {

                            $edit_color->photo_ten = null;
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

            $photo->move(public_path() . '/assets/images/categories/color/', $name);

            $photo = $name;


        }

        if(count($request->images) == 1)
        {
            logger("okok");
            if($request->photo1 == 'null')
            {
                logger("okokokok");
                $edit_color->photo_one = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo2 == 'null')
            {
                $edit_color->photo_two = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo3 == 'null')
            {
                $edit_color->photo_three = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo4 == 'null')
            {
                $edit_color->photo_four = $request->images[0]->getClientOriginalName();

            }

            elseif($request->photo5 == 'null')
            {
                $edit_color->photo_five = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo6 == 'null')
            {
                $edit_color->photo_six = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo7 == 'null')
            {
                $edit_color->photo_seven = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo8 == 'null')
            {
                $edit_color->photo_eight = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo9 == 'null')
            {
                $edit_color->photo_nine = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo10 == 'null')
            {
                $edit_color->photo_ten = $request->images[0]->getClientOriginalName();

            }
        }
        if(count($request->images) > 1)
        {
            for($i=0;$i<count($request->images);$i++)
            {
                if($request->photo1 == 'null' && !empty($request->images[$i]))

                {
                    logger("ONE");
                        $edit_color->photo_one = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

                if($request->photo2 == 'null' && !empty($request->images[$i]))

                {
                    logger("TWO");
                        $edit_color->photo_two = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

                if($request->photo3 == 'null' && !empty($request->images[$i]))

                {

                        $edit_color->photo_three = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

                if($request->photo4 == 'null' && !empty($request->images[$i]))

                {

                        $edit_color->photo_four = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

                if($request->photo5 == 'null' && !empty($request->images[$i]))
                {

                        $edit_color->photo_five = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo6 == 'null' && !empty($request->images[$i]))
                {

                        $edit_color->photo_six = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo7 == 'null' && !empty($request->images[$i]))
                {

                        $edit_color->photo_seven = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo8 == 'null' && !empty($request->images[$i]))
                {

                        $edit_color->photo_eight = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo9 == 'null' && !empty($request->images[$i]))
                {

                        $edit_color->photo_nine = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo10 == 'null' && !empty($request->images[$i]))
                {

                        $edit_color->photo_ten = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

            }
        }
    }
}
        $edit_color->save();
        return response()->json("success");
    }
    public function delete_color_data(Request $request)
    {
        // dd($request->color_id);
        $color = Color::find($request->color_id)->delete();
        return response()->json("success");
    }

}
