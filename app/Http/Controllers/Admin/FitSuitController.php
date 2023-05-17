<?php

namespace App\Http\Controllers\Admin;
use App\Size;
use App\Color;
use App\Style;
use App\FitSuit;
use App\Texture;
use App\Style_Category;
use App\Jacket_Button;
use App\CustomizeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FitSuitController extends Controller
{
    //
    public function add_fit_suit_data()
    {
        // $texture = Texture::all();
        // $style = Style::all();
        // $color = Color::all();
        return view('admin.add_fit_suit');
    }
    public function store_fit_suit_data(Request $request)
    {
        logger($request->all());
        foreach($request->images as $image)
        {


                $photo = $image;

                $name = $photo->getClientOriginalName();

                $photo->move(public_path() . '/frontend/images/', $name);

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


        $fit_suit = FitSuit::create([
            'texture' => $request->texture,
            'style' => $request->style,
            'color' => $request->color,
            'size' => $request->size,
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
    public function show_list()
    {
        $fits = FitSuit::all();
        // dd($fits);
        
        return view('admin.fit_suit_list',compact('fits'));
    }

    // public function get_edit_fit_suit_data()
    // {
    //     $fits = FitSuit::all();
    //     logger($fits);
    //     return response()->json([
    //         'fit_suits' => $fits
    //     ]);
    // }
    public function edit_fit_suit_data($id)
    {
        // dd($id);
        $fit_suit_id = $id;
        return view('admin.edit_fit_suit',compact('fit_suit_id'));
    }
    public function get_edit_fit_suit_data(Request $request)
    {
        logger($request->id);
        $fits = FitSuit::find($request->id);
            logger($fits);
            return response()->json([
                'fit_suits' => $fits
            ]);
    }
    public function store_edit_fit_suit_data(Request $request)
    {
        logger($request->all());
        $edit_fit_suit = FitSuit::find($request->fitsuit_id);
        $edit_fit_suit->texture = $request->texture;
        $edit_fit_suit->style = $request->style;
        $edit_fit_suit->color = $request->color;
        $edit_fit_suit->size = $request->size;
        $edit_fit_suit->price = $request->price;

        if($request->remove_count > 0)
        {
            if($request->remove_count == 1)
            {
                if($request->photo1 == 'null')
                {
                    $edit_fit_suit->photo_one = null;
                }
                elseif($request->photo2 == 'null')
                {
                    $edit_fit_suit->photo_two = null;
                }
                elseif($request->photo3 == 'null')
                {
                    $edit_fit_suit->photo_three = null;

                }
                elseif($request->photo4 == 'null')
                {
                    $edit_fit_suit->photo_four = null;

                }

                elseif($request->photo5 == 'null')
                {
                    $edit_fit_suit->photo_five = null;

                }
                elseif($request->photo6 == 'null')
                {
                    $edit_fit_suit->photo_six = null;

                }
                elseif($request->photo7 == 'null')
                {
                    $edit_fit_suit->photo_seven = null;

                }
                elseif($request->photo8 == 'null')
                {
                    $edit_fit_suit->photo_eight = null;

                }
                elseif($request->photo9 == 'null')
                {
                    $edit_fit_suit->photo_nine = null;

                }
                elseif($request->photo10 == 'null')
                {
                    $edit_fit_suit->photo_ten = null;

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
                            $edit_fit_suit->photo_one = null;
                        $i++;
                    }

                    if($request->photo2 == 'null')

                    {
                        logger("TWO");
                            $edit_fit_suit->photo_two = null;
                        $i++;
                    }

                    if($request->photo3 == 'null')

                    {

                            $edit_fit_suit->photo_three = null;
                        $i++;
                    }

                    if($request->photo4 == 'null')

                    {

                            $edit_fit_suit->photo_four = null;
                        $i++;
                    }

                    if($request->photo5 == 'null')
                    {

                            $edit_fit_suit->photo_five = null;
                        $i++;
                    }
                    if($request->photo6 == 'null')
                    {

                            $edit_fit_suit->photo_six = null;
                        $i++;
                    }
                    if($request->photo7 == 'null')
                    {

                            $edit_fit_suit->photo_seven = null;
                        $i++;
                    }
                    if($request->photo8 == 'null')
                    {

                            $edit_fit_suit->photo_eight = null;
                        $i++;
                    }
                    if($request->photo9 == 'null')
                    {

                            $edit_fit_suit->photo_nine = null;
                        $i++;
                    }
                    if($request->photo10 == 'null')
                    {

                            $edit_fit_suit->photo_ten = null;
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

                    $photo->move(public_path() . '/frontend/images/', $name);

                    $photo = $name;


                }
                    if(count($request->images) == 1)
                    {
                        logger("okok");
                        if($request->photo1 == 'null')
                        {
                            logger("okokokok");
                            $edit_fit_suit->photo_one = $request->images[0]->getClientOriginalName();

                        }
                        elseif($request->photo2 == 'null')
                        {
                            $edit_fit_suit->photo_two = $request->images[0]->getClientOriginalName();

                        }
                        elseif($request->photo3 == 'null')
                        {
                            $edit_fit_suit->photo_three = $request->images[0]->getClientOriginalName();

                        }
                        elseif($request->photo4 == 'null')
                        {
                            $edit_fit_suit->photo_four = $request->images[0]->getClientOriginalName();

                        }

                        elseif($request->photo5 == 'null')
                        {
                            $edit_fit_suit->photo_five = $request->images[0]->getClientOriginalName();

                        }
                        elseif($request->photo6 == 'null')
                        {
                            $edit_fit_suit->photo_six = $request->images[0]->getClientOriginalName();

                        }
                        elseif($request->photo7 == 'null')
                        {
                            $edit_fit_suit->photo_seven = $request->images[0]->getClientOriginalName();

                        }
                        elseif($request->photo8 == 'null')
                        {
                            $edit_fit_suit->photo_eight = $request->images[0]->getClientOriginalName();

                        }
                        elseif($request->photo9 == 'null')
                        {
                            $edit_fit_suit->photo_nine = $request->images[0]->getClientOriginalName();

                        }
                        elseif($request->photo10 == 'null')
                        {
                            $edit_fit_suit->photo_ten = $request->images[0]->getClientOriginalName();

                        }
                    }
                    else
                    {
                        for($i=0;$i<count($request->images);$i++)
                        {
                            if($request->photo1 == 'null' && !empty($request->images[$i]))

                            {
                                logger("ONE");
                                    $edit_fit_suit->photo_one = $request->images[$i]->getClientOriginalName();
                                $i++;
                            }

                            if($request->photo2 == 'null' && !empty($request->images[$i]))

                            {
                                logger("TWO");
                                    $edit_fit_suit->photo_two = $request->images[$i]->getClientOriginalName();
                                $i++;
                            }

                            if($request->photo3 == 'null' && !empty($request->images[$i]))

                            {

                                    $edit_fit_suit->photo_three = $request->images[$i]->getClientOriginalName();
                                $i++;
                            }

                            if($request->photo4 == 'null' && !empty($request->images[$i]))

                            {

                                    $edit_fit_suit->photo_four = $request->images[$i]->getClientOriginalName();
                                $i++;
                            }

                            if($request->photo5 == 'null' && !empty($request->images[$i]))
                            {

                                    $edit_fit_suit->photo_five = $request->images[$i]->getClientOriginalName();
                                $i++;
                            }
                            if($request->photo6 == 'null' && !empty($request->images[$i]))
                            {

                                    $edit_fit_suit->photo_six = $request->images[$i]->getClientOriginalName();
                                $i++;
                            }
                            if($request->photo7 == 'null' && !empty($request->images[$i]))
                            {

                                    $edit_fit_suit->photo_seven = $request->images[$i]->getClientOriginalName();
                                $i++;
                            }
                            if($request->photo8 == 'null' && !empty($request->images[$i]))
                            {

                                    $edit_fit_suit->photo_eight = $request->images[$i]->getClientOriginalName();
                                $i++;
                            }
                            if($request->photo9 == 'null' && !empty($request->images[$i]))
                            {

                                    $edit_fit_suit->photo_nine = $request->images[$i]->getClientOriginalName();
                                $i++;
                            }
                            if($request->photo10 == 'null' && !empty($request->images[$i]))
                            {

                                    $edit_fit_suit->photo_ten = $request->images[$i]->getClientOriginalName();
                                $i++;
                            }
                        }
                    }
            }
        }


        $edit_fit_suit->save();
        return response()->json("success");
    }
    public function delete_fit_suit_data(Request $request)
    {
        // dd($request->fit_suit_id);
        $fit_suit = FitSuit::find($request->fit_suit_id)->delete();
        // alert()->success("Successfully Deleted Fit Suit");
        return response()->json("success");

    }
    public function get_texture_data()
    {
        $texture = Texture::all();
        return response()->json([
            'textures' => $texture
        ]);
    }
    public function get_style_data()
    {
        $styles = Style::all();
        return response()->json([
            'styles' => $styles
        ]);
    }
    public function get_color_data()
    {
        $colors = Color::all();
        return response()->json([
            'colors' => $colors
        ]);
    }
    public function get_size_data()
    {
        $sizes = Size::all();
        return response()->json([
            'sizes' => $sizes
        ]);
    }
    public function get_customize_cate()
    {
        $customize_cates = CustomizeCategory::all();
        return response()->json([
            'customize_cates' => $customize_cates
        ]);
    }
    public function get_style_cate()
    {
        $style_cates = Style_Category::all();
        return response()->json([
            'style_cates' => $style_cates
        ]);
    }

    public function get_jacket_button_all()
    {
        $jacket_buttons = Jacket_Button::all();
        return response()->json([
            'jacket_buttons' => $jacket_buttons
        ]);
    }

}
