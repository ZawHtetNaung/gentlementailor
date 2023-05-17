<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use App\Style;
use App\Package;
use App\Texture;
use App\Style_Category;
use App\AddToCart;
use App\Favourite;
use App\MainTexture;
use App\ReadyToWear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ReadyToWareController extends Controller
{
    public function ready_to_wear(Request $request){
        $site_url = url('');
        $user = Session::get('user_id');
        // dd($user);
        $user_detail = User::find($user);
        // dd($user_detail);
        $favs = Favourite::where('user_id',Session::get('user_id'))->get();
        $carts = AddToCart::where('user_id',Session::get('user_id'))->get();
        $popup_readys = ReadyToWear::all();
        $styles = Style::all();
        $style_cates = Style_Category::all();
        $packages = Package::all();
        $textures = Texture::all();
        $main_textures = MainTexture::all();
        if(!empty($request->style_cate_name) || !empty($request->texture_id) || !empty($request->package_id))
        {
            logger("yes");
            $readys_arr = [];
            $readys_style = [];
            $readys_package = [];
            $readys_texture = [];
            $last_readys_result = [];
            $connect_arr = [];//for paginate
            $next_start = $request->start;
            $next_end = $next_start+5;
           //start one only
           if(!empty($request->style_cate_name) && !$request->texture_id && !($request->package_id))
           {
             $qty = 1;
             foreach($request->style_cate_name as $style_cate)
               {
                 $one_readys = ReadyToWear::where('style_id',$style_cate)->get();
                 array_push($readys_arr,$one_readys);
               }
            //last result
            for ($i = 0; $i < count($readys_arr); $i++) {
                foreach ($readys_arr[$i] as $rg) {
                    array_push($last_readys_result, $rg);
                }
            }
           }
           if(!$request->style_cate_name && !empty($request->texture_id) && !($request->package_id))
           {
             $qty = 1;
             foreach($request->texture_id as $texture)
             {
              $one_readys = ReadyToWear::where('main_texture_id',$texture)->get();
               array_push($readys_arr,$one_readys);
             }
            //last result
            for ($i = 0; $i < count($readys_arr); $i++) {
              foreach ($readys_arr[$i] as $rg) {
                  array_push($last_readys_result, $rg);
              }
          }
           }
           if(!$request->style_cate_name && !($request->texture_id) && !empty($request->package_id))
           {
             $qty = 1;
             foreach($request->package_id as $package)
             {
              $one_readys = ReadyToWear::where('package_id',$package)->get();
               array_push($readys_arr,$one_readys);
             }
            //last result
            for ($i = 0; $i < count($readys_arr); $i++) {
              foreach ($readys_arr[$i] as $rg) {
                  array_push($last_readys_result, $rg);
              }
            }
           }
           // end one only
          // start two only
          // start(style,texture)
          if(!empty($request->style_cate_name) && !empty($request->texture_id) && !($request->package_id))
          {
            $qty = 2;
            foreach($request->style_cate_name as $style_cate)
            {
              $rstyle = ReadyToWear::where('style_id',$style_cate)->get();
              array_push($readys_style,$rstyle);
            }
            for ($i = 0; $i < count($readys_style); $i++) {
              foreach ($readys_style[$i] as $rs) {
                  for ($j = 0; $j < count($request->texture_id); $j++) {
                      if ($rs->main_texture_id == $request->texture_id[$j]) {
                          array_push($readys_arr, $rs);
                      }
                    }
                  }
                }
                // logger($readys_arr);
            //last result
            for ($i = 0; $i < count($readys_arr); $i++) {
                  array_push($last_readys_result, $readys_arr[$i]);
            }
            logger($last_readys_result);
          }
          // end(style,texture)
          // start(style,package)
          if(!empty($request->style_cate_name) && !($request->texture_id) && !empty($request->package_id))
          {
            $qty = 2;
            foreach($request->style_cate_name as $style_cate)
            {
              $rstyle = ReadyToWear::where('style_id',$style_cate)->get();
              array_push($readys_style,$rstyle);
            }
            for ($i = 0; $i < count($readys_style); $i++) {
              foreach ($readys_style[$i] as $rs) {
                  for ($j = 0; $j < count($request->package_id); $j++) {
                      if ($rs->package_id == $request->package_id[$j]) {
                          array_push($readys_arr, $rs);
                      }
                    }
                  }
                }
            //last result
            for ($i = 0; $i < count($readys_arr); $i++) {
      
                  array_push($last_readys_result, $readys_arr[$i]);
      
          }
          }
          // end(style,package)
          // start(texture,package)
          if(!($request->style_cate_name) && !empty($request->texture_id) && !empty($request->package_id))
          {
            $qty = 2;
            foreach($request->texture_id as $texture)
            {
              $rtexture = ReadyToWear::where('main_texture_id',$texture)->get();
              array_push($readys_style,$rtexture);
            }
            for ($i = 0; $i < count($readys_style); $i++) {
              foreach ($readys_style[$i] as $rs) {
                  for ($j = 0; $j < count($request->package_id); $j++) {
                      if ($rs->package_id == $request->package_id[$j]) {
                          array_push($readys_arr, $rs);
                      }
                    }
                  }
                }
            //last result
            for ($i = 0; $i < count($readys_arr); $i++) {
      
                  array_push($last_readys_result, $readys_arr[$i]);
      
            }
          }
          // end(texture,package)
          // end two only
          //start three only
          if(!empty($request->style_cate_name) && !empty($request->texture_id) && !empty($request->package_id))
          {
            $qty=2;
            for ($i = 0; $i < count($request->style_cate_name); $i++) {
              $rstyle = ReadyToWear::where('style_id',$request->style_cate_name[$i])->get();
              array_push($readys_style,$rstyle);
              // logger($grands);
              // array_push($readys_style, $rstyle);
          }
          //last result
          for ($i = 0; $i < count($readys_style); $i++) {
              foreach ($readys_style[$i] as $rs) {
                  for ($j = 0; $j < count($request->texture_id); $j++) {
                      if ($rs->main_texture_id == $request->texture_id[$j]) {
                          array_push($readys_texture, $rs);
                      }
                  }
              }
          }
      
          foreach ($readys_texture as $rg) {
              // logger("lllllllllll");
              // logger($rg);
              // logger("pattern-id".$rg->pattern_id);
              for ($j = 0; $j < count($request->package_id); $j++) {
                  if ($rg->package_id == $request->package_id[$j]) {
                      array_push($readys_arr, $rg);
                  }
              }
          }
            //last result
            for ($i = 0; $i < count($readys_arr); $i++) {
      
              array_push($last_readys_result, $readys_arr[$i]);
      
        }
          }
          //end three only
           //start all paginage
           for($i=$next_start;$i<count($last_readys_result);$i++)
           {
             logger($last_readys_result[0]);
             array_push($connect_arr,$last_readys_result[$i]);
             if($i==$next_end)
             {
               break;
             }
           }
           logger(count($connect_arr));
           if(count($connect_arr) == 0)
           {
             $readys = [];
           }
           else
           {
             $readys = $connect_arr;
           }
          //  logger($connect_arr);
           //end all paginate
        }//filter all end
        else
        {
          logger("no");
          $readys = ReadyToWear::paginate(6);
        }
        $articles = '';
        $public_path = $site_url .'/assets/images/categories/ready/';
        if ($request->ajax()) {
          foreach($readys as $ready)
          {
      
      //       $articles.='
      //       <div class="col-6 col-lg-4 ready__item">
      //         <div class="ready__item--img-group">
      //           <img src="'.$public_path.$ready->photo_one.'" alt="">
      //            <i class='.'bx bx-heart'.'></i>
      //         </div>
      //         <div class="ready__item--info">
      //           <p>'.$ready->name.'</p>
      //           <p><strong>$ '.$ready->price.'</strong></p>
      //         </div>
      //       </div>
      // ';
              $articles.='
              <div class="col-6 col-lg-4 ready__item" data-bs-toggle="modal"
                   data-bs-target="#myready'.$ready->id.'" onclick="get_swiper('.$ready->id.')">
                <div class="ready__item--img-group">
                  <img src="'.$public_path.$ready->photo_one.'" alt="">';
                  if(!empty($user))
                  {
      
                  $articles.='
                    <button id="wishlist'.$ready->id.'" onclick="whishlist('.$user.','.$ready->id.','.$ready->photo_one.','.$ready->name.','.$ready->price.')>
                    <i class='.'bx bx-heart'.'></i>
                    </button>
                    <button id="delete'.$ready->id.'" onclick="deletedata('.$user.','.$ready->id.','.$ready->photo_one.','.$ready->name.','.$ready->price.')" style="display: none;">
                    <i class="bx bx-heart"></i>
                    </button>';
                  }
                  else
                  {
                    $articles.='
                    <button type="button" class=""
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal"><i class="bx bx-heart"></i>
                    </button>';
                  }
                  $articles.='
                </div>
                <div class="ready__item--info">
                  <p>'.$ready->name.'</p>
                  <p><strong>$ '.$ready->price.'</strong></p>
                </div>
              </div>
              ';
          }
          return response()->json(['res' => $articles, 'page_no' => 8]);
        }
          return view('frontend.readyToWear',compact('popup_readys','main_textures','user','user_detail','favs','carts','readys','styles','packages','textures','style_cates'));
    }
}
