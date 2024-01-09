<?php

namespace App\Http\Controllers;

use App\Models\TaskComment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskCommentController extends Controller
{
    public function index()
    {
        // Lấy tất cả các task comments
        $taskComments = TaskComment::all();

        // Trả về view hiển thị danh sách task comments
        return view('task_comments.index', compact('taskComments'));
    }

    public function create()
    {
        // Trả về view để tạo mới task comment
        return view('task_comments.create');
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'task_id' => 'required|max:255',
            'content' => 'required|max:255',
            'reply_id' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $taskcomment = new TaskComment();
        $taskcomment->create_by = $user_id;
        $taskcomment->task_id = $request->input('task_id');
        $taskcomment->content = $request->input('content');
        $taskcomment->reply_id = $request->input('reply_id');
        $taskcomment->save();

        // Chuyển hướng về trang danh sách task comments hoặc trang chi tiết task comment vừa tạo
        return redirect()->back();
    }

    public function show(TaskComment $taskComment)
    {
        // Trả về view hiển thị chi tiết task comment
        return view('task_comments.show', compact('taskComment'));
    }

    public function edit(TaskComment $taskComment)
    {
        // Trả về view để chỉnh sửa task comment
        return view('task_comments.edit', compact('taskComment'));
    }

    public function update(Request $request, TaskComment $taskComment)
    {
        // Kiểm tra và cập nhật thông tin task comment vào cơ sở dữ liệu
        $taskComment->fill($request->all());
        $taskComment->save();

        // Chuyển hướng về trang danh sách task comments hoặc trang chi tiết task comment vừa cập nhật
        return redirect()->route('task_comments.index');
    }

    public function destroy(TaskComment $taskComment)
    {
        // Xóa task comment khỏi cơ sở dữ liệu
        $taskComment->delete();

        // Chuyển hướng về trang danh sách task comments
        return redirect()->route('task_comments.index');
    }
}
