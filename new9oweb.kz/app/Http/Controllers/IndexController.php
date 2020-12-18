<?php

namespace App\Http\Controllers;

use App\Project;
use DemeterChain\Main;
use Illuminate\Http\Request;
use App\post;
use App\Aboutuspage;
use App\category;
use App\Metapage;
use App\Service;
use App\Client;
use App\Instrument;
use App\Projectcategor;
use App\Tag;
use App\Revue;
use App\Reward;
use App\Subscription;
use App\Vacancy;
use App\Team;
use App\Blogtag;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator,Redirect,Response,File;
Use App\Document;
use Illuminate\Support\Facades\Storage;
class IndexController extends Controller
{
    // Бля ну естественно индексная страница
    public function index(){
        $pronas=Aboutuspage::where('id', 1)->get()->toArray();
        $pronasSlider=Aboutuspage::where('showinmain', '>', 0)->get()->toArray();
        $pageWeCanPosts= Service::where("status", "PUBLISHED")->where("showonmainpage", ">", 0)->get()->toArray();
        $pagePochemuMy= Metapage::where('slug', 'allWeCanAll')->get()->toArray();
        $pageProjects= Project::where('showinmain', '1')->orderBy('id', 'desc')->limit(10)->get()->toArray();
        $pageNamDoveryayutVideo= post::join('categories', 'posts.category_id', '=', 'categories.id')->where("posts.status", "PUBLISHED")->where('categories.slug', 'nam-doveryayut-video')->limit(2)->orderBy('posts.id', 'desc')->get()->toArray();
        $blognews= post::where("status", "PUBLISHED")->limit(2)->orderBy('id', 'desc')->get()->toArray();
        $clients=Client::where('publishonmain', '1')->orderBy('id', 'desc')->get()->toArray();
        $clientsvideo=Client::where('publishvideo', '1')->limit(2)->orderBy('id', 'desc')->get()->toArray();
        return view('index', ['pronas'=>$pronas[0], 'pagePochemuMy'=>$pagePochemuMy[0], 'pageWeCanPosts'=>$pageWeCanPosts, 'pageProjects'=>$pageProjects, 'pageNamDoveryayutVideo'=>$pageNamDoveryayutVideo, 'blognews'=>$blognews, 'clients'=>$clients, 'clientsvideo'=>$clientsvideo, 'pronasSlider'=>$pronasSlider]);
    }

    public function search(Request $request)
    {
        $input = $request->all();
        if (isset($input['value']) && $input['value']!="" && $input['value']!=null) {
            $value=$input['value'];
            $value = trim($value);
            $value = stripslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $Projects= Project::where('title','LIKE', "%{$value}%")->orWhere('excerpt', 'LIKE', "%{$value}%")->orWhere('body', 'LIKE', "%{$value}%")->where("status", "PUBLISHED")->orderBy('id', 'desc')->get()->toArray();
            $posts= post::where('title','LIKE', "%{$value}%")->orWhere('excerpt', 'LIKE', "%{$value}%")->orWhere('body', 'LIKE', "%{$value}%")->where("status", "PUBLISHED")->orderBy('id', 'desc')->get()->toArray();
            $ProjectsWithTags= Project::select("projecttags.id_tag")->join('projecttags', 'projects.id', '=', 'projecttags.id_project')->where('projects.title','LIKE', "%{$value}%")->orWhere('projects.excerpt', 'LIKE', "%{$value}%")->orWhere('projects.body', 'LIKE', "%{$value}%")->where("projects.status", "PUBLISHED")->orderBy('projects.id', 'desc')->get()->toArray();
            $BlogWithTags= post::select("blogtags.id_tag")->join('blogtags', 'posts.id', '=', 'blogtags.id_post')->where('posts.title','LIKE', "%{$value}%")->orWhere('posts.excerpt', 'LIKE', "%{$value}%")->orWhere('posts.body', 'LIKE', "%{$value}%")->where("posts.status", "PUBLISHED")->orderBy('posts.id', 'desc')->get()->toArray();
            $arx=array();
            foreach ($ProjectsWithTags as $pr)
            {
                array_push($arx, $pr["id_tag"]);
            }
            foreach ($BlogWithTags as $pr)
            {
                array_push($arx, $pr["id_tag"]);
            }
            $ProjectsWithTags = array_unique($arx);
        } else {
            $value='';
            $Projects=array();
            $posts=array();
            $ProjectsWithTags=array();
        }
        return view('search', ['title'=>$value, 'description'=>$value, 'keyWords'=>$value, 'input'=>$input, 'value'=>$value, 'Projects'=>$Projects, 'posts'=>$posts, 'ProjectsWithTags'=>$ProjectsWithTags]);
    }

