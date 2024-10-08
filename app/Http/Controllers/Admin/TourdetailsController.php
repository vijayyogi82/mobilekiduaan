<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tourdetail;
use App\Models\Tourlocation;
use App\Models\Tourcategory;
use App\Models\Tourdetail_itinerary;
use App\Models\Tourdetail_gallary;
use App\Models\Tourdetail_departure;


class TourdetailsController extends Controller
{

    public function index()
    {
        $tourdetails = Tourdetail::with('tourcategory')->latest()->get();
        return view('admin.tourdetails.index', compact('tourdetails'));
    }

    public function create()
    {
        $tourcategories = Tourcategory::all();
        $tourlocations = Tourlocation::all();
        $tourdetails = Tourdetail::all();
        $Tourdetail_departure = Tourdetail_departure::all();
        $Tourdetail_itinerary = Tourdetail_itinerary::all();
        return view('admin.tourdetails.create', compact('tourcategories', 'tourlocations', 'tourdetails', 'Tourdetail_departure', 'Tourdetail_itinerary'));
    }

    public function store(Request $request)
    {

        // overview also insert with Tourdetail
        $tourdetail = new Tourdetail();

        if ($request->has('featured_image')) {
            $image = $request->featured_image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->featured_image->move('storage/tourdetai', $imageName);
            $tourdetail->featured_image = $imageName;
        }
      
        $tourdetail->title = $request->title;
        $tourdetail->price = $request->price;
        $tourdetail->activitylevel = $request->activitylevel;
        $tourdetail->location_id = $request->location_id;
        $tourdetail->tourcategory_id = $request->tourcategory_id;
        $tourdetail->groupsize = $request->groupsize;
        $tourdetail->overview = $request->overview;
        $tourdetail->included = $request->included;
        $tourdetail->not_included = $request->not_included;
        $tourdetail->save();

        // itinerary
		        if (!empty($request->days)) {
            foreach ($request->days as $key => $day) {
                $itinerary = new Tourdetail_itinerary;
                $itinerary->days = $day;
                $itinerary->description = $request->description[$key];
                $itinerary->tourdetails_id = $tourdetail->id;
                $itinerary->save();
            }
        }

        // gallary
        $files = [];
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('storage/tourdetai'), $name);
                $files[$key] = $name;
            }
        }
        foreach ($request->file('images') as $key => $file) {
            $file = new Tourdetail_gallary();
            $file->images = $files[$key];
            $file->tourdetails_id = $tourdetail->id;
            $file->save();
        }

        // tour departure
        if (!empty($request->departure_date)) {
            foreach ($request->departure_date as $key => $departure_date) {
                $Departure  = new Tourdetail_departure();
                $Departure->departure_date = $request->departure_date;
                $Departure->price = $request->price;
                $Departure->seats = $request->seats;
                $Departure->tourdetails_id = $tourdetail->id;
                $Departure->save();
            }
        }

        return redirect()->route('tourdetail.index')->with('success', 'Tourdetails created successfully')->with('featured_image');
    }


    public function show($id)
    {
        $tourcategorys =  Tourcategory::all();
        $tourdetails = Tourdetail::find($id);
        $gallarys = Tourdetail_gallary::where('tourdetails_id', $id)->get();
        $itinerarys = Tourdetail_itinerary::where('tourdetails_id', $id)->get();
        $departures = Tourdetail_departure::where('tourdetails_id', $id)->get();
        return view('admin.tourdetails.show', compact('tourdetails', 'tourcategorys', 'gallarys', 'itinerarys', 'departures'));
    }

    public function edit($id)
    {
        $tourcategorys =  Tourcategory::all();
        $tourlocations = Tourlocation::all();
        $itinerarys = Tourdetail_itinerary::all();
        $tourdetails = Tourdetail::find($id);
        return view('admin.tourdetails.edit', compact('tourdetails', 'tourcategorys', 'tourlocations','itinerarys'));
    }
  
  
  
    public function update(Request $request, $id)
    {
      
       dd($request->all());
      
        try {
            $tourdetail = Tourdetail::find($id);

            if ($request->hasFile('featured_image')) {
                $featuredImage = $request->file('featured_image');
                $imageName = time() . '.' . $featuredImage->getClientOriginalExtension();
                $featuredImage->storeAs('public/featured_image', $imageName);
                $tourdetail->featured_image = 'storage/featured_image/' . $imageName;
            }

            $tourdetail->update([
                'title' => $request->title,
                'price' => $request->price,
                'activitylevel' => $request->activitylevel,
                'location_id' => $request->location_id,
                'tourcategory_id' => $request->id,
                'groupsize' => $request->groupsize,
                'overview' => $request->overview,
                'included' => $request->included,
                'not_included' => $request->not_included,
            ]);

            // Gallary Images
            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $file) {
                    $imageName = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/tourdetai', $imageName);
                    Tourdetail_gallary::create([
                        'images' => 'storage/tourdetai/' . $imageName,
                        'tourdetails_id' => $tourdetail->id,
                    ]);
                }
            }

            // Tour Departures
            if (!empty($request->departure_date)) {
                foreach ($request->departure_date as $key => $departure_date) {
                    Tourdetail_departure::create([
                        'departure_date' => $departure_date,
                        'price' => $request->price[$key],
                        'seats' => $request->seats[$key],
                        'tourdetails_id' => $tourdetail->id,
                    ]);
                }
            }

            return redirect()->route('tourdetail.index')->with('success', 'Tourdetails updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
      
      
    }

  
  

    public function delete($id)
    {
        $tourdetails = Tourdetail::where('id', $id)->delete();
        return redirect()->route('tourdetail.index')->with('success', 'Tour details deleted successfully');
    }


    public function tourdetail_image(Request $request)
    {
        if (!empty($request->images)) {
            $files = [];
            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $key => $file) {
                    $name = time() . rand(1, 100) . '.' . $file->extension();
                    $file->move(public_path('storage/tourdetai'), $name);
                    $files[$key] = $name;
                }
            }
            foreach ($request->images as $key => $file) {
                $image  = new Tourdetail_gallary();
                $image->image = $files[$key];
                $image->tourdetails_id = 1;
                $image->save();
            }
        }
    }

    public function update_status_popular($id)
    {
        $Tourdetail = Tourdetail::find($id);
        if ($Tourdetail->is_popular == 1) {
            $Tourdetail->is_popular = 0;
        } else {
            $Tourdetail->is_popular = 1;
        }
        $Tourdetail->save();
        return $Tourdetail->is_popular;
    }

    public function update_status_top_adventures($id)
    {
        $Tourdetail = Tourdetail::find($id);
        if ($Tourdetail->is_top_adventures == 1) {
            $Tourdetail->is_top_adventures = 0;
        } else {
            $Tourdetail->is_top_adventures = 1;
        }
        $Tourdetail->save();
        return $Tourdetail->is_top_adventures;
    }

    public function update_status_featured($id)
    {
        $Tourdetail = Tourdetail::find($id);
        if ($Tourdetail->is_featured == 1) {
            $Tourdetail->is_featured = 0;
        } else {
            $Tourdetail->is_featured = 1;
        }
        $Tourdetail->save();
        return $Tourdetail->is_featured;
    }
}
