<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function getAvatars()
    {
        $files = File::files(public_path('images/avatar'));

        $new_images = [];

        foreach ($files as $file) {
            $new_image = '/images/avatar/' . $file->getRelativePathname();
            $arr = [
                'name' => $file->getRelativePathname(),
                'url' => $new_image
            ];
            array_push($new_images, $arr);
        }

        return response()->json($new_images);
    }

    public function avatarUpload(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'avatar_name' => 'required'
        ]);

        $employee->profile = '/images/avatar/' . $request->avatar_name;
        $employee->update();

        return response()->json([
            'message' => "Profile Updated."
        ]);
    }

    public function imageUpload(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'media' => 'required|mimes:jpeg,png,svg|max:50000'
        ]);

        if (!Storage::exists('public/employee_profile')) {
            Storage::makeDirectory('public/employee_profile');
        }

        // $newName = uniqid() . "_employee_profile." . $media->extension();
        // $url = $media->storeAs('public/employee_profile/', $newName);

        $file = $request->file('media');
        $fileNameWithExt = $file->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $fileNameToStore = $fileName . '_' . time() . '.' . $file->extension();

        $url = $file->storeAs('public/employee_profile', $fileNameToStore);

        $employee->profile = $url;
        $employee->update();

        return response()->json([
            'message' => "Profile Updated."
        ]);
    }
}
