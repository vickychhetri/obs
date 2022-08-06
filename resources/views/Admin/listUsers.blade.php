@extends('Admin.layout')
@section('title','Dashboard')

@section("container")

<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">Enable/Disable User Login</h2>
<!--// main-heading -->

<!-- Error Page Content -->
<div class="blank-page-content">

    <!-- Error Page Info -->
    <div class="outer-w3-agile mt-3">
        <p class="paragraph-agileits-w3layouts">
        <table class="table" id="myTableList">
            <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Mobile
                    </th>
                    <th>
                        Created_at
                    </th>
                    <th>
                        Approved
                    </th>
                    <th>
                        Action
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach($Users as $user)

                <tr>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{$user->mobile}}
                    </td>
                    <td>
                        {{$user->created_at}}
                    </td>
                    <td>
                        {{$user->approved==0?'Disable':'Active'}}
                    </td>
                    <td>
                        <a href="/approvedUser/{{$user->UserID}}" class="btn btn-success"> Approved </a>
                        <a href="/disableUser/{{$user->UserID}}" class="btn btn-danger"> Disable </a>
                    </td>

                </tr>


                @endforeach
            </tbody>
        </table>




        <span style="float: right;"> Amita </span>
        </p>
    </div>
    <!--// Error Page Info -->

</div>
@endsection