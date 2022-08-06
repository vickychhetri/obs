@extends('User.userarea.layout')
@section('title','Dashboard')

@section("metaContainer")
<style>
.outer-w3-agile:hover {
    background-color: #0091ff;
    color: white;
}
</style>
@endsection

@section("container")

<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">Test-Module</h2>
<!--// main-heading -->

<!-- Error Page Content -->
<div class="blank-page-content">

    @foreach($tests as $test)
    <!-- Error Page Info -->
    <?php
    $tfBool=$unLocked[$test->TestID];
    if($tfBool){
?>
    <a href="/User/Start-Test/{{$test->TestID}}">
        <?php
    }else {
        ?>
        <a href="#">
            <?php
    }
    ?>


            <div class="outer-w3-agile mt-3">
                <p class="paragraph-agileits-w3layouts">
                <div class="row">
                    <div class="col-md-12">
                        <h2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                                <path
                                    d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z" />
                            </svg>
                            {{$test->testName}}

                            <?php
                             $tfBool=$unLocked[$test->TestID];
                                if($tfBool){
                                    ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green"
                                class="bi bi-unlock-fill" viewBox="0 0 16 16">
                                <path
                                    d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z" />
                            </svg>
                            <?php
                                   }else {
                                ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="orange"
                                class="bi bi-file-lock2-fill" viewBox="0 0 16 16">
                                <path d="M7 6a1 1 0 0 1 2 0v1H7V6z" />
                                <path
                                    d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-2 6v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V8.3c0-.627.46-1.058 1-1.224V6a2 2 0 1 1 4 0z" />
                            </svg>
                            <?php
                            }
                            ?>


                        </h2>
                    </div>

                </div>


                </p>

            </div>
        </a>
        @endforeach
        <!--// Error Page Info -->

</div>
@endsection