    public function searchbytag(Request $request)
    {
        $input = $request->all();
        if (isset($input['value']) && $input['value']!="" && $input['value']!=null) {
            $value=$input['value'];
            $value = trim($value);
            $value = stripslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $ProjTag=Tag::where('title','LIKE', "%{$value}%")->get()->toArray();
            $arx=array();
            foreach ($ProjTag as $pr)
            {
                array_push($arx, $pr["id"]);
            }
            $ProjTag=$arx;
            $postTag=Tag::where('title','LIKE', "%{$value}%")->get()->toArray();
            $arxPost=array();
            foreach ($postTag as $pr)
            {
                array_push($arxPost, $pr["id"]);
            }
            $postTag=$arxPost;
        }
        else {
            $value = '';
            $ProjTag=array();
            $postTag=array();
        }
        return view('search-by-tag', ['title'=>$value, 'description'=>$value, 'keyWords'=>$value, 'value'=>$value, 'ProjTag'=>$ProjTag, 'postTag'=>$postTag]);
    }

    public function ajaxRequestPost(Request $request)
    {
        $input = $request->all();
        $xx=(int)$input['lastprod'];
        $procid=$input['procid'];
        $projcat=$input['projcattitle'];
        $pageProjects= Project::where('id', "<", $xx)->where('id_projcat', $procid)->where("status", "PUBLISHED")->limit(6)->orderBy('id', 'desc')->get()->toArray();
        $str="";
        foreach ($pageProjects as $proj)
        {
            $str.='<div class="col-sm-6 col-xl-4">';
            $str.='<div class="projects__card">';
            $str.='<a href="/Portfolio/'.$proj['slug'].'" class="projects__img"><img src="/storage/'.$proj['image'].'" alt=""></a>';
            $str.='<div class="projects__desc">';
            $str.='<div class="projects__subtitle">'.$proj['title'].'</div>';
            $str.='<a href="javascript:void(0);" class="projects__title">'.$projcat.'</a>';
            $str.="</div>";
            $str.="</div>";
            $str.="</div>";
            $xx=$proj['id'];
        }
        $xCount = count($pageProjects);
        if ($xCount < 6) $styleShowMore = "display: none;"; else $styleShowMore = "";
        $arr=array();
        $arr[0]=$str;
        $arr[1]="<form><button type='button' onclick='ajaxReq($xx, \"".$input['ldiv']."\", \"".$input['buttonid']."\", $procid, \"$projcat\");' class='button projects__button' style='$styleShowMore'>Показать еще </button></form>";
        $arr[2]=$xx;
        return json_encode($arr);
    }

