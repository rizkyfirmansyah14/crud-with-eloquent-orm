@extends('layout.main')

@section('title','Belajar Laravel 7')

@section('style')
<style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
            margin:3px;
        }
        
        .pagination{
            margin-left:45%;
        }


    </style>
@endsection

@section('container')      

        <div class="container">
            <div class="mb-2">
                <form action="/student/cari" method="GET">
                   <div class="row">
                       <div class="col-4">
                       <input class="form-control me-2" type="text" name="cari" id="country_name" placeholder="Cari Mahasiswa .." value="{{ old('cari') }}">
                       </div>
                       <div class="col-4">
                       <button type="submit" class="btn btn-danger" value="CARI">Cari</button>
                       <a href="/students/create" class="btn btn-success my-3">Tambah Data</a>
                       {{ csrf_field() }}
                       </div>
                   </div>
               </form>
               </div>
               <hr>
                  

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                     @endif
                     <div class="col-6" id="countryList">
                    </div>

                    <div class="row mt-3">
                        @foreach($students as $student)
                        <div class="col-sm-2 mb-4">
                            <div class="card" style="width: 18rem;">
                                <a href="/students/{{$student->id}}">
                                <img src="uploads/{{ $student->file}}" class="card-img-top" style="height: 200px;" alt="...">
                                <div class="card-body">
                                    <p class="font-monospace text-center mt-3">{{$student->nama}}</p></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                </div>
            </div>

            {{ $students->links() }}
        </div>
 

 @endsection       
