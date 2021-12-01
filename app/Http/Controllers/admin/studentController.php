<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\studentResource;
use App\Models\attendance;
use App\Models\classe;
use App\Models\role;
use App\Models\sections;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use Spatie\QueryBuilder\QueryBuilder;

class studentController extends Controller
{
    use GeneralTrait;

    public function getStudent()
    {
        $data['students'] = User::where('role', 'student')->paginate(10);
        $data['classes'] = classe::where('className', '!=', 'not')->get();
        $data['sections'] = sections::where('sectionName', '!=', 'not')->get();

        // dd($data['sections']);
        return view('admin.student.student')->with($data);
    }
    public function activation($id, Request $request)
    {
        $user = User::find($id);
        if ($user == null) {
            $request->session()->flash('error', 'error in id ');
            return back();
        }
        $user->where('id', $id)->update([
            'active' => !$user->active,
        ]);
        $request->session()->flash('msg', 'row updated successfully');
        return back();
    }

    public function sections($id)
    {
        $sections = sections::where('classe_id', '=', $id)->get();
        if ($sections->isEmpty()) {
            return response()->json([
                'msg' => 'not found Id '
            ]);
        }
        return response()->json($sections);
    }

    public function studentApi($gender, $class, $section)
    {
        $student = User::where('role', 'student')->get();
        if ($gender != "undefined" and $class > 0 && $section > 0) {
            $studentC = $student->where('gender', $gender);
            $studentS = $studentC->where('section_id', $section);
        } elseif ($gender == "undefined" and $class > 0 && $section > 0) {
            $studentS = $student->where('section_id', $section);
        } elseif ($gender == "undefined" and $class > 0 && $section == 0) {
            $studentS = $student->where('classs_id', $class);
        } elseif ($gender != "undefined" and $class > 0 && $section == 0) {
            $studentC = $student->where('gender', $gender);
            $studentS = $studentC->where('classs_id', $class);
        } elseif ($gender != "undefined" and $class == 0 && $section == 0) {
            $studentS = $student->where('gender', $gender);
        } else {
            return $this->returnError('404', 'error not found');
        }
        return $this->returnData("data", studentResource::collection($studentS), 'return success');


        // $student = User::where('role' , 'student')->get();
    }

