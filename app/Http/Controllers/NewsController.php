<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\News;


class NewsController extends Controller
{
    private $categories = [
        1 => 'Здоровье',
        2 => 'ИТ',
        3 => 'Спорт'
    ];

    public function index()
    {
       // $result = News::all();

        return view('news.index', ['categories' => $this->categories]);
    }

    public function list(News $news, $categoryId)
    {
        return view('news.list', ['news' => $news->getByCategoryId($categoryId)]);
    }

    public function card(News $news)
    {  //dd($news->id);
      return view('news.card', ['news'=>$news]);
       // $card = (new News_old())->getById($id);
       // return view('news.card', ['news' => $card]);
    }

    public function create()
    {
        return response(view('admin.news.create'));
    }

    public function save(Request $request)
    {
        $news =[
            'title'=>$request->input('news[title]'),
            'description'=>$request->input('news[description]'),
            'source'=>$request->input('news[source]'),
            'publish_date'=>$request->input('news[publish_date]'),
            'category_id'=>$request->input('news[category_id]'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ];


        $model = new News();
        $model->fill($news);
        $model->save();

       return redirect()->route('news::create');
    }
}
