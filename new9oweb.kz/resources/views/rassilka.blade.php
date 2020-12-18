<h1 style="text-align: center; background: dodgerblue; color: white;">Вышла новая интересная статья! Хотите ознакомиться?</h1>
@php $tagerPost=DB::table('posts')->where('id', $id)->get()->toArray(); @endphp
<a href="{!! asset('/blog') !!}/{{$tagerPost[0]->slug}}"><h2 style="text-align: center">{{$tagerPost[0]->title}}</h2></a>
<img width="100%" height="100%" src="{!! asset('/storage') !!}/{{  str_replace("\\", "/", $tagerPost[0]->image)}}" alt="{{$tagerPost[0]->title}}">
<p>При желании вы можете отписаться от новостей. Для этого пройдите по ссылке ниже</p>
<a href="{!! asset('/otpiska') !!}/{{$idclient}}">отписаться</a>
