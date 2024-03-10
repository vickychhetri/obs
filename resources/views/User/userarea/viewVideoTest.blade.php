@extends('User.userarea.layout')
@section('title','Dashboard')

@section("metaContainer")
<style>
.divList {
    background-color: #00a2ff;
    color: white;
    padding: 16px;
    margin: 10px;
}

.divList:hover {
    background-color: #bfd900;
}

.divListPost:hover {
    background-color: #edbb05;
}

.divListPost {
    background-color: #00e099;
    color: white;
    padding: 16px;
    margin: 10px;
}
</style>

@endsection

@section("container")

<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">Test Reports</h2>
<!--// main-heading -->

<!-- Error Page Content -->
<div class="blank-page-content">

    <!-- Error Page Info -->
    <div class="outer-w3-agile mt-3">
        <p class="paragraph-agileits-w3layouts">
        <h2>Learning Test Report</h2>
        <table class="table">
            <thead>
            <th>
               Module
            </th>
            <th>
                Date
            </th>
            <th>
                Percentage
            </th>
            <th>
                Result
            </th>
            </thead>
            <tbody>
        @foreach($Tests as $report)
    <tr>
        <td>
            Module {{$report->test_number}}
        </td>
        <td>
            {{$report->created_at}}
        </td>
        <td>
            {{$report->result*100}}%
        </td>
        <td>
            {{$report->pass_status}}
        </td>
    </tr>
        @endforeach
            </tbody>
        </table>

        </p>
    </div>
    <!--// Error Page Info -->

</div>
@endsection
