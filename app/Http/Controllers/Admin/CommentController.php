<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request)

    {
        $data = [
            'user_id' => Auth::user()->id,
            'product_id' => $request->input('product_id'),
            'content' => $request->input('content'),
            'active' => '1',
        ];
        if ($comment = Comment::create($data)) {
            $comments = Comment::where('product_id', (int)$request->input('product_id'))->OrderBy('id', 'DESC')->get();
            return view('customer.listComment');
        }
    }
}