    public function ajaxRequestPostBlog(Request $request)
    {
        $months_name = array("января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря");
        $input = $request->all();
        $arr=array();
        $id=$input['id'];
        $but=$input['but'];
        $kuda=$input['kuda'];
        $catslug=str_replace("podpis", "", $kuda);
        if ($catslug=="all")
        {
            $blognews = post::where("status", "PUBLISHED")->where("id", "<", $id)->limit(4)->orderBy('id', 'desc')->get()->toArray();
        }
        else
        {
            $categorxxx = category::where('slug', $catslug)->get()->toArray();
            $blognews = post::where("status", "PUBLISHED")->where('category_id', $categorxxx[0]['id'])->where("id", "<", $id)->limit(4)->orderBy('id', 'desc')->get()->toArray();
        }
        $str="";
        foreach ($blognews as $new)
        {
            $categor = category::where('id', $new['category_id'])->get()->toArray();
            $str.='<div class="col-md-6">';
            $str.='<div class="blog__card">';
            $str.='<img src="/storage/'.$new['image'].'" class="blog__card-img" alt="">';
            $str.='<div class="blog__card-desc">';
            $str.='<div class="blog__card-date">'.date("d ".$months_name[date("n") - 1]." Y", strtotime($new['created_at'])).' - <a href="/blog#'.$categor[0]['slug'].'">'.$categor[0]['name'].'</a></div>';
            $str.='<a href="/blog/'.$new['slug'].'" class="blog__card-title">'.$new['title'].'</a>';
            $tager=Blogtag::join('tags', 'tags.id', '=', 'blogtags.id_tag')->where('blogtags.id_post', $new['id'])->get()->toArray();
            $str.='<div class="blog__card-tags">';
            foreach($tager as $tg)
            {
            $str.='<a href="/searchbytag?value='.$tg['title'].'" class="blog__card-tag">'.$tg['title'].'</a>';
            }
            $str.='</div>';
            $str.='</div>';
            $str.='</div>';
            $str.='</div>';
        }
        $xCount = count($blognews);
        if ($xCount < 4) $styleShowMore = "display: none;"; else $styleShowMore = "";
        if ($xCount>0) $end=end($blognews)['id']; else $end=0;
        $strbut="<form><button type=\"button\" onclick=\"ajaxReq($end, '$kuda', '$but')\" class=\"button projects__button\"  style=\"$styleShowMore\">Показать еще</button></form>";
        array_push($arr, $str);
        array_push($arr, $strbut);
        array_push($arr, $catslug);
        return json_encode($arr);
    }

    public function ajaxRequestRewues(Request $request)
    {
        $input = $request->all();
        $arr=array();
        $id=$input['id'];
        $str="";
        $end=0;
        $Rew=Client::where("id", "<", $id)->limit(4)->orderBy('id', 'desc')->get();
        foreach ($Rew as $re)
        {
            $str.='<div class="col-md-6">';
            $str.='<a href="https://www.youtube.com/embed/NuKREeAnm1s" class="reviews__video js-video-modal" data-youtube-id="'.$re->videolink.'">'; //'.$re->videolink.'
            $str.='<img src="/storage/'.$re->videoimage.'" class="reviews__img" alt="'.$re->videotitle.'">';
            $str.='<div class="reviews__video-cover">';
            $str.='<div class="reviews__title">'.$re->videotitle.'</div>';
            $str.='<div class="reviews__subtitle">'.$re->videodesc.'</div>';
            $str.='</div>';
            $str.='</a>';
            $str.='</div>';
            $end=$re->id;
        }
        $xCount=count($Rew);
        if($xCount<4) $styleShowMore="display: none;"; else $styleShowMore="";
        $strbut="<form><button type=\"button\" onclick=\"ajaxReq('".$end."')\" class=\"button reviews__button\"  style=\"".$styleShowMore."\">Показать еще</button></form>";
        array_push($arr, $str);
        array_push($arr, $strbut);
        return json_encode($arr);
    }

    public function ajaxRequestPodpiska(Request $request)
    {
        $input = $request->all();
        $id=$input['id'];
        $mail=$input['kuda'];
        $xar=Subscription::where("email", $mail)->get()->toArray();
        if (count($xar)>0) {} else {
            Subscription::insert(
                ['email' => $mail, 'lastid' => $id]
            );
        }
        return json_encode($input);
    }

    public function otpiska($id)
    {
        Subscription::where('id', $id)->delete();
        return $this->blog();
    }

    public function sendAllPodpiska()
    {
        $xar=Subscription::get()->toArray();
        $arr=array();
        foreach ($xar as $xx) {
            $email=$xx['email'];
            $id=$xx['lastid'];
            $idclient=$xx['id'];
            $blognews= post::where("status", "PUBLISHED")->where("spam", ">", 0)->where("id", ">", $id)->limit(1)->orderBy('id', 'desc')->get()->toArray();
            if ($blognews!=null) {
                $idx=$blognews[0]['id'];
                array_push($arr, $email);
                Mail::send('rassilka', ["id" => $idx, "idclient"=>$idclient], function ($message) use ($email) {
                    $message->to($email, 'Благодарим за заявку - 9 Oweb')->subject("Благодарим за заявку");
                    $message->from('no-reply@9oweb.kz', "9 Oweb");
                });
                Subscription::where('id', $idclient)->update(['lastid' => $idx]);
            }
        }
        return print_r($arr, true);
   }

