<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
Use App\Models\PropertyType;
Use App\Models\Amenities;

class PropertyTypeController extends Controller
{
    // All Type
    public function AllType(){
        $types = PropertyType::latest()->get();
        return view('backend.type.all_type',compact('types'));

    } //End Method

    // Add Type
    public function AddType(){
        return view('backend.type.add_type');

    } //End Method

    // Store Type
    public function StoreType(Request $request)
    {
    // Validation
    $request->validate([
        'type_name' => 'required|unique:property_types|max:200',
        'type_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $filePath = null;
    if ($request->file('type_icon')) {
        $file = $request->file('type_icon');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('upload/property_type'), $fileName); // Move the file to public/upload/property_type directory
        $filePath = 'upload/property_type/' . $fileName; // Save the relative path in the database
    }

    PropertyType::create([
        'type_name' => $request->type_name,
        'type_icon' => $filePath,
    ]);

    $notification = [
        'message' => 'Property Type Created Successfully',
        'alert-type' => 'success'
    ];
    return redirect()->route('all.type')->with($notification);
    }//End Method

    // Edit Type
    public function EditType($id){
        $types = PropertyType::findOrFail($id);
        return view('backend.type.edit_type',compact('types'));
    } //End Method

    // Update Type
    public function UpdateType(Request $request)
    {
    $request->validate([
        'type_name' => 'required|max:200',
        'type_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $propertyType = PropertyType::findOrFail($request->id);

    if ($request->hasFile('type_icon')) {
        // Delete the old file if it exists
        if ($propertyType->type_icon && file_exists(public_path($propertyType->type_icon))) {
            @unlink(public_path($propertyType->type_icon));
        }

        $file = $request->file('type_icon');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('upload/property_type'), $fileName); // Move the file to the public/upload/property_type directory
        $propertyType->type_icon = 'upload/property_type/' . $fileName; // Save the relative path in the database
    }

    $propertyType->type_name = $request->type_name;
    $propertyType->save();

    $notification = [
        'message' => 'Property Type Updated Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.type')->with($notification);
    }//End Method

    // Delete Type
    public function DeleteType($id)
    {
    $propertyType = PropertyType::findOrFail($id);

    if ($propertyType->type_icon && file_exists(public_path($propertyType->type_icon))) {
        @unlink(public_path($propertyType->type_icon)); // Delete the image file
    }

    $propertyType->delete();

    $notification = [
        'message' => 'Property Type Deleted Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->back()->with($notification);
    }//End Method

    //////////////// Amemities All Method ////////////////
    
    public function AllAmenitie() {
        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all_amenities', compact('amenities'));
    } // End Method
    public function AddAmenitie(){
        return view('backend.amenities.add_amenities');

    } //End Method

    public function StoreAmenitie(Request $request){
    //    Validation alrady added so no need

        Amenities::insert([
            'amenitis_name' => $request->amenitis_name,
        ]);
        $notification = array(
            'message' => 'Amenities Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.amenitie')->with($notification);
    } //End Method

    public function EditAmenitie($id){
        $amenities = Amenities::findOrFail($id);
        return view('backend.amenities.edit_amenities',compact('amenities'));
    } //End Method

    public function UpdateAmenitie(Request $request){
        $ame_id = $request->id;
        Amenities::findOrFail($ame_id)->update([
            'amenitis_name' => $request->amenitis_name,
        ]);
        $notification = array(
            'message' => 'Amenitie Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.amenitie')->with($notification);
    } //End Method 
    
    public function DeleteAmenitie($id){
        Amenities::findOrFail($id)->delete();
  
        $notification = array(
          'message' =>'Amenities Delete Succesfully',
          'alert-type' => 'success'
        );
          return redirect()->back()->with($notification);
  
      } //End Method
}
