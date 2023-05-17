<?php

namespace App\Http\Controllers\Admin;
use App\Faq;
use App\FaqQuestion;
use App\FaqTitle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    //
     //
     public function validator(array $data)
     {
         return Validator::make($data, [
             'name' => ['required',],
             'title' => ['required', 'string', 'max:50'],
             'question' => ['required', 'string', 'max:50'],
         ]);
     }
 
     public function updatevalidator(array $data)
     {
         return Validator::make($data, [
             'name' => ['required', 'string', 'max:50'],
             'name' => ['required',],
             'title' => ['required', 'string', 'max:50'],
             'question' => ['required', 'string', 'max:50'],
         ]);
     }
 
     public function show_faq_list()
     {
        $faqs = Faq::all();
      
       return view('admin.faq.list',compact('faqs'));
     }
     public function add_faq_data()
     {  
        
        $titles = FaqTitle::all();
        $questions = FaqQuestion::all();
       return view('admin.faq.create',compact('titles','questions'));
     }
     public function store_faq_data(Request $request)
     {
       $validator = Validator::make($request->all(), [
         'name' => 'required',
       ]);
       if ($validator->fails()) {
           return redirect('add_faq')
                       ->withErrors($validator)
                       ->withInput();
       }
       Faq::create([
         'name' => $request->name,
         'title' => $request->title,
         'question' => $request->question,
       ]);
       return redirect()->route('faq_list')->with('success','Your Package is successfully Created');
     }
 
     public function delete_faq(Request $request)
     {
         $delete_faq = Faq::find($request->faq_id);
         $delete_faq->delete();
         return response()->json("success");
     }
     public function edit_faq($id){
       $faq = Faq::findOrFail($id);
       $titles = FaqTitle::all();
       $questions = FaqQuestion::all();
       return view('admin.faq.edit',compact('faq','titles','questions'));
   }
   function update_faq_list(Request $request,$id)
   {
       // dd($request->id);
       $valid=$this->updatevalidator($request->except('_token'));
       if( $valid->fails())
       {   
           return redirect()->back()->withErrors($valid)->withInput();
       }
       $update_faq = Faq::findOrFail($id);
       // dd($request->all());
      
       // dd($photo);
       
       $update_faq->name = $request->name;
       $update_faq->title = $request->title;
       $update_faq->question = $request->question;
      $result = $update_faq->update();
       return redirect()->route('faq_list')->with('success','Your Package is successfully Updated');
   }
 
}
