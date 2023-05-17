<?php

namespace App\Http\Controllers\Admin;
use App\Additional;

use App\MainAdditional;
use Illuminate\Http\Request;
use App\AdditionalSubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdditionalController extends Controller
{
    //
    public function show_add_main_additional()
    {
        return view('admin.additional.category.create');
    }
    public function store_main_additional_data(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('add_main_additional')
                        ->withErrors($validator)
                        ->withInput();
        }

        MainAdditional::create([
            'name' => $request->name,
        ]);
        alert("Successfully Added!");
        return redirect()->route('main_additional_list');
    }
    public function show_main_additional_list()
    {
        $mains = MainAdditional::all();
        return view('admin.additional.category.list',compact('mains'));
    }
    public function delete_main_additional_data(Request $request)
    {
        $main = MainAdditional::find($request->main_id)->delete();
        return response()->json("success");
    }
    public function update_main_additional_data(Request $request,$id)
    {
        $main = MainAdditional::find($id);
        $main->name = $request->name;
        $main->save();
        return  back();
    }
    public function show_add_main_additional_sub()
    {
        $main_additional = MainAdditional::all();
        return view('admin.additional.subcategory.create',compact('main_additional'));
    }
    public function store_main_additional_sub_data(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'main_additional_id' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('add_main_texture_sub')
                        ->withErrors($validator)
                        ->withInput();
        }

        AdditionalSubCategory::create([
            'main_additional_id' => $request->main_additional_id,
            'name' => $request->name,
        ]);
        alert("Successfully Added!");
        return redirect()->route('main_additional_sub_list');
    }
    public function show_main_additional_sub_list()
    {
        $additionals = AdditionalSubCategory::all();
        $mains = MainAdditional::all();
        return view('admin.additional.subcategory.list',compact('additionals','mains'));
    }
    public function delete_main_additional_sub_data(Request $request)
    {
        $additional = AdditionalSubCategory::find($request->additional_sub_id)->delete();
        return response()->json("success");
    }
    public function update_main_additional_sub_data(Request $request,$id)
    {
        $main = AdditionalSubCategory::find($id);
        $main->main_additional_id = $request->main_additional_id;
        $main->name = $request->name;
        $main->save();
        return  back();
    }
    public function get_main_additional_data()
    {
        $main_additionals = MainAdditional::all();
        logger("yesss");
        // logger($main_textures);
        return response()->json([
            'main_additionals' => $main_additionals
        ]);
    }
    public function create()
    {
        return view('admin.additional.grand.create');
    }
    public function get_main_additional_sub_data(Request $request)
    {
        logger($request->main_id);
        $subcate = AdditionalSubCategory::where('main_additional_id',$request->main_id)->get();
        return response()->json([
            'main_additionals_sub' => $subcate
        ]);
    }
    public function store_additional(Request $request)
    {
        logger($request->all());
        foreach($request->images as $image)
        {


                $photo = $image;

                $name = $photo->getClientOriginalName();

                $photo->move(public_path() . '/assets/images/categories/additional/', $name);

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

        $additional = Additional::create([
            'name' => $request->name,
            'main_additional_id' => $request->main_id,
            'sub_category_id' => $request->sub_id,
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
            'made_in' => $request->made_in,
            'composition' => $request->composition,
            // 'color_id' => $request->color_id,
            // 'softness' => $request->softness,
            'description' => $request->description,
            'stock_qty' => $request->stock_qty
        ]);
        return response()->json("success");
    }
    public function list()
    {
        $additionals= Additional::all();
        return view('admin.additional.grand.list',['additionals' => $additionals]);
    }
    public function edit_additional_data($id)
    {
        $additional_id = $id;
        return view('admin.additional.grand.edit',compact('additional_id'));
    }
    public function delete_additional_data(Request $request)
    {
        $additional = Additional::find($request->additional_id)->delete();
        return response()->json("success");
    }
    public function get_edit_additional_data(Request $request)
    {
        logger($request->id);
        $additionals = Additional::find($request->id);

            return response()->json([
                'additionals' => $additionals
            ]);
    }
    public function get_main_additional_sub_all_data()
    {
        $sub_all = AdditionalSubCategory::all();
        return response()->json([
            'main_additionals_sub' => $sub_all
        ]);
    }
    public function store_edit_additional_data(Request $request)
    {
        logger($request->all());
                $edit_additional = Additional::find($request->additional_id);
                $edit_additional->name = $request->name;
                $edit_additional->price = $request->price;
                $edit_additional->main_additional_id = $request->main_id;
                $edit_additional->sub_category_id = $request->sub_id;

                $edit_additional->made_in = $request->made_in;
                // $edit_additional->color_id = $request->color;
                $edit_additional->composition = $request->composition;
                // $edit_additional->softness = $request->softness;
                $edit_additional->description = $request->description;
                if($request->remove_count > 0)
                {
                    if($request->remove_count == 1)
                    {
                        if($request->photo1 == 'null')
                        {
                            $edit_additional->photo_one = null;
                        }
                        elseif($request->photo2 == 'null')
                        {
                            $edit_additional->photo_two = null;
                        }
                        elseif($request->photo3 == 'null')
                        {
                            $edit_additional->photo_three = null;

                        }
                        elseif($request->photo4 == 'null')
                        {
                            $edit_additional->photo_four = null;

                        }

                        elseif($request->photo5 == 'null')
                        {
                            $edit_additional->photo_five = null;

                        }
                        elseif($request->photo6 == 'null')
                        {
                            $edit_additional->photo_six = null;

                        }
                        elseif($request->photo7 == 'null')
                        {
                            $edit_additional->photo_seven = null;

                        }
                        elseif($request->photo8 == 'null')
                        {
                            $edit_additional->photo_eight = null;

                        }
                        elseif($request->photo9 == 'null')
                        {
                            $edit_additional->photo_nine = null;

                        }
                        elseif($request->photo10 == 'null')
                        {
                            $edit_additional->photo_ten = null;

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
                                    $edit_additional->photo_one = null;
                                $i++;
                            }

                            if($request->photo2 == 'null')

                            {
                                logger("TWO");
                                    $edit_additional->photo_two = null;
                                $i++;
                            }

                            if($request->photo3 == 'null')

                            {

                                    $edit_additional->photo_three = null;
                                $i++;
                            }

                            if($request->photo4 == 'null')

                            {

                                    $edit_additional->photo_four = null;
                                $i++;
                            }

                            if($request->photo5 == 'null')
                            {

                                    $edit_additional->photo_five = null;
                                $i++;
                            }
                            if($request->photo6 == 'null')
                            {

                                    $edit_additional->photo_six = null;
                                $i++;
                            }
                            if($request->photo7 == 'null')
                            {

                                    $edit_additional->photo_seven = null;
                                $i++;
                            }
                            if($request->photo8 == 'null')
                            {

                                    $edit_additional->photo_eight = null;
                                $i++;
                            }
                            if($request->photo9 == 'null')
                            {

                                    $edit_additional->photo_nine = null;
                                $i++;
                            }
                            if($request->photo10 == 'null')
                            {

                                    $edit_additional->photo_ten = null;
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

                    $photo->move(public_path() . '/assets/images/categories/additional/', $name);

                    $photo = $name;


                }

                if(count($request->images) == 1)
                {
                    logger("okok");
                    if($request->photo1 == 'null')
                    {
                        logger("okokokok");
                        $edit_additional->photo_one = $request->images[0]->getClientOriginalName();

                    }
                    elseif($request->photo2 == 'null')
                    {
                        $edit_additional->photo_two = $request->images[0]->getClientOriginalName();

                    }
                    elseif($request->photo3 == 'null')
                    {
                        $edit_additional->photo_three = $request->images[0]->getClientOriginalName();

                    }
                    elseif($request->photo4 == 'null')
                    {
                        $edit_additional->photo_four = $request->images[0]->getClientOriginalName();

                    }

                    elseif($request->photo5 == 'null')
                    {
                        $edit_additional->photo_five = $request->images[0]->getClientOriginalName();

                    }
                    elseif($request->photo6 == 'null')
                    {
                        $edit_additional->photo_six = $request->images[0]->getClientOriginalName();

                    }
                    elseif($request->photo7 == 'null')
                    {
                        $edit_additional->photo_seven = $request->images[0]->getClientOriginalName();

                    }
                    elseif($request->photo8 == 'null')
                    {
                        $edit_additional->photo_eight = $request->images[0]->getClientOriginalName();

                    }
                    elseif($request->photo9 == 'null')
                    {
                        $edit_additional->photo_nine = $request->images[0]->getClientOriginalName();

                    }
                    elseif($request->photo10 == 'null')
                    {
                        $edit_additional->photo_ten = $request->images[0]->getClientOriginalName();

                    }
                }
                if(count($request->images) > 1)
                {
                    for($i=0;$i<count($request->images);$i++)
                    {
                        if($request->photo1 == 'null' && !empty($request->images[$i]))

                        {
                            logger("ONE");
                                $edit_additional->photo_one = $request->images[$i]->getClientOriginalName();
                            $i++;
                        }

                        if($request->photo2 == 'null' && !empty($request->images[$i]))

                        {
                            logger("TWO");
                                $edit_additional->photo_two = $request->images[$i]->getClientOriginalName();
                            $i++;
                        }

                        if($request->photo3 == 'null' && !empty($request->images[$i]))

                        {

                                $edit_additional->photo_three = $request->images[$i]->getClientOriginalName();
                            $i++;
                        }

                        if($request->photo4 == 'null' && !empty($request->images[$i]))

                        {

                                $edit_additional->photo_four = $request->images[$i]->getClientOriginalName();
                            $i++;
                        }

                        if($request->photo5 == 'null' && !empty($request->images[$i]))
                        {

                                $edit_additional->photo_five = $request->images[$i]->getClientOriginalName();
                            $i++;
                        }
                        if($request->photo6 == 'null' && !empty($request->images[$i]))
                        {

                                $edit_additional->photo_six = $request->images[$i]->getClientOriginalName();
                            $i++;
                        }
                        if($request->photo7 == 'null' && !empty($request->images[$i]))
                        {

                                $edit_additional->photo_seven = $request->images[$i]->getClientOriginalName();
                            $i++;
                        }
                        if($request->photo8 == 'null' && !empty($request->images[$i]))
                        {

                                $edit_additional->photo_eight = $request->images[$i]->getClientOriginalName();
                            $i++;
                        }
                        if($request->photo9 == 'null' && !empty($request->images[$i]))
                        {

                                $edit_additional->photo_nine = $request->images[$i]->getClientOriginalName();
                            $i++;
                        }
                        if($request->photo10 == 'null' && !empty($request->images[$i]))
                        {

                                $edit_additional->photo_ten = $request->images[$i]->getClientOriginalName();
                            $i++;
                        }

                    }
                }
            }
        }
                $edit_additional->save();
                return response()->json("success");
    }
    public function increase_count_additional_data(Request $request)
    {
        $additional = Additional::find($request->grand_id);
        $additional->popular_count +=1;
        $additional->save();
        $test = Additional::orderBy('popular_count', 'desc')->get();
        logger($test);
        return response()->json([
            'additionals' => $additional
        ]);
    }
}
