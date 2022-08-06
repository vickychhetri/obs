@extends('Admin.layout')
@section('title','Dashboard')

@section("container")

<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">Reports Generate</h2>
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
                        Id
                    </th>
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
                        Open Report
                    </th>
                    <th>
                        Status
                    </th>
                    
                   
                </tr>
                </thead>
                <tbody>
                @foreach($Users as $user)

                <tr>
                <td>
                        {{$user->UserID}}
                    </td>
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
                        <a href="/OpenUserReport/{{$user->UserID}}" class="btn btn-success"> Open </a>
                    </td>
                    <td>
                     
                    <x-Admin.Coursestatus :user="$user->UserID" />
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