    // Показывает single page страницы в виде страниц
    public function blog(){
        $pageBlog= Metapage::where('slug', 'blog')->get()->toArray();
        $blognews= post::where("status", "PUBLISHED")->limit(3)->orderBy('id', 'desc')->get()->toArray();
        return view('blog', ['title'=>$pageBlog[0]['meta_title'], 'description'=>$pageBlog[0]['meta_description'], 'keyWords'=>$pageBlog[0]['meta_keywords'], 'blognews'=>$blognews]);
    }

    // Показывает single post
    public function weCanAbout($slug){
        $post=Project::where('slug', $slug)->get();
        return view('weCanAbout', ['title'=>$post[0]->title, 'description'=>$post[0]->meta_description, 'keyWords'=>$post[0]->meta_keywords, 'post'=>$post[0]]);
    }

    public function blogPost($slug)
    {
        $post=post::where('slug', $slug)->get();
        return view('bloginside', ['title'=>$post[0]->title, 'description'=>$post[0]->meta_description, 'keyWords'=>$post[0]->meta_keywords, 'post'=>$post[0]]);
    }

    public function allWeCanAll()
    {
        $pagePochemuMy= Metapage::where('slug', 'allWeCanAll')->get()->toArray();
        $pageWeCanPosts= Service::where("status", "PUBLISHED")->get()->toArray();
        return view('allWeCan', ['title'=>$pagePochemuMy[0]['meta_title'], 'description'=>$pagePochemuMy[0]['meta_description'], 'keyWords'=>$pagePochemuMy[0]['meta_keywords'], 'pageWeCanPosts'=>$pageWeCanPosts]);
    }

    public function allPortfolio()
    {
        $portPage= Metapage::where('slug', 'portfolio')->get()->toArray();
        $projectCategories=Projectcategor::get()->toArray();
        return view('allPortfolio', ['title'=>$portPage[0]['title'], 'description'=>$portPage[0]['meta_description'], 'keyWords'=>$portPage[0]['meta_keywords'], 'projectCategories'=>$projectCategories]);
    }

    public function vacancy()
    {
        $vacancyPage= Metapage::where('slug', 'vakansii')->get()->toArray();
        $vacancy= Vacancy::select('*', "vacancies.id as ttt")->join('vacancycategories', 'vacancies.idcategory', '=', 'vacancycategories.id')->where("vacancies.status", "PUBLISHED")->orderBy('vacancies.id', 'desc')->get()->toArray();
        return view('vacancy', ['title'=>$vacancyPage[0]['title'], 'description'=>$vacancyPage[0]['meta_description'], 'keyWords'=>$vacancyPage[0]['meta_keywords'], 'vacancy'=>$vacancy]);
    }

    public function singleVacancy($id)
    {
        $post=Vacancy::where('id', $id)->get();
        return view('vacancysingle', ['title'=>$post[0]->title, 'description'=>$post[0]->meta_description, 'keyWords'=>$post[0]->meta_keys, 'post'=>$post[0]]);
    }

    public function rewues()
    {
        $rewuesPage= Metapage::where('slug', 'rewues')->get()->toArray();
        $clientsvideo=Client::limit(4)->orderBy('id', 'desc')->get()->toArray();
        return view('rewues', ['title'=>$rewuesPage[0]['title'], 'description'=>$rewuesPage[0]['meta_description'], 'keyWords'=>$rewuesPage[0]['meta_keywords'],'clientsvideo'=>$clientsvideo]);
    }

    public function agency()
    {
        $agencyPage= Metapage::where('slug', 'agenstvo')->get()->toArray();
        $pageWeCanPosts= Service::where("status", "PUBLISHED")->get()->toArray();
        $teamPage=Aboutuspage::where('slug', 'agency')->get()->toArray();
        $nagradi=Aboutuspage::where('slug', 'nagrady-i-dostizheniya')->get()->toArray();
        $instrument=Aboutuspage::where('slug', 'instrumenty-i-tehnologii')->get()->toArray();
        $team=Team::get()->toArray();
        $revards=Reward::limit(4)->orderBy('id', 'desc')->get()->toArray();
        $instruments=Instrument::get()->toArray();
        $Vacancy=Vacancy::limit(3)->orderBy('id', 'desc')->get()->toArray();
        return view('agency', ['title'=>$agencyPage[0]['title'], 'description'=>$agencyPage[0]['meta_description'], 'keyWords'=>$agencyPage[0]['meta_keywords'], 'pageWeCanPosts'=>$pageWeCanPosts, 'teamPage'=>$teamPage[0], 'team'=>$team, 'nagradi'=>$nagradi[0], 'revards'=>$revards, 'instrument'=>$instrument[0], 'instruments'=>$instruments, 'Vacancy'=>$Vacancy]);
    }

