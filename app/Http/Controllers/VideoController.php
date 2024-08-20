<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{

    public function index()
    {
        $videos = Video::all();
        return view('admin.video_show', compact('videos'));
    }
    public function createvideo()
    {
        return view('admin.video');
    }
    public function storevideo(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'required|file|mimes:mp4,avi,mkv|max:102400', 
        ]);
        $validated = $request->only('title', 'description');
        if ($request->hasFile('video_url')) {
            $videoPath = $request->file('video_url')->store('videos', 'public');
            $validated['video_url'] = $videoPath;
        }
        Video::create($validated);
        return redirect()->route('videos.create')->with('success', 'Video added successfully!');
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos-showchitiet', compact('video'));
    }

    // Hiển thị form chỉnh sửa video
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.video_edit', compact('video'));
    }

    // Cập nhật thông tin video
    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|file|mimes:mp4,avi,mkv|max:102400', // Hạn chế kích thước file video
        ]);

        $video = Video::findOrFail($id);

        $validated = $request->only('title', 'description');

        if ($request->hasFile('video_url')) {
            // Xóa video cũ nếu có
            if ($video->video_url && \Storage::exists('public/' . $video->video_url)) {
                \Storage::delete('public/' . $video->video_url);
            }

            $videoPath = $request->file('video_url')->store('videos', 'public');
            $validated['video_url'] = $videoPath;
        }

        $video->update($validated);

        // Chuyển hướng đến trang danh sách video hoặc trang khác
        return redirect()->route('videos.index')->with('success', 'Video updated successfully!');
    }

    // Xóa video
    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        // Xóa video từ hệ thống tệp
        if ($video->video_url && \Storage::exists('public/' . $video->video_url)) {
            \Storage::delete('public/' . $video->video_url);
        }

        $video->delete();

        // Chuyển hướng đến trang danh sách video hoặc trang khác
        return redirect()->route('videos.index')->with('success', 'Video deleted successfully!');
    }

}
