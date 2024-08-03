<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Phone;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $all_data['students'] = Student::all();
        $all_data['deleted'] =  Student::onlyTrashed()->latest()->get();
        return view('home', $all_data);
    }

    public function store(Request $request)
    {
        // dd($request->input());
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,gif,jpg|max:2048',
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = date('YmdHis') . '.' . $ext;

        $request->file('photo')->move(public_path('uploads/'), $final_name);


        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->photo = $final_name;
        $student->save();

        return redirect()->route('home')->with('success', 'Data added successfully');
        // return redirect()->back()->with();
    }

    public function edit($id)
    {
        $student = Student::where('id', $id)->first();
        // $student = Student::findorFail($id);
        // dd($student);
        return view('edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findorFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,gif,jpg|max:2048',
            ]);

            if (file_exists(public_path('uploads/' . $student->photo)) and !empty($student->photo)) {
                unlink(public_path('uploads/' . $student->photo));
            }

            // @unlink(public_path('uploads/' . $student->photo));

            $ext = $request->file('photo')->extension();
            $final_name = date('YmdHis') . '.' . $ext;

            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $student->photo = $final_name;
        }




        $student->name = $request->name;
        $student->email = $request->email;
        $student->update();

        return redirect()->route('home')->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        $student = Student::where('id', $id)->first();

        if (file_exists(public_path('uploads/' . $student->photo)) and !empty($student->photo)) {
            unlink(public_path('uploads/' . $student->photo));
        }

        $student->delete();


        return redirect()->back()->with('success', 'Data deleted successfully');
    }

    public function trashed()
    {
        $deleted =  Student::onlyTrashed()->latest()->get();
        dd($deleted);
        return view('home', compact('deleted'));
    }

    public function restore($id)
    {
        Student::where('id', $id)->restore();
        return redirect()->route('home')->with('success', 'Data restored successfully');
    }

    public function force_delete($id)
    {
        Student::where('id', $id)->forceDelete();
        return redirect()->route('home')->with('success', 'Data deleted permanently');
    }

    public function about()
    {
        return view('about');
    }

    public function add()
    {
        // RAW SQL
        // DB::insert('insert into students (student_name, student_email, student_phone) values (?, ?, ?)', ['Gbemisola Kobru', 'gbemisola@yahoo.com', '08012345678']);

        DB::insert('insert into students (name, email, phone) values (:sname, :semail, :sphone)', ['sname' => 'David', 'semail' => 'david@gmail.com', 'sphone' => '09062684833']);

        // Query Builder
        // $data = [
        //     'name' => 'Smith',
        //     'email' => 'smith@gmail.com',
        //     'phone' => '0976'
        // ];
        // DB::table('students')->insert($data);

        // Eloquent ORM
        // $student = new Student();
        // $student->name = 'Richard Mickypary';
        // $student->email = 'mikipary@gmail.com';
        // $student->phone = '1234567';
        // $student->save();
    }

    public function view()
    {
        // RAW SQL
        // $all_data['students'] = DB::select('select * from students');
        // dd($all_data);

        // return view('show', $all_data);

        // $all_data['student_row'] = DB::select('select * from students where id = :id', ['id' => 2]);

        // Query Builder
        // $all_data['students'] = DB::table('students')->select()->get();
        // $all_data['students'] = DB::table('students')->get();
        // $students = DB::table('students')->get();
        // dd($all_data);
        // return view('show', $all_data);
        // return view('show', compact('students'));

        $all_data['students'] = Student::all();
        // $all_data['students'] = Student::get();
        // $student_row = Student::where('id', 14)->first();
        // dd($all_data);
        return view('home', $all_data);
    }

    public function view_single($id)
    {
        // query builder
        $single_student = DB::table('students')->where('id', $id)->get();
        // dd($all_data);
        // return view('show', $all_data);
        return view('show_single', compact('single_student'));
    }

    public function update_old()
    {
        // Raw query
        // DB::update('update students set name = :name where id = :id', ['id' => 7, 'name' => 'Micky']);

        // $data = [
        //     'name' => 'Amos'
        // ];

        // DB::table('students')->where('id', 2)->update($data);
        // DB::table('students')->findorFail(2)->update($data);

        // Student::where('id', 14)->update($data);
        // $student = Student::find(13);
        $student = Student::findorFail(13);
        // $student = Student::where('id', 14)->first();
        // dd($student);
        $student->name = 'Helen';
        // $student->email = 'amos@gmail.com';
        // $student->phone = '098766';
        // $student->update();
        $student->save();
    }

    public function delete_old()
    {
        // RAW query
        // DB::statement('delete from students where id = :id', ['id' => 6]);
        // DB::delete('delete from students where id = :id', ['id' => 6]);

        // Query builder
        // DB::table('students')->where('id', 10)->delete();


        // $student = Student::where('id', 14)->first();
        // $student->delete();

        // $student = Student::find(13)->delete();
        $student = Student::findorFail(12)->delete();
    }

    public function join()
    {
        // RAW query
        // $all_data['student_row'] = DB::select('select * from students t1 join fees t2 on t1.id = t2.student_id where t1.id = :id', ['id' => 2]);
        // dd($all_data);

        // Query builder
        // $all_data['student_row'] = DB::table('students')->join('fees', 'students.id', '=', 'fees.student_id')->select('fees.*', 'students.name')->get();
        // dd($all_data);

        // $all_data = Phone::with('rStudent')->get();
        $all_data = Student::with('rPhone')->get();
        return view('show_join', compact('all_data'));
    }

    function profile($username)
    {
        $data = ['user' => $username];
        // dd($data);
        return view('profile', $data);
    }
}
