@extends('layouts.no-nav')
@section('title', 'Laporan Berhasil Dikirim')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center vh-75">
    <div id="lottie"></div>

    <h6 class="fw-bold text-center mb-2">Yeay! Laporan kamu berhasil dibuat</h6>
    <p class="text-center mb-4">Kamu bisa melihat laporan yang dibuat di halaman laporan</p>


    <a href="{{ route('report.myreport',['status'=>'delivered']) }}" class="btn btn-primary py-2 px-4">
        Lihat Laporan
    </a>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
    <script>
        var animation = bodymovin.loadAnimation({
            container: document.getElementById('lottie'),
            renderer: 'svg',
            loop: true,
            autoplay: true, 
            path: '{{ asset('assets/app/lottie/success.json') }}'
        })
</script>
@endsection