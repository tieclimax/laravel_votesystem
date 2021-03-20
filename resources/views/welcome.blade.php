@extends('layouts.master')
@section('main-content')
    <div class="row d-flex justify-content-center">
        <h2>
            Vote System
        </h2>
    </div>
    <div class="row mt-2 d-flex justify-content-center">
        <span class="text-info ">
            <div>
                <p>รหัสนักศึกษา : {{ $user->id }}</p>
            </div>
            <div>
                <p>ชื่อนักศึกษา : {{ $user->firstname }} {{ $user->lastname }}</p>
            </div>
    </div>
    </span>
    <div class="row d-flex justify-content-center my-3">
        {{-- <input type="hidden" name="user_id" value={{ $user->id }}> --}}
        @if ($user->vote_status == 'voted')
            <form action={{ route('vote') }} method="get">
                <button name="user_id" value={{ $user->id }} type="submit" class="btn btn-info mx-2 text-light "
                    disabled>คุณโหวตครบจำนวนแล้ว</button>
            </form>
        @else
            <form action={{ route('vote') }} method="get">
                <button name="user_id" value={{ $user->id }} type="submit"
                    class="btn btn-info mx-2 text-light">โหวต</button>
            </form>
        @endif
        {{-- <form action="checkstatus"></form> --}}
        <a href={{ route('scores') }} type="button" class="btn btn-success mx-2">ตารางคะแนน</a>
    </div>
@endsection
