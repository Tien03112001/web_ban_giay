<?php

namespace App\Http\Services\Comment;

use App\Models\Comment;
use Illuminate\Support\Str;

class CommentService
{
    public function destroy($request)
    {
        $comment = Comment::where('id', $request->input('id'))->get();
        if ($comment) {
            return Comment::where('id', $request->input('id'))->delete();
        }
        return false;
        // dd($request->input('id'));
    }
}
