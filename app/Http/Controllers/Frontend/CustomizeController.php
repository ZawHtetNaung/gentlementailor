<?php

namespace App\Http\Controllers\frontend;

use App\Top;
use App\Pant;
use App\User;
use App\Color;
use App\Style;
use App\Package;
use App\Texture;
use App\Shipping;
use App\AddToCart;
use App\Favourite;
use App\Additional;
use App\MainTexture;
use App\Shirt_Button;
use App\FabricPattern;
use App\Jacket_button;
use App\Style_Category;
use App\LowerMeasurement;
use App\UpperMeasurement;
use App\CustomizeCategory;
use App\TextureSubCategory;
use Illuminate\Http\Request;
use App\TemporaryCustomizeStep;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CustomizeController extends Controller
{
    public function customize(Request $request){
        $user = Session::get('user_id');
        $favs = Favourite::where('user_id',Session::get('user_id'))->get();
        $carts = AddToCart::where('user_id',Session::get('user_id'))->get();
        $packages = Package::all();
        $customize_cates = CustomizeCategory::all();
        $jacket_customize_cate = CustomizeCategory::find(1);
        $vest_customize_cate = CustomizeCategory::find(2);
        $pant_customize_cate = CustomizeCategory::find(3);
        $suit_customize_cate = CustomizeCategory::find(9);
        $style_cates = Style_Category::all();
        $styles = Style::all();
        // return dd($styles);
        // dd($user);
        if($user != null)
        {
          $user_info = User::find($user);
          $upper = UpperMeasurement::where('user_id',$user)->first();
          $lower = LowerMeasurement::where('user_id',$user)->first();
        }else{
          $user_info = null;
          $upper = null;
          $lower = null;
        }
        //start scroll controller
        $textures = MainTexture::all();
            $subs = TextureSubCategory::all();
            $patterns = FabricPattern::all();
            // $packages = Package::all();
            $colors = Color::all();
    //start fabric data for infinite scroll line 518 to line 1074
    
      logger("texture========521");
            if ($request->colors == null && $request->types == null && $request->patterns == null && $request->prices == null && $request->packages == null) {
                $Grands = Texture::orderBy('popular_count', 'desc')->paginate(6);
                // dd($Grands);
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
                      // if($request->prices == null)
                      // {
                        $grands = Texture::where('color_id', $request->colors[$i])->get();
                      // }
                      // elseif($request->prices[0] == 0)
                      // {
                      //   $grands = Texture::where('color_id', $request->colors[$i])->orderBy('price','asc')->get();
                      // }
                      // elseif($request->prices[0] == 1)
                      // {
                      //   $grands = Texture::where('color_id', $request->colors[$i])->orderBy('price','desc')->get();
                      // }
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
                    if ($request->prices[0] == 0) {
                      array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
                    } elseif($request->prices[0] == 1) {
                        array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
                    }
                  }
                }
                if ($request->colors == null && $request->types != null && $request->patterns == null && $request->packages == null)
                {
                    //only types
                    for ($i = 0; $i < count($request->types); $i++) {
                      // if($request->prices == null)
                      // {
                        $grands = Texture::where('main_texture_id', $request->types[$i])->get();
                      // }
                      // elseif($request->prices[0] == 0)
                      // {
                      //   $grands = Texture::where('main_texture_id', $request->types[$i])->orderBy('price','asc')->get();
                      // }
                      // elseif($request->prices[0] == 1)
                      // {
                      //   $grands = Texture::where('main_texture_id', $request->types[$i])->orderBy('price','desc')->get();
                      // }
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
                      if ($request->prices[0] == 0) {
                        array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
                      } elseif($request->prices[0] == 1) {
                          array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
                      }
                    }
                }
                if ($request->colors == null && $request->types == null && $request->patterns != null && $request->packages == null)
                {
                  logger("find pattern");
                    //only pattern
                    for ($i = 0; $i < count($request->patterns); $i++) {
                      // if($request->prices == null)
                      // {
                        $grands = Texture::where('pattern_id', $request->patterns[$i])->get();
                      // }
                      // elseif($request->prices[0] == 0)
                      // {
                      //   $grands = Texture::where('pattern_id', $request->patterns[$i])->orderBy('price','asc')->get();
                      // }
                      // elseif($request->prices[0] == 1)
                      // {
                      //   $grands = Texture::where('pattern_id', $request->patterns[$i])->orderBy('price','desc')->get();
                      // }
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
                      if ($request->prices[0] == 0) {
                        array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
                      } elseif($request->prices[0] == 1) {
                          array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
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
                    if($request->prices != null)
                    {
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
    
            //end fabric data for infinite scroll line 518 to line 1074
            //start fabric data for infinite scroll line 1074 to line
    
    
            //end fabric data for infinite scroll line 1074 to line
            //start jacket data for infinite scroll line 1080 to line
            if($request->jacket_status == 1)
            {
              if($request->style != null)
              {
                logger("Style have");
                $not_unique_tops = Top::where('style',$request->style)->paginate(6);
    
              }
              else
              {
                logger("not style have");
                $not_unique_tops = Top::paginate(6);
              }
    
            }
            else
            {
              $not_unique_tops = null;
            }
    
            //end jacket data for infinite scroll line 1080 to line
            //start pant data for infinite scroll line 1080 to line
            if($request->pant_status == 1)
            {
              if($request->style != null)
              {
                $not_unique_pants = Pant::where('style',$request->style)->paginate(6);
              }
              else
              {
                $not_unique_pants = Pant::paginate(6);
              }
            }
            else
            {
              $not_unique_pants = null;
            }
    
            //end pant data for infinite scroll line 1080 to line
            //start vest data for infinite scroll line 1123 to line
            if($request->vest_status == 1)
            {
              if($request->style != null)
              {
                $not_unique_vests = Shirt_Button::where('style',$request->style)->paginate(6);
              }
              else
              {
                $not_unique_vests = Shirt_Button::paginate(6);
              }
            }
            else
            {
              $not_unique_vests = null;
            }
            //end pant data for infinite scroll line 1123 to line
            $site_url = url('');
            $vest_articles = '';
            $pant_articles = '';
            $jacket_articles = '';
            $texture_articles = '';
            $style_articles = '';
            $public_path_vest = $site_url . '/assets/images/customize/shirt_button/';
            $public_path_pant = $site_url . '/assets/images/customize/pant/';
            $public_path_jacket = $site_url . '/assets/images/customize/top/';
            $public_path_texture = $site_url . '/assets/images/categories/texture/';
            $public_path_style = $site_url . '/assets/images/categories/style/';
    
    
            if ($request->ajax()) {
              logger("Texture-ID====".$request->texture_id);
              if($request->jacket_status == 0 && $request->pant_status == 0 && $request->vest_status == 0)
              {
                foreach ($Grands as $grand) {
    
                    logger("texture infinite scrolllllllllllllll");
                      $texture_articles .= '
    
                      <div class="mb-3 mb-md-0">
                      <div class="radio-group fabric-group">';
                      if($grand->id == $request->texture_id)
                      {
                        $texture_articles .='
                        <input type="radio" name="FABRIC" value="" id="texture_check_'.$grand->id.'" class="form-check-input" checked/>';
                      }
                      else
                      {
                        $texture_articles .='
                        <input type="radio" name="FABRIC" value="" id="texture_check_'.$grand->id.'" class="form-check-input"/>';
                      }
    
                      $texture_articles .='
    
                        <div class="cursor-pointer" data-bs-toggle="modal"
                             data-bs-target="#myFabric' . $grand->id .'" onclick="get_texture_swiper(' . $grand->id . ')">
                          <div class="img-container mb-1">
                            <img src="' . $public_path_texture . $grand->photo_one . '"
                                 alt="" class="img-responsive">
                          </div>
                          <p class="mb-2 small-text fabric-text">' .
                      $grand->name
                      . '</p>
                          <p class="text-gold">$ ' . $grand->price . '</p>
                        </div>
                      </div>
                      </div>
                      ';
                }
                return response()->json(['res' => $texture_articles, 'page_no' => 8]);
              }
              if($request->jacket_status == 0 && $request->pant_status == 1 && $request->vest_status == 0)
              {
                foreach($not_unique_pants as $pant)
                {
                    $pant_articles .= '
                    <label class="row cursor-pointer mb-5" for="choose_pant'.$pant->id.'">
                          <span class="col-md-6 mb-2 d-flex flex-column justify-content-center">
                            <span class="row g-0 mb-2">
                              <span class="col-1 mt-1">
                                 <input type="radio" name="pant" id="choose_pant'.$pant->id.'" value="'.$pant->id.'"
                                        class="form-check-input me-2 mb-1" onclick="getpant('.$pant->id.','.$pant->price.')"/>
                              </span>
                              <span class="col-11 ps-2">
                                <span class="title">'.$pant->color.'</span>
                              </span>
                            </span>
                            <span class=" d-block more">
                            $'.$pant->price.'
                            </span>
                            <span class="d-block more">
                            '.$pant->description.'
                            </span>
                          </span>
                      <span class="col-12 col-md-6 jacket">
                          <span class="fit-img-container">
                            <img src="'.$public_path_pant.$pant->photo_one.'" alt="" class="">
                          </span>
                        </span>
                    </label>
                    ';
                }
                return response()->json(['res' => $pant_articles, 'page_no' => 8]);
              }
              if($request->jacket_status == 0 && $request->pant_status == 0 && $request->vest_status == 1)
              {
                  foreach($not_unique_vests as $vest)
                  {
                    $vest_articles.='
                    <label class="row cursor-pointer mb-5" for="sb1">
                          <span class="col-md-6 mb-2 d-flex flex-column justify-content-center">
                            <span class="row g-0 mb-2">
                              <span class="col-1 mt-1">
                                 <input type="radio" name="vest" id="choose_vest'.$vest->id.'" value="'.$vest->id.'"
                                        class="form-check-input me-2 mb-1" onclick="getvest('.$vest->id.','.$vest->price.')"/>
                              </span>
                              <span class="col-11 ps-2">
                                <span class="title">'.$vest->color.'</span>
                              </span>
                            </span>
                            <span class=" d-block more">
                            $'.$vest->price.'
                            </span>
                            <span class="text-white-50 d-block">
                            '.$vest->description.'
                            </span>
                          </span>
                      <span class="col-12 col-md-6 jacket">
                          <span class="fit-img-container">
                            <img src="'.$public_path_vest.$vest->photo_one.'" alt="" class="">
                          </span>
                        </span>
                    </label>
                    ';
                  }
                  return response()->json(['res' => $vest_articles, 'page_no' => 8]);
    
              }
              if($request->jacket_status == 1 && $request->pant_status == 0 && $request->vest_status == 0)
              {
                logger("jacketkkkkkkkkkkkkkkkkkkkkkkkkkk");
                foreach($not_unique_tops as $top)
                {
                  $jacket_articles .='
                  <label class="row cursor-pointer mb-5" for="choose_jacket'.$top->id.'">
                        <span class="col-md-6 mb-2 d-flex flex-column justify-content-center">
                          <span class="row g-0 mb-2">
                            <span class="col-1 mt-1">
                              <input type="radio" name="jacket" id="choose_jacket'.$top->id.'" value="'.$top->id.'"
                                      class="form-check-input me-2 mb-1" onclick="getjacket('.$top->id.','.$top->price.')"/>
                            </span>
                            <span class="col-11 ps-2">
                              <span class="title">'.$top->color.'</span>
                            </span>
                          </span>
                          <span class=" d-block more">
                          $'.$top->price.'
                          </span>
                          <span class=" d-block more">
                          '.$top->description.'
                          </span>
                        </span>
                    <span class="col-12 col-md-6 jacket">
                        <span class="">
                          <img src="'.$public_path_jacket.$top->photo_one.'" alt="" class="">
                        </span>
                      </span>
                  </label>
                  ';
                }
                return response()->json(['res' => $jacket_articles, 'page_no' => 8]);
              }
    
                // dd($artcles);
            }
    
            $user = Session::get('user_id');
            logger("USER ID =================".$user);
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
            logger("Upper-----------------------------".$upper);
            logger("lower-----------------------------".$lower);
            $tops = Top::all()->unique('style');
    
            $vests = Shirt_Button::all()->unique('style');
    
            $pants = Pant::all()->unique('style');
    
            $top_cates = CustomizeCategory::all();
            $jacket_buttons = Jacket_button::all();
            // return view('frontend.choose-fabric', compact('upper','lower','user','Grands', 'textures', 'subs','colors', 'patterns', 'favs', 'carts','packages')
        //end scroll controller
        // dd($lower);
    
        // dd($style_cates);
            $additionals = Additional::orderBy('popular_count','desc')->limit(4)->get();
        // dd($additionals);
        $grand_textures = Texture::all();
        $shippings = Shipping::all();
        $temporary_id = Session::get('has_step');
        $temporary = TemporaryCustomizeStep::find($temporary_id);
        // dd($temporary);
        // dd($shippings);
        // dd($upper);
        // dd($user_info);
        // dd($user);
        return view('frontend.customize',compact('temporary','jacket_customize_cate','vest_customize_cate','pant_customize_cate','suit_customize_cate','shippings','grand_textures','additionals','not_unique_pants','pants','not_unique_vests','vests','not_unique_tops','jacket_buttons','top_cates','tops','styles','style_cates','favs','carts','packages','customize_cates','user','user_info','upper','lower','Grands', 'textures', 'subs','colors', 'patterns'));
    }
}
