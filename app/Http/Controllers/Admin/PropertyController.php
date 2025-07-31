<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
     use FileUpload;

    function index()
    {
        $properties = Property::paginate(10);
        return view('frontend.admin.property-lists', compact(['properties']));
    }
    public function destroy($id)
    {
        $property = Property::findOrFail($id);

        // Delete images if exist

        if ($property->image_1) {
            $this->deleteFile($property->image_1);
        }

        if ($property->image_1) {
            $this->deleteFile($property->image_1);
        }

        if ($property->image_2) {
            $this->deleteFile($property->image_2);
        }

        if ($property->image_3) {
            $this->deleteFile($property->image_3);
        }



        $property->delete();

        flash()->success('Property deleted successfully!');
        return redirect()->back();
    }
}
