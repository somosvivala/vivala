<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Jenssegers\Date\Date;
use Illuminate\Http\Request;

class FeedController extends Controller {

	public function __construct(){
		//Só passa se estiver logado
		$this->middleware('auth');
	}

	// Compartilha os posts para a view de feed
	public function getFeeds($view){

		$posts = Post::getMaisfotos()->keyBy('id');

                if (env('POST_FIXO_ID') != null)
                {
                    $post_fixo = $posts->find(env('POST_FIXO_ID'));
                    $posts->forget($post_fixo->id);
                    $posts->prepend($post_fixo);
                } else {
                    dd('sem post fixo no env');
                }

		$view->with('posts', $posts);
	}

}
