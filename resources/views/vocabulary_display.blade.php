@extends('vocabulary_modify')

@section('content_r')
<script> 
    function addBtnEnable() {  
        const btn_add = document.getElementById('btn_add');
        if((document.getElementById("japanesekan_input").value.trim().length !== 0) &&
           (document.getElementById("katakana_input").value.trim().length !== 0) &&
           (document.getElementById("chinese_input").value.trim().length !== 0) ){

            btn_add.removeAttribute('disabled');
            btn_add.setAttribute("class","btn_print") 
        }else{

            btn_add.setAttribute('disabled',true);
            btn_add.setAttribute("class","btn_def");
        }   
    }
</script>
<div class="display_content">
    <div class="display_wrap">

    @if($voc_count>0)
        @foreach( $vocabulary_posts AS $vocabulary_post )
            <div class="display_box">
                <div class="display_text">
                    <p>N{{ $vocabulary_post['class'] }}</p>
                    <h1>{{ $vocabulary_post['japanesekan'] }}</h1>
                    <h5>{{ $vocabulary_post['katakana'] }}</h5>
                    <h3>{{ $vocabulary_post['chinese'] }}</h3>
                </div>
                <div class="btn_warp_t_b">             
                    <a href="{{ route('vocabulary_edit' ,  ['id' => $vocabulary_post['id']]) }}" type="button" class="box_btn_l_b btn_g">編輯</a>   
                    
                    <form method='POST' action="{{ route('vocabulary_delete', ['id' => $vocabulary_post['id']] ) }}" class="box_btn_r_b">
                        @csrf
                        <button class="box_btn_r_b btn_r">刪除</button>
                    </form>
                    
                </div>
            </div>   
        @endforeach
    @else
        <h2 class="note">無符合條件資料</h2> 
    @endif

    </div>
</div>




@endsection