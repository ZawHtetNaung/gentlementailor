<?php

namespace App\Http\Controllers\Frontend;

use App\Top;
use App\Pant;
use App\User;
use App\Color;
use App\Style;
use App\Banner;
use App\Package;
use App\Texture;
use App\Category;
use App\AddToCart;
use App\Favourite;
use App\Additional;
use App\Pant_pleat;
use App\Vest_lapel;
use App\MainTexture;
use App\Testimonial;
use App\Shirt_Button;
use App\FabricPattern;
use App\Jacket_button;
use App\MainAdditional;
use App\LowerMeasurement;
use App\UpperMeasurement;
use App\TextureSubCategory;
use Illuminate\Http\Request;
use App\AdditionalSubCategory;
use App\CustomizeCategory;
use App\ReadyToWear;
use App\Style_Category;
// use Illuminate\Support\Facades\Paginator;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;


class FrontendController extends Controller
{
  //
  public function get_index_page(Request $request)
  {
    $banners = Banner::all();

    $category = Category::all();
    $testimonials = Testimonial::all();
    $packages = Package::all();
    // dd(Session::get('user_id'));
    $favs = Favourite::where('user_id', Session::get('user_id'))->get();
    $carts = AddToCart::where('user_id', Session::get('user_id'))->get();

    // dd($favs);
    return view('frontend.index', compact('packages','banners', 'category', 'testimonials', 'favs', 'carts'));
  }

  public function show_fabrics(Request $request)
  {
    $mains = MainTexture::all();
    $subs = TextureSubCategory::all();
    $favs = Favourite::where('user_id', Session::get('user_id'))->get();
    $grands_all = Texture::all(); // $grands = Texture::orderBy('name')->get();
    logger($request->all());
    if ($request->grand_id == null && $request->filter_key == null && $request->mobile == null) {
      $grands = Texture::orderBy('popular_count', 'desc')->paginate(6);
      // logger("null");
    } elseif ($request->grand_id != null && $request->filter_key == null && $request->mobile == null) {
      $grands = Texture::where('sub_category_id', $request->grand_id)->paginate(6);
      // logger($grands);
      // logger("no null");
      // logger(count($grands));
    } elseif ($request->grand_id == null && $request->filter_key != null && $request->mobile == null) {
      // logger("filterrrr");
      if ($request->filter_key == 0) {
        $grands = Texture::orderBy('popular_count', 'desc')->paginate(6);
        // logger($grands);
        // logger("popular");
        // logger(count($grands));
      }
      if ($request->filter_key == 1) {
        $grands = Texture::latest()->paginate(6);
        // logger($grands);
        // logger("latest");
        // logger(count($grands));
      } elseif ($request->filter_key == 2) {
        $grands = Texture::where('price', '<', 300)->paginate(6);
        // logger($grands);
        // logger("lowest");
        // logger(count($grands));
      } elseif ($request->filter_key == 5) {
        $grands = Texture::where('price', '>', 300)->paginate(6);

      } elseif ($request->filter_key == 3) {
        $grands = Texture::where('warm_rating', '!=', '0')->paginate(6);
      } elseif ($request->filter_key == 4) {
        $grands = Texture::where('cool_rating', '!=', '0')->paginate(6);
      }
    } elseif ($request->grand_id != null && $request->filter_key != null && $request->mobile == null) {
      // logger("lastlastall");
      if ($request->filter_key == 0) {
        $grands = Texture::where('sub_category_id', $request->grand_id)->orderBy('popular_count', 'desc')->paginate(6);

      } elseif ($request->filter_key == 1) {
        $grands = Texture::where('sub_category_id', $request->grand_id)->latest()->paginate(6);

      } elseif ($request->filter_key == 2) {
        $grands = Texture::where('sub_category_id', $request->grand_id)->where('price', '<', 300)->paginate(6);

      } elseif ($request->filter_key == 5) {
        $grands = Texture::where('sub_category_id', $request->grand_id)->where('price', '>', 300)->paginate(6);

      } elseif ($request->filter_key == 3) {
        $grands = Texture::where('sub_category_id', $request->grand_id)->where('warm_rating', '!=', '0')->paginate(6);

      } elseif ($request->filter_key == 4) {
        $grands = Texture::where('sub_category_id', $request->grand_id)->where('cool_rating', '!=', '0')->paginate(6);

      }
    } elseif ($request->grand_id != null && $request->filter_key != null && $request->mobile != null) {
      // logger("lastlastall_mobile");
      if ($request->filter_key == 0) {
        $grands = Texture::where('sub_category_id', $request->grand_id)->orderBy('popular_count', 'desc')->paginate(6);

      } elseif ($request->filter_key == 1) {
        $grands = Texture::where('sub_category_id', $request->grand_id)->latest()->paginate(6);

      } elseif ($request->filter_key == 2) {
        $grands = Texture::where('sub_category_id', $request->grand_id)->where('price', '<', 300)->paginate(6);

      } elseif ($request->filter_key == 5) {
        $grands = Texture::where('sub_category_id', $request->grand_id)->where('price', '>', 300)->paginate(6);

      } elseif ($request->filter_key == 3) {
        $grands = Texture::where('sub_category_id', $request->grand_id)->where('warm_rating', '!=', '0')->paginate(6);

      } elseif ($request->filter_key == 4) {
        $grands = Texture::where('sub_category_id', $request->grand_id)->where('cool_rating', '!=', '0')->paginate(6);

      }
    }
    $articles = '';
    $public_path = '\/assets/images/categories/texture/';
    if ($request->ajax()) {
      logger("work");
      $gr = json_decode($grands);
      // $current_page = 7;
      if ($grands->isEmpty()) {
        // logger("Current Page = ".$grands->currentPage());
        $current_page = 7;

      } else {
        $current_page = null;
      }
      // if(count($grands) != 0)
      // {
      // dd($request->grand_id);
      foreach ($grands as $grand) {
        logger($grand);
        $articles .= '
                <div class="col-6 col-lg-4 mb-5 text-uppercase cursor-pointer text-center
                card bg-transparent border border-0"
                data-bs-toggle="modal"' . ' data-bs-target="#myCategory' . $grand->id . '"' . ' id="#myCategory' . $grand->id . '" onclick="increase_count(' . $grand->id . ')">
                    <img src="' . $public_path . $grand->photo_one . '" alt="" class="card-img-top">
                    <div class="card-body">
                    <p class="mt-3 mb-2 small-text fabric-text">' .
          $grand->name . '</p>
                    </div>
                    <div class="d-flex justify-content-evenly card-footer">
                        <p class="small-text text-gold">$' . $grand->price . '</p>

                    </div>
                </div>
                ';
      }
      // logger("return = ".$articles);
      logger("Current Page is" . $current_page);
      return response()->json(['res' => $articles, 'page_no' => $current_page]);
      // return $articles;
    }

    // }
    $carts = AddToCart::where('user_id', Session::get('user_id'))->get();

    // dd($subs);
    return view('frontend.fabric', compact('mains', 'subs', 'grands', 'favs', 'carts', 'grands_all'));
  }

  public function get_grand_data(Request $request)
  {
    $grands = Texture::where('sub_category_id', $request->grand_id)->get();
    return response()->json([
      'grands' => $grands,
    ]);
  }

  public function get_filter_grand_data(Request $request)
  {
    logger($request->all());
    if ($request->filter_id == 0) {
      $grands = Texture::orderBy('popular_count', 'desc')->get();

    }
    if ($request->filter_id == 1) {
      $grands = Texture::latest()->get();

    } elseif ($request->filter_id == 2) {
      $grands = Texture::where('price', '<', 300)->get();

    } elseif ($request->filter_id == 5) {
      $grands = Texture::where('price', '>', 300)->get();

    } elseif ($request->filter_id == 3) {
      $grands = Texture::where('warm_rating', '!=', '0')->get();
    } elseif ($request->filter_id == 4) {
      $grands = Texture::where('cool_rating', '!=', '0')->get();
    }
    logger($grands);
    return response()->json([
      'grands' => $grands,
    ]);
  }

  public function get_filter_grand_key_data(Request $request)
  {
    logger($request->all());
    if ($request->filter_id == 0) {
      $grands = Texture::where('sub_category_id', $request->grand_id)->orderBy('popular_count', 'desc')->get();

    } elseif ($request->filter_id == 1) {
      $grands = Texture::where('sub_category_id', $request->grand_id)->latest()->get();

    } elseif ($request->filter_id == 2) {
      $grands = Texture::where('sub_category_id', $request->grand_id)->where('price', '<', 300)->get();

    } elseif ($request->filter_id == 5) {
      $grands = Texture::where('sub_category_id', $request->grand_id)->where('price', '>', 300)->get();

    } elseif ($request->filter_id == 3) {
      $grands = Texture::where('sub_category_id', $request->grand_id)->where('warm_rating', '!=', '0')->get();

    } elseif ($request->filter_id == 4) {
      $grands = Texture::where('sub_category_id', $request->grand_id)->where('cool_rating', '!=', '0')->get();

    }
    logger($grands);
    return response()->json([
      'grands' => $grands,
    ]);
  }

