<?php

namespace App\Http\Controllers;

use App\Top;
use App\User;
use App\Color;
use App\Package;
use App\Texture;
use App\AddToCart;
use App\CustomizeCategory;
use App\Favourite;
use App\MainTexture;
use App\FabricPattern;
use App\LowerMeasurement;
use App\UpperMeasurement;
use App\TextureSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ScrollController extends Controller
{
    public function show_choose_fabrics(Request $request)
    {
      logger("do start");
      logger($request->all());
        $textures = MainTexture::all();
        $subs = TextureSubCategory::all();
        $patterns = FabricPattern::all();
        $packages = Package::all();
        $colors = Color::all();
        $favs = Favourite::where('user_id', Session::get('user_id'))->get();
        $carts = AddToCart::where('user_id', Session::get('user_id'))->get();
        if ($request->colors == null && $request->types == null && $request->patterns == null && $request->prices == null && $request->packages == null) {
            $Grands = Texture::orderBy('popular_count', 'desc')->paginate(6);
        } else {
            //start advence filter
            $page = $request->page;
            $grands = Texture::all();
            $start_grands_result = [];
            $last_grands_result = [];
            $third_grands_result = [];
            $four_grands_result = [];
            $connect_arr = [];
            $last_last_grands_result = [];
            $next_start = $request->start;
            $next_end = $next_start+5;
            logger("Next Start = ".$next_start);
            //start one filter
            if ($request->colors != null && $request->types == null && $request->patterns == null && $request->packages == null)
            {
                //only color
                for ($i = 0; $i < count($request->colors); $i++) {
                  if($request->prices == null)
                  {
                    $grands = Texture::where('color_id', $request->colors[$i])->get();
                  }
                  elseif($request->prices[0] == 0)
                  {
                    $grands = Texture::where('color_id', $request->colors[$i])->orderBy('price','asc')->get();
                  }
                  elseif($request->prices[0] == 1)
                  {
                    $grands = Texture::where('color_id', $request->colors[$i])->orderBy('price','desc')->get();
                  }
                    // logger($grands);
                    array_push($start_grands_result, $grands);
                }
                //last result
                for ($i = 0; $i < count($start_grands_result); $i++) {
                    foreach ($start_grands_result[$i] as $rg) {
                        array_push($last_grands_result, $rg);
                    }
                }
            }
            if ($request->colors == null && $request->types != null && $request->patterns == null && $request->packages == null)
            {
                //only types
                for ($i = 0; $i < count($request->types); $i++) {
                  if($request->prices == null)
                  {
                    $grands = Texture::where('main_texture_id', $request->types[$i])->get();
                  }
                  elseif($request->prices[0] == 0)
                  {
                    $grands = Texture::where('main_texture_id', $request->types[$i])->orderBy('price','asc')->get();
                  }
                  elseif($request->prices[0] == 1)
                  {
                    $grands = Texture::where('main_texture_id', $request->types[$i])->orderBy('price','desc')->get();
                  }
                    // logger($grands);
                    array_push($start_grands_result, $grands);
                }
                //last result
                for ($i = 0; $i < count($start_grands_result); $i++) {
                    foreach ($start_grands_result[$i] as $rg) {
                        array_push($last_grands_result, $rg);
                    }
                }
            }
            if ($request->colors == null && $request->types == null && $request->patterns != null && $request->packages == null)
            {
              logger("find pattern");
                //only pattern
                for ($i = 0; $i < count($request->patterns); $i++) {
                  if($request->prices == null)
                  {
                    $grands = Texture::where('pattern_id', $request->patterns[$i])->get();
                  }
                  elseif($request->prices[0] == 0)
                  {
                    $grands = Texture::where('pattern_id', $request->patterns[$i])->orderBy('price','asc')->get();
                  }
                  elseif($request->prices[0] == 1)
                  {
                    $grands = Texture::where('pattern_id', $request->patterns[$i])->orderBy('price','desc')->get();
                  }
                    // logger($grands);
                    array_push($start_grands_result, $grands);
                }
                //last result
                for ($i = 0; $i < count($start_grands_result); $i++) {
                    foreach ($start_grands_result[$i] as $rg) {
                        array_push($last_grands_result, $rg);
                    }
                }
            }
            if ($request->colors == null && $request->types == null && $request->patterns == null && $request->packages != null)
            {
              logger("find package");
                //only package
                for ($i = 0; $i < count($request->packages); $i++) {

                    $grands = Texture::where('package_id', $request->packages[$i])->get();
                    // logger($grands);
                    array_push($start_grands_result, $grands);
                }
                //last result
                for ($i = 0; $i < count($start_grands_result); $i++) {
                    foreach ($start_grands_result[$i] as $rg) {
                        array_push($last_grands_result, $rg);
                    }
                }
                if($request->prices != null)
                {
                  logger("price package");
                  if ($request->prices[0] == 0) {
                    array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
                  } elseif($request->prices[0] == 1) {
                      array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
                  }
                }
            }
            //end one filter
            //start two filter
            if ($request->colors != null && $request->types != null && $request->patterns == null && $request->packages == null) {
              //color and type
              for ($i = 0; $i < count($request->colors); $i++) {

                  $grands = Texture::where('color_id', $request->colors[$i])->get();

                  array_push($start_grands_result, $grands);
              }
              //last result
              for ($i = 0; $i < count($start_grands_result); $i++) {
                  foreach ($start_grands_result[$i] as $rg) {
                      for ($j = 0; $j < count($request->types); $j++) {
                          if ($rg->main_texture_id == $request->types[$j]) {
                              array_push($last_grands_result, $rg);
                          }
                      }
                  }
              }
              if($request->prices != null)
              {
                if ($request->prices[0] == 0) {
                  array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
                } elseif($request->prices[0] == 1) {
                    array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
                }
              }
            }
            elseif ($request->colors != null && $request->types == null && $request->patterns != null && $request->packages == null) {
              //color and pattern
              for ($i = 0; $i < count($request->colors); $i++) {
                  $grands = Texture::where('color_id', $request->colors[$i])->get();
                  // logger($grands);
                  array_push($start_grands_result, $grands);
              }
              //last result
              for ($i = 0; $i < count($start_grands_result); $i++) {
                  foreach ($start_grands_result[$i] as $rg) {
                      for ($j = 0; $j < count($request->patterns); $j++) {
                          if ($rg->pattern_id == $request->patterns[$j]) {
                              array_push($last_grands_result, $rg);
                          }
                      }
                  }
              }
              if($request->prices != null)
              {
                if ($request->prices[0] == 0) {
                  array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
                } elseif($request->prices[0] == 1) {
                    array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
                }
              }
            }
            elseif ($request->colors == null && $request->types != null && $request->patterns != null && $request->packages == null) {
              //type and pattern
              for ($i = 0; $i < count($request->types); $i++) {
                  $grands = Texture::where('main_texture_id', $request->types[$i])->get();
                  // logger($grands);
                  array_push($start_grands_result, $grands);
              }
              //last result
              for ($i = 0; $i < count($start_grands_result); $i++) {
                  foreach ($start_grands_result[$i] as $rg) {
                      for ($j = 0; $j < count($request->patterns); $j++) {
                          if ($rg->pattern_id == $request->patterns[$j]) {
                              array_push($last_grands_result, $rg);
                          }
                      }
                  }
              }
              if($request->prices != null)
              {
                if ($request->prices[0] == 0) {
                  array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
                } elseif($request->prices[0] == 1) {
                    array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
                }
              }
            }
            elseif ($request->colors != null && $request->types == null && $request->patterns == null && $request->packages != null) {
              //color and package
              for ($i = 0; $i < count($request->colors); $i++) {
                  $grands = Texture::where('color_id', $request->colors[$i])->get();
                  // logger($grands);
                  array_push($start_grands_result, $grands);
              }
              //last result
              for ($i = 0; $i < count($start_grands_result); $i++) {
                  foreach ($start_grands_result[$i] as $rg) {
                      for ($j = 0; $j < count($request->packages); $j++) {
                          if ($rg->package_id == $request->packages[$j]) {
                              array_push($last_grands_result, $rg);
                          }
                      }
                  }
              }
              if($request->prices != null)
              {
                if ($request->prices[0] == 0) {
                  array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
                } elseif($request->prices[0] == 1) {
                    array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
                }
              }
            }
            elseif ($request->colors == null && $request->types != null && $request->patterns == null && $request->packages != null) {
              //type and package
              for ($i = 0; $i < count($request->types); $i++) {
                  $grands = Texture::where('main_texture_id', $request->types[$i])->get();
                  // logger($grands);
                  array_push($start_grands_result, $grands);
              }
              //last result
              for ($i = 0; $i < count($start_grands_result); $i++) {
                  foreach ($start_grands_result[$i] as $rg) {
                      for ($j = 0; $j < count($request->packages); $j++) {
                          if ($rg->package_id == $request->packages[$j]) {
                              array_push($last_grands_result, $rg);
                          }
                      }
                  }
              }
              if($request->prices != null)
              {
                if ($request->prices[0] == 0) {
                  array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
                } elseif($request->prices[0] == 1) {
                    array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
                }
              }
            }
            elseif ($request->colors == null && $request->types != null && $request->patterns == null && $request->packages != null) {
              //pattern and package
              for ($i = 0; $i < count($request->patterns); $i++) {
                  $grands = Texture::where('pattern_id', $request->patterns[$i])->get();
                  // logger($grands);
                  array_push($start_grands_result, $grands);
              }
              //last result
              for ($i = 0; $i < count($start_grands_result); $i++) {
                  foreach ($start_grands_result[$i] as $rg) {
                      for ($j = 0; $j < count($request->packages); $j++) {
                          if ($rg->package_id == $request->packages[$j]) {
                              array_push($last_grands_result, $rg);
                          }
                      }
                  }
              }
              if($request->prices != null)
              {
                if ($request->prices[0] == 0) {
                  array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
                } elseif($request->prices[0] == 1) {
                    array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
                }
              }
            }
            //end two filter
            //start three filter
            if ($request->colors != null && $request->types != null && $request->patterns != null && $request->packages == null) {
              //color,type and pattern
              for ($i = 0; $i < count($request->colors); $i++) {
                  $grands = Texture::where('color_id', $request->colors[$i])->get();
                  // logger($grands);
                  array_push($start_grands_result, $grands);
              }
              //last result
              for ($i = 0; $i < count($start_grands_result); $i++) {
                  foreach ($start_grands_result[$i] as $rg) {
                      for ($j = 0; $j < count($request->types); $j++) {
                          if ($rg->main_texture_id == $request->types[$j]) {
                              array_push($third_grands_result, $rg);
                          }
                      }
                  }
              }

              foreach ($third_grands_result as $rg) {
                  // logger("lllllllllll");
                  // logger($rg);
                  // logger("pattern-id".$rg->pattern_id);
                  for ($j = 0; $j < count($request->patterns); $j++) {
                      if ($rg->pattern_id == $request->patterns[$j]) {
                          array_push($last_grands_result, $rg);
                      }
                  }
              }
              if($request->prices != null)
              {
                if ($request->prices[0] == 0) {
                  array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
                } elseif($request->prices[0] == 1) {
                    array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
                }
              }
          }
          if ($request->colors == null && $request->types != null && $request->patterns != null && $request->packages != null) {
            //type and pattern and package
            for ($i = 0; $i < count($request->types); $i++) {
                $grands = Texture::where('main_texture_id', $request->types[$i])->get();
                // logger($grands);
                array_push($start_grands_result, $grands);
            }
            //last result
            for ($i = 0; $i < count($start_grands_result); $i++) {
                foreach ($start_grands_result[$i] as $rg) {
                    for ($j = 0; $j < count($request->patterns); $j++) {
                        if ($rg->pattern_id == $request->patterns[$j]) {
                            array_push($third_grands_result, $rg);
                        }
                    }
                }
            }

            foreach ($third_grands_result as $rg) {
                // logger("lllllllllll");
                // logger($rg);
                // logger("pattern-id".$rg->pattern_id);
                for ($j = 0; $j < count($request->packages); $j++) {
                    if ($rg->package_id == $request->packages[$j]) {
                        array_push($last_grands_result, $rg);
                    }
                }
            }
            if($request->prices != null)
            {
              if ($request->prices[0] == 0) {
                array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
              } elseif($request->prices[0] == 1) {
                  array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
              }
            }
        }
        if ($request->colors == null && $request->types != null && $request->patterns != null && $request->packages != null) {
          //color and pattern and package
          for ($i = 0; $i < count($request->colors); $i++) {
              $grands = Texture::where('color_id', $request->colors[$i])->get();
              // logger($grands);
              array_push($start_grands_result, $grands);
          }
          //last result
          for ($i = 0; $i < count($start_grands_result); $i++) {
              foreach ($start_grands_result[$i] as $rg) {
                  for ($j = 0; $j < count($request->patterns); $j++) {
                      if ($rg->pattern_id == $request->patterns[$j]) {
                          array_push($third_grands_result, $rg);
                      }
                  }
              }
          }

          foreach ($third_grands_result as $rg) {
              // logger("lllllllllll");
              // logger($rg);
              // logger("pattern-id".$rg->pattern_id);
              for ($j = 0; $j < count($request->packages); $j++) {
                  if ($rg->package_id == $request->packages[$j]) {
                      array_push($last_grands_result, $rg);
                  }
              }
          }
          if($request->prices != null)
          {
            if ($request->prices[0] == 0) {
              array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
            } elseif($request->prices[0] == 1) {
                array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
            }
          }
      }
      if ($request->colors == null && $request->types != null && $request->patterns != null && $request->packages != null) {
        //color and type and package
        for ($i = 0; $i < count($request->colors); $i++) {
            $grands = Texture::where('color_id', $request->colors[$i])->get();
            // logger($grands);
            array_push($start_grands_result, $grands);
        }
        //last result
        for ($i = 0; $i < count($start_grands_result); $i++) {
            foreach ($start_grands_result[$i] as $rg) {
                for ($j = 0; $j < count($request->types); $j++) {
                    if ($rg->main_texture_id == $request->types[$j]) {
                        array_push($third_grands_result, $rg);
                    }
                }
            }
        }

        foreach ($third_grands_result as $rg) {
            // logger("lllllllllll");
            // logger($rg);
            // logger("pattern-id".$rg->pattern_id);
            for ($j = 0; $j < count($request->packages); $j++) {
                if ($rg->package_id == $request->packages[$j]) {
                    array_push($last_grands_result, $rg);
                }
            }
        }
        if($request->prices != null)
        {
          if ($request->prices[0] == 0) {
            array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
          } elseif($request->prices[0] == 1) {
              array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
          }
        }
    }
            //end three filter
            //start four filter
            if ($request->colors != null && $request->types != null && $request->patterns != null && $request->packages != null) {
              //color and type and pattern and package
              logger("four filter");
              for ($i = 0; $i < count($request->colors); $i++) {
                  $grands = Texture::where('color_id', $request->colors[$i])->get();
                  // logger($grands);
                  array_push($start_grands_result, $grands);
              }
              //last result
              for ($i = 0; $i < count($start_grands_result); $i++) {
                  foreach ($start_grands_result[$i] as $rg) {
                      for ($j = 0; $j < count($request->patterns); $j++) {
                          if ($rg->pattern_id == $request->patterns[$j]) {
                              array_push($third_grands_result, $rg);
                          }
                      }
                  }
              }
              for ($i = 0; $i < count($third_grands_result); $i++) {
                  logger("check bool");
                  logger($third_grands_result[0]->main_texture_id);
                    for ($j = 0; $j < count($request->types); $j++) {
                        if ($third_grands_result[$i]->main_texture_id == $request->types[$j]) {
                            array_push($four_grands_result, $third_grands_result[$i]);
                        }
                    }
            }

              foreach ($four_grands_result as $rg) {
                  // logger("lllllllllll");
                  // logger($rg);
                  // logger("pattern-id".$rg->pattern_id);
                  for ($j = 0; $j < count($request->packages); $j++) {
                      if ($rg->package_id == $request->packages[$j]) {
                          array_push($last_grands_result, $rg);
                      }
                  }
              }
              if($request->prices != null)
              {
                if ($request->prices[0] == 0) {
                  array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
                } elseif($request->prices[0] == 1) {
                    array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
                }
              }
          }
            //end four filter
            //only price
            if($request->colors == null && $request->types == null && $request->patterns == null && $request->packages == null && $request->prices != null)
            {
              logger("only pricessssssssssssssssssssssss");
              if($request->prices[0] == 0)
              {
                $grands = Texture::orderBy('price','asc')->get();
                foreach($grands as $grand)
                {
                  array_push($last_grands_result, $grand);
                }
              }
              else
              {
                $grands = Texture::orderBy('price','desc')->get();
                foreach($grands as $grand)
                {
                  array_push($last_grands_result, $grand);
                }
              }
            }
            logger("Page No ---".$page);
            logger("Next Start ---".$next_start);
            logger("Result Count ---".count($last_grands_result));
            logger("Next End ---".$next_end);
            for($i=$next_start;$i<count($last_grands_result);$i++)
            {
              array_push($connect_arr,$last_grands_result[$i]);
              if($i==$next_end)
              {
                break;
              }
            }
            logger(count($connect_arr));
            if(count($connect_arr) == 0)
            {
              $Grands = [];
            }
            else
            {
              $Grands = $connect_arr;
            }
        }
        $articles = '';
        $public_path = 'http://localhost:8000/assets/images/categories/texture/';
        if ($request->ajax()) {
            foreach ($Grands as $grand) {
                // logger($grand);

                  $articles .= '
                  <div class="col-6 col-md-4 mb-3 mb-md-0 px-2">
                    <div class="cursor-pointer" data-bs-toggle="modal"
                         data-bs-target="#fabrics">
                      <div class="img-container mb-1">
                        <img src="' . $public_path . $grand->photo_one . '"
                             alt="" class="img-responsive">
                      </div>
                      <p class="mb-2 small-text fabric-text">' .
                  $grand->name . '/' .'Package-id='. $grand->package_id . '/' .'Type-id='. $grand->main_texture_id .'/'.'Pattern-id='. $grand->pattern_id
                  . '</p>
                      <p class="text-gold">$ ' . $grand->price . '</p>
                    </div>
                  </div>
                  ';
            }
            return response()->json(['res' => $articles, 'page_no' => 8]);
        }

        $user = Session::get('user_id');
        if($user != null)
        {
          $user_info = User::find($user);
          $upper = UpperMeasurement::where('user_id',$user)->first();
          $lower = LowerMeasurement::where('user_id',$user)->first();
        }
        else
        {
          $user_info = null;
          $upper = null;
          $lower = null;
        }

        $tops = Top::all();
        $top_cates = CustomizeCategory::all();
        return view('frontend.choose-fabric', compact('top_cates','tops','upper','lower','user','Grands', 'textures', 'subs', 'colors', 'patterns', 'favs', 'carts','packages'));
    }
}
