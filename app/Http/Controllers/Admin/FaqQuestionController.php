<?php

namespace App\Http\Controllers\Admin;
use App\FaqQuestion;
use App\FaqTitle;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FaqQuestionController extends Controller
{
    //
     //
     public function validator(array $data)
     {
         return Validator::make($data, [
             'name' => ['required', 'string', 'max:50'],
             'title' => ['required', 'string', 'max:50'],
         ]);
     }
 
     public function updatevalidator(array $data)
     {
         return Validator::make($data, [
             'name' => ['required', 'string', 'max:50'],
             'title' => ['required', 'string', 'max:50'],
         ]);
     }
 
     public function show_faq_question_list()
     {
       $faq_questions = FaqQuestion::all();
       return view('admin.faq_question.list',compact('faq_questions'));
     }
     public function add_faq_question_data()
     {  
        $faq_titles = FaqTitle::all();
       return view('admin.faq_question.create',compact('faq_titles'));
     }
     public function store_faq_question_data(Request $request)
     {
       $validator = Validator::make($request->all(), [
         'name' => 'required',
       ]);
       if ($validator->fails()) {
           return redirect('add_faq_question')
                       ->withErrors($validator)
                       ->withInput();
       }
       FaqQuestion::create([
         'name' => $request->name,
         'title' => $request->title,
       ]);
       return redirect()->route('faq_question_list')->with('success','Your Package is successfully Created');
     }
 
     public function delete_faq_question(Request $request)
     {
         $delete_faq_question = FaqQuestion::find($request->faq_question_id);
         $delete_faq_question->delete();
         return response()->json("success");
     }
     public function edit_faq_question($id){
        $faq_titles = FaqTitle::all();
       $faq_question = FaqQuestion::findOrFail($id);
       return view('admin.faq_question.edit',compact('faq_question','faq_titles'));
   }
   function update_faq_question_list(Request $request,$id)
   {
       // dd($request->id);
       $valid=$this->updatevalidator($request->except('_token'));
       if( $valid->fails())
       {   
           return redirect()->back()->withErrors($valid)->withInput();
       }
       $update_faq_question = FaqQuestion::findOrFail($id);
       // dd($request->all());
      
       // dd($photo);
       
       $update_faq_question->name = $request->name;
       $update_faq_question->title = $request->title;
      $result = $update_faq_question->update();
       return redirect()->route('faq_question_list')->with('success','Your Package is successfully Updated');
   }
 
}
