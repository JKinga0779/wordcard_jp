@extends('vocabulary_modify')

@section('content_r')
<script> 
    function editBtnEnable() {  
        const btn_edit = document.getElementById('btn_edit');
        if((document.getElementById("japanesekan_update").value.trim().length !== 0) &&
           (document.getElementById("katakana_update").value.trim().length !== 0) &&
           (document.getElementById("chinese_update").value.trim().length !== 0) ){

            btn_edit.removeAttribute('disabled');
            btn_edit.setAttribute("class","btn_print") 
        }else{

            btn_edit.setAttribute('disabled',true);
            btn_edit.setAttribute("class","btn_def");
        }   
    }
</script>
<div class="display_content">
    @if(!$error_id)
    <form method='POST' action="{{ route('vocabulary_update' , ['id' => $vocabulary_post['id']]) }}" enctype="multipart/form-data">
        @csrf
        <h2 class="note" style="color: darkcyan;">單詞編輯</h2>    
        <div class="question_wrap">
            <div class="question">
                <div class="text_input_box">
                    <label for="japanesekan_update">日文漢字/片假名</label>
                    <input name="japanesekan_update" id="japanesekan_update" type="text" class="form-control" value="{{ $vocabulary_post['japanesekan'] }}" oninput="editBtnEnable()"/>
                </div>

                <div class="text_input_box">
                    <label for="katakana_update">平假名</label>
                    <input name="katakana_update" id="katakana_update" type="text" class="form-control" value="{{ $vocabulary_post['katakana'] }}" oninput="editBtnEnable()"/>
                </div>

                <div class="text_input_box">
                    <label for="chinese_update">中文</label>
                    <input name="chinese_update" id="chinese_update" type="text" class="form-control" value="{{ $vocabulary_post['chinese'] }}" oninput="editBtnEnable()"/>
                </div>

                <div class="text_input_box">
                    <label for="class_update">級別</label>
                    <select id="class_update" name='class_update' onchange="editBtnEnable()">
                        <option value=0 hidden disabled ></option>
                        <option value=1 {{ $vocabulary_post['class'] == 1 ? 'selected' : '' }}>N1</option>
                        <option value=2 {{ $vocabulary_post['class'] == 2 ? 'selected' : '' }}>N2</option>
                        <option value=3 {{ $vocabulary_post['class'] == 3 ? 'selected' : '' }}>N3</option>
                        <option value=4 {{ $vocabulary_post['class'] == 4 ? 'selected' : '' }}>N4</option>
                        <option value=5 {{ $vocabulary_post['class'] == 5 ? 'selected' : '' }}>N5</option>
                    </select>                            
                </div>

                <div class="text_input_box">
                    <label for="type_update">分類</label>
                    <select id="type_update" name='type_update' onchange="editBtnEnable()">
                        <option value=0 hidden disabled ></option>
                        <option value=1 {{ $vocabulary_post['type'] == 1 ? 'selected' : '' }}>名詞</option>
                        <option value=2 {{ $vocabulary_post['type'] == 2 ? 'selected' : '' }}>動詞</option>
                        <option value=3 {{ $vocabulary_post['type'] == 3 ? 'selected' : '' }}>形容詞/形容動詞</option>
                        <option value=4 {{ $vocabulary_post['type'] == 4 ? 'selected' : '' }}>副詞</option>
                        <option value=5 {{ $vocabulary_post['type'] == 5 ? 'selected' : '' }}>量詞</option>
                        <option value=6 {{ $vocabulary_post['type'] == 6 ? 'selected' : '' }}>片假名</option>
                        <option value=7 {{ $vocabulary_post['type'] == 7 ? 'selected' : '' }}>其他</option>                
                    </select>                            
                </div>
            </div>    
            
            <button disabled id="btn_edit" type='submit' class="btn_def">儲存變更</button>
        </div>
    </form> 
    @else
    <h2 class="note">無符合條件資料</h2> 
    @endif    
</div>


@endsection