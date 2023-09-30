<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\PropertyType;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyGalleryImage;
use App\Models\PropertyLegalDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PropertyController extends Controller
{
    //--index
    public function index(Request $request)
    {
        if (auth()->guard('admin')->user()->Role?->slug == 'management') {
            $properties = Property::where('p_title', 'like', '%' . $request->search . '%')->where('status', 1)->where('management_check', 0)->latest()->paginate(10);
        }

        if (auth()->guard('admin')->user()->Role?->slug == 'legal') {
            $properties = Property::where('p_title', 'like', '%' . $request->search . '%')->where('status', 0)->latest()->paginate(10);
        }
        if (auth()->guard('admin')->user()->Role?->slug == 'admin') {

            $properties = Property::where('p_title', 'like', '%' . $request->search . '%')->where('status', 1)->where('management_check', 1)->where('admin_check', 0)->orWhere('admin_id', '!=', null)->latest()->paginate(10);
        }
        $approval = 0;
        return view('backend.property.index', [
            'properties' => $properties,
            'approval' => $approval
        ]);
    }

    //--approved_property
    public function approved_property(Request $request)
    {
        $properties = Property::where('p_title', 'like', '%' . $request->search . '%')->where('status', 1)->where('management_check', 1)->where('admin_check', 1)->latest()->paginate(10);
        $approval = 1;
        return view('backend.property.index', [
            'properties' => $properties,
            'approval' => $approval,
        ]);
    }

    //--create
    public function create()
    {
        $cities = City::get();
        $property_types = PropertyType::get();
        return view('backend.property.create', [
            'property_types' => $property_types,
            'cities' => $cities,
        ]);
    }

    //--store
    public function store(Request $request)
    {
        $request->validate([
            'p_title' => 'required',
            'p_selling_type' => 'required',
            'p_type' => 'required',
            'p_price' => 'required',
            'p_area' => 'required',
            'p_address' => 'required',
            'p_city' => 'required',
            'p_state' => 'required',
            'p_thumbnail_image' => 'required',
            'p_legal_document' => 'required',
            'p_description' => 'required',
        ], [
            'p_title.required' => 'Property Title Field Is Required!',
            'p_selling_type.required' => 'Select Property Selling Type!',
            'p_type.required' => 'Select Property Type!',
            'p_price.required' => 'Property Price Field Is Required!',
            'p_area.required' => 'Property Area Field Is Required!',
            'p_address.required' => 'Type Your Valid Address!',
            'p_city.required' => 'Property City Field Is Required!',
            'p_state.required' => 'Property State Field Is Required!',
            'p_thumbnail_image.required' => 'Upload Property Thumbnail Image!',
            'p_legal_document.required' => 'Upload Property Legal Document!',
            'p_description.required' => 'Property Description Field Is Required!',
        ]);


        $thumbnail = $request->file('p_thumbnail_image');
        $thumbnail_name = uniqid() . '-' . $thumbnail->getClientOriginalName();
        $filePath = public_path('Uploads/Property/Thumbnail');
        $request->file('p_thumbnail_image')->move($filePath, $thumbnail_name);

        //-legal document upload
        $legal_document = $request->file('p_legal_document');
        $filename = uniqid() . '.' . $legal_document->getClientOriginalExtension();
        // Move the image to the storage directory
        $filePaths = public_path('Uploads/Property/LegalProperty');
        $legal_document->move($filePaths, $filename);


        $property = Property::create([
            'p_title' => $request->p_title,
            'p_selling_type' => $request->p_selling_type,
            'p_type' => $request->p_type,
            'p_feature' => $request->p_feature,
            'p_price' => $request->p_price,
            'p_area' => $request->p_area,
            'p_floor' => $request->p_floor,
            'p_address' => $request->p_address,
            'p_city' => $request->p_city,
            'p_state' => $request->p_state,
            'p_map' => $request->p_map,
            'p_bedroom' => $request->p_bedroom,
            'p_bathroom' => $request->p_bathroom,
            'p_thumbnail_image' => $thumbnail_name,
            'p_legal_document' => $filename,
            'p_description' => $request->p_description,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'admin_id' => auth()->guard('admin')->user()->id,
        ]);

        // //-legal document upload
        // if ($property) {
        //     foreach ($request->file('p_legal_document') as $legal_document) {
        //         // Generate a unique filename for each image
        //         $filename = uniqid() . '.' . $legal_document->getClientOriginalExtension();

        //         // Move the image to the storage directory
        //         $filePaths = public_path('Uploads/Property/LegalProperty');
        //         $legal_document->move($filePaths, $filename);
        //         PropertyLegalDocument::create([
        //             'property_id' => $property->id,
        //             'name' => $filename,
        //         ]);
        //     }
        // }

        //-gallery image upload
        if ($request->hasFile('p_gallery_image')) {
            if ($property) {
                foreach ($request->file('p_gallery_image') as $gallery_image) {
                    // Generate a unique filename for each image
                    $filename = uniqid() . '.' . $gallery_image->getClientOriginalExtension();

                    // Move the image to the storage directory
                    $filePaths = public_path('Uploads/Property/GalleryImage');
                    $gallery_image->move($filePaths, $filename);
                    PropertyGalleryImage::create([
                        'property_id' => $property->id,
                        'name' => $filename,
                    ]);
                }
            }
        }
        return redirect()->route('admin.property')->with('message', 'Property Added Has Been Successfully !');
    }

    //-----edit
    public function edit($id)
    {
        $property_types = PropertyType::get();
        $cities = City::get();
        $property = Property::findOrFail($id);
        return view('backend.property.edit', [
            'property' => $property,
            'property_types' => $property_types,
            'cities' => $cities,
        ]);
    }

    //--galleryImage_delete
    public function galleryImage_delete($galleryImage)
    {
        $property_gallery_id = PropertyGalleryImage::findOrFail($galleryImage);
        $galleryImage_name = $property_gallery_id->name;
        $oldPath = 'Uploads/Property/GalleryImage/' . $galleryImage_name;
        File::delete(public_path($oldPath));
        $property_gallery_id->delete();
        return response()->json(['message' => 'Property Gallery Image deleted']);
    }

    //--property_update
    public function update(Request $request, $id)
    {
        $request->validate([
            'p_title' => 'required',
            'p_selling_type' => 'required',
            'p_type' => 'required',
            'p_price' => 'required',
            'p_area' => 'required',
            'p_address' => 'required',
            'p_state' => 'required',
            // 'p_thumbnail_image' => 'required',
            // 'p_legal_document' => 'required',
            'p_description' => 'required',
        ], [
            'p_title.required' => 'Property Title Field Is Required!',
            'p_selling_type.required' => 'Select Property Selling Type!',
            'p_type.required' => 'Select Property Type!',
            'p_price.required' => 'Property Price Field Is Required!',
            'p_area.required' => 'Property Area Field Is Required!',
            'p_address.required' => 'Type Your Valid Address!',
            'p_city.required' => 'Property City Field Is Required!',
            'p_state.required' => 'Property State Field Is Required!',
            // 'p_thumbnail_image.required' => 'Upload Property Thumbnail Image!',
            // 'p_legal_document.required' => 'Upload Property Legal Document!',
            'p_description.required' => 'Property Description Field Is Required!',
        ]);

        $property = Property::findOrFail($id);
        $property->update([
            'p_title' => $request->p_title,
            'p_selling_type' => $request->p_selling_type,
            'p_type' => $request->p_type,
            'p_feature' => $request->p_feature,
            'p_price' => $request->p_price,
            'p_area' => $request->p_area,
            'p_floor' => $request->p_floor,
            'p_address' => $request->p_address,
            'p_state' => $request->p_state,
            'p_map' => $request->p_map,
            'p_bedroom' => $request->p_bedroom,
            'p_bathroom' => $request->p_bathroom,
            'p_description' => $request->p_description,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
        ]);

        if ($request->hasFile('p_thumbnail_image')) {
            $oldFile = $property->p_thumbnail_image;
            $oldPath = 'Uploads/Property/Thumbnail/' . $oldFile;
            if ($oldPath) {
                File::delete(public_path($oldPath));
            }

            $name = uniqid() . '_' . 'thumbnail_image_update' . '.' . $request->file('p_thumbnail_image')->extension();
            $request->file('p_thumbnail_image')->move(public_path('Uploads/Property/Thumbnail'), $name);
            $property->update([
                'p_thumbnail_image' => $name,
            ]);
        }

        if ($request->hasFile('p_legal_document')) {
            $oldFiles = $property->p_legal_document;
            $oldPaths = 'Uploads/Property/LegalProperty/' . $oldFiles;
            if ($oldPaths) {
                File::delete(public_path($oldPaths));
            }

            $names = uniqid() . '_' . 'LegalProperty_update' . '.' . $request->file('p_legal_document')->extension();
            $request->file('p_legal_document')->move(public_path('Uploads/Property/LegalProperty'), $names);
            $property->update([
                'p_legal_document' => $names,
            ]);
        }

        if ($request->hasFile('p_gallery_image')) {
            if ($property) {
                foreach ($request->file('p_gallery_image') as $gallery_image) {
                    // Generate a unique filename for each image
                    $filename = uniqid() . '.' . $gallery_image->getClientOriginalExtension();

                    // Move the image to the storage directory
                    $filePaths = public_path('Uploads/Property/GalleryImage');
                    $gallery_image->move($filePaths, $filename);
                    PropertyGalleryImage::create([
                        'property_id' => $property->id,
                        'name' => $filename,
                    ]);
                }
            }
        }

        return redirect()->back()->with('message', 'Property Update Has Been Successfully !');
    }

    //--change_status
    public function change_status($id)
    {
        $property = Property::findOrFail($id);
        $property->update([
            'status' => 1
        ]);
        return back()->with('message', 'Property Status Approved!');
    }

    //--management_check
    public function management_check($id)
    {
        $property = Property::findOrFail($id);
        $property->update([
            'management_check' => 1
        ]);
        return back()->with('message', 'Property management_check Approved!');
    }

    //--admin_check
    public function admin_check($id)
    {
        $property = Property::findOrFail($id);
        $property->update([
            'admin_check' => 1
        ]);
        return back()->with('message', 'Property admin_check Approved!');
    }

    //--show
    public function show($id)
    {
        $property_id = $id;
        $property = Property::where('id', $property_id)->first();
        return view('backend.property.show', [
            'property' => $property
        ]);
    }

    //---property_delete
    public function delete($id)
    {
        $property = Property::findOrFail($id);

        if ($property->p_thumbnail_image) {
            $oldFile = $property->p_thumbnail_image;
            $oldPath = 'Uploads/Property/Thumbnail/' . $oldFile;
            if ($oldPath) {
                File::delete(public_path($oldPath));
            }
        }

        //delete gallery Image
        $galleryImages = PropertyGalleryImage::where('property_id', $id)->get();
        foreach ($galleryImages as $gallery) {
            $galleryImagePaths = 'Uploads/Property/GalleryImage/' . $gallery->name;
            File::delete(public_path($galleryImagePaths));
            $gallery->delete();
        }

        //delete legal document 

        if ($property->p_legal_document) {
            $oldFile = $property->p_legal_document;
            $oldPath = 'Uploads/Property/LegalProperty/' . $oldFile;
            if ($oldPath) {
                File::delete(public_path($oldPath));
            }
        }


        $property->delete();
        return redirect()->route('admin.property')->with('message', "Property deleted successfully!");
    }
}
