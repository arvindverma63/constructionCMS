<?php

namespace App\Logic;

use Illuminate\Http\Request;
use App\Models\Contractor as ContractorModel;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Contractor
{
    public function addContractor(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'name' => explode(' ', trim($request->name))[0] . time(),
            'password' => bcrypt(Str::random(15)),
        ]);

        if ($user) {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('contractor_images', 'public');
            }

            // Create contractor record with new user's ID
            $response = ContractorModel::create([
                'name' => $request->name,
                'email' => $request->email,
                'phoneNumber' => $request->phoneNumber,
                'aadhar' => $request->aadhar,
                'companyName' => $request->companyName,
                'experience' => $request->experience,
                'field' => $request->field,
                'userId' => $user->id, // ✅ Corrected here
                'image' => $imagePath,
            ]);

            return $response;
        }

        return null;
    }

    public function getContractors()
    {
        return ContractorModel::paginate(10); // you can set any number you like
    }
    public function deleteContractor($id)
    {
        $contractor = ContractorModel::find($id);

        if ($contractor) {
            // Delete the image if it exists
            if ($contractor->image && Storage::disk('public')->exists($contractor->image)) {
                Storage::disk('public')->delete($contractor->image);
            }

            // Delete contractor record
            $contractor->delete();
        }

        return;
    }
}
