@extends('layouts.master')
@section('main-content')
    <div class="container">
        <div class="subject">
            <h4>โหวตเสร็จสิ้น</h4>
            <div class="row d-flex justify-content-center my-5">
                <a href={{ route('scores') }} type="button" class="btn btn-success mx-2">ตารางคะแนน</a>
            </div>
        </div>

    </div>

@endsection
