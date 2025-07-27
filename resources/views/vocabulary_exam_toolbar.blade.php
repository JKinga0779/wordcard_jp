@extends('home')
@section('content')
<div class="content">
    <div class="content_l scrollbar_hidden">
        <form method='POST' action="{{ route('vocabulary_exam') }}" enctype="multipart/form-data">
            @csrf
            <div class="vocabulary_tool">
                <div class="check_wrap">        
                    <div class="checkbox_selector">                
                        <h6>級別選擇</h6>
                        <div class="form-check">
                            <input class="form-check-input" name="class[]" type="checkbox" value="1" id="N1" checked>
                            <label class="form-check-label" for="N1">
                                N1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="class[]" type="checkbox" value="2" id="N2">
                            <label class="form-check-label" for="N2">
                                N2
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="class[]" type="checkbox" value="3" id="N3">
                            <label class="form-check-label" for="N3">
                                N3
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="class[]" type="checkbox" value="4" id="N4">
                            <label class="form-check-label" for="N4">
                                N4
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="class[]" type="checkbox" value="5" id="N5">
                            <label class="form-check-label" for="N5">
                                N5
                            </label>
                        </div>
                    </div>

                    <div class="checkbox_selector">
                        <h6>範圍選擇</h6>
                        <div class="form-check">
                            <input class="form-check-input" name="type[]" type="checkbox" value="1" id="noun" checked>
                            <label class="form-check-label" for="noun">
                                名詞
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type[]" type="checkbox" value="2" id="verb">
                            <label class="form-check-label" for="verb">
                                動詞
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type[]" type="checkbox" value="3" id="adjective">
                            <label class="form-check-label" for="adjective">
                                形容詞/形容動詞
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type[]" type="checkbox" value="4" id="adverb">
                            <label class="form-check-label" for="adverb">
                                副詞
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type[]" type="checkbox" value="5" id="classifier">
                            <label class="form-check-label" for="classifier">
                                量詞
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type[]" type="checkbox" value="6" id="katakana">
                            <label class="form-check-label" for="katakana">
                                片假名
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type[]" type="checkbox" value="7" id="other">
                            <label class="form-check-label" for="other">
                                其他
                            </label>
                        </div>
                    </div>

                    <div class="checkbox_selector">
                        <h6>顯示內容</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="showlang" id="show_japanesekan" value="1" checked>
                            <label class="form-check-label" for="show_japanesekan">
                                日文漢字/片假名
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="showlang" id="show_katakana" value="2">
                            <label class="form-check-label" for="show_katakana">
                                平假名
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="showlang" id="show_chinese" value="3">
                            <label class="form-check-label" for="show_chinese">
                                中文
                            </label>
                        </div>                        
                    </div>
                </div>

                <button id="btn_test" type='submit' class="btn_print" onclick="btn_test_click()">產生</button>
            </div>
        </form>
    </div>

    <div class="content_r scrollbar_hidden">
        @yield('content_r')

    </div>
    
</div>

@endsection