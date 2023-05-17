<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shirt_Button;
use App\Vest_lapel;

class Shirt_ButtonController extends Controller
{
    //
    public function add_shirt_button_data()
    {
        return view('admin.customize.shirt_button.create');
    }
    public function store_shirt_button_data(Request $request)
    {
        logger($request->all());
        foreach($request->images as $image)
        {


                $photo = $image;

                $name = $photo->getClientOriginalName();

                $photo->move(public_path() . '/assets/images/customize/shirt_button/', $name);

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
        $shirt_button = Shirt_Button::create([
            'color' => $request->color,
            'size' => $request->size,
            'price' =>$request->price,
            'description' =>$request->description,
            'price' =>$request->price,
            'style' =>$request->style,
            'type' =>$request->type,
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
    public function show_list()
    {
        $shirt_buttons = Shirt_Button::all();
        // dd($fits);
        return view('admin.customize.shirt_button.list',compact('shirt_buttons'));
    }

    // public function get_edit_fit_suit_data()
    // {
    //     $fits = FitSuit::all();
    //     logger($fits);
    //     return response()->json([
    //         'fit_suits' => $fits
    //     ]);
    // }
    public function edit_shirt_button_data($id)
    {
        // dd($id);
        $shirt_button_id = $id;
        return view('admin.customize.shirt_button.edit',compact('shirt_button_id'));
    }
    public function get_edit_shirt_button_data(Request $request)
    {
        logger($request->id);
        $shirt_buttons = Shirt_Button::find($request->id);
            logger($shirt_buttons);
            return response()->json([
                'shirt_buttons' => $shirt_buttons
            ]);
    }
    public function store_edit_shirt_button_data(Request $request)
    {
        logger($request->all());
        $edit_shirt_button = Shirt_Button::find($request->shirt_button_id);
        $edit_shirt_button->color = $request->color;
        $edit_shirt_button->price = $request->price;
        $edit_shirt_button->style = $request->style;
        $edit_shirt_button->description = $request->description;
        $edit_shirt_button->type = $request->type;
        if($request->remove_count > 0)
        {
            if($request->remove_count == 1)
            {
                if($request->photo1 == 'null')
                {
                    $edit_shirt_button->photo_one = null;
                }
                elseif($request->photo2 == 'null')
                {
                    $edit_shirt_button->photo_two = null;
                }
                elseif($request->photo3 == 'null')
                {
                    $edit_shirt_button->photo_three = null;

                }
                elseif($request->photo4 == 'null')
                {
                    $edit_shirt_button->photo_four = null;

                }

                elseif($request->photo5 == 'null')
                {
                    $edit_shirt_button->photo_five = null;

                }
                elseif($request->photo6 == 'null')
                {
                    $edit_shirt_button->photo_six = null;

                }
                elseif($request->photo7 == 'null')
                {
                    $edit_shirt_button->photo_seven = null;

                }
                elseif($request->photo8 == 'null')
                {
                    $edit_shirt_button->photo_eight = null;

                }
                elseif($request->photo9 == 'null')
                {
                    $edit_shirt_button->photo_nine = null;

                }
                elseif($request->photo10 == 'null')
                {
                    $edit_shirt_button->photo_ten = null;

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
                            $edit_shirt_button->photo_one = null;
                        $i++;
                    }

                    if($request->photo2 == 'null')

                    {
                        logger("TWO");
                            $edit_shirt_button->photo_two = null;
                        $i++;
                    }

                    if($request->photo3 == 'null')

                    {

                            $edit_shirt_button->photo_three = null;
                        $i++;
                    }

                    if($request->photo4 == 'null')

                    {

                            $edit_shirt_button->photo_four = null;
                        $i++;
                    }

                    if($request->photo5 == 'null')
                    {

                            $edit_shirt_button->photo_five = null;
                        $i++;
                    }
                    if($request->photo6 == 'null')
                    {

                            $edit_shirt_button->photo_six = null;
                        $i++;
                    }
                    if($request->photo7 == 'null')
                    {

                            $edit_shirt_button->photo_seven = null;
                        $i++;
                    }
                    if($request->photo8 == 'null')
                    {

                            $edit_shirt_button->photo_eight = null;
                        $i++;
                    }
                    if($request->photo9 == 'null')
                    {

                            $edit_shirt_button->photo_nine = null;
                        $i++;
                    }
                    if($request->photo10 == 'null')
                    {

                            $edit_shirt_button->photo_ten = null;
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

            $photo->move(public_path() . '/assets/images/customize/shirt_button/', $name);

            $photo = $name;


        }

        if(count($request->images) == 1)
        {
            logger("okok");
            if($request->photo1 == 'null')
            {
                logger("okokokok");
                $edit_shirt_button->photo_one = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo2 == 'null')
            {
                $edit_shirt_button->photo_two = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo3 == 'null')
            {
                $edit_shirt_button->photo_three = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo4 == 'null')
            {
                $edit_shirt_button->photo_four = $request->images[0]->getClientOriginalName();

            }

            elseif($request->photo5 == 'null')
            {
                $edit_shirt_button->photo_five = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo6 == 'null')
            {
                $edit_shirt_button->photo_six = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo7 == 'null')
            {
                $edit_shirt_button->photo_seven = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo8 == 'null')
            {
                $edit_shirt_button->photo_eight = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo9 == 'null')
            {
                $edit_shirt_button->photo_nine = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo10 == 'null')
            {
                $edit_shirt_button->photo_ten = $request->images[0]->getClientOriginalName();

            }
        }
        else
        {
            for($i=0;$i<count($request->images);$i++)
            {
                if($request->photo1 == 'null')
                {
                    logger("ONE");
                        $edit_shirt_button->photo_one = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo2 == 'null')
                {
                    logger("TWO");
                        $edit_shirt_button->photo_two = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo3 == 'null')
                {

                        $edit_shirt_button->photo_three = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo4 == 'null')
                {

                        $edit_shirt_button->photo_four = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo5 == 'null' && !empty($request->images[$i]))
                {

                        $edit_shirt_button->photo_five = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo6 == 'null' && !empty($request->images[$i]))
                {

                        $edit_shirt_button->photo_six = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo7 == 'null' && !empty($request->images[$i]))
                {

                        $edit_shirt_button->photo_seven = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo8 == 'null' && !empty($request->images[$i]))
                {

                        $edit_shirt_button->photo_eight = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo9 == 'null' && !empty($request->images[$i]))
                {

                        $edit_shirt_button->photo_nine = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo10 == 'null' && !empty($request->images[$i]))
                {

                        $edit_shirt_button->photo_ten = $request->images[$i]->getClientOriginalName();
                    $i++;
                }


            }
        }
    }
}
        $edit_shirt_button->save();
        return response()->json("success");
    }
    public function delete_shirt_button_data(Request $request)
    {

        $shirt_button = Shirt_Button::find($request->shirt_button_id)->delete();
        return response()->json("success");
    }

    public function get_vest_lapel_all()
    {
        $vest_lapels = Vest_lapel::all();
        return response()->json([
            'vest_lapels' => $vest_lapels
        ]);
    }

}
