@extends('home')

@section('content')
<script> 
    window.onload = function(){
        const class_checkbox = document.getElementsByName('class[]');
        const type_checkbox = document.getElementsByName('type[]');
        var class_count = "{{count($class)}}";
        var type_count = "{{count($type)}}";
        var class_checked = @json($class);
        var type_checked = @json($type);
        
        for (var i = 0; i < class_count; i++) {
            switch(class_checked[i]){
                case '1':
                    class_checkbox[0].setAttribute('checked',true);
                    break;
                case '2':
                    class_checkbox[1].setAttribute('checked',true);
                    break;
                case '3':
                    class_checkbox[2].setAttribute('checked',true);
                    break;
                case '4':
                    class_checkbox[3].setAttribute('checked',true);
                    break;
                case '5':
                    class_checkbox[4].setAttribute('checked',true);
                    break;
            }         
        }
        for (var i = 0; i < type_count; i++) {
            switch(type_checked[i]){
                case '1':
                    type_checkbox[0].setAttribute('checked',true);
                    break;
                case '2':
                    type_checkbox[1].setAttribute('checked',true);
                    break;
                case '3':
                    type_checkbox[2].setAttribute('checked',true);
                    break;
                case '4':
                    type_checkbox[3].setAttribute('checked',true);
                    break;
                case '5':
                    type_checkbox[4].setAttribute('checked',true);
                    break;
                case '6':
                    type_checkbox[5].setAttribute('checked',true);
                    break;
                case '7':
                    type_checkbox[6].setAttribute('checked',true);
                    break;
            }           
        }
    }        
</script>
<div  class="content">
    <div class="content_l scrollbar_hidden">
        <form method='POST' action="{{ route('vocabulary_result') }}" enctype="multipart/form-data">
            @csrf
            <div class="vocabulary_tool">
                <a href="/vocabulary/add" type="button" class="btn_print btn_a" style="margin-bottom: 20px;">新增單詞</a>
                <div class="check_wrap">                    
                    <div class="checkbox_selector">                
                        <h6>級別選擇</h6>
                        <div class="form-check">
                            <input class="form-check-input" name="class[]" type="checkbox" value="1" id="N1"/>
                            <label class="form-check-label" for="N1">
                                N1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="class[]" type="checkbox" value="2" id="N2" />
                            <label class="form-check-label" for="N2">
                                N2
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="class[]" type="checkbox" value="3" id="N3" />
                            <label class="form-check-label" for="N3">
                                N3
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="class[]" type="checkbox" value="4" id="N4" />
                            <label class="form-check-label" for="N4">
                                N4
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="class[]" type="checkbox" value="5" id="N5" />
                            <label class="form-check-label" for="N5">
                                N5
                            </label>
                        </div>
                    </div>

                    <div class="checkbox_selector">
                        <h6>範圍選擇</h6>
                        <div class="form-check">
                            <input class="form-check-input" name="type[]" type="checkbox" value="1" id="noun"/>
                            <label class="form-check-label" for="noun">
                                名詞
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type[]" type="checkbox" value="2" id="verb" />
                            <label class="form-check-label" for="verb">
                                動詞
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type[]" type="checkbox" value="3" id="adjective" />
                            <label class="form-check-label" for="adjective">
                                形容詞/形容動詞
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type[]" type="checkbox" value="4" id="adverb" />
                            <label class="form-check-label" for="adverb">
                                副詞
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type[]" type="checkbox" value="5" id="classifier" />
                            <label class="form-check-label" for="classifier">
                                量詞
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type[]" type="checkbox" value="6" id="katakana" />
                            <label class="form-check-label" for="katakana">
                                片假名
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type[]" type="checkbox" value="7" id="other" />
                            <label class="form-check-label" for="other">
                                其他
                            </label>
                        </div>
                    </div>

                </div>

                <button id="btn_sort" type='submit' class="btn_print">篩選</button>                    
            </div>
        </form>
    </div>

    <div class="content_r scrollbar_hidden">
        @yield('content_r')

    </div>

</div>

@endsection