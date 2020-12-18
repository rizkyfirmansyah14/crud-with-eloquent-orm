<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                // mengambil data dari table pegawai
		$students = DB::table('students')->paginate(6);
 
        // mengirim data pegawai ke view index
        return view('student.index',['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = DB::table('majors')->get();
        return view('student.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $student = new Student;

        // $student->nama = $request->nama;
        // $student->nrp = $request->nrp;
        // $student->email = $request->email;
        // $student->jurusan = $request->jurusan;

        // $student->save();

        // Student::create([
        //     'nama' => $request->nama,
        //     'nrp' => $request->nrp,
        //     'email' => $request->email,
        //     'jurusan' => $request->jurusan,
        // ]);

        $this->validate($request, [
            'nama' => 'required',
            'nrp' => 'required|size:9',
            'email' => 'required',
            'jurusan_id' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'uploads';
		$file->move($tujuan_upload,$nama_file);
        

        // Student::create($request->all());

        Student::create([
            'nama' => $request->nama,
            'nrp' => $request->nrp,
            'email' => $request->email,
            'jurusan_id' => $request->jurusan_id,
			'file' => $nama_file,
		]);
        return redirect('/students')->with('status','data berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $jurusan = DB::table('majors')->get();
        return view('student.edit', compact('student'), compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nama' => 'required',
            'nrp' => 'required|size:9',
            'email' => 'required',
            'jurusan_id' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

           // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'uploads';
		$file->move($tujuan_upload,$nama_file);
        
        Student::where('id', $student->id)
                ->update([
                    'nama' => $request->nama,
                    'nrp' => $request->nrp,
                    'email' => $request->email,
                    'jurusan_id' => $request->jurusan_id,
                    'file' => $nama_file,
                ]);

                return redirect('/students')->with('status','data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/students')->with('status','data berhasil di delete');
    }


    public function cari(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
 
            // mengambil data dari table pegawai sesuai pencarian data
		$students = DB::table('students')
		->where('nama','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
        return view('student.index',compact('students'))->with('status','data berhasil di delete');
 
	}
}
