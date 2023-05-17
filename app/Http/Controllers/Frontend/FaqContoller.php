<?php

namespace App\Http\Controllers\Frontend;

use App\Faq;
use App\FaqQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqContoller extends Controller
{
    public function faq(){
        $faq_titles = Faq::select('name', 'title', 'question')->get()->groupBy([function($title){
            return $title->title;
          },'question']);
          // return dd($faq_titles);
          $faq_questions = FaqQuestion::all();
          $faqs = Faq::all();
            return view('frontend.faq',compact('faq_titles','faq_questions','faqs'));
    }
}
