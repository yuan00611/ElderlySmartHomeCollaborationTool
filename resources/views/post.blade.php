@extends('layouts/app')

@section('title')
<link rel="stylesheet" href="{{ asset('css/main.css') }}" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

@endsection


@section('content')

<section id="interaction">
<div class="section-header">
    <h3 class="section-title">擺放智慧科技</h3>
    <span class="section-divider"></span>
    <p class="section-description">透過需求篩選出適合的科技，點擊“加入”可將科技加入室內設計圖中</p>
</div>



<div class="whole">

    
    <div class="cards">

    <h1 class="flip_main">連網環境建立(必選)</h1>
    <div class="gateway">
    @foreach($gateway as $g)
<!-- Modal -->
<div class="modal fade" id="{{$g->idtechnology}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">詳細資訊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>科技介紹：</span> 
        <p>{{ $g->introduction }}</p>
<!--        <span>通常擺放位置：</span> 
        <p>{{ $g->location }}</p> --> 
        <span>供電方式：</span> 
        <p>{{ $g->power }}</p>
        <span>連網方式：</span> 
        <p>{{ $g->link_way }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

        <div class="card">
            <div class="left">
                <h2> {{ $g->name }} </h2>
                <img id="c" class="cover" src="{{ asset($g->image_path) }}"/>
            </div>
            <div class="right">
                <p> 搭配使用科技： </p>
                <p> 通常擺放位置： {{ $g->location }}</p>

                <!-- Button trigger modal -->
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                    詳細資訊
                </button>

                <button class="add" onclick="addPicture( '{{$g->image_path}}', {{$g->price}}, {{$g->see_percent}}, {{$g->listen_percent}}, {{$g->muscle_percent}}, {{$g->balance_percent}}, {{$g->memory_percent}}, {{$g->sleep_percent}}, {{$g->accident_percent}}, {{$g->health_percent}}, {{$g->psy_percent}} )"> 加入 </button>
                
            </div>
        </div>
    @endforeach
    </div>

    <!-- 視覺 -->
    @if ($see != null)
    <h1 class="flip_see"> 生理功能強化＿視覺 </h1>
    <div class="see">
    @foreach($see as $s)
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">詳細資訊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>科技介紹：</span> 
        <p>{{ $s->introduction }}</p>
        <span>通常擺放位置：</span> 
        <p>{{ $s->location }}</p>
        <span>供電方式：</span> 
        <p>{{ $s->power }}</p>
        <span>連網方式：</span> 
        <p>{{ $s->link_way }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

        <div class="card">
            <div class="left">
                <h2> {{ $s->name }} </h2>
                <img id="c" class="cover" src="{{ asset($s->image_path) }}"/>
            </div>
            <div class="right">
                <p> 搭配使用科技： </p>
                <p> 預計強化視覺成效：{{$s->see_percent}} %</p>
                <p> 成本：{{$s->price}} </p>
                <p> 建議使用個數： </p>

                <!-- Button trigger modal -->
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                    詳細資訊
                </button>

                <button class="add" onclick="addPicture( '{{$s->image_path}}', {{$s->price}}, {{$s->see_percent}}, {{$s->listen_percent}}, {{$s->muscle_percent}}, {{$s->balance_percent}}, {{$s->memory_percent}}, {{$s->sleep_percent}}, {{$s->accident_percent}}, {{$s->health_percent}}, {{$s->psy_percent}} )"> 加入 </button>
                
            </div>
        </div>
    @endforeach
    </div>
    @endif


    <!-- 聽覺 -->
    @if($listen != null)
    <h1 class="flip_listen"> 生理功能強化＿聽覺 </h1>
    <div class="listen"> 
    @foreach($listen as $l)

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">詳細資訊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>科技介紹：</span> 
        <p>{{ $l->introduction }}</p>
        <span>通常擺放位置：</span> 
        <p>{{ $l->location }}</p>
        <span>供電方式：</span> 
        <p>{{ $l->power }}</p>
        <span>連網方式：</span> 
        <p>{{ $l->link_way }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


        <div class="card">
            <div class="left">
                <h2> {{ $l->name }} </h2>
                <img id="c" class="cover" src="{{ asset($l->image_path) }}"/>
            </div>
            <div class="right">
                <p> 搭配使用科技： </p>
                <p> 預計強化聽覺成效：{{$l->listen_percent}} %</p>
                <p> 成本：{{$l->price}} </p>
                <p> 建議使用個數： </p>

                <!-- Button trigger modal -->
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                    詳細資訊
                </button>

                <button class="add" onclick="addPicture( '{{$l->image_path}}', {{$l->price}}, {{$l->see_percent}}, {{$l->listen_percent}}, {{$l->muscle_percent}}, {{$l->balance_percent}}, {{$l->memory_percent}}, {{$l->sleep_percent}}, {{$l->accident_percent}}, {{$l->health_percent}}, {{$l->psy_percent}} )"> 加入 </button>

            </div>
        </div>
    @endforeach
    </div>
    @endif

    <!-- 肌肉與關節 -->
    @if($muscle != null)
    <h1 class="flip_muscle"> 生理功能強化＿關節與肌肉 </h1>
    <div class="muscle">
    @foreach($muscle as $m)

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">詳細資訊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>科技介紹：</span> 
        <p>{{ $m->introduction }}</p>
        <span>通常擺放位置：</span> 
        <p>{{ $m->location }}</p>
        <span>供電方式：</span> 
        <p>{{ $m->power }}</p>
        <span>連網方式：</span> 
        <p>{{ $m->link_way }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


        <div class="card">
            <div class="left">
                <h2> {{ $m->name }} </h2>
                <img id="c" class="cover" src="{{ asset($m->image_path) }}"/>
            </div>
            <div class="right">
                
                <p> 搭配使用科技： </p>
                <p> 預計強化肌肉與關節成效：{{$m->muscle_percent}} %</p>
                <p> 成本：{{$m->price}} </p>
                <p> 建議使用個數： </p>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                    詳細資訊
                </button>

                <button class="add" onclick="addPicture( '{{$m->image_path}}', {{$m->price}}, {{$m->see_percent}}, {{$m->listen_percent}}, {{$m->muscle_percent}}, {{$m->balance_percent}}, {{$m->memory_percent}}, {{$m->sleep_percent}}, {{$m->accident_percent}}, {{$m->health_percent}}, {{$m->psy_percent}} )"> 加入 </button>
            </div>
        </div>
    @endforeach
    </div>
    @endif

    <!-- 平衡 -->
    @if($balance != null)
    <h1 class="flip_balance"> 生理功能強化＿平衡 </h1>
    <div class="balance">
    @foreach($balance as $b)

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">詳細資訊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>科技介紹：</span> 
        <p>{{ $b->introduction }}</p>
        <span>通常擺放位置：</span> 
        <p>{{ $b->location }}</p>
        <span>供電方式：</span> 
        <p>{{ $b->power }}</p>
        <span>連網方式：</span> 
        <p>{{ $b->link_way }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


        <div class="card">
            <div class="left">
                <h2> {{ $b->name }} </h2>
                <img id="c" class="cover" src="{{ asset($b->image_path) }}"/>
            </div>
            <div class="right">
                <p> 搭配使用科技： </p>
                <p> 預計平衡成效：{{$b->balance_percent}} %</p>
                <p> 成本：{{$b->price}} </p>
                <p> 建議使用個數： </p>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                    詳細資訊
                </button>

                <button class="add" onclick="addPicture( '{{$b->image_path}}', {{$b->price}}, {{$b->see_percent}}, {{$b->listen_percent}}, {{$b->muscle_percent}}, {{$b->balance_percent}}, {{$b->memory_percent}}, {{$b->sleep_percent}}, {{$b->accident_percent}}, {{$b->health_percent}}, {{$b->psy_percent}} )"> 加入 </button>

            </div>
        </div>
    @endforeach
    </div>
    @endif


    <!-- 記憶 -->
    @if($memory != null)
    <h1 class="flip_memory"> 生理功能強化＿記憶 </h1>
    <div class="memory">
    @foreach($memory as $me)

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">詳細資訊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>科技介紹：</span> 
        <p>{{ $me->introduction }}</p>
        <span>通常擺放位置：</span> 
        <p>{{ $me->location }}</p>
        <span>供電方式：</span> 
        <p>{{ $me->power }}</p>
        <span>連網方式：</span> 
        <p>{{ $me->link_way }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



        <div class="card">
            <div class="left">
                <h2> {{ $me->name }} </h2>
                <img id="c" class="cover" src="{{ asset($me->image_path) }}"/>
            </div>
            <div class="right">
                
                <p> 搭配使用科技： </p>
                <p> 預計強化記憶成效：{{$me->memory_percent}} %</p>
                <p> 成本：{{$me->price}} </p>
                <p> 建議使用個數： </p>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                    詳細資訊
                </button>

                <button class="add" onclick="addPicture( '{{$me->image_path}}', {{$me->price}}, {{$me->see_percent}}, {{$me->listen_percent}}, {{$me->muscle_percent}}, {{$me->balance_percent}}, {{$me->memory_percent}}, {{$me->sleep_percent}}, {{$me->accident_percent}}, {{$me->health_percent}}, {{$me->psy_percent}} )"> 加入 </button>

            </div>
        </div>
    @endforeach
    </div>
    @endif

    <!-- 睡眠 -->
    @if($sleep != null)
    <h1 class="flip_sleep"> 生理功能強化＿睡眠 </h1>
    <div class="sleep">
    @foreach($sleep as $s)

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">詳細資訊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>科技介紹：</span> 
        <p>{{ $s->introduction }}</p>
        <span>通常擺放位置：</span> 
        <p>{{ $s->location }}</p>
        <span>供電方式：</span> 
        <p>{{ $s->power }}</p>
        <span>連網方式：</span> 
        <p>{{ $s->link_way }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

        <div class="card">
            <div class="left">
                <h2> {{ $s->name }} </h2>
                <img id="c" class="cover" src="{{ asset($s->image_path) }}"/>
            </div>
            <div class="right">
                
                <p> 搭配使用科技： </p>
                <p> 預計改善睡眠成效：{{$s->sleep_percent}} %</p>
                <p> 成本：{{$s->price}} </p>
                <p> 建議使用個數： </p>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                    詳細資訊
                </button>

                <button class="add" onclick="addPicture( '{{$s->image_path}}', {{$s->price}}, {{$s->see_percent}}, {{$s->listen_percent}}, {{$s->muscle_percent}}, {{$s->balance_percent}}, {{$s->memory_percent}}, {{$s->sleep_percent}}, {{$s->accident_percent}}, {{$s->health_percent}}, {{$s->psy_percent}} )"> 加入 </button>

            </div>
        </div>
    @endforeach
    </div>
    @endif

    <!-- 意外預防 -->
    @if($accident != null)
    <h1 class="flip_accident"> 意外預防與緊急應變 </h1>
    <div class="accident">
    @foreach($accident as $a)

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">詳細資訊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>科技介紹：</span> 
        <p>{{ $a->introduction }}</p>
        <span>通常擺放位置：</span> 
        <p>{{ $a->location }}</p>
        <span>供電方式：</span> 
        <p>{{ $a->power }}</p>
        <span>連網方式：</span> 
        <p>{{ $a->link_way }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

        <div class="card">
            <div class="left">
                <h2> {{ $a->name }} </h2>
                <img id="c" class="cover" src="{{ asset($a->image_path) }}"/>
            </div>
            <div class="right">
                
                <p> 搭配使用科技： </p>
                <p> 預計避免意外成效：{{$a->accident_percent}} %</p>
                <p> 成本：{{$a->price}} </p>
                <p> 建議使用個數： </p>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                    詳細資訊
                </button>

                <button class="add" onclick="addPicture( '{{$a->image_path}}', {{$a->price}}, {{$a->see_percent}}, {{$a->listen_percent}}, {{$a->muscle_percent}}, {{$a->balance_percent}}, {{$a->memory_percent}}, {{$a->sleep_percent}}, {{$a->accident_percent}}, {{$a->health_percent}}, {{$a->psy_percent}} )"> 加入 </button>

            </div>
        </div>
    @endforeach
    </div>
    @endif


    <!-- 健康管理 -->
    @if($health != null)
    <h1 class="flip_health"> 健康管理 </h1>
    <div class="health">
    @foreach($health as $h)

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">詳細資訊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>科技介紹：</span> 
        <p>{{ $h->introduction }}</p>
        <span>通常擺放位置：</span> 
        <p>{{ $h->location }}</p>
        <span>供電方式：</span> 
        <p>{{ $h->power }}</p>
        <span>連網方式：</span> 
        <p>{{ $h->link_way }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

        <div class="card">
            <div class="left">
                <h2> {{ $h->name }} </h2>
                <img id="c" class="cover" src="{{ asset($h->image_path) }}"/>
            </div>
            <div class="right">
                
                <p> 搭配使用科技： </p>
                <p> 預計達成健康管理成效：{{$h->health_percent}} %</p>
                <p> 成本：{{$h->price}} </p>
                <p> 建議使用個數： </p>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                    詳細資訊
                </button>

                <button class="add" onclick="addPicture( '{{$h->image_path}}', {{$h->price}}, {{$h->see_percent}}, {{$h->listen_percent}}, {{$h->muscle_percent}}, {{$h->balance_percent}}, {{$h->memory_percent}}, {{$h->sleep_percent}}, {{$h->accident_percent}}, {{$h->health_percent}}, {{$h->psy_percent}} )"> 加入 </button>

            </div>
        </div>
    @endforeach
    </div>
    @endif

    <!-- 心理狀態強化 -->
    @if($psy != null)
    <h1 class="flip_psy"> 心理狀態強化 </h1>
    <div class="psy">
    @foreach($psy as $p)

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">詳細資訊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>科技介紹：</span> 
        <p>{{ $p->introduction }}</p>
        <span>通常擺放位置：</span> 
        <p>{{ $p->location }}</p>
        <span>供電方式：</span> 
        <p>{{ $p->power }}</p>
        <span>連網方式：</span> 
        <p>{{ $p->link_way }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

        <div class="card">
            <div class="left">
                <h2> {{ $p->name }} </h2>
                <img id="c" class="cover" src="{{ asset($p->image_path) }}"/>
            </div>
            <div class="right">
                
                <p> 搭配使用科技： </p>
                <p> 預計強化心理狀態成效：{{$p->psy_percent}} %</p>
                <p> 成本：{{$p->price}} </p>
                <p> 建議使用個數： </p>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                    詳細資訊
                </button>

                <button class="add" onclick="addPicture( '{{$p->image_path}}', {{$p->price}}, {{$p->see_percent}}, {{$p->listen_percent}}, {{$p->muscle_percent}}, {{$p->balance_percent}}, {{$p->memory_percent}}, {{$p->sleep_percent}}, {{$p->accident_percent}}, {{$p->health_percent}}, {{$p->psy_percent}} )"> 加入 </button>

            </div>
        </div>
    @endforeach
    </div>
    @endif

        <!-- 照顧者_緊急預防 -->
    @if($caregiver_accident != null)
    <h1 class="flip_caregiver_accident"> 照顧者_意外預防與緊急應變 </h1>
    <div class="caregiver_accident">
    @foreach($caregiver_accident as $c_a)

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">詳細資訊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>科技介紹：</span> 
        <p>{{ $c_a->introduction }}</p>
        <span>通常擺放位置：</span> 
        <p>{{ $c_a->location }}</p>
        <span>供電方式：</span> 
        <p>{{ $c_a->power }}</p>
        <span>連網方式：</span> 
        <p>{{ $c_a->link_way }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



        <div class="card">
            <div class="left">
                <h2> {{ $c_a->name }} </h2>
                <img id="c" class="cover" src="{{ asset($c_a->image_path) }}"/>
            </div>
            <div class="right">
                
                <p> 搭配使用科技： </p>
                <p> 預計強化記憶成效：{{$c_a->memory_percent}} %</p>
                <p> 成本：{{$c_a->price}} </p>
                <p> 建議使用個數： </p>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                    詳細資訊
                </button>

                <button class="add" onclick="addPicture( '{{$c_a->image_path}}', {{$c_a->price}}, {{$c_a->see_percent}}, {{$c_a->listen_percent}}, {{$c_a->muscle_percent}}, {{$c_a->balance_percent}}, {{$c_a->memory_percent}}, {{$c_a->sleep_percent}}, {{$c_a->accident_percent}}, {{$c_a->health_percent}}, {{$c_a->psy_percent}} )"> 加入 </button>

            </div>
        </div>
    @endforeach
    </div>
    @endif

        <!-- 照顧者_照顧活動輔助 -->
    @if($caregiver_help != null)
    <h1 class="flip_caregiver_help"> 照顧者_照顧活動輔助 </h1>
    <div class="caregiver_help">
    @foreach($caregiver_help as $c_h)

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">詳細資訊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>科技介紹：</span> 
        <p>{{ $c_h->introduction }}</p>
        <span>通常擺放位置：</span> 
        <p>{{ $c_h->location }}</p>
        <span>供電方式：</span> 
        <p>{{ $c_h->power }}</p>
        <span>連網方式：</span> 
        <p>{{ $c_h->link_way }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



        <div class="card">
            <div class="left">
                <h2> {{ $c_h->name }} </h2>
                <img id="c" class="cover" src="{{ asset($c_h->image_path) }}"/>
            </div>
            <div class="right">
                
                <p> 搭配使用科技： </p>
                <p> 預計強化記憶成效：{{$c_h->memory_percent}} %</p>
                <p> 成本：{{$c_h->price}} </p>
                <p> 建議使用個數： </p>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                    詳細資訊
                </button>

                <button class="add" onclick="addPicture( '{{$c_h->image_path}}', {{$c_h->price}}, {{$c_h->see_percent}}, {{$c_h->listen_percent}}, {{$c_h->muscle_percent}}, {{$c_h->balance_percent}}, {{$c_h->memory_percent}}, {{$c_h->sleep_percent}}, {{$c_h->accident_percent}}, {{$c_h->health_percent}}, {{$c_h->psy_percent}} )"> 加入 </button>

            </div>
        </div>
    @endforeach
    </div>
    @endif

        <!-- 照顧者_心理狀態強化 -->
    @if($caregiver_psy != null)
    <h1 class="flip_caregiver_psy"> 照顧者_心理狀態強化 </h1>
    <div class="caregiver_psy">
    @foreach($caregiver_psy as $c_p)

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">詳細資訊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>科技介紹：</span> 
        <p>{{ $c_p->introduction }}</p>
        <span>通常擺放位置：</span> 
        <p>{{ $c_p->location }}</p>
        <span>供電方式：</span> 
        <p>{{ $c_p->power }}</p>
        <span>連網方式：</span> 
        <p>{{ $c_p->link_way }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



        <div class="card">
            <div class="left">
                <h2> {{ $c_p->name }} </h2>
                <img id="c" class="cover" src="{{ asset($c_p->image_path) }}"/>
            </div>
            <div class="right">
                
                <p> 搭配使用科技： </p>
                <p> 預計強化記憶成效：{{$c_p->memory_percent}} %</p>
                <p> 成本：{{$c_p->price}} </p>
                <p> 建議使用個數： </p>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                    詳細資訊
                </button>

                <button class="add" onclick="addPicture( '{{$c_p->image_path}}', {{$c_p->price}}, {{$c_p->see_percent}}, {{$c_p->listen_percent}}, {{$c_p->muscle_percent}}, {{$c_p->balance_percent}}, {{$c_p->memory_percent}}, {{$c_p->sleep_percent}}, {{$c_p->accident_percent}}, {{$c_p->health_percent}}, {{$c_p->psy_percent}} )"> 加入 </button>

            </div>
        </div>
    @endforeach
    </div>
    @endif

    </div>
    

    <div class="canvas" id="can1" >
        <canvas id="mycanvas"></canvas>
        <div class="b">
            <button onclick="clearCanvas()">清除畫布</button>
            <button onclick="deleteSelectPic()"> 刪除選取科技</button>
        </div>
        <div class="b2">
            <a href="#" download="dl.png" onclick="this.href=canvas.toDataURL()" >下載圖片</a>
            <a href="#result" onclick="finish()">完成</a>
        </div>
        
        
    </div>

</div>

</section>

<section id="result">
    
    <div class="section-header">
        <h3 class="section-title">設計總結</h3>
        <span class="section-divider"></span>
        <p class="section-description">呈現您室內設計的結果，並提供成本與預期效果供參考</p>
    </div>



    <div id="saveImage">
        <h3>室內設計圖:</h3>
                
    </div>

    <div id="req">
        <h3 id="require_p">解決需求的程度</h3>
        <table>
            <tr>

                <td>
                    @if($see != null)
                        <img class="box" src="/img/01eye.png">
                        <span id="eye">{{$resultNumber}} %</span>
                    @endif
                </td>
                <td>
                    @if($listen != null)
                    <img class="box" src=/img/02ear.png>
                    <span id="ear">{{$resultNumber}}  %</span>
                    @endif
                </td>
                <td>
                    @if($muscle != null)
                    <img class="box" src="/img/03muscle.png">
                    <span id="mus">{{$resultNumber}}  %</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if($balance != null)
                    <img class="box" src="/img/04balance.png">
                    <span id="bal">{{$resultNumber}}  %</span>
                    @endif
                </td>
                <td>
                    @if($memory != null)
                    <img class="box" src=/img/05memory.png>
                    <span id="mem">{{$resultNumber}}  %</span>
                    @endif
                </td>
                <td>
                    @if($sleep != null)
                    <img class="box" src="/img/06sleep.png">
                    <span id="sle">{{$resultNumber}}  %</span>
                    @endif
                </td>
            </tr>
            <tr>
                    <td>
                    @if($accident != null)
                    <img class="box" src="/img/07accident.png">
                    <span id="acc">{{$resultNumber}}  %</span>
                    @endif
                </td>
                <td>
                    @if($health != null)
                    <img class="box" src=/img/08health.png>
                    <span id="hea">{{$resultNumber}}  %</span>
                    @endif
                </td>
                <td>
                    @if($psy != null)
                    <img class="box" src="/img/09psy.png">
                    <span id="ps">{{$resultNumber}}  %</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if($caregiver_accident != null)
                    <img class="box" src="/img/07accident.png">
                    <span id="acc">{{$resultNumber}}  %</span>
                    @endif
                </td>
                <td>
                    @if($caregiver_help != null)
                    <img class="box" src=/img/08health.png>
                    <span id="hea">{{$resultNumber}}  %</span>
                    @endif
                </td>
                <td>
                    @if($caregiver_psy != null)
                    <img class="box" src="/img/09psy.png">
                    <span id="ps">{{$resultNumber}}  %</span>
                    @endif
                </td>
            </tr>
        </table>
    </div>

    
    {{-- <h3 id="allAmount">共花費成本</h3>  --}}


</section>


<script type = "text/javascript" src="{{ asset('js/main.js') }}"></script>

@endsection

{{--
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <h1>{{$title}}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Technology</th>
                    <th>Introduction</th>
                    <th>Image</th>
                    <th>Reminder</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->introduction }}</td>
                    <td></td>
                    <td>{{ $post->reminder }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<button> 另存圖片 </button>
 --}}