    public function editActive($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return $this->returnError('404', 'error not found');
        }
        $user->where('id', $id)->update([
            'active' => !$user->active,
        ]);
        return $this->returnSuccessMessage(500, 'Success Eidt');
    }

    public function create()
    {
        $data['classes'] = classe::where('className', '!=', 'not')->get();
        return view('admin.student.create')->with($data);
    }
    public function submit(Request $request)
    {
        $arr = $request->validate([
            "full_name" => "required|string|max:50",
            "id_parent" => "nullable|string|exists:users,id",
            "email" => "required|email|unique:users,email",
            "gender" => "required|in:male,fmale",
            "birth_bay" => "required|sometimes",
            "Address" => "required|string|min:10|max:50",
            "Phone_No" => "required|min:11",
            "mobile_no" => "required|min:11",
            "religion" => "required|string|max:25",
            "img" => ['required', 'image', 'mimes:jpeg,jpg,png,gif'],
            "user_name" => "required|string|max:50",
            "Password" => ['required', 'min:6'],
            "class" => "required|string|exists:classes,id",
            "section" => "required|string|exists:sections,id",
            "biometric_id" => "nullable|numeric",
            "communication" => [
                'nullable', 'array', Rule::in(['SMS', 'Mail', 'phone']),
            ],
            "medical" => 'nullable|array',
            "Admission_Number" => "nullable|numeric",
            "Admission_Date" => "nullable|sometimes",
            "father" => 'nullable|array',
            "mother" => 'nullable|array'
        ]);
        // dd($request->all());
        $roleId = role::where('role_title', 'student')->first();
        $path = Storage::putFile('users', $request->file('img'));
        $student = [
            'username' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->Password),
            'fullName' => $request->full_name,
            'role' => $roleId->role_title,
            'role_id' => $roleId->id,
            'class_id' => (int)$request->class,
            'section_id' => (int)$request->section,
            'photo' => $path,
            'gender' => $request->gender,
            'birthday' => $request->birth_bay,
            'address' => $request->Address,
            'mobileNo' => $request->mobile_no,
            'phoneNo' => $request->Phone_No,
            'religion' => $request->religion,
            'biometric_id' => $request->biometric_id,
            'comVia' => json_encode($request->communication),
            'medical' => json_encode($request->medical),
            'admission_number' => $request->Admission_Number,
            'admission_date' => $request->Admission_Date,
            'father_info' => json_encode($request->father),
            'mother_info' => json_encode($request->mother),
            'parentOf' => $request->id_parent
        ];
        User::create($student);
        $request->session()->flash('msg', 'Successed Create Employee');
        return back();
        // dd($student);
    }
    public function filter()
    {
        // $notUser = Auth::user()->id;
        $users = QueryBuilder::for(User::class)
            ->allowedFilters(['email'])->where('role_id', 4)->select('id', 'username', 'email', 'photo')
            ->get();
        return $this->returnData("data", $users, 'return success');;
    }
    public function edit($id, Request $request)
    {
        $data['classes'] = classe::where('className', '!=', 'not')->get();
        $data['student'] = user::find($id);
        $data['sections'] = sections::where('classe_id', $data['student']->class_id)->get();
        $data['bloods'] = ["O+", "A+", "B+", "AB+", "O-", "A-", "B-", "AB-"];
        $data['parent'] = User::where('id', $data['student']->parentOf)->select('username', 'id')->first();
        // dd($data['parent']);
        // dd($data['sections']);
        if ($data['student']  == null) {
            $request->session()->flash('error', 'error in id ');
            return back();
        }
        return view('admin.student.edit')->with($data);
    }
    public function update($id, Request $request)
    {
        $studentUpdate = user::findOrFail($id);

        if ($id  == null) {
            $request->session()->flash('error', 'error in id ');
            return back();
        }
        $arr = $request->validate([
            "full_name" => "required|string|max:50",
            "id_parent" => "nullable|string|exists:users,id",
            "gender" => "required|in:male,fmale",
            "birth_bay" => "required|sometimes",
            "Address" => "required|string|min:10|max:50",
            "Phone_No" => "required|min:11",
            "mobile_no" => "required|min:11",
            "religion" => "required|string|max:25",
            "img" => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif'],
            "user_name" => "required|string|max:50",
            "class" => "required|string|exists:classes,id",
            "section" => "required|string|exists:sections,id",
            "biometric_id" => "nullable|numeric",
            "communication" => [
                'nullable', 'array', Rule::in(['SMS', 'Mail', 'phone']),
            ],
            "medical" => 'nullable|array',
            "Admission_Number" => "nullable|numeric",
            "Admission_Date" => "nullable|sometimes",
            "father" => 'nullable|array',
            "mother" => 'nullable|array'
        ]);
        if ($request->email != $studentUpdate->email) {
            $request->validate(["email" => "required|email||unique:users,email",]);
            $studentUpdate->update(['email' => $request->email]);
        }
        // dd($request->all());
        // $path = Storage::putFile('users', $request->file('img'));

        $path = $studentUpdate->photo;
        if ($request->hasFile('img')) {
            Storage::delete($path);
            $path = Storage::putFile('teacher', $request->file('img'));
        }
        $student = [
            'username' => $request->user_name,
            'email' => $request->email,
            'fullName' => $request->full_name,
            'class_id' => (int)$request->class,
            'section_id' => (int)$request->section,
            'photo' => $path,
            'gender' => $request->gender,
            'birthday' => $request->birth_bay,
            'address' => $request->Address,
            'mobileNo' => $request->mobile_no,
            'phoneNo' => $request->Phone_No,
            'religion' => $request->religion,
            'biometric_id' => $request->biometric_id,
            'comVia' => json_encode($request->communication),
            'medical' => json_encode($request->medical),
            'admission_number' => $request->Admission_Number,
            'admission_date' => $request->Admission_Date,
            'father_info' => json_encode($request->father),
            'mother_info' => json_encode($request->mother),
            'parentOf' => $request->id_parent
        ];
        $studentUpdate->update($student);
        $request->session()->flash('msg', 'Successed Update Employee');
        return back();
        // dd($request->all());
    }
    public function delete($id, Request $request)
    {
        $student = user::find($id);
        if ($student  == null) {
            $request->session()->flash('error', 'error in id ');
            return back();
        }
        $student->delete();
        $request->session()->flash('msg', 'Successed Removed Employee');
        return back();
    }
    public function attendace($id){
        $data['studentAttendance'] = attendance::where('id',$id)->get();
        return view('admin.student.Attendance')->with($data);
    }
}
