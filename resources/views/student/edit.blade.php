@extends('layout.main')

@section('title','Belajar Laravel 7')

@section('container')
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h1 class="mt-3">Form ubah data Mahasiswa</h1>  

                    
                        <form method="post" action="/students/{{ $student->id }}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan nama" name="nama" value="{{ $student->nama }}">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}   
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama">nrp</label>
                                <input type="text" class="form-control @error('nrp') is-invalid @enderror" id="nrp" placeholder="Masukan nisn" name="nrp" value="{{ $student->nrp }}">
                                @error('nrp')
                                <div class="invalid-feedback">
                                    {{ $message }}   
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama">email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukan email" name="email" value="{{ $student->email }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}   
                                </div>
                                @enderror
                            </div>


                           
                            <div class="form-group">
                                <label for="nama">jurusan</label>
                                <select class="form-control" id="jurusan" name="jurusan_id">
                                @foreach($student->school as $j)
                                <option value="{{$j->id}}"> {{$j->jurusan}}</option>
                                @endforeach
                                @foreach($jurusan as $j)
                                    <option value="{{$j->id}}"> {{$j->jurusan}}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="file" name="file">
                            </div>
                         

                            <button type="submit" class="btn btn-success">ubah data</button>
                            
                        
                        </form>
                  
                </div>

                
                </div>
            </div>
        </div>
 @endsection       