  public function show_additional(Request $request)
  {
    $site_url = url('');
    logger($request->all());
    $mains = MainAdditional::all();
    $subs = AdditionalSubCategory::all();
    $grands_all = Additional::all();
    $favs = Favourite::where('user_id', Session::get('user_id'))->get();
    $carts = AddToCart::where('user_id', Session::get('user_id'))->get();

    if ($request->grand_id == null && $request->filter_key == null && $request->mobile == null) {
      $grands = Additional::orderBy('popular_count', 'desc')->paginate(6);
      logger("null");
    } elseif ($request->grand_id != null && $request->filter_key == null && $request->mobile == null) {
      $grands = Additional::where('sub_category_id', $request->grand_id)->paginate(6);

    } elseif ($request->grand_id == null && $request->filter_key != null && $request->mobile == null) {
      logger("filterrrr");
      if ($request->filter_key == 0) {
        $grands = Additional::orderBy('popular_count', 'desc')->paginate(6);

      }
      if ($request->filter_key == 1) {
        $grands = Additional::latest()->paginate(6);

      } elseif ($request->filter_key == 2) {
        logger("low to high");
        $grands = Additional::orderBy('price', 'asc')->paginate(6);

      } elseif ($request->filter_key == 3) {
        $grands = Additional::orderBy('price', 'desc')->paginate(6);

      }
    } elseif ($request->grand_id != null && $request->filter_key != null && $request->mobile == null) {
      logger("lastlastall");
      if ($request->filter_key == 0) {
        $grands = Additional::where('sub_category_id', $request->grand_id)->orderBy('popular_count', 'desc')->paginate(6);

      } elseif ($request->filter_key == 1) {
        $grands = Additional::where('sub_category_id', $request->grand_id)->latest()->paginate(6);

      } elseif ($request->filter_key == 2) {
        $grands = Additional::where('sub_category_id', $request->grand_id)->orderBy('price', 'asc')->paginate(6);

      } elseif ($request->filter_key == 3) {
        $grands = Additional::where('sub_category_id', $request->grand_id)->orderBy('price', 'desc')->paginate(6);

      }
    } elseif ($request->grand_id != null && $request->filter_key != null && $request->mobile != null) {
      logger("lastlastall_mobile");
      if ($request->filter_key == 0) {
        $grands = Additional::where('sub_category_id', $request->grand_id)->orderBy('popular_count', 'desc')->paginate(6);

      } elseif ($request->filter_key == 1) {
        $grands = Additional::where('sub_category_id', $request->grand_id)->latest()->paginate(6);

      } elseif ($request->filter_key == 2) {
        $grands = Additional::where('sub_category_id', $request->grand_id)->orderBy('price', 'asc')->paginate(6);

      } elseif ($request->filter_key == 3) {
        $grands = Additional::where('sub_category_id', $request->grand_id)->orderBy('price', 'desc')->paginate(6);

      }
    }
    $articles = '';
    $public_path = $site_url . '/assets/images/categories/additional/';
    if ($request->ajax()) {
      logger("work");
      logger($grands);
      foreach ($grands as $grand) {
        $articles .= '
                <div class="col-6 col-lg-4 mb-0">
                    <div class="text-uppercase cursor-pointer text-center"
                        data-bs-toggle="modal"
                        ' . ' data-bs-target="#myCategory' . $grand->id . '"' . ' id="#myCategory' . $grand->id . '"
                        onclick="increase_count(' . $grand->id . ')" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-once="true">
                      <div class="img-container mb-1">
                          <img src="' . $public_path . $grand->photo_one . '"
                              alt="" class="img-responsive">
                      </div>
                      <p class="mt-3 mb-2 small-text fabric-text text-center ff-cinzel">' .
                              $grand->name . '</p>
                      <p class="text-gold">$ ' . $grand->price . '</p>
                    </div>
                </div>
                ';
      }
      return response()->json(['res' => $articles, 'page_no' => 10]);

    }
    return view('frontend.additional', compact('mains', 'subs', 'grands', 'favs', 'carts', 'grands_all'));
    // return view('frontend.additional',compact('mains','subs','grands','grands_first_search_key'));
  }

  public function get_grand_add_data(Request $request)
  {
    $grands = Additional::where('sub_category_id', $request->grand_id)->get();
    return response()->json([
      'grands' => $grands,
    ]);
  }

  public function get_filter_grand_add_data(Request $request)
  {
    if ($request->filter_id == 0) {
      $grands = Additional::orderBy('popular_count', 'desc')->get();

    } elseif ($request->filter_id == 1) {
      $grands = Additional::latest()->get();

    } elseif ($request->filter_id == 2) {
      $grands = Additional::where('price', '<', 300)->get();

    } elseif ($request->filter_id == 3) {
      $grands = Additional::where('price', '>', 300)->get();

    }
    logger($grands);
    return response()->json([
      'grands' => $grands,
    ]);
  }

  public function get_filter_grand_key_add_data(Request $request)
  {
    logger($request->all());
    if ($request->filter_id == 0) {
      $grands = Additional::where('sub_category_id', $request->grand_id)->orderBy('popular_count', 'desc')->get();

    }
    if ($request->filter_id == 1) {
      $grands = Additional::where('sub_category_id', $request->grand_id)->latest()->get();

    } elseif ($request->filter_id == 2) {
      $grands = Additional::where('sub_category_id', $request->grand_id)->where('price', '<', 300)->get();

    } elseif ($request->filter_id == 3) {
      $grands = Additional::where('sub_category_id', $request->grand_id)->where('price', '>', 300)->get();

    }
    logger($grands);
    return response()->json([
      'grands' => $grands,
    ]);
  }

  public function get_grand_all_data()
  {
    $grands = Texture::orderBy('name')->get();
    return response()->json([
      'grands' => $grands,
    ]);
  }

  public function add_favourite_grand(Request $request)
  {
    // dd($request->grand_id);
    $user_id = Session::get('user_id');
    // dd($user_id);
    $favourite = Favourite::create([
      'user_id' => $user_id,
      'fav_status' => $request->status,
      'grand_id' => $request->grand_id,
    ]);
    $favs = Favourite::where('user_id', $user_id)->get();
    $qty = count($favs);
    return response()->json([
      'qty' => $qty,
    ]);
  }

