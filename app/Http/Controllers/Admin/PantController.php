<?php

namespace App\Http\Controllers\Admin;

use App\Pant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pant_pleat;

class PantController extends Controller
{
    //
    public function add_pant_data()
    {
        return view('admin.customize.pant.create');
    }
    public function store_pant_data(Request $request)
    {
        logger($request->all());
        foreach($request->images as $image)
        {


                $photo = $image;

                $name = $photo->getClientOriginalName();

                $photo->move(public_path() . '/assets/images/customize/pant/', $name);

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

        $pant = Pant::create([
            // 'texture' => $request->texture,
            'style' => $request->style,
            'color' => $request->color,
            'price' =>$request->price,
            'description' =>$request->description,
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
        $pants = Pant::all();
    //    return dd($pants);
        return view('admin.customize.pant.list',compact('pants'));
    }

    // public function get_edit_pant_data()
    // {
    //     $fits = FitSuit::all();
    //     logger($fits);
    //     return response()->json([
    //         'pants' => $fits
    //     ]);
    // }
    public function edit_pant_data($id)
    {
        // dd($id);
        $pant_id = $id;
        return view('admin.customize.pant.edit',compact('pant_id'));
    }
    public function get_edit_pant_data(Request $request)
    {
        logger($request->id);
        $pants = Pant::find($request->id);
            logger($pants);
            return response()->json([
                'pants' => $pants
            ]);
    }
    public function store_edit_pant_data(Request $request)
    {
        logger($request->all());
        $edit_pant = Pant::find($request->pant_id);
        // $edit_pant->texture = $request->texture;
        $edit_pant->style = $request->style;
        $edit_pant->color = $request->color;
        $edit_pant->price = $request->price;
        $edit_pant->description = $request->description;
        if($request->remove_count > 0)
        {
            if($request->remove_count == 1)
            {
                if($request->photo1 == 'null')
                {
                    $edit_pant->photo_one = null;
                }
                elseif($request->photo2 == 'null')
                {
                    $edit_pant->photo_two = null;
                }
                elseif($request->photo3 == 'null')
                {
                    $edit_pant->photo_three = null;

                }
                elseif($request->photo4 == 'null')
                {
                    $edit_pant->photo_four = null;

                }

                elseif($request->photo5 == 'null')
                {
                    $edit_pant->photo_five = null;

                }
                elseif($request->photo6 == 'null')
                {
                    $edit_pant->photo_six = null;

                }
                elseif($request->photo7 == 'null')
                {
                    $edit_pant->photo_seven = null;

                }
                elseif($request->photo8 == 'null')
                {
                    $edit_pant->photo_eight = null;

                }
                elseif($request->photo9 == 'null')
                {
                    $edit_pant->photo_nine = null;

                }
                elseif($request->photo10 == 'null')
                {
                    $edit_pant->photo_ten = null;

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
                            $edit_pant->photo_one = null;
                        $i++;
                    }

                    if($request->photo2 == 'null')

                    {
                        logger("TWO");
                            $edit_pant->photo_two = null;
                        $i++;
                    }

                    if($request->photo3 == 'null')

                    {

                            $edit_pant->photo_three = null;
                        $i++;
                    }

                    if($request->photo4 == 'null')

                    {

                            $edit_pant->photo_four = null;
                        $i++;
                    }

                    if($request->photo5 == 'null')
                    {

                            $edit_pant->photo_five = null;
                        $i++;
                    }
                    if($request->photo6 == 'null')
                    {

                            $edit_pant->photo_six = null;
                        $i++;
                    }
                    if($request->photo7 == 'null')
                    {

                            $edit_pant->photo_seven = null;
                        $i++;
                    }
                    if($request->photo8 == 'null')
                    {

                            $edit_pant->photo_eight = null;
                        $i++;
                    }
                    if($request->photo9 == 'null')
                    {

                            $edit_pant->photo_nine = null;
                        $i++;
                    }
                    if($request->photo10 == 'null')
                    {

                            $edit_pant->photo_ten = null;
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

            $photo->move(public_path() . '/assets/images/customize/pant/', $name);

            $photo = $name;


        }

        if(count($request->images) == 1)
        {
            logger("okok");
            if($request->photo1 == 'null')
            {
                logger("okokokok");
                $edit_pant->photo_one = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo2 == 'null')
            {
                $edit_pant->photo_two = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo3 == 'null')
            {
                $edit_pant->photo_three = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo4 == 'null')
            {
                $edit_pant->photo_four = $request->images[0]->getClientOriginalName();

            }

            elseif($request->photo5 == 'null')
            {
                $edit_pant->photo_five = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo6 == 'null')
            {
                $edit_pant->photo_six = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo7 == 'null')
            {
                $edit_pant->photo_seven = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo8 == 'null')
            {
                $edit_pant->photo_eight = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo9 == 'null')
            {
                $edit_pant->photo_nine = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo10 == 'null')
            {
                $edit_pant->photo_ten = $request->images[0]->getClientOriginalName();

            }
        }
        else
        {
            for($i=0;$i<count($request->images);$i++)
            {
                if($request->photo1 == 'null' && !empty($request->images[$i]))

                {
                    logger("ONE");
                        $edit_pant->photo_one = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

                if($request->photo2 == 'null' && !empty($request->images[$i]))

                {
                    logger("TWO");
                        $edit_pant->photo_two = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

                if($request->photo3 == 'null' && !empty($request->images[$i]))

                {

                        $edit_pant->photo_three = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

                if($request->photo4 == 'null' && !empty($request->images[$i]))

                {

                        $edit_pant->photo_four = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

                if($request->photo5 == 'null' && !empty($request->images[$i]))
                {

                        $edit_pant->photo_five = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo6 == 'null' && !empty($request->images[$i]))
                {

                        $edit_pant->photo_six = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo7 == 'null' && !empty($request->images[$i]))
                {

                        $edit_pant->photo_seven = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo8 == 'null' && !empty($request->images[$i]))
                {

                        $edit_pant->photo_eight = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo9 == 'null' && !empty($request->images[$i]))
                {

                        $edit_pant->photo_nine = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo10 == 'null' && !empty($request->images[$i]))
                {

                        $edit_pant->photo_ten = $request->images[$i]->getClientOriginalName();
                    $i++;
                }

            }
        }
    }
}
        $edit_pant->save();
        return response()->json("success");
    }
    public function delete_pant_data(Request $request)
    {

        $pant = Pant::find($request->pant_id)->delete();
        return response()->json("success");
    }

    public function get_pant_pleat_all()
    {
        $pant_pleats = Pant_pleat::all();
        return response()->json([
            'pant_pleats' => $pant_pleats
        ]);
    }

}
