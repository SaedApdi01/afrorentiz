<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index()
    {
        $properties = Property::latest()->take(6)->get();
        return view('index', compact(['properties']));
    }
    function about()
    {
        return view('frontend.about');
    }
    function contact()
    {
        return view('frontend.contact');
    }
    function terms()
    {
        return view('terms');
    }
    function privacy()
    {
        return view('privacy');
    }

    public function properties(Request $request)
    {
        $query = Property::query();

        // Country
        if ($request->filled('country')) {
            $query->where('country', 'LIKE', '%' . $request->country . '%');
        }

        // City
        if ($request->filled('city')) {
            $query->where('city', 'LIKE', '%' . $request->city . '%');
        }

        // Price range
        if ($request->filled('price')) {
            if ($request->price === '0-1000') {
                $query->whereBetween('price', [0, 1000]);
            } elseif ($request->price === '1000-3000') {
                $query->whereBetween('price', [1000, 3000]);
            } elseif ($request->price === '3000+') {
                $query->where('price', '>', 3000);
            }
        }

        // Property type
        if ($request->filled('property_type')) {
            $query->where('property_type', $request->property_type);
        }

        // Listing type (rent or sale)
        if ($request->filled('listing_type')) {
            $query->where('listing_type', $request->listing_type);
        }

        // Features
        if ($request->has('wifi')) {
            $query->where('wifi', 1);
        }

        if ($request->has('pool')) {
            $query->where('pool', 1);
        }

        if ($request->has('parking_spaces')) {
            $query->where('parking_spaces', '>', 0);
        }

        $properties = $query->orderBy('created_at', 'desc')->paginate(4);

        return view('frontend.properties', compact('properties'));
    }


    function viewProperty($slug)
    {
        $property = Property::where('slug', $slug)->firstOrFail();
        $user = $property->owner;
        $latestProperties = Property::latest()->take(3)->get();

        return view('frontend.single', compact('property', 'latestProperties', 'user'));
    }
}