  public function show_choose_fabrics(Request $request)
  {
    $textures = MainTexture::all();
    $subs = TextureSubCategory::all();
    $patterns = FabricPattern::all();
    $colors = Color::all();

    $favs = Favourite::where('user_id', Session::get('user_id'))->get();
    $carts = AddToCart::where('user_id', Session::get('user_id'))->get();
    if ($request->colors == null && $request->types == null && $request->patterns == null && $request->prices == null) {
      $Grands = Texture::orderBy('popular_count', 'desc')->paginate(6);
    } else {
      //start advence filter
      $grands = Texture::all();
      $start_grands_result = [];
      $last_grands_result = [];
      $connect_arr = [];
      $last_last_grands_result = [];
      //start one filter with not price
      if ($request->colors != null && $request->types == null && $request->patterns == null && $request->prices == null) {
        //only color
        for ($i = 0; $i < count($request->colors); $i++) {
          $grands = Texture::where('color_id', $request->colors[$i])->paginate(6);
          // logger($grands);
          array_push($start_grands_result, $grands);
        }
        //last result
        for ($i = 0; $i < count($start_grands_result); $i++) {
          foreach ($start_grands_result[$i] as $rg) {
            array_push($last_grands_result, $rg);
          }
        }
      } elseif ($request->colors == null && $request->types != null && $request->patterns == null && $request->prices == null) {
        //only types
        for ($i = 0; $i < count($request->types); $i++) {
          $grands = Texture::where('main_texture_id', $request->types[$i])->paginate(6);
          // logger($grands);
          array_push($start_grands_result, $grands);
        }
        //last result
        for ($i = 0; $i < count($start_grands_result); $i++) {
          foreach ($start_grands_result[$i] as $rg) {
            array_push($last_grands_result, $rg);
          }
        }
      } elseif ($request->colors == null && $request->types == null && $request->patterns != null && $request->prices == null) {
        //only patterns
        for ($i = 0; $i < count($request->patterns); $i++) {
          $grands = Texture::where('pattern_id', $request->patterns[$i])->paginate(6);
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
      //end one filter with not price
      //start one filter with price
      if ($request->colors != null && $request->types == null && $request->patterns == null && $request->prices != null) {
        //only color
        logger("color with price");
        for ($i = 0; $i < count($request->colors); $i++) {
          if (count($request->prices) == 1) {
            if ($request->prices[0] == 0) {
              logger("color with low");
              $grands = Texture::where('color_id', $request->colors[$i])->orderBy('price', 'asc')->paginate(6);
              array_push($start_grands_result, $grands);
            } elseif ($request->prices[0] == 1) {
              logger("color with high");
              $grands = Texture::where('color_id', $request->colors[$i])->orderBy('price', 'desc')->paginate(6);
              array_push($start_grands_result, $grands);
            }
          }
          // logger($grands);

        }
        //last result
        for ($i = 0; $i < count($start_grands_result); $i++) {
          foreach ($start_grands_result[$i] as $rg) {
            logger("Price Order By");
            logger($rg->price);
            array_push($last_grands_result, $rg);
          }
        }
        if ($request->prices[0] == 0) {
          array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
        } else {
          array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
        }
      } elseif ($request->colors == null && $request->types != null && $request->patterns == null && $request->prices != null) {
        //only types
        for ($i = 0; $i < count($request->types); $i++) {
          if (count($request->prices) == 1) {
            if ($request->prices[0] == 0) {
              $grands = Texture::where('main_texture_id', $request->types[$i])->orderBy('price', 'asc')->paginate(6);
            } elseif ($request->prices[0] == 1) {
              $grands = Texture::where('main_texture_id', $request->types[$i])->orderBy('price', 'desc')->paginate(6);
            }
          }
          // $grands = Texture::where('main_texture_id',$request->types[$i])->paginate(6);
          // logger($grands);
          array_push($start_grands_result, $grands);
        }
        //last result
        for ($i = 0; $i < count($start_grands_result); $i++) {
          foreach ($start_grands_result[$i] as $rg) {
            array_push($last_grands_result, $rg);
          }
        }
        if ($request->prices[0] == 0) {
          array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
        } else {
          array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
        }
      } elseif ($request->colors == null && $request->types == null && $request->patterns != null && $request->prices != null) {
        //only patterns
        for ($i = 0; $i < count($request->patterns); $i++) {
          if (count($request->prices) == 1) {
            if ($request->prices[0] == 0) {
              $grands = Texture::where('pattern_id', $request->patterns[$i])->orderBy('price', 'asc')->paginate(6);
            } elseif ($request->prices[0] == 1) {
              $grands = Texture::where('pattern_id', $request->patterns[$i])->orderBy('price', 'desc')->paginate(6);
            }
          }
          // $grands = Texture::where('pattern_id',$request->patterns[$i])->paginate(6);
          // logger($grands);
          array_push($start_grands_result, $grands);
        }
        //last result
        for ($i = 0; $i < count($start_grands_result); $i++) {
          foreach ($start_grands_result[$i] as $rg) {
            array_push($last_grands_result, $rg);
          }
        }
        if ($request->prices[0] == 0) {
          array_multisort(array_column($last_grands_result, 'price'), SORT_ASC, $last_grands_result);
        } else {
          array_multisort(array_column($last_grands_result, 'price'), SORT_DESC, $last_grands_result);
        }
      }
      //end one filter with price
      //start two filter with not price
      if ($request->colors != null && $request->types != null && $request->patterns == null && $request->prices == null) {
        //color and type
        $types = [];
        $colors = [];
        if (count($request->colors) > count($request->types)) {
          $type_count = count($request->types);
          for ($m = 0; $m < count($request->types); $m++) {
            array_push($types, $request->types[$m]);
          }
          for ($k = 0; $k < count($request->colors) - $type_count; $k++) {
            array_push($types, 0);
          }
          for ($i = 0, $j = 1; $i < count($request->colors), $j < count($request->colors); $i++, $j++) {
            $last_grands_result = Texture::orwhere('color_id', $request->colors[$i])->where('main_texture_id', $types[$i])
              ->orwhere('color_id', $request->colors[$i])->where('main_texture_id', $types[$j])
              ->orwhere('color_id', $request->colors[$j])->where('main_texture_id', $types[$i])
              ->orwhere('color_id', $request->colors[$j])->where('main_texture_id', $types[$j])
              ->paginate(6);
          }
        } elseif (count($request->types) > count($request->colors)) {
          $color_count = count($request->colors);
          for ($m = 0; $m < count($request->colors); $m++) {
            array_push($colors, $request->colors[$m]);
          }
          for ($k = 0; $k < count($request->types) - $color_count; $k++) {
            array_push($colors, 0);
          }
          for ($i = 0, $j = 1; $i < count($request->types), $j < count($request->types); $i++, $j++) {
            $last_grands_result = Texture::orwhere('color_id', $colors[$i])->where('main_texture_id', $request->types[$i])
              ->orwhere('color_id', $colors[$i])->where('main_texture_id', $request->types[$j])
              ->orwhere('color_id', $colors[$j])->where('main_texture_id', $request->types[$i])
              ->orwhere('color_id', $colors[$j])->where('main_texture_id', $request->types[$j])
              ->paginate(6);
          }
        } elseif (count($request->colors) == 1 && count($request->types) == 1) {
          $last_grands_result = Texture::where('color_id', $request->colors[0])->where('main_texture_id', $request->types[0])
            ->paginate(6);
        } else {
          for ($i = 0, $j = 1; $i < count($request->colors), $j < count($request->colors); $i++, $j++) {
            $last_grands_result = Texture::orwhere('color_id', $request->colors[$i])->where('main_texture_id', $request->types[$i])
              ->orwhere('color_id', $request->colors[$i])->where('main_texture_id', $request->types[$j])
              ->orwhere('color_id', $request->colors[$j])->where('main_texture_id', $request->types[$i])
              ->orwhere('color_id', $request->colors[$j])->where('main_texture_id', $request->types[$j])
              ->paginate(6);
          }
        }

      } elseif ($request->colors != null && $request->types == null && $request->patterns != null && $request->prices == null) {
        //color and pattern
        $patterns = [];
        $colors = [];
        if (count($request->colors) > count($request->patterns)) {
          $pattern_count = count($request->patterns);
          for ($m = 0; $m < count($request->patterns); $m++) {
            array_push($patterns, $request->patterns[$m]);
          }
          for ($k = 0; $k < count($request->colors) - $pattern_count; $k++) {
            array_push($patterns, 0);
          }
          for ($i = 0, $j = 1; $i < count($request->colors), $j < count($request->colors); $i++, $j++) {
            $last_grands_result = Texture::orwhere('color_id', $request->colors[$i])->where('pattern_id', $patterns[$i])
              ->orwhere('color_id', $request->colors[$i])->where('pattern_id', $patterns[$j])
              ->orwhere('color_id', $request->colors[$j])->where('pattern_id', $patterns[$i])
              ->orwhere('color_id', $request->colors[$j])->where('pattern_id', $patterns[$j])
              ->paginate(6);
          }
        } elseif (count($request->patterns) > count($request->colors)) {
          $color_count = count($request->colors);
          for ($m = 0; $m < count($request->colors); $m++) {
            array_push($colors, $request->colors[$m]);
          }
          for ($k = 0; $k < count($request->patterns) - $color_count; $k++) {
            array_push($colors, 0);
          }
          for ($i = 0, $j = 1; $i < count($request->patterns), $j < count($request->patterns); $i++, $j++) {
            $last_grands_result = Texture::orwhere('color_id', $colors[$i])->where('pattern_id', $request->patterns[$i])
              ->orwhere('color_id', $colors[$i])->where('pattern_id', $request->patterns[$j])
              ->orwhere('color_id', $colors[$j])->where('pattern_id', $request->patterns[$i])
              ->orwhere('color_id', $colors[$j])->where('pattern_id', $request->patterns[$j])
              ->paginate(6);
          }
        } elseif (count($request->colors) == 1 && count($request->patterns) == 1) {
          $last_grands_result = Texture::where('color_id', $request->colors[0])->where('pattern_id', $request->patterns[0])
            ->paginate(6);
        } else {
          for ($i = 0, $j = 1; $i < count($request->colors), $j < count($request->colors); $i++, $j++) {
            $last_grands_result = Texture::orwhere('color_id', $request->colors[$i])->where('pattern_id', $request->patterns[$i])
              ->orwhere('color_id', $request->colors[$i])->where('pattern_id', $request->patterns[$j])
              ->orwhere('color_id', $request->colors[$j])->where('pattern_id', $request->patterns[$i])
              ->orwhere('color_id', $request->colors[$j])->where('pattern_id', $request->patterns[$j])
              ->paginate(6);
          }
        }
      } elseif ($request->colors == null && $request->types != null && $request->patterns != null && $request->prices == null) {
        //type and pattern
        $patterns = [];
        $types = [];
        if (count($request->types) > count($request->patterns)) {
          $pattern_count = count($request->patterns);
          for ($m = 0; $m < count($request->patterns); $m++) {
            array_push($patterns, $request->patterns[$m]);
          }
          for ($k = 0; $k < count($request->types) - $pattern_count; $k++) {
            array_push($patterns, 0);
          }
          for ($i = 0, $j = 1; $i < count($request->types), $j < count($request->types); $i++, $j++) {
            $last_grands_result = Texture::orwhere('main_texture_id', $request->types[$i])->where('pattern_id', $patterns[$i])
              ->orwhere('main_texture_id', $request->types[$i])->where('pattern_id', $patterns[$j])
              ->orwhere('main_texture_id', $request->types[$j])->where('pattern_id', $patterns[$i])
              ->orwhere('main_texture_id', $request->types[$j])->where('pattern_id', $patterns[$j])
              ->paginate(6);
          }
        } elseif (count($request->patterns) > count($request->types)) {
          $type_count = count($request->types);
          for ($m = 0; $m < count($request->types); $m++) {
            array_push($types, $request->types[$m]);
          }
          for ($k = 0; $k < count($request->patterns) - $type_count; $k++) {
            array_push($types, 0);
          }
          for ($i = 0, $j = 1; $i < count($request->patterns), $j < count($request->patterns); $i++, $j++) {
            $last_grands_result = Texture::orwhere('main_texture_id', $types[$i])->where('pattern_id', $request->patterns[$i])
              ->orwhere('main_texture_id', $types[$i])->where('pattern_id', $request->patterns[$j])
              ->orwhere('main_texture_id', $types[$j])->where('pattern_id', $request->patterns[$i])
              ->orwhere('main_texture_id', $types[$j])->where('pattern_id', $request->patterns[$j])
              ->paginate(6);
          }
        } elseif (count($request->types) == 1 && count($request->patterns) == 1) {
          $last_grands_result = Texture::where('main_texture_id', $request->types[0])->where('pattern_id', $request->patterns[0])
            ->paginate(6);
        } else {
          for ($i = 0, $j = 1; $i < count($request->types), $j < count($request->types); $i++, $j++) {
            $last_grands_result = Texture::orwhere('main_texture_id', $request->types[$i])->where('pattern_id', $request->patterns[$i])
              ->orwhere('main_texture_id', $request->types[$i])->where('pattern_id', $request->patterns[$j])
              ->orwhere('main_texture_id', $request->types[$j])->where('pattern_id', $request->patterns[$i])
              ->orwhere('main_texture_id', $request->types[$j])->where('pattern_id', $request->patterns[$j])
              ->paginate(6);
          }
        }
      }
      //end two filter with not price
      //start two filter with price
      if ($request->colors != null && $request->types != null && $request->patterns == null && $request->prices != null) {
        //color and type
        $types = [];
        $colors = [];
        if (count($request->colors) > count($request->types)) {
          $type_count = count($request->types);
          for ($m = 0; $m < count($request->types); $m++) {
            array_push($types, $request->types[$m]);
          }
          for ($k = 0; $k < count($request->colors) - $type_count; $k++) {
            array_push($types, 0);
          }
          for ($i = 0, $j = 1; $i < count($request->colors), $j < count($request->colors); $i++, $j++) {
            if ($request->prices[0] == 0) {
              $last_grands_result = Texture::orwhere('color_id', $request->colors[$i])->where('main_texture_id', $types[$i])
                ->orwhere('color_id', $request->colors[$i])->where('main_texture_id', $types[$j])
                ->orwhere('color_id', $request->colors[$j])->where('main_texture_id', $types[$i])
                ->orwhere('color_id', $request->colors[$j])->where('main_texture_id', $types[$j])
                ->orderBy('price', 'asc')
                ->paginate(6);
            } elseif ($request->prices[0] == 1) {
              $last_grands_result = Texture::orwhere('color_id', $request->colors[$i])->where('main_texture_id', $types[$i])
                ->orwhere('color_id', $request->colors[$i])->where('main_texture_id', $types[$j])
                ->orwhere('color_id', $request->colors[$j])->where('main_texture_id', $types[$i])
                ->orwhere('color_id', $request->colors[$j])->where('main_texture_id', $types[$j])
                ->orderBy('price', 'desc')
                ->paginate(6);
            }

          }
        } elseif (count($request->types) > count($request->colors)) {
          $color_count = count($request->colors);
          for ($m = 0; $m < count($request->colors); $m++) {
            array_push($colors, $request->colors[$m]);
          }
          for ($k = 0; $k < count($request->types) - $color_count; $k++) {
            array_push($colors, 0);
          }
          for ($i = 0, $j = 1; $i < count($request->types), $j < count($request->types); $i++, $j++) {
            if ($request->prices[0] == 0) {
              $last_grands_result = Texture::orwhere('color_id', $colors[$i])->where('main_texture_id', $request->types[$i])
                ->orwhere('color_id', $colors[$i])->where('main_texture_id', $request->types[$j])
                ->orwhere('color_id', $colors[$j])->where('main_texture_id', $request->types[$i])
                ->orwhere('color_id', $colors[$j])->where('main_texture_id', $request->types[$j])
                ->orderBy('price', 'asc')
                ->paginate(6);
            } elseif ($request->prices[0] == 1) {
              $last_grands_result = Texture::orwhere('color_id', $colors[$i])->where('main_texture_id', $request->types[$i])
                ->orwhere('color_id', $colors[$i])->where('main_texture_id', $request->types[$j])
                ->orwhere('color_id', $colors[$j])->where('main_texture_id', $request->types[$i])
                ->orwhere('color_id', $colors[$j])->where('main_texture_id', $request->types[$j])
                ->orderBy('price', 'desc')
                ->paginate(6);
            }
          }
        } elseif (count($request->colors) == 1 && count($request->types) == 1) {
          if ($request->prices[0] == 0) {
            $last_grands_result = Texture::where('color_id', $request->colors[0])->where('main_texture_id', $request->types[0])
              ->orderBy('price', 'asc')
              ->paginate(6);
          } elseif ($request->prices[0] == 1) {
            $last_grands_result = Texture::where('color_id', $request->colors[0])->where('main_texture_id', $request->types[0])
              ->orderBy('price', 'desc')
              ->paginate(6);
          }
        } else {
          for ($i = 0, $j = 1; $i < count($request->colors), $j < count($request->colors); $i++, $j++) {
            if ($request->prices[0] == 0) {
              $last_grands_result = Texture::orwhere('color_id', $request->colors[$i])->where('main_texture_id', $request->types[$i])
                ->orwhere('color_id', $request->colors[$i])->where('main_texture_id', $request->types[$j])
                ->orwhere('color_id', $request->colors[$j])->where('main_texture_id', $request->types[$i])
                ->orwhere('color_id', $request->colors[$j])->where('main_texture_id', $request->types[$j])
                ->orderBy('price', 'asc')
                ->paginate(6);
            } elseif ($request->prices[0] == 1) {
              $last_grands_result = Texture::orwhere('color_id', $request->colors[$i])->where('main_texture_id', $request->types[$i])
                ->orwhere('color_id', $request->colors[$i])->where('main_texture_id', $request->types[$j])
                ->orwhere('color_id', $request->colors[$j])->where('main_texture_id', $request->types[$i])
                ->orwhere('color_id', $request->colors[$j])->where('main_texture_id', $request->types[$j])
                ->orderBy('price', 'desc')
                ->paginate(6);
            }
          }
        }
      } elseif ($request->colors != null && $request->types == null && $request->patterns != null && $request->prices != null) {
        //color and pattern
        $patterns = [];
        $colors = [];
        if (count($request->colors) > count($request->patterns)) {
          $pattern_count = count($request->patterns);
          for ($m = 0; $m < count($request->patterns); $m++) {
            array_push($types, $request->patterns[$m]);
          }
          for ($k = 0; $k < count($request->colors) - $pattern_count; $k++) {
            array_push($patterns, 0);
          }
          for ($i = 0, $j = 1; $i < count($request->colors), $j < count($request->colors); $i++, $j++) {
            if ($request->prices[0] == 0) {
              $last_grands_result = Texture::orwhere('color_id', $request->colors[$i])->where('pattern_id', $patterns[$i])
                ->orwhere('color_id', $request->colors[$i])->where('pattern_id', $patterns[$j])
                ->orwhere('color_id', $request->colors[$j])->where('pattern_id', $patterns[$i])
                ->orwhere('color_id', $request->colors[$j])->where('pattern_id', $patterns[$j])
                ->orderBy('price', 'asc')
                ->paginate(6);
            } elseif ($request->prices[0] == 1) {
              $last_grands_result = Texture::orwhere('color_id', $request->colors[$i])->where('pattern_id', $patterns[$i])
                ->orwhere('color_id', $request->colors[$i])->where('pattern_id', $patterns[$j])
                ->orwhere('color_id', $request->colors[$j])->where('pattern_id', $patterns[$i])
                ->orwhere('color_id', $request->colors[$j])->where('pattern_id', $patterns[$j])
                ->orderBy('price', 'desc')
                ->paginate(6);
            }

          }
        } elseif (count($request->patterns) > count($request->colors)) {
          $color_count = count($request->colors);
          for ($m = 0; $m < count($request->colors); $m++) {
            array_push($colors, $request->colors[$m]);
          }
          for ($k = 0; $k < count($request->patterns) - $color_count; $k++) {
            array_push($colors, 0);
          }
          for ($i = 0, $j = 1; $i < count($request->patterns), $j < count($request->patterns); $i++, $j++) {
            if ($request->prices[0] == 0) {
              $last_grands_result = Texture::orwhere('color_id', $colors[$i])->where('pattern_id', $request->patterns[$i])
                ->orwhere('color_id', $colors[$i])->where('pattern_id', $request->patterns[$j])
                ->orwhere('color_id', $colors[$j])->where('pattern_id', $request->patterns[$i])
                ->orwhere('color_id', $colors[$j])->where('pattern_id', $request->patterns[$j])
                ->orderBy('price', 'asc')
                ->paginate(6);
            } elseif ($request->prices[0] == 1) {
              $last_grands_result = Texture::orwhere('color_id', $colors[$i])->where('pattern_id', $request->patterns[$i])
                ->orwhere('color_id', $colors[$i])->where('pattern_id', $request->patterns[$j])
                ->orwhere('color_id', $colors[$j])->where('pattern_id', $request->patterns[$i])
                ->orwhere('color_id', $colors[$j])->where('pattern_id', $request->patterns[$j])
                ->orderBy('price', 'desc')
                ->paginate(6);
            }
          }
        } elseif (count($request->colors) == 1 && count($request->patterns) == 1) {
          if ($request->prices[0] == 0) {
            $last_grands_result = Texture::where('color_id', $request->colors[0])->where('pattern_id', $request->patterns[0])
              ->orderBy('price', 'asc')
              ->paginate(6);
          } elseif ($request->prices[0] == 1) {
            $last_grands_result = Texture::where('color_id', $request->colors[0])->where('pattern_id', $request->patterns[0])
              ->orderBy('price', 'desc')
              ->paginate(6);
          }
        } else {
          for ($i = 0, $j = 1; $i < count($request->colors), $j < count($request->colors); $i++, $j++) {
            if ($request->prices[0] == 0) {
              $last_grands_result = Texture::orwhere('color_id', $request->colors[$i])->where('pattern_id', $request->patterns[$i])
                ->orwhere('color_id', $request->colors[$i])->where('pattern_id', $request->patterns[$j])
                ->orwhere('color_id', $request->colors[$j])->where('pattern_id', $request->patterns[$i])
                ->orwhere('color_id', $request->colors[$j])->where('pattern_id', $request->patterns[$j])
                ->orderBy('price', 'asc')
                ->paginate(6);
            } elseif ($request->prices[0] == 1) {
              $last_grands_result = Texture::orwhere('color_id', $request->colors[$i])->where('pattern_id', $request->patterns[$i])
                ->orwhere('color_id', $request->colors[$i])->where('pattern_id', $request->patterns[$j])
                ->orwhere('color_id', $request->colors[$j])->where('pattern_id', $request->patterns[$i])
                ->orwhere('color_id', $request->colors[$j])->where('pattern_id', $request->patterns[$j])
                ->orderBy('price', 'desc')
                ->paginate(6);
            }
          }
        }

      } elseif ($request->colors == null && $request->types != null && $request->patterns != null && $request->prices != null) {
        //type and pattern
        $patterns = [];
        $types = [];
        if (count($request->types) > count($request->patterns)) {
          $pattern_count = count($request->patterns);
          for ($m = 0; $m < count($request->patterns); $m++) {
            array_push($patterns, $request->patterns[$m]);
          }
          for ($k = 0; $k < count($request->types) - $pattern_count; $k++) {
            array_push($patterns, 0);
          }
          for ($i = 0, $j = 1; $i < count($request->types), $j < count($request->types); $i++, $j++) {
            if ($request->prices[0] == 0) {
              $last_grands_result = Texture::orwhere('main_texture_id', $request->types[$i])->where('pattern_id', $patterns[$i])
                ->orwhere('main_texture_id', $request->types[$i])->where('pattern_id', $patterns[$j])
                ->orwhere('main_texture_id', $request->types[$j])->where('pattern_id', $patterns[$i])
                ->orwhere('main_texture_id', $request->types[$j])->where('pattern_id', $patterns[$j])
                ->orderBy('price', 'asc')
                ->paginate(6);
            } elseif ($request->prices[0] == 1) {
              $last_grands_result = Texture::orwhere('main_texture_id', $request->types[$i])->where('pattern_id', $patterns[$i])
                ->orwhere('main_texture_id', $request->types[$i])->where('pattern_id', $patterns[$j])
                ->orwhere('main_texture_id', $request->types[$j])->where('pattern_id', $patterns[$i])
                ->orwhere('main_texture_id', $request->types[$j])->where('pattern_id', $patterns[$j])
                ->orderBy('price', 'desc')
                ->paginate(6);
            }

          }
        } elseif (count($request->patterns) > count($request->types)) {
          $type_count = count($request->types);
          for ($m = 0; $m < count($request->types); $m++) {
            array_push($types, $request->types[$m]);
          }
          for ($k = 0; $k < count($request->patterns) - $type_count; $k++) {
            array_push($types, 0);
          }
          for ($i = 0, $j = 1; $i < count($request->patterns), $j < count($request->patterns); $i++, $j++) {
            if ($request->prices[0] == 0) {
              $last_grands_result = Texture::orwhere('main_texture_id', $types[$i])->where('pattern_id', $request->patterns[$i])
                ->orwhere('main_texture_id', $types[$i])->where('pattern_id', $request->patterns[$j])
                ->orwhere('main_texture_id', $types[$j])->where('pattern_id', $request->patterns[$i])
                ->orwhere('main_texture_id', $types[$j])->where('pattern_id', $request->patterns[$j])
                ->orderBy('price', 'asc')
                ->paginate(6);
            } elseif ($request->prices[0] == 1) {
              $last_grands_result = Texture::orwhere('main_texture_id', $types[$i])->where('pattern_id', $request->patterns[$i])
                ->orwhere('main_texture_id', $types[$i])->where('pattern_id', $request->patterns[$j])
                ->orwhere('main_texture_id', $types[$j])->where('pattern_id', $request->patterns[$i])
                ->orwhere('main_texture_id', $types[$j])->where('pattern_id', $request->patterns[$j])
                ->orderBy('price', 'desc')
                ->paginate(6);
            }

          }
        } elseif (count($request->types) == 1 && count($request->patterns) == 1) {
          if ($request->prices[0] == 0) {
            $last_grands_result = Texture::where('main_texture_id', $request->types[0])->where('pattern_id', $request->patterns[0])
              ->orderBy('price', 'asc')
              ->paginate(6);
          } elseif ($request->prices[0] == 1) {
            $last_grands_result = Texture::where('main_texture_id', $request->types[0])->where('pattern_id', $request->patterns[0])
              ->orderBy('price', 'desc')
              ->paginate(6);
          }
        } else {
          for ($i = 0, $j = 1; $i < count($request->types), $j < count($request->types); $i++, $j++) {
            if ($request->prices[0] == 0) {
              $last_grands_result = Texture::orwhere('main_texture_id', $request->types[$i])->where('pattern_id', $request->patterns[$i])
                ->orwhere('main_texture_id', $request->types[$i])->where('pattern_id', $request->patterns[$j])
                ->orwhere('main_texture_id', $request->types[$j])->where('pattern_id', $request->patterns[$i])
                ->orwhere('main_texture_id', $request->types[$j])->where('pattern_id', $request->patterns[$j])
                ->orderBy('price', 'asc')
                ->paginate(6);
            } elseif ($request->prices[0] == 1) {
              $last_grands_result = Texture::orwhere('main_texture_id', $request->types[$i])->where('pattern_id', $request->patterns[$i])
                ->orwhere('main_texture_id', $request->types[$i])->where('pattern_id', $request->patterns[$j])
                ->orwhere('main_texture_id', $request->types[$j])->where('pattern_id', $request->patterns[$i])
                ->orwhere('main_texture_id', $request->types[$j])->where('pattern_id', $request->patterns[$j])
                ->orderBy('price', 'desc')
                ->paginate(6);
            }

          }
        }
      }
      // end two filter with price
      //start three filter with not price
      if ($request->colors != null && $request->types != null && $request->patterns != null && $request->prices == null) {
        //color,type and pattern

        $colors = [];
        $types = [];
        $patterns = [];
        if (count($request->colors) > count($request->types) || count($request->colors) > count($request->patterns)) {
          $pattern_count = count($request->patterns);
          $type_count = count($request->types);
          for ($i = 0; $i < $type_count; $i++) {
            array_push($types, $request->types[$i]);
          }
          for ($i = 0; $i < $pattern_count; $i++) {
            array_push($patterns, $request->patterns[$i]);
          }
          for ($i = 0; $i < count($request->colors) - $pattern_count; $i++) {
            array_push($patterns, 0);
          }
          for ($i = 0; $i < count($request->colors) - $type_count; $i++) {
            array_push($types, 0);
          }
          for ($i = 0; $i < count($request->colors); $i++) {
            for ($j = 0; $j < count($request->colors); $j++) {
              for ($k = 0; $k < count($request->colors); $k++) {
                logger("I = " . $i . "-" . "J=" . $j . "-" . "K=" . $k);
                $grands = Texture::orwhere('color_id', $request->colors[$i])->where('main_texture_id', $types[$j])->where('pattern_id', $patterns[$k])
                  ->paginate(5);
                if ($grands->isEmpty()) {

                } else {
                  array_push($connect_arr, $grands);
                }
              }
            }
          }
          foreach ($connect_arr as $cars) {
            foreach ($cars as $car) {
              array_push($last_last_grands_result, $car);

            }
          }
        }

        // for ($i = 0; $i < count($request->colors); $i++) {
        //     $grands = Texture::where('color_id', $request->colors[$i])->paginate(6);
        //     // logger($grands);
        //     array_push($start_grands_result, $grands);
        // }
        // //last result
        // for ($i = 0; $i < count($start_grands_result); $i++) {
        //     foreach ($start_grands_result[$i] as $rg) {
        //         for ($j = 0; $j < count($request->types); $j++) {
        //             if ($rg->main_texture_id == $request->types[$j]) {
        //                 array_push($last_grands_result, $rg);
        //             }
        //         }
        //     }
        // }

        // foreach ($last_grands_result as $rg) {
        //     // logger("lllllllllll");
        //     // logger($rg);
        //     // logger("pattern-id".$rg->pattern_id);
        //     for ($j = 0; $j < count($request->patterns); $j++) {
        //         if ($rg->pattern_id == $request->patterns[$j]) {
        //             array_push($last_last_grands_result, $rg);
        //         }
        //     }
        // }

      }
    }
    $site_url = url('');

    $articles = '';
    $public_path = $site_url . '/assets/images/categories/texture/';
    if ($request->ajax()) {

      logger(count($Grands));

      foreach ($Grands as $grand) {
        // logger($grand);

        $articles .= '
                  <div class="col-md-4 mb-0">
                    <div class="cursor-pointer" data-bs-toggle="modal"
                         data-bs-target="#fabrics">
                      <div class="img-container mb-1">
                        <img src="' . $public_path . $grand->photo_one . '"
                             alt="" class="img-responsive">
                      </div>
                      <p class="mb-2 small-text fabric-text">' .
          $grand->name . '/' . 'Color-id=' . $grand->color_id . '/' . 'Type-id=' . $grand->main_texture_id . '/' . 'Pattern-id=' . $grand->pattern_id
          . '</p>
                      <p class="text-gold">$ ' . $grand->price . '</p>
                    </div>
                  </div>
                  ';


        $articles .= '
                  <div class="col-md-4 mb-0">
                    <div class="cursor-pointer" data-bs-toggle="modal"
                         data-bs-target="#fabrics">
                      <div class="img-container mb-1">
                        <img src="' . $public_path . $grand->photo_one . '"
                             alt="" class="img-responsive">
                      </div>
                      <p class="mb-2 small-text fabric-text">' .
          $grand->name . '/' . 'Color-id=' . $grand->color_id . '/' . 'Type-id=' . $grand->main_texture_id . '/' . 'Pattern-id=' . $grand->pattern_id
          . '</p>
                      <p class="text-gold">$ ' . $grand->price . '</p>
                    </div>
                  </div>
                  ';
      }
      return response()->json(['res' => $articles, 'page_no' => 8]);
    }



    return view('frontend.choose-fabric', compact('Grands', 'textures', 'subs', 'colors', 'patterns', 'favs', 'carts'));
  }

  public function ajex_package(Request $request){
    $package = Package::findOrFail($request->id);
    return response()->json($package);
  }

  public function ajex_get_style(Request $request){
    // dd($request->all());
    // $style_id = Session::get('style_id');
    if($request->cus_cate_id != 9)
    {
    $style = Style::where('type_id',$request->cus_cate_id)->where('category',$request->id)->get();
    }
    else
    {
      logger("suit data style");
      $style = Style::where('type_id',$request->cus_cate_id)->where('category',$request->id)->where('pieces',$request->piece)->get();
    }
    logger($style);
    return response()->json($style);
  }

  public function ajex_get_style_jacktes(Request $request){
    // return dd($request->name);
    $style = Style::where('type','jackets',$request->name)->get();
    // dd($style);
    return dd($style);
    return response()->json($style);
  }

  public function ajex_get_style_vests(){
    // return dd($request->name);
    $style = Style::where('type','vests')->get();
    // dd($style);
    // return dd($style);
    return response()->json($style);
  }
  
  public function ajex_get_style_pants(){
    // return dd($request->name);
    $style = Style::where('type','pants')->get();
    // dd($style);
    // return dd($style);
    return response()->json($style);
  }

  public function get_filter_recomment_style(Request $request)
  {
    // dd($request->all());
    if($request->cus_cate_id == 9)
    {
      logger("suit result");
      if(!empty($request->style_cate_id))
      {
        logger("have cate");
        $style = Style::where('type_id',$request->cus_cate_id)->where('category',$request->style_cate_id)->where('pieces',$request->piece)->get();
      }
      else
      {
        logger("no have cate");
        $style = Style::where('type_id',$request->cus_cate_id)->where('pieces',$request->piece)->get();
      }

    logger("length suit table = ".count($style));
    }
    elseif($request->cus_cate_id != 9)
    {
      logger("other result");
      $style = Style::where('type_id',$request->cus_cate_id)->get();
    }
    // logger("style result");
    // logger($style);
    // return dd($request);
    return response()->json($style);
  }

  public function get_style_pop_up(Request $request){
      $style = Style::where('type', $request->id)->get();
      return response()->json($style);
  }

  public function get_cus2_option(Request $request)
  {

    // if($request->name == "Suits"){
    //   $option = CustomizeCategory::all();
    // }else{
    //   $option = CustomizeCategory::where('name',$request->name)->get();
    // }

    $option = Style::where('category',$request->name)->get();
    return dd($option);


    return response()->json($option);
  }

  public function get_jacket_button(Request $request)
  {
    $jacket_button = Top::where('style',$request->style)->get();
    return response()->json($jacket_button);
  }

  public function get_vest_lapel(Request $request)
  {
    $vest_lapel = Shirt_Button::where('style',$request->style)->get();
    return response()->json($vest_lapel);
  }

  public function get_pant_pleat(Request $request)
  {
    $pant_pleat = Pant::where('style',$request->style)->get();
    return response()->json($pant_pleat);
  }

  public function store_measure_profile_data(Request $request)
  {
    logger("Measurement Data From Profile");
    logger($request->all());
    logger("Measurement Data From Profile End -------");
    //start edit user info
    $user_edit = User::find($request->user_id);
    $user_edit->age = $request->age;
    $user_edit->weight = $request->weight;
    $user_edit->weight_type = $request->weight_type;
    $user_edit->height = $request->height;
    $user_edit->height_type = $request->height_type;
    $user_edit->shoulder_type = $request->shoulder_type;
    $user_edit->drop_shoulder = $request->drop_shoulder;
    $user_edit->arms_position = $request->arms_position;
    $user_edit->body_shape = $request->body_shape;
    $user_edit->neck_type = $request->neck_type;
    $user_edit->stomach_shape = $request->stomach_shape;
    $user_edit->upper_body_shape = $request->upper_body_shape;
    $user_edit->pant_line = $request->pant_line;
    $user_edit->seat = $request->seat;
    $user_edit->save();
    //end edit user info
    //upper and lower start
    $upper_check = UpperMeasurement::where("user_id",$request->user_id)->first();
    $lower_check = LowerMeasurement::where("user_id",$request->user_id)->first();
    if($upper_check == null && $lower_check == null)
    {
      logger("jacket/vest new measurement &&& pant new measurement");
      $upper = UpperMeasurement::create([
        'user_id' => $user_edit->id,
        'stomach' => $request->stomach ,
        'biceps' => $request->biceps ,
        'forearm' => $request->forearm ,
        'cuffs' => $request->cuffs ,
        'chest_front_width' => $request->chest_front ,
        'chest_back_width' => $request->chest_back ,
        'jacket_front_length' => $request->jacket_front ,
        'chest' => $request->chest ,
        'waist' => $request->waist ,
        'hips' => $request->hips ,
        'shoulder' => $request->shoulder ,
        'sleeve_length_right' => $request->sleeve_right ,
        'sleeve_length_left' => $request->sleeve_left ,
        'vest_length' => $request->vest_len ,
        'jacket_back_length' => $request->jacket_back ,
        'neck' => $request->neck ,
        'measure_type' => $request->measure_type
      ]);
      $lower = LowerMeasurement::create([
        'user_id' => $user_edit->id,
        'crotch' => $request->pcrotch,
        'thighs' => $request->pthighs,
        'length' => $request->plength,
        'bottom' => $request->pbottom,
        'waist' => $request->pwaist,
        'calf' => $request->pcalf,
        'knees' => $request->pknees,
        'stomach' => $request->pstomach,
        'shorts' => $request->pshort,
        'hips' => $request->phips,
        'measure_type' => $request->measure_type
      ]);
    }
    elseif($upper_check == null && $lower_check != null)
    {
      logger("jacket new measurement &&& pant update measurement");
      $upper = UpperMeasurement::create([
        'user_id' => $user_edit->id,
        'stomach' => $request->stomach ,
        'biceps' => $request->biceps ,
        'forearm' => $request->forearm ,
        'cuffs' => $request->cuffs ,
        'chest_front_width' => $request->chest_front ,
        'chest_back_width' => $request->chest_back ,
        'jacket_front_length' => $request->jacket_front ,
        'chest' => $request->chest ,
        'waist' => $request->waist ,
        'hips' => $request->hips ,
        'shoulder' => $request->shoulder ,
        'sleeve_length_right' => $request->sleeve_right ,
        'sleeve_length_left' => $request->sleeve_left ,
        'vest_length' => $request->vest_len ,
        'jacket_back_length' => $request->jacket_back ,
        'neck' => $request->neck ,
        'measure_type' => $request->measure_type
      ]);
      $lower = LowerMeasurement::find($lower_check->id);
      $lower->crotch =  $request->pcrotch;
      $lower->thighs =  $request->pthighs;
      $lower->length = $request->plength;
      $lower->bottom = $request->pbottom;
      $lower->waist = $request->pwaist;
      $lower->calf = $request->pcalf;
      $lower->knees = $request->pknees;
      $lower->stomach = $request->pstomach;
      $lower->shorts = $request->pshort;
      $lower->hips = $request->phips;
      $lower->measure_type = $request->measure_type;
      $lower->save();
    }
    elseif($upper_check != null && $lower_check == null)
    {
      logger("jacket update measurement &&& pant new measurement");
      $upper = UpperMeasurement::find($request->upper_id);
      $upper->stomach = $request->stomach;
      $upper->biceps = $request->biceps;
      $upper->forearm = $request->forearm;
      $upper->cuffs = $request->cuffs;
      $upper->chest_front_width = $request->chest_front;
      $upper->chest_back_width = $request->chest_back;
      $upper->jacket_front_length =$request->jacket_front;
      $upper->chest = $request->chest;
      $upper->waist = $request->waist;
      $upper->hips = $request->hips;
      $upper->shoulder = $request->shoulder;
      $upper->sleeve_length_right = $request->sleeve_right;
      $upper->sleeve_length_left = $request->sleeve_left;
      $upper->vest_length = $request->vest_len;
      $upper->jacket_back_length = $request->jacket_back;
      $upper->neck = $request->neck;
      $upper->measure_type = $request->measure_type;
      $upper->save();
      $lower = LowerMeasurement::create([
        'user_id' => $user_edit->id,
        'crotch' => $request->pcrotch,
        'thighs' => $request->pthighs,
        'length' => $request->plength,
        'bottom' => $request->pbottom,
        'waist' => $request->pwaist,
        'calf' => $request->pcalf,
        'knees' => $request->pknees,
        'stomach' => $request->pstomach,
        'shorts' => $request->pshort,
        'hips' => $request->phips,
        'measure_type' => $request->measure_type
      ]);
    }
    else
    {
      logger("jacket update measurement &&& pant update measurement");
      $upper = UpperMeasurement::find($upper_check->id);
      $upper->stomach = $request->stomach;
      $upper->biceps = $request->biceps;
      $upper->forearm = $request->forearm;
      $upper->cuffs = $request->cuffs;
      $upper->chest_front_width = $request->chest_front;
      $upper->chest_back_width = $request->chest_back;
      $upper->jacket_front_length =$request->jacket_front;
      $upper->chest = $request->chest;
      $upper->waist = $request->waist;
      $upper->hips = $request->hips;
      $upper->shoulder = $request->shoulder;
      $upper->sleeve_length_right = $request->sleeve_right;
      $upper->sleeve_length_left = $request->sleeve_left;
      $upper->vest_length = $request->vest_len;
      $upper->jacket_back_length = $request->jacket_back;
      $upper->neck = $request->neck;
      $upper->measure_type = $request->measure_type;
      $upper->save();

      $lower = LowerMeasurement::find($lower_check->id);
      $lower->crotch =  $request->pcrotch;
      $lower->thighs =  $request->pthighs;
      $lower->length = $request->plength;
      $lower->bottom = $request->pbottom;
      $lower->waist = $request->pwaist;
      $lower->calf = $request->pcalf;
      $lower->knees = $request->pknees;
      $lower->stomach = $request->pstomach;
      $lower->shorts = $request->pshort;
      $lower->hips = $request->phips;
      $lower->measure_type = $request->measure_type;
      $lower->save();
    }
    //upper and lower end

    return response()->json([
      "msg" => "success",
    ]);
  }

  public function store_measure_data(Request $request)
  {
    logger("store measure data right now");
    logger($request->all());
    if($request->height_type == 'cm')
    {
      $hft = null;
      $hin = null;
      $hcm = $request->height_cm;
    }
    elseif($request->height_type == 'in')
    {
      $hft = $request->height_ft;
      $hin = $request->height_in;
      $hcm = null;
    }
    $user_id = Session::get('user_id');
    //start edit user info
    $user_edit = User::find($user_id);

    $user_edit->age = $request->age;
    $user_edit->weight = $request->weight;
    $user_edit->weight_type = $request->weight_type;
    $user_edit->height_cm = $hcm;
    $user_edit->height_ft = $hft;
    $user_edit->height_in = $hin;
    $user_edit->height_type = $request->height_type;
    $user_edit->shoulder_type = $request->shoulder_type;
    $user_edit->drop_shoulder = $request->drop_shoulder;
    $user_edit->arms_position = $request->arms_position;
    $user_edit->body_shape = $request->body_shape;
    $user_edit->neck_type = $request->neck_type;
    $user_edit->stomach_shape = $request->stomach_shape;
    $user_edit->upper_body_shape = $request->upper_body_shape;
    $user_edit->pant_line = $request->pant_line;
    $user_edit->seat = $request->seat;
    $user_edit->save();

    //end edit user info

    if($request->cus_cate_id == 1 || $request->cus_cate_id == 2)
    {
      $upper_check = UpperMeasurement::where("user_id",$user_id)->first();
      // dd($upper_check);
      if($upper_check == null)
      {
        logger("jacket/vest new measurement");
        $upper = UpperMeasurement::create([
          'user_id' => $user_edit->id,
          'stomach' => $request->stomach ,
          'biceps' => $request->biceps ,
          'forearm' => $request->forearm ,
          'cuffs' => $request->cuffs ,
          'chest_front_width' => $request->chest_front ,
          'chest_back_width' => $request->chest_back ,
          'jacket_front_length' => $request->jacket_front ,
          'chest' => $request->chest ,
          'waist' => $request->waist ,
          'hips' => $request->hips ,
          'shoulder' => $request->shoulder ,
          'sleeve_length_right' => $request->sleeve_right ,
          'sleeve_length_left' => $request->sleeve_left ,
          'vest_length' => $request->vest_len ,
          'jacket_back_length' => $request->jacket_back ,
          'neck' => $request->neck ,
          'measure_type' => $request->upper_measure_unit
        ]);

      }
      else
      {
        logger("jacket/vest update measurement");
        logger($request->stomach);
        // $lower = LowerMeasurement::find($request->lower_id);
        $upper = UpperMeasurement::find($upper_check->id);
        $upper->stomach = $request->stomach;
        $upper->biceps = $request->biceps;
        $upper->forearm = $request->forearm;
        $upper->cuffs = $request->cuffs;
        $upper->chest_front_width = $request->chest_front;
        $upper->chest_back_width = $request->chest_back;
        $upper->jacket_front_length =$request->jacket_front;
        $upper->chest = $request->chest;
        $upper->waist = $request->waist;
        $upper->hips = $request->hips;
        $upper->shoulder = $request->shoulder;
        $upper->sleeve_length_right = $request->sleeve_right;
        $upper->sleeve_length_left = $request->sleeve_left;
        $upper->vest_length = $request->vest_len;
        $upper->jacket_back_length = $request->jacket_back;
        $upper->neck = $request->neck;
        $upper->measure_type = $request->upper_measure_unit;
        $upper->save();
      }
    }
    elseif($request->cus_cate_id == 3)
    {

      $lower_check = LowerMeasurement::where("user_id",$user_id)->first();
      if($lower_check == null)
      {
        logger("pant new measurement");
        $lower = LowerMeasurement::create([
        'user_id' => $user_edit->id,
        'crotch' => $request->pcrotch,
        'thighs' => $request->pthighs,
        'length' => $request->plength,
        'bottom' => $request->pbottom,
        'waist' => $request->pwaist,
        'calf' => $request->pcalf,
        'knees' => $request->pknees,
        'stomach' => $request->pstomach,
        // 'shorts' => $request->pshort,
        'hips' => $request->phips,
        'measure_type' => $request->lower_measure_unit
      ]);
      }
      else
      {
        logger("pant update measurement");
        $lower = LowerMeasurement::find($lower_check->id);
        $lower->crotch =  $request->pcrotch;
        $lower->thighs =  $request->pthighs;
        $lower->length = $request->plength;
        $lower->bottom = $request->pbottom;
        $lower->waist = $request->pwaist;
        $lower->calf = $request->pcalf;
        $lower->knees = $request->pknees;
        $lower->stomach = $request->pstomach;
        // $lower->shorts = $request->pshort;
        $lower->hips = $request->phips;
        $lower->measure_type = $request->lower_measure_unit;
        $lower->save();
      }
    }
    elseif($request->cus_cate_id == 9)
    {
      $upper_check = UpperMeasurement::where("user_id",$user_id)->first();
      $lower_check = LowerMeasurement::where("user_id",$user_id)->first();
      if($upper_check == null && $lower_check == null)
      {
        logger("jacket/vest new measurement &&& pant new measurement");
        $upper = UpperMeasurement::create([
          'user_id' => $user_edit->id,
          'stomach' => $request->stomach ,
          'biceps' => $request->biceps ,
          'forearm' => $request->forearm ,
          'cuffs' => $request->cuffs ,
          'chest_front_width' => $request->chest_front ,
          'chest_back_width' => $request->chest_back ,
          'jacket_front_length' => $request->jacket_front ,
          'chest' => $request->chest ,
          'waist' => $request->waist ,
          'hips' => $request->hips ,
          'shoulder' => $request->shoulder ,
          'sleeve_length_right' => $request->sleeve_right ,
          'sleeve_length_left' => $request->sleeve_left ,
          'vest_length' => $request->vest_len ,
          'jacket_back_length' => $request->jacket_back ,
          'neck' => $request->neck ,
          'measure_type' => $request->upper_measure_unit
        ]);
        $lower = LowerMeasurement::create([
          'user_id' => $user_edit->id,
          'crotch' => $request->pcrotch,
          'thighs' => $request->pthighs,
          'length' => $request->plength,
          'bottom' => $request->pbottom,
          'waist' => $request->pwaist,
          'calf' => $request->pcalf,
          'knees' => $request->pknees,
          'stomach' => $request->pstomach,
          // 'shorts' => $request->pshort,
          'hips' => $request->phips,
          'measure_type' => $request->lower_measure_unit
        ]);
      }
      elseif($upper_check == null && $lower_check != null)
      {
        logger("jacket new measurement &&& pant update measurement");
        $upper = UpperMeasurement::create([
          'user_id' => $user_edit->id,
          'stomach' => $request->stomach ,
          'biceps' => $request->biceps ,
          'forearm' => $request->forearm ,
          'cuffs' => $request->cuffs ,
          'chest_front_width' => $request->chest_front ,
          'chest_back_width' => $request->chest_back ,
          'jacket_front_length' => $request->jacket_front ,
          'chest' => $request->chest ,
          'waist' => $request->waist ,
          'hips' => $request->hips ,
          'shoulder' => $request->shoulder ,
          'sleeve_length_right' => $request->sleeve_right ,
          'sleeve_length_left' => $request->sleeve_left ,
          'vest_length' => $request->vest_len ,
          'jacket_back_length' => $request->jacket_back ,
          'neck' => $request->neck ,
          'measure_type' => $request->upper_measure_unit
        ]);
        $lower = LowerMeasurement::find($lower_check->id);
        $lower->crotch =  $request->pcrotch;
        $lower->thighs =  $request->pthighs;
        $lower->length = $request->plength;
        $lower->bottom = $request->pbottom;
        $lower->waist = $request->pwaist;
        $lower->calf = $request->pcalf;
        $lower->knees = $request->pknees;
        $lower->stomach = $request->pstomach;
        // $lower->shorts = $request->pshort;
        $lower->hips = $request->phips;
        $lower->measure_type = $request->lower_measure_unit;
        $lower->save();
      }
      elseif($upper_check != null && $lower_check == null)
      {
        logger("jacket update measurement &&& pant new measurement");
        $upper = UpperMeasurement::find($request->upper_id);
        $upper->stomach = $request->stomach;
        $upper->biceps = $request->biceps;
        $upper->forearm = $request->forearm;
        $upper->cuffs = $request->cuffs;
        $upper->chest_front_width = $request->chest_front;
        $upper->chest_back_width = $request->chest_back;
        $upper->jacket_front_length =$request->jacket_front;
        $upper->chest = $request->chest;
        $upper->waist = $request->waist;
        $upper->hips = $request->hips;
        $upper->shoulder = $request->shoulder;
        $upper->sleeve_length_right = $request->sleeve_right;
        $upper->sleeve_length_left = $request->sleeve_left;
        $upper->vest_length = $request->vest_len;
        $upper->jacket_back_length = $request->jacket_back;
        $upper->neck = $request->neck;
        $upper->measure_type = $request->upper_measure_unit;
        $upper->save();
        $lower = LowerMeasurement::create([
          'user_id' => $user_edit->id,
          'crotch' => $request->pcrotch,
          'thighs' => $request->pthighs,
          'length' => $request->plength,
          'bottom' => $request->pbottom,
          'waist' => $request->pwaist,
          'calf' => $request->pcalf,
          'knees' => $request->pknees,
          'stomach' => $request->pstomach,
          // 'shorts' => $request->pshort,
          'hips' => $request->phips,
          'measure_type' => $request->lower_measure_unit
        ]);
      }
      else
      {
        logger("jacket update measurement &&& pant update measurement");
        $upper = UpperMeasurement::find($upper_check->id);
        $upper->stomach = $request->stomach;
        $upper->biceps = $request->biceps;
        $upper->forearm = $request->forearm;
        $upper->cuffs = $request->cuffs;
        $upper->chest_front_width = $request->chest_front;
        $upper->chest_back_width = $request->chest_back;
        $upper->jacket_front_length =$request->jacket_front;
        $upper->chest = $request->chest;
        $upper->waist = $request->waist;
        $upper->hips = $request->hips;
        $upper->shoulder = $request->shoulder;
        $upper->sleeve_length_right = $request->sleeve_right;
        $upper->sleeve_length_left = $request->sleeve_left;
        $upper->vest_length = $request->vest_len;
        $upper->jacket_back_length = $request->jacket_back;
        $upper->neck = $request->neck;
        $upper->measure_type = $request->upper_measure_unit;
        $upper->save();

        $lower = LowerMeasurement::find($lower_check->id);
        $lower->crotch =  $request->pcrotch;
        $lower->thighs =  $request->pthighs;
        $lower->length = $request->plength;
        $lower->bottom = $request->pbottom;
        $lower->waist = $request->pwaist;
        $lower->calf = $request->pcalf;
        $lower->knees = $request->pknees;
        $lower->stomach = $request->pstomach;
        // $lower->shorts = $request->pshort;
        $lower->hips = $request->phips;
        $lower->measure_type = $request->lower_measure_unit;
        $lower->save();
      }

    }

    //check jacket/vest/suit return data
    if($request->cus_cate_id == 1 || $request->cus_cate_id == 2)
    {
      $upper_id = $upper->id;
      $measure_unit = $upper->measure_type;
      $lower_id = null;
    }
    elseif($request->cus_cate_id == 3)
    {
      $lower_id = $lower->id;
      $measure_unit = $lower->measure_type;
      $upper_id = null;
    }
    elseif($request->cus_cate_id == 9)
    {
      $upper_id = $upper->id;
      $lower_id = $lower->id;
      $measure_unit = $upper->measure_type;
    }
    return response()->json([
      "msg" => "success",
      "upper_id" => $upper_id,
      "measure_unit" => $measure_unit,
      "lower_id" => $lower_id,
    ]);
    //end check
  }

  public function store_measure_data_old(Request $request)
  {
    logger($request->all());
    logger("store_measure_data");
    // session()->put('user_id', null);
    $user = Session::get('user_id');

    if($user == null)
    {
      return response()->json("login error");
    }
    else
    {
      //edit user info start
      $user_edit = User::find($user);
      $user_edit->age = $request->age;
      $user_edit->weight = $request->weight;
      $user_edit->weight_type = $request->weight_type;
      $user_edit->height = $request->height;
      $user_edit->height_type = $request->height_type;
      $user_edit->save();
      //edit user info end
      if($request->cus_cate_id == 1 || $request->cus_cate_id == 2)
      {
        if($request->upper_id == 0)
        {
          logger("jacket/vest new measurement");
          $upper = UpperMeasurement::create([
            'user_id' => $user_edit->id,
            'top_id' => 1,
            'chest' => $request->chest,
            'waist' => $request->waist,
            'hips' => $request->hips,
            'shoulder' => $request->shoulder,
            'sleeve' => $request->sleeve,
            'front' => $request->front,
            'back' => $request->back,
            'neck' => $request->neck,
            'jacket_length' => $request->jlength,
            'measure_type' => $request->measure_type
          ]);

        }
        else
        {
          logger("jacket/vest update measurement");
          // $lower = LowerMeasurement::find($request->lower_id);
          $upper = UpperMeasurement::find($request->upper_id);
          $upper->chest = $request->chest;
          $upper->waist = $request->waist;
          $upper->hips = $request->hips;
          $upper->shoulder = $request->shoulder;
          $upper->sleeve = $request->sleeve;
          $upper->front = $request->front;
          $upper->back = $request->back;
          $upper->neck = $request->neck;
          $upper->jacket_length = $request->jlength;
          $upper->measure_type = $request->measure_type;
          $upper->save();
        }
      }
      elseif($request->cus_cate_id == 3)
      {
        if($request->lower_id == 0)
        {
          logger("pant new measurement");
          $lower = LowerMeasurement::create([
          'user_id' => $user_edit->id,
          'pant_id' => 1,
          'crotch' => $request->pcrotch,
          'thighs' => $request->pthighs,
          'length' => $request->plength,
          'bottom' => $request->pbottom,
          'knee' => $request->pknee,
          'stomach' => $request->pstomach,
          'measure_type' => $request->measure_type
        ]);
        }
        else
        {
          logger("pant update measurement");
          $lower = LowerMeasurement::find($request->lower_id);
          $lower->crotch =  $request->pcrotch;
          $lower->thighs =  $request->pthighs;
          $lower->length = $request->plength;
          $lower->bottom = $request->pbottom;
          $lower->knee = $request->pknee;
          $lower->stomach = $request->pstomach;
          $lower->measure_type = $request->measure_type;
          $lower->save();
        }
      }
      elseif($request->cus_cate_id == 9)
      {
        if($request->upper_id == 0 && $request->lower_id == 0)
        {
          logger("jacket/vest new measurement &&& pant new measurement");
          $upper = UpperMeasurement::create([
            'user_id' => $user_edit->id,
            'top_id' => 1,
            'chest' => $request->chest,
            'waist' => $request->waist,
            'hips' => $request->hips,
            'shoulder' => $request->shoulder,
            'sleeve' => $request->sleeve,
            'front' => $request->front,
            'back' => $request->back,
            'neck' => $request->neck,
            'jacket_length' => $request->jlength,
            'measure_type' => $request->measure_type
          ]);
          $lower = LowerMeasurement::create([
            'user_id' => $user_edit->id,
            'pant_id' => 1,
            'crotch' => $request->pcrotch,
            'thighs' => $request->pthighs,
            'length' => $request->plength,
            'bottom' => $request->pbottom,
            'knee' => $request->pknee,
            'stomach' => $request->pstomach,
            'measure_type' => $request->measure_type
          ]);
        }
        elseif($request->upper_id == 0 && $request->lower_id != 0)
        {
          logger("jacket new measurement &&& pant update measurement");
          $upper = UpperMeasurement::create([
            'user_id' => $user_edit->id,
            'top_id' => 1,
            'chest' => $request->chest,
            'waist' => $request->waist,
            'hips' => $request->hips,
            'shoulder' => $request->shoulder,
            'sleeve' => $request->sleeve,
            'front' => $request->front,
            'back' => $request->back,
            'neck' => $request->neck,
            'jacket_length' => $request->jlength,
            'measure_type' => $request->measure_type
          ]);
          $lower = LowerMeasurement::find($request->lower_id);
          $lower->crotch =  $request->pcrotch;
          $lower->thighs =  $request->pthighs;
          $lower->length = $request->plength;
          $lower->bottom = $request->pbottom;
          $lower->knee = $request->pknee;
          $lower->stomach = $request->pstomach;
          $lower->measure_type = $request->measure_type;
          $lower->save();
        }
        elseif($request->upper_id != 0 && $request->lower_id == 0)
        {
          logger("jacket update measurement &&& pant new measurement");
          $upper = UpperMeasurement::find($request->upper_id);
          $upper->chest = $request->chest;
          $upper->waist = $request->waist;
          $upper->hips = $request->hips;
          $upper->shoulder = $request->shoulder;
          $upper->sleeve = $request->sleeve;
          $upper->front = $request->front;
          $upper->back = $request->back;
          $upper->neck = $request->neck;
          $upper->jacket_length = $request->jlength;
          $upper->measure_type = $request->measure_type;
          $upper->save();
          $lower = LowerMeasurement::create([
            'user_id' => $user_edit->id,
            'pant_id' => 1,
            'crotch' => $request->pcrotch,
            'thighs' => $request->pthighs,
            'length' => $request->plength,
            'bottom' => $request->pbottom,
            'knee' => $request->pknee,
            'stomach' => $request->pstomach,
            'measure_type' => $request->measure_type
          ]);
        }
        else
        {
          logger("jacket update measurement &&& pant update measurement");
          $upper = UpperMeasurement::find($request->upper_id);
          $upper->chest = $request->chest;
          $upper->waist = $request->waist;
          $upper->hips = $request->hips;
          $upper->shoulder = $request->shoulder;
          $upper->sleeve = $request->sleeve;
          $upper->front = $request->front;
          $upper->back = $request->back;
          $upper->neck = $request->neck;
          $upper->jacket_length = $request->jlength;
          $upper->measure_type = $request->measure_type;
          $upper->save();

          $lower = LowerMeasurement::find($request->lower_id);
          $lower->crotch =  $request->pcrotch;
          $lower->thighs =  $request->pthighs;
          $lower->length = $request->plength;
          $lower->bottom = $request->pbottom;
          $lower->knee = $request->pknee;
          $lower->stomach = $request->pstomach;
          $lower->measure_type = $request->measure_type;
          $lower->save();
        }

      }

      if($request->cus_cate_id == 1 || $request->cus_cate_id == 2)
      {
        $upper_id = $upper->id;
        $lower_id = null;
      }
      elseif($request->cus_cate_id == 3)
      {
        $lower_id = $lower->id;
        $upper_id = null;
      }
      elseif($request->cus_cate_id == 9)
      {
        $upper_id = $upper->id;
        $lower_id = $lower->id;
      }
      return response()->json([
        "msg" => "success",
        "upper_id" => $upper_id,
        "lower_id" => $lower_id
      ]);
    }

  }

  public function show_paypal()
  {
    return view('paypal_button');
  }

  public function get_style_data(Request $request)
  {
    // dd($request->style_cate_id);
    $styles = Style::where('category_id',$request->style_cate_id)->paginate(4);

    return response()->json([
      "styles" => $styles
    ]);

  }

  function get_style_view_more_data(Request $request)
  {
    // dd($request->style_cate_id);
    $style = Style::where('category_id',$request->style_cate_id)->get();
    return response()->json($style);
  }

  public function back_to_cus_3_data(Request $request)
  {
    return response()->json("success");
  }

  public function store_user_profile_data(Request $request)
  {
      // dd($request->all());
      $user = User::find($request->user_id);
      $user->name = $request->username;
      $user->phone = $request->phone;
      $user->dob = $request->dob;
      $user->gender = $request->gender;
      $user->city = $request->city;
      $user->tsp_street = $request->address;
      // $user->email = $request->email;
      $user->save();
      return response()->json([
        "msg" => "success",
        "user_info" => $user
      ]);
  }

  public function get_style_for_ready_ajax_data(Request $request)
  {
    $readys_arr = [];
    $readys_style = [];
    $readys_package = [];
    $readys_texture = [];
    // logger($request->all());

    //start one only
    if(!empty($request->style_cate_name) && !$request->texture_id && !($request->package_id))
    {
      $qty = 1;
      foreach($request->style_cate_name as $style_cate)
        {
          $readys = ReadyToWear::where('style_id',$style_cate)->get();
          array_push($readys_arr,$readys);
        }
    }
    if(!$request->style_cate_name && !empty($request->texture_id) && !($request->package_id))
    {
      $qty = 1;
      foreach($request->texture_id as $texture)
      {
        $readys = ReadyToWear::where('main_texture_id',$texture)->get();
        array_push($readys_arr,$readys);
      }
    }
    if(!$request->style_cate_name && !($request->texture_id) && !empty($request->package_id))
    {
      $qty = 1;
      foreach($request->package_id as $package)
      {
        $readys = ReadyToWear::where('package_id',$package)->get();
        array_push($readys_arr,$readys);
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

    }
    //end three only
    logger(count($readys_arr));
    return response()->json([
      'readys' => $readys_arr,
      'qty' => $qty
    ]);
    // end style only
    // Start OLD
    // logger($request->style_cate_name);
    // $styles_arr = [];
    // $readys_arr = [];
    // //start style only
    // if(count($request->style_cate_name) != 0 && count($request->texture_id) == 0)
    // {
    //   foreach($request->style_cate_name as $style_cate)
    //   {
    //     $styles = Style::where('category',$style_cate)->get();

    //     array_push($styles_arr,$styles);
    //   }

    //   for($i=0;$i<count($styles_arr);$i++)
    //   {
    //     for($j=0;$j<count($styles_arr[$i]);$j++)
    //     {
    //       $readys = ReadyToWear::where('style_id',$styles_arr[$i][$j]->id)->get();
    //       if(count($readys) != 0)
    //       {
    //         array_push($readys_arr,$readys);
    //       }
    //     }
    //     // logger("none-".$styles_arr[0][0]->name);
    //   }
    // }
    // if(count($request->style_cate_name) == 0 && count($request->texture_id) != 0)
    // {

    // }
    // //end style only
    // // start style and texture
    // if(count($request->style_cate_name) != 0 && count($request->texture_id) != 0)
    // {


    // }
    // // end style and texture
    // return response()->json([
    //   'readys' => $readys_arr
    // ]);
    // end old
  }


// public function search(Request $request)
// {
//   $search_results = ReadyToWear::where([
//     ['name', '!=', Null],
//     [function ($query) use ($request) {
//       if(($term = $request->term)) {
//         $query->orWhere('name',)
//       }
//     }]
//   ])
// }
public function check_style_in_step1_ajax_data(Request $request)
{
  logger("check step 1 and step 3");
  // logger($request->all());
  $check_style = Style::where('id',$request->style_id)->where('type_id',$request->cus_cate_id)->first();
  logger($check_style);
  if($check_style == null)
  {
    $has_style = false;
  }
  else
  {
    $has_style = true;
  }
  return response()->json($has_style);
}
public function search(Request $request)
{
  $input = $request->except('_token');

  // $search_results = ReadyToWear::where([
  //   ['name', '!=', Null],
  //   [function ($query) use ($request) {
  //     if(($term = $request->input('text'))) {
  //       $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
  //     }
  //   }]
  // ])->orderBy("id", 'desc')->paginate();
  if(Session::get('user_id')){

  }
  $text = $request->input('gg');
  $texts = ReadyToWear::where('name', 'LIKE',"$text" . '%')->latest()->get();
  return view('frontend.search-result', compact('texts'))->with('i',(request()->input('page',1)-1)*5);
}

public function ajex_search(Request $request)
{

  $text = $request->input('text');
  $texts = ReadyToWear::where('name', 'LIKE',"$text")->latest()->get();
  // $texts = ReadyToWear::where([
  //   ['name', '!=', Null],
  //   [function ($query) use ($request) {
  //     if(($term = $request->text)) {
  //       $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
  //     }
  //   }]
  // ])->orderBy("id", 'desc')->paginate();

  echo json_encode($texts);

}
function store_user_info_measure_ajax_data(Request $request)
{
  // logger($request->all());
  if($request->fill_upper == "true")
  {
  if($request->upper_id == 0)
  {
    $upper = UpperMeasurement::create([
      'user_id' => $request->user_id,
      'top_id' => 1,
      'chest' => $request->chest,
      'waist' => $request->waist,
      'hips' => $request->hips,
      'shoulder' => $request->shoulder,
      'sleeve' => $request->sleeve,
      'front' => $request->front,
      'back' => $request->back,
      'neck' => $request->neck,
      'jacket_length' => $request->length,
    ]);
  }
  else
  {
    $upper = UpperMeasurement::find($request->upper_id);
    $upper->chest = $request->chest;
    $upper->waist = $request->waist;
    $upper->hips = $request->hips;
    $upper->shoulder = $request->shoulder;
    $upper->sleeve = $request->sleeve;
    $upper->front = $request->front;
    $upper->back = $request->back;
    $upper->neck = $request->neck;
    $upper->jacket_length = $request->length;
    $upper->save();

  }
  }
  if($request->fill_lower == "true")
  {
  if($request->lower_id == 0)
  {
    $lower = LowerMeasurement::create([
      'user_id' => $request->user_id,
      'pant_id' => 1,
      'crotch' => $request->crotch,
      'thighs' => $request->thighs,
      'length' => $request->plength,
      'bottom' => $request->bottom,
      'knee' => $request->knee,
      'stomach' => $request->stomach,
    ]);
  }
  else
  {
    $lower = LowerMeasurement::find($request->lower_id);
    $lower->crotch =  $request->crotch;
    $lower->thighs =  $request->thighs;
    $lower->length = $request->plength;
    $lower->bottom = $request->bottom;
    $lower->knee = $request->knee;
    $lower->stomach = $request->stomach;
    $lower->save();
  }
  }
  if($request->fill_upper == 'true')
  {
    return response()->json([
      'upper_id' => $upper->id,
      'lower_id' => 0
    ]);
  }
  elseif($request->fill_lower == 'true')
  {
    return response()->json([
      'upper_id' => 0,
      'lower_id' => $lower->id
    ]);
  }
  else
  {
    return response()->json([
      'upper_id' => $upper->id,
      'lower_id' => $lower->id
    ]);
  }

}


/*** Add To Cart Section */

public function cart()
{
  $favs = Favourite::where('user_id',Session::get('user_id'))->get();
  $carts = AddToCart::where('user_id',Session::get('user_id'))->get();
  $user_id = Session::get('user_id');
  $user_info = User::find($user_id);
  return view('frontend.add-to-cart',compact('favs','carts','user_id','user_info'));
}

}
