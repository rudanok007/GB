<?php


namespace Modules\News\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\News\Model\Category;
use Modules\News\Model\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::getNews();
        $category = Category::all();

        return view('news::index', compact(
            'news',
            'category'
        ));
    }

    public function getNews($id)
    {
        $news = News::getNews();

        $oneNews = collect($news)->filter(function ($item) use (&$id){
            return $item['id'] == $id;
        })->first();

        return view('news::oneNews', compact('oneNews'));
    }

    public function filter(Request $request)
    {
        $check_category = $request->get('category');
        if(collect($check_category)->isEmpty())
        {
            return redirect('/news');
        }
        $news = News::whereIn('category_code', $check_category)->get();
        $category = Category::all();
        return view('news::index', compact(
            'news',
            'check_category',
            'category'
        ));


    }

    public function createNews()
    {
        $news = new News();
        return view('news::create', ['news' => $news]);
    }

    public function create(Request $request)
    {
        $credentials = $this->validate($request, [
           'title' => 'required|string|max:255',
           'category_code' => 'required',
           'description' => 'required|string|max:1000',
           'fulltext' => 'required|string|max:5000',
        ]);
        News::query()->create($credentials);
        return redirect()->back('301');


    }

    public function about()
    {
        return view('news::index');
    }
}
