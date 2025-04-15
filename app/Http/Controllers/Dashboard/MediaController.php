<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $media = Media::query();

        if ($request->has('search')) {
            $media->where('name', 'like', "%{$request->search}%");
        }

        $media = $media->latest()->paginate(20);

        return view('dashboard.media.index', compact('media'));
    }

    public function destroy(Media $media)
    {
        $media->delete();
        return redirect()->back()->with('success', 'Media Deleted');
    }

    public function download(Media $media)
    {
        return response()->download($media->getPath());
    }
}
