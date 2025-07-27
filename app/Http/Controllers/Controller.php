<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Vocabulary;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function home()
    {
        return view('start');
    }

    public function start()
    {
        return view('start');
    }

    public function vocabulary_select()
    {
        return view('vocabulary_exam_select');
    }

    public function vocabulary_exam(Request $request)
    {
        $class = $request->input('class',[]);
        $type = $request->input('type',[]);
        $showlang = $request->input('showlang',[]);
        $vocabulary_posts = Vocabulary::select('vocabularies.*','vocabulary_sorts.name as type_name')
                                        ->join('vocabulary_sorts', 'vocabulary_sorts.id', '=', 'vocabularies.type')
                                        ->whereIn('class',$class)
                                        ->whereIn('type',$type)
                                        ->where('vocabularies.status',1)          
                                        ->inRandomOrder()                        
                                        ->limit(20)
                                        ->get();
        // dd($vocabulary_posts);
        if(empty($vocabulary_posts)){
            $voc_count = 0;            
        }else{
            $voc_count = count($vocabulary_posts);
        }

        return view('vocabulary_exam',compact('vocabulary_posts','voc_count','showlang'));
    }

    public function vocabulary_display()
    {
        $vocabulary_posts = Vocabulary::select('vocabularies.*')
                                            ->where('status',1)  
                                            ->orderby('class','DESC')
                                            ->orderby('katakana','ASC')
                                            ->get();
        if(empty($vocabulary_posts)){
            $voc_count = 0;            
        }else{
            $voc_count = count($vocabulary_posts);
        }

        $class = array('1','2','3','4','5');
        $type = array('1','2','3','4','5','6','7');

        return view('vocabulary_display',compact('vocabulary_posts','voc_count','class','type'));
    }

    public function vocabulary_result(Request $request)
    {
        $class = $request->input('class',[]);
        $type = $request->input('type',[]);
        // dd($type);
        $vocabulary_posts = Vocabulary::select('vocabularies.*')
                                            ->whereIn('class',$class)
                                            ->whereIn('type',$type)
                                            ->where('status',1)
                                            ->orderby('katakana','ASC')                                         
                                            ->get();
        if(empty($vocabulary_posts)){
            $voc_count = 0;            
        }else{
            $voc_count = count($vocabulary_posts);
        }
        // dd($class[0]);
        return view('vocabulary_display',compact('vocabulary_posts','voc_count','class','type'));
    }

    public function vocabulary_add()
    {
        $class = [];
        $type = [];

        return view('vocabulary_add',compact('class','type'));
    }

    public function vocabulary_store(Request $request){
        $data = $request->all();        
        // dd($data);

        Vocabulary::insertGetId([
            'japanesekan' => $data['japanesekan_input'],
            'katakana' => $data['katakana_input'],
            'chinese' => $data['chinese_input'],
            'class' => $data['class_input'],
            'type' => $data['type_input']
        ]);
                        
        return redirect()->route('vocabulary_add')->with('success','單詞新增成功！');
    }

    public function vocabulary_edit($id)
    {
        $vocabulary_post = Vocabulary::select('vocabularies.*')
                                            ->where('id',$id)
                                            ->where('status',1)                                     
                                            ->first();
                
        $error_id = false;
        if(empty($vocabulary_post)){
            $error_id= true;              
        } 
        $class = array('1','2','3','4','5');
        $type = array('1','2','3','4','5','6','7');
        return view('vocabulary_edit',compact('vocabulary_post','error_id','class','type'));
    }

    public function vocabulary_update(Request $request, $id){
        $data = $request->all();        

        Vocabulary::where('id', $id)
                  ->update([
                            'japanesekan' => $data['japanesekan_update'], 
                            'katakana' => $data['katakana_update'], 
                            'chinese' => $data['chinese_update'], 
                            'class' => $data['class_update'], 
                            'type' => $data['type_update']
                            ]);
        
                        
        return redirect()->route('vocabulary_display')->with('success','單詞修改成功！');
    }

    public function vocabulary_delete(Request $request,$id){
        $data = $request->all();

        Vocabulary::where('id', $id)
                  ->update([ 'status' => 3 ]);
        
        return redirect()->route('vocabulary_display')->with('success','單詞刪除成功！');
    }
}
