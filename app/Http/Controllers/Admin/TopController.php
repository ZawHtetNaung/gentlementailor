<?php

namespace App\Http\Controllers\Admin;

use App\Top;
use Carbon\Carbon;
use App\Jacket_Button;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopController extends Controller
{
    //
    public function add_top_data()
    {
        return view('admin.customize.top.create');
    }
    public function store_top_data(Request $request)
    {
        logger($request->all());
        foreach($request->images as $image)
        {


                $photo = $image;

                $name = $photo->getClientOriginalName();

                $photo->move(public_path() . '/assets/images/customize/top/', $name);

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
        $top = Top::create([
            'style' => $request->style,
            'color' => $request->color,
            'description' =>$request->description,
            'price' =>$request->price,
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
        $tops = Top::all();
        // dd($fits);
        return view('admin.customize.top.list',compact('tops'));
    }

    // public function get_edit_top_data()
    // {
    //     $fits = FitSuit::all();
    //     logger($fits);
    //     return response()->json([
    //         'tops' => $fits
    //     ]);
    // }
    public function edit_top_data($id)
    {
        // dd($id);
        $top_id = $id;
        return view('admin.customize.top.edit',compact('top_id'));
    }
    public function get_edit_top_data(Request $request)
    {
        logger($request->id);
        $tops = Top::find($request->id);
            logger($tops);
            return response()->json([
                'tops' => $tops
            ]);
    }
    public function store_edit_top_data(Request $request)
    {
        logger($request->all());
        $edit_top = Top::find($request->top_id);
        // $edit_top->texture = $request->texture;
        $edit_top->style = $request->style;
        $edit_top->color = $request->color;
        // $edit_top->size = $request->size;
        $edit_top->price = $request->price;
        $edit_top->description = $request->description;
        $edit_top->type = $request->type;

        if($request->remove_count > 0)
        {
            if($request->remove_count == 1)
            {
                if($request->photo1 == 'null')
                {
                    $edit_top->photo_one = null;
                }
                elseif($request->photo2 == 'null')
                {
                    $edit_top->photo_two = null;
                }
                elseif($request->photo3 == 'null')
                {
                    $edit_top->photo_three = null;

                }
                elseif($request->photo4 == 'null')
                {
                    $edit_top->photo_four = null;

                }

                elseif($request->photo5 == 'null')
                {
                    $edit_top->photo_five = null;

                }
                elseif($request->photo6 == 'null')
                {
                    $edit_top->photo_six = null;

                }
                elseif($request->photo7 == 'null')
                {
                    $edit_top->photo_seven = null;

                }
                elseif($request->photo8 == 'null')
                {
                    $edit_top->photo_eight = null;

                }
                elseif($request->photo9 == 'null')
                {
                    $edit_top->photo_nine = null;

                }
                elseif($request->photo10 == 'null')
                {
                    $edit_top->photo_ten = null;

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
                            $edit_top->photo_one = null;
                        $i++;
                    }

                    if($request->photo2 == 'null')

                    {
                        logger("TWO");
                            $edit_top->photo_two = null;
                        $i++;
                    }

                    if($request->photo3 == 'null')

                    {

                            $edit_top->photo_three = null;
                        $i++;
                    }

                    if($request->photo4 == 'null')

                    {

                            $edit_top->photo_four = null;
                        $i++;
                    }

                    if($request->photo5 == 'null')
                    {

                            $edit_top->photo_five = null;
                        $i++;
                    }
                    if($request->photo6 == 'null')
                    {

                            $edit_top->photo_six = null;
                        $i++;
                    }
                    if($request->photo7 == 'null')
                    {

                            $edit_top->photo_seven = null;
                        $i++;
                    }
                    if($request->photo8 == 'null')
                    {

                            $edit_top->photo_eight = null;
                        $i++;
                    }
                    if($request->photo9 == 'null')
                    {

                            $edit_top->photo_nine = null;
                        $i++;
                    }
                    if($request->photo10 == 'null')
                    {

                            $edit_top->photo_ten = null;
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

            $photo->move(public_path() . '/assets/images/customize/top/', $name);

            $photo = $name;


        }

        if(count($request->images) == 1)
        {
            logger("okok");
            if($request->photo1 == 'null')
            {
                logger("okokokok");
                $edit_top->photo_one = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo2 == 'null')
            {
                $edit_top->photo_two = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo3 == 'null')
            {
                $edit_top->photo_three = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo4 == 'null')
            {
                $edit_top->photo_four = $request->images[0]->getClientOriginalName();

            }

            elseif($request->photo5 == 'null')
            {
                $edit_top->photo_five = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo6 == 'null')
            {
                $edit_top->photo_six = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo7 == 'null')
            {
                $edit_top->photo_seven = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo8 == 'null')
            {
                $edit_top->photo_eight = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo9 == 'null')
            {
                $edit_top->photo_nine = $request->images[0]->getClientOriginalName();

            }
            elseif($request->photo10 == 'null')
            {
                $edit_top->photo_ten = $request->images[0]->getClientOriginalName();

            }
        }
        else
        {
            for($i=0;$i<count($request->images);$i++)
            {
                if($request->photo1 == 'null')
                {
                    logger("ONE");
                        $edit_top->photo_one = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo2 == 'null')
                {
                    logger("TWO");
                        $edit_top->photo_two = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo3 == 'null')
                {

                        $edit_top->photo_three = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo4 == 'null')
                {

                        $edit_top->photo_four = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo5 == 'null' && !empty($request->images[$i]))
                {

                        $edit_top->photo_five = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo6 == 'null' && !empty($request->images[$i]))
                {

                        $edit_top->photo_six = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo7 == 'null' && !empty($request->images[$i]))
                {

                        $edit_top->photo_seven = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo8 == 'null' && !empty($request->images[$i]))
                {

                        $edit_top->photo_eight = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo9 == 'null' && !empty($request->images[$i]))
                {

                        $edit_top->photo_nine = $request->images[$i]->getClientOriginalName();
                    $i++;
                }
                if($request->photo10 == 'null' && !empty($request->images[$i]))
                {

                        $edit_top->photo_ten = $request->images[$i]->getClientOriginalName();
                    $i++;
                }


            }
        }
    }
}
        $edit_top->save();
        return response()->json("success");
    }
    public function delete_top_data(Request $request)
    {
        // return dd($request);
        $top = Top::find($request->top_id)->delete();
       
        return response()->json("success");
    }

    public function get_jacket_button_all()
    {
        $jacket_buttons = Jacket_Button::all();
        return response()->json([
            'jacket_buttons' => $jacket_buttons
        ]);
    }

    public function getTops(Request $request)
    {
        
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // total number of rows per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        $searchByFromdate = $request->get('searchByFromdate');
        $searchByTodate = $request->get('searchByTodate');


        if ($searchByFromdate == null) {
            $searchByFromdate = '0-0-0 00:00:00';
        }
        if ($searchByTodate == null) {
            $searchByTodate = Carbon::now();
        }

        $shop_id = 1;

        // if (Auth::guard('shop_owner')->check()) {
        //     $shop_id = Auth::guard('shop_owner')->user()->id;

        // } else {
        //     $shop_id = Auth::guard('shop_role')->user()->shop_id;
        // }


        $totalRecords = Top::select('count(*) as allcount')
            ->where(function ($query) use ($searchValue) {
                $query->where('id', 'like', '%' . $searchValue . '%')
                    ->orWhere('type', 'like', '%' . $searchValue . '%')
                    ->orWhere('color', 'like', '%' . $searchValue . '%');
            })
            ->whereBetween('created_at', [$searchByFromdate, $searchByTodate])
            ->count();
        $totalRecordswithFilter = $totalRecords;

        $records = Top::orderBy($columnName, $columnSortOrder)
            ->orderBy('created_at', 'desc')
            ->where(function ($query) use ($searchValue) {
                $query->where('id', 'like', '%' . $searchValue . '%')
                    ->orWhere('style', 'like', '%' . $searchValue . '%')
                    ->orWhere('type', 'like', '%' . $searchValue . '%')
                    ->orWhere('color', 'like', '%' . $searchValue . '%')
                    ->orWhere('description', 'like', '%' . $searchValue . '%')
                    ->orWhere('price', 'like', '%' . $searchValue . '%');
            })
            ->whereBetween('created_at', [$searchByFromdate, $searchByTodate])
            ->select('tops.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();
        //    return $records;
        $data_arr = array();

        foreach ($records as $record) {
            $data_arr[] = array(
                "id" => $record->id,
                "photo_one" => $record->photo_one,
                "type" => $record->type,
                "style" => $record->style,
                "color" => $record->color,
                // "description" => strlen($record->description)<=80 ? substr($record->description, 0, 80) :substr($record->description, 0, 80) . ' ...',
                "description" => $record->description,
                "price" => $record->price,
                "action" => $record->id,
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,
        );
        echo json_encode($response);

    }

   

    

}
