<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class PropertyController extends Controller
{
    use FileUpload;

    function index()
    {
        return view('frontend.user.add-new-property');
    }

    function storeProperty(PropertyRequest $request)
    {
        // Handle image uploads
        $image1 = null;
        $image2 = null;
        $image3 = null;

        if ($request->hasFile('image_1')) {
            $image1 = $this->uploadPropertyImage($request->image_1);
        }
        if ($request->hasFile('image_2')) {
            $image2 = $this->uploadPropertyImage($request->image_2);
        }
        if ($request->hasFile('image_3')) {
            $image3 = $this->uploadPropertyImage($request->image_3);
        }

        $isPropertyExisted = Property::where('title', $request->title)->exists();

        $slug = $isPropertyExisted
            ? Str::slug($request->title . '-' . rand(1000, 9999))
            : Str::slug($request->title);


        // Create the property
        Property::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'price' => $request->price,
            'property_type' => $request->property_type,
            'listing_type' => $request->listing_type,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'parking_spaces' => $request->parking_spaces,
            'wifi' => $request->has('wifi') ? 1 : 0,
            'elevator' => $request->has('elevator') ? 1 : 0,
            'garden' => $request->has('garden') ? 1 : 0,
            'pool' => $request->has('pool') ? 1 : 0,
            'image_1' => $image1,
            'image_2' => $image2,
            'image_3' => $image3,
        ]);

        flash()->success('Ad added successfully!');
        return redirect()->back();
    }

    public function editProperty($id)
    {
        $property = Property::where('user_id', Auth::id())->findOrFail($id);
        return view('frontend.user.edit-property', compact('property'));
    }

    public function updateProperty(Request $request, $id)
    {
        $property = Property::where('user_id', Auth::id())->findOrFail($id);

        $isPropertyExisted = Property::where('title', $request->title)->exists();

        $slug = $isPropertyExisted
            ? Str::slug($request->title . '-' . rand(1000, 9999))
            : Str::slug($request->title);

        $data = $request->except(['image_1', 'image_2', 'image_3']);
        $data['slug'] = $slug;
        $data['wifi'] = $request->has('wifi');
        $data['elevator'] = $request->has('elevator');
        $data['garden'] = $request->has('garden');
        $data['pool'] = $request->has('pool');

        // Image handling
        if ($request->hasFile('image_1')) {
            if ($property->image_1) {
                $this->deleteFile($property->image_1); // Delete old
            }
            $data['image_1'] = $this->uploadPropertyImage($request->image_1);
        }

        if ($request->hasFile('image_2')) {
            if ($property->image_2) {
                $this->deleteFile($property->image_2); // Delete old
            }
            $data['image_2'] = $this->uploadPropertyImage($request->image_2);
        }

        if ($request->hasFile('image_3')) {
            if ($property->image_3) {
                $this->deleteFile($property->image_3); // Delete old
            }
            $data['image_3'] = $this->uploadPropertyImage($request->image_3);
        }

        $property->update($data);

        flash()->success('Property updated successfully!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $property = Property::where('user_id', Auth::id())->findOrFail($id);

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
