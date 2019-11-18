<?php

namespace App\Http\Controllers\Sitemanager\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Sitemanager\BaseController;

use App\Web\Models\Post\Comment;

class CommentController extends BaseController
{

    public function index($post_id)
    {
        $moduleUrl      = 'sitemanager/post/'.$post_id.'/comment';
        $baseUrl        = url($moduleUrl);
        $moduleTitle    = 'Comment';

        $q       = request('q');
		$by      = request('by');
        $perpage = (request('perpage')) ? request('perpage') : 10;
        
        $comments= Comment::active()->basePost($post_id);

		if($by){
			$comments   = $comments->search($by, $q);
        }
        
        $comments       = $comments->paginate($perpage);
        $total_record   = Comment::count();

        return $this->template('post.comment.index', compact(
            'moduleUrl', 'baseUrl', 'moduleTitle', 'comments', 'total_record'
        ));
    }

    public function detail($post_id, $id)
    {
        $findComment = Comment::find($id);

        return response()->json($findComment);
    }

    public function hide($post_id, $id)
    {
        $comment = Comment::find($id);
        $comment->active = 0;
        $comment->save();

        return redirect()->back();
    }
}
