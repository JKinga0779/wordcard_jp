@extends('vocabulary_exam_toolbar')
<script>
    function btn_answer_click(){
        const answer_p = document.getElementsByClassName('answer');    
        const btn_answer = document.getElementById('btn_answer'); 
        const grade = document.getElementById('grade');  
        var grade_count = 0;
        var move = document.getElementById('page_top');
        move.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
        for (i = 0; i < answer_p.length; i++) {
            answer_p[i].removeAttribute('hidden');
        }
        for (i = 0; i < 20; i++) {
            var Q_A = document.getElementById('qur_A_'+i);
            var Ans_A = document.getElementById('ans_A_'+i);
            var Q_B = document.getElementById('qur_B_'+i);
            var Ans_B = document.getElementById('ans_B_'+i);

            if((Q_A.value == Ans_A.innerHTML) &&
               (Q_B.value == Ans_B.innerHTML) ){
                var redpen = document.getElementById('correct_'+i);
                grade_count ++;
            }
            else{
                var redpen = document.getElementById('wrong_'+i);
            }
            redpen.removeAttribute('hidden');
        }
        
        grade.removeAttribute('hidden');
        btn_answer.setAttribute('hidden',true);
        grade.innerHTML = '答對題數：' + grade_count+"/20";

    }
</script>
@section('content_r')
<div class="test_content" id="page_top">

    <div class="question_wrap">
        @if($voc_count>0)
        @switch($showlang)
            @case(1)
                @for( $i = 0 ; $i < $voc_count ; $i++ )
                <div class="qa_wrap">
                    <div class="question">
                        <div class="question_t">
                            <p>N{{$vocabulary_posts[$i]['class']}}</p>
                            <p>{{$vocabulary_posts[$i]['type_name']}}</p>
                        </div>
                        <h1>{{$vocabulary_posts[$i]['japanesekan']}}</h1>
                        <div class="text_input_box">
                            <label for="{{'qur_A_' . $i}}">平假名</label>
                            <input name="{{'qur_A_' . $i}}" id="{{'qur_A_' . $i}}" type="text" class="form-control" value=""/>
                            <p class="answer" id="{{'ans_A_' . $i}}" hidden>{{$vocabulary_posts[$i]['katakana']}}</p>
                        </div>
                        <div class="text_input_box">
                            <label for="{{'qur_B_' . $i}}">中文</label>
                            <input name="{{'qur_B_' . $i}}" id="{{'qur_B_' . $i}}" type="text" class="form-control" value=""/>
                            <p class="answer" id="{{'ans_B_' . $i}}" hidden>{{$vocabulary_posts[$i]['chinese']}}</p>
                        </div>
                    </div>        
                    <div class="redpen">
                        <div id="{{'correct_' . $i}}" hidden> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#50bb7d" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                            </svg>
                        </div>
                        <div id="{{'wrong_' . $i}}" hidden>
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="red" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                            </svg>
                        </div>                
                    </div>
                </div>         
                @endfor
                @break
            @case(2)
                @for( $i = 0 ; $i < $voc_count ; $i++ )
                <div class="qa_wrap"> 
                    <div class="question">
                        <div class="question_t">
                            <p>N{{$vocabulary_posts[$i]['class']}}</p>
                            <p>{{$vocabulary_posts[$i]['type_name']}}</p>
                        </div>
                        <h1>{{$vocabulary_posts[$i]['katakana']}}</h1>
                        <div class="text_input_box">
                            <label for="{{'qur_A_' . $i}}">日文漢字/片假名</label>
                            <input name="{{'qur_A_' . $i}}" id="{{'qur_A_' . $i}}" type="text" class="form-control" value=""/>
                            <p class="answer" id="{{'ans_A_' . $i}}" hidden>{{$vocabulary_posts[$i]['japanesekan']}}</p>
                        </div>
                        <div class="text_input_box">
                            <label for="{{'qur_B_' . $i}}">中文</label>
                            <input name="{{'qur_B_' . $i}}" id="{{'qur_B_' . $i}}" type="text" class="form-control" value=""/>
                            <p class="answer" id="{{'ans_B_' . $i}}" hidden>{{$vocabulary_posts[$i]['chinese']}}</p>                                
                        </div>
                    </div>         
                    <div class="redpen">
                        <div id="{{'correct_' . $i}}" hidden> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#50bb7d" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                            </svg>
                        </div>
                        <div id="{{'wrong_' . $i}}" hidden>
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="red" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                            </svg>
                        </div>                
                    </div>
                </div>    
                @endfor
                @break
            @case(3)
                @for( $i = 0 ; $i < $voc_count ; $i++ )
                <div class="qa_wrap">
                    <div class="question">
                        <div class="question_t">
                            <p>N{{$vocabulary_posts[$i]['class']}}</p>
                            <p>{{$vocabulary_posts[$i]['type_name']}}</p>
                        </div>
                        <h1>{{$vocabulary_posts[$i]['chinese']}}</h1>
                        <div class="text_input_box">
                            <label for="{{'qur_A_' . $i}}">日文漢字/片假名</label>
                            <input name="{{'qur_A_' . $i}}" id="{{'qur_A_' . $i}}" type="text" class="form-control" value=""/>
                            <p class="answer" id="{{'ans_A_' . $i}}" hidden>{{$vocabulary_posts[$i]['japanesekan']}}</p>
                        </div>
                        <div class="text_input_box">
                            <label for="{{'qur_B_' . $i}}">平假名</label>
                            <input name="{{'qur_B_' . $i}}" id="{{'qur_B_' . $i}}" type="text" class="form-control" value=""/>
                            <p class="answer" id="{{'ans_B_' . $i}}" hidden>{{$vocabulary_posts[$i]['katakana']}}</p>
                        </div>
                    </div>           
                    <div class="redpen">
                        <div id="{{'correct_' . $i}}" hidden> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#50bb7d" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                            </svg>
                        </div>
                        <div id="{{'wrong_' . $i}}" hidden>
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="red" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                            </svg>
                        </div>                
                    </div>
                </div>
                @endfor
                @break
            @endswitch   
            

            <button id="btn_answer" type='submit' class="btn_print" onclick="btn_answer_click()">對答案</button>
            <a id="btn_end" href="/vocabulary/exam/select" type='button' class="btn_print">結束</a>
        @else
            <h2 class="note">無符合條件資料</h2> 
        @endif
    </div>
    <div style="height: 100px;">
    </div>
</div>
<h1 class="grade" id="grade" hidden>20/20</h1>

@endsection