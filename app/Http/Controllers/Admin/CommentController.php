<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Http\Services\Comment\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    protected $commentService;
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }
    public function comment(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'product_id' => $request->input('product_id'),
            'content' => $request->input('content'),

        ];
        if ($comment = Comment::create($data)) {
            $comments = Comment::where('product_id', (int)$request->input('product_id'))->OrderBy('id', 'DESC')->get();
            return view('customer.listComment');
        }
    }
    public function show()

    {
        $comments = Comment::where('active', '0')->get();
        return view('admin.comment.list', [
            'title' => 'Trang danh sách sản phẩm',
            'comments' => $comments,
        ]);
    }
    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {
        $result = $this->commentService->destroy($request);
        if ($result) {
            return response()->json(
                [
                    'error' => false,
                    'message' => 'Xóa thành công danh mục'
                ]
            );
        } else {
            return response()->json(
                [
                    'error' => true,
                ]
            );
        }
        // dd($request->input());
    }
}
