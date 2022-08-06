@extends('Admin.layout')
@section('title','Dashboard')

@section("container")

<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">Add Course</h2>
<!--// main-heading -->

<!-- Error Page Content -->
<div class="blank-page-content">

    <!-- Error Page Info -->
    <div class="outer-w3-agile mt-3 d-flex justify-content-center">

        <form action="/Add/Course" method="post">
            {{csrf_field()}}
            <label class="sr-only" for="course">Course</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="course" name="course"
                placeholder="Course Name e.g Heart Treatment" required="">
            <span style="color:red;">
                @error('course')
                {{$message}}
                @enderror
            </span>
            <label class="sr-only" for="courseDescription">Description</label>
            <textarea class="form-control mb-2 mr-sm-2" id="courseDescription" name="courseDescription"></textarea>
            <span style="color:red;">
                @error('courseDescription')
                {{$message}}
                @enderror
            </span>
            <button type="submit" class="btn btn-primary mb-2">Add</button>

        </form>

        <br />

    </div>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>  
    @endif
    @if (session('Error'))
    <div class="alert alert-danger">
        {{ session('Error') }}
    </div>
    @endif
    <!--// Error Page Info -->

</div>
@endsection