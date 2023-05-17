<?php

namespace App\Http\Controllers\Frontend;

use App\SuitTips;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuittipsController extends Controller
{
    public function suit(Request $request){
        $site_url = url('');
        $features = SuitTips::where('feature',"Yes")->get();
        $suit_tips = SuitTips::paginate(3);
        $articles = '';
        $public_path = $site_url . '/assets/images/suit_tip/';
        if ($request->ajax()) {
          foreach($suit_tips as $tip)
          {
            $articles .='
            <div class="col-12 col-md-6 col-lg-4 tips__item">
              <img class="item__img" src="'.$public_path.$tip->photo.'" alt="">
              <div class="item__texts">
                <span>'.$tip->brand.' - '.\Carbon\Carbon::parse($tip->created_at)->format('M d Y').'</span>
                <h6>'.$tip->title.'</h6>
                <p class="item__texts-desc">'.$tip->description.'</p>
                <button class="pop-up__button mt-4">
                  <a href="/suit-tips-detail/'.$tip->id.'">Detail</a>
                </button>
              </div>
            </div>
            ';
          }
          return response()->json(['res' => $articles, 'page_no' => 8]);
        }
    
    
        return view('frontend.suitTips',compact('suit_tips','features'));
    }

    public function detail($id)
    {
        $suit_tip = SuitTips::where('id',$id)->first();
        $latest_suit_tips = SuitTips::latest()->take(3)->get();
        // return dd($latest_suit_tip);
        return view('frontend.suitTipsDetail',compact('suit_tip','latest_suit_tips'));
    }
}