    // Отправить письмо с главной формы снизу
    public function applyForm(Request $request)
    {
        $Name = $request->name;
        $uslugaIVAN = $request->usluga;
        $email= $request->email;
        $telephone= $request->telephone;
        if (!is_null(request()->file('logo'))) $file=request()->file('logo')->storeAs('logos', request()->logo->getClientOriginalName()); else $file="0";
        Mail::send('mail', ['name' => "$Name", "body" => "$uslugaIVAN", "email" => $email, "telephone" => $telephone], function ($message) use ($file, $Name, $email, $uslugaIVAN, $request) {
            $message->to('order@9oweb.kz', "$Name")->subject("Я хочу заказать у вас $uslugaIVAN $Name"); // пишем самому себе
            $message->from('no-reply@9oweb.kz', "Заказ на: $uslugaIVAN"); // от себя
            if ($file!="0") $message->attach(storage_path("app/".$file));
        });
        File::Delete(storage_path("app/".$file));
        //return print_r(request()->file('logo'), true);
        $this->storeX($email);
    }

    public function applyVacancyForm(Request $request)
    {
        $Name = $request->name;
        $uslugaIVAN = $request->usluga;
        $email= $request->email;
        $telephone= $request->telephone;
        $idvac=$request->idvac;
        $mailvac=$request->mailvac;
        if (!is_null(request()->file('logo'))) $file=request()->file('logo')->storeAs('logos', request()->logo->getClientOriginalName()); else $file="0";
        Mail::send('mailvac', ['name' => "$Name", "body" => "$uslugaIVAN", "email" => $email, "telephone" => $telephone, 'mailvac'=>$mailvac], function ($message) use ($file, $Name, $email, $mailvac, $uslugaIVAN, $request) {
            $message->to($mailvac, "$Name")->subject("Я работать у вас $uslugaIVAN $Name"); // пишем самому себе
            $message->from('no-reply@9oweb.kz', "Вакансия: $uslugaIVAN"); // от себя
            if ($file!="0") $message->attach(storage_path("app/".$file));
        });
        File::Delete(storage_path("app/".$file));
        $this->storeXVac($email,$idvac);
    }

    // Отправить письмо клиенту обратка короче
    public function storeX($email)
    {
        Mail::send('email', ["body" => "111"], function ($message) use ($email) {
            $message->to($email, 'Благодарим за заявку - 9 Oweb')->subject("Благодарим за заявку");
            $message->from('no-reply@9oweb.kz', "9 Oweb");
        });

        echo $this->index();
    }

    public function storeXVac($email,$idvac)
    {
        Mail::send('email', ["body" => "111"], function ($message) use ($email) {
            $message->to($email, 'Благодарим за заявку - 9 Oweb')->subject("Благодарим за заявку");
            $message->from('no-reply@9oweb.kz', "9 Oweb");
        });

        echo $this->singleVacancy($idvac);
    }

    // Отправить письмо с главной формы сверху
    public function storeSecondForm(Request $request)
    {
        $Name = $request->name;
        $uslugaIVAN = "Заявка с формы";
        $email= $request->email;
        $telephone= $request->phone;
        Mail::send('mail', ['name' => $Name, "body" => $uslugaIVAN, "email" => $email, "telephone" => $telephone], function ($message) use ($Name, $uslugaIVAN) {
            $message->to('order@9oweb.kz', "$Name")->subject("$uslugaIVAN $Name"); // пишем самому себе
            $message->from('no-reply@9oweb.kz', "$uslugaIVAN"); // от себя
        });
        return redirect()->route('index');
        //return redirect()->to('/');
    }

}
