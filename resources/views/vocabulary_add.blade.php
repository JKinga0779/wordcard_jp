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
    <form method='POST' action="{{ route('vocabulary_store') }}" enctype="multipart/form-data">
        @csrf
        <h2 class="note" style="color: darkcyan;">輸入新單詞</h2>

        <div class="question_wrap">
            <div class="question">
                <div class="text_input_box">
                    <label for="japanesekan_input">日文漢字/片假名</label>
                    <input name="japanesekan_input" id="japanesekan_input" type="text" class="form-control" value="" oninput="addBtnEnable()"/>
                </div>

                <div class="text_input_box">
                    <label for="katakana_input">平假名</label>
                    <input name="katakana_input" id="katakana_input" type="text" class="form-control" value="" oninput="addBtnEnable()"/>
                </div>

                <div class="text_input_box">
                    <label for="chinese_input">中文</label>
                    <input name="chinese_input" id="chinese_input" type="text" class="form-control" value="" oninput="addBtnEnable()"/>
                </div>

                <div class="text_input_box">
                    <label for="class_input">級別</label>
                    <select name='class_input' value="5" >
                        <option value=1>N1</option>
                        <option value=2>N2</option>
                        <option value=3>N3</option>
                        <option value=4>N4</option>
                        <option value=5>N5</option>
                    </select>                            
                </div>

                <div class="text_input_box">
                    <label for="type_input">分類</label>
                    <select name='type_input' value="5" >
                        <option value=1>名詞</option>
                        <option value=2>動詞</option>
                        <option value=3>形容詞/形容動詞</option>
                        <option value=4>副詞</option>
                        <option value=5>量詞</option>
                        <option value=6>片假名</option>
                        <option value=7>其他</option>                
                    </select>                            
                </div>

            </div>    
            
            <button disabled id="btn_add" type='submit' class="btn_def">新增</button>
        </div>
    </form> 
</div>


@endsection