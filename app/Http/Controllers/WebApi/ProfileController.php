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

        $dir = "public/employee_profile";

        Storage::delete($dir . $employee->profile);

        if (!Storage::exists('public/employee_profile')) {
            Storage::makeDirectory('public/employee_profile');
        }

        $newName = uniqid() . "_user_photo." . $request->file("media")->extension();
        $request->file("media")->storeAs($dir, $newName);

        $employee->profile = $newName;
        $employee->update();

        return response()->json([
            'message' => "Profile Updated."
        ]);
    }
}
