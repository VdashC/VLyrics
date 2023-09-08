@extends('layouts.main')

@section('container')
<!-- informasi -->
<div class='col-11 d-flex justify-content-center align-items-center mt-4 mb-4'>
    <img src="/img/VlyricsLogo.png" width='50' alt="" class='d-inline'>
    <h1 class='ms-2'>VLyrics</h1>
</div>

<div class='col-12 border my-2'>
    <div class='mx-2'>
        <h2>#Deskripsi Singkat</h2>
        <p style='text-indent:25px; font-size:18px;'>VLyrics adalah sebuah situs dimana lagu yang berasal dari novel
            visual, game, atau anime ditranskripkan menjadi sebuah lirik yang kemudian diunggah untuk disajikan kepada
            publik. </p>
        <p style='text-indent:25px; font-size:18px;'>VLyrics merupakan situs yang independen. Kami berdiri sendiri
            sehingga seluruh lirik yang ada masih memerlukan tinjauan (koreksi) lebih lanjut.</p>
        <p style='text-indent:25px; font-size:18px;'>VLyrics masih berada dalam tahap pengembangan, pasti akan ada fitur
            yang tidak bekerja (prototipe) ataupun bug.
            VLyrics dapat diakses secara gratis, namun kami masih membatasi beberapa tindakan.</p>
    </div>
</div>

<div class='col-12 border'>
    <h2 class='d-flex justify-content-center align-items-center'>MODERATOR</h2>
    <div class="row">
        <div class='col-6 text-center'>
            <img src="/img/VlyricsLogo.png" width='90' class='rounded-pill my-2' alt="">
            <h3>Vdash</h3>
        </div>

        <div class='col-6 text-center'>
            <img src="/img/Zhinonia.jpg" width='90' class='rounded-pill my-2' alt="">
            <h3>Zhinonia</h3>
        </div>
    </div>

</div>
<br>
<br>
<h2 class='text-center mx-2'><mark>Informasi Tambahan</mark></h2>
<div class="accordion" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseOne">
                Apakah Lirik Tersebut Dapat Dipercaya?
            </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
            <div class="accordion-body">
                <p>Kami melakukan beberapa tahapan dalam proses transkrip.</p>
                <ul>
                    <li>Pertama, Kami akan mencari beberapa referensi.</li>
                    <li>Kedua, Kami lakukan proses transkrip secara manual.</li>
                    <li>Ketiga, Kami lakukan verifikasi.</li>
                    <li>Terakhir, Jika ada, Kami cocokkan dengan sumber lain (kanjinya).</li>
                </ul>
                <p>Kami sadar, pengerjaan manual ini memiliki banyak kekurangan, kami selalu terbuka untuk dapat
                    menerima koreksi. Kami terus berusaha untuk meningkatkan kualitas lirik. Apabila Anda memiliki
                    lirik yang berbeda dengan kami, kami bersedia untuk berdiskusi.</p>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseTwo">
                Bantuan Penanda
            </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
            <div class="accordion-body">
                <ul>
                    <li><b>/</b> Vokalis yang dipisahkan dengan tanda tersebut berarti sebuah lagu memiliki
                        <mark>versi</mark> vokal yang berbeda dengan lirik yang sama
                    </li>
                    <li><b>,</b> Vokalis yang dipisahkan dengan tanda tersebut berarti sebuah lagu <mark>dinyanyikan
                            bersama-sama</mark> oleh vokalis tersebut</li>
                    <li><b>**</b> Dalam terjemahan, berarti belum tentu pengguna tersebut yang menerjemahkan</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseThree">
                Bagaimana Cara Mengunggah Lirik yang Saya Buat?
            </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
            <div class="accordion-body">
                Untuk mengunggah sebuah lirik, silakan tinggalkan pesan di laman facebook kami.
                Kami selalu menerima lirik apapun dan tak perlu khawatir jika tidak percaya diri dengan lirik yang
                diberikan, karena kami selalu melakukan tahap verifikasi agar lirik tersebut dapat terjaga kualitasnya.
            </div>
        </div>
    </div>
</div>

<hr>
<span class="bg-success fs-5">V 6.2*</span>
<!--
<br>
<br>
<span>V 6.1</span>
<br>
<br>
<span>V 6.0</span>
<br>
<br>
<span>V 5.0</span>
<br>
<br>
<span>V 4.4.1</span>
<br>
<br>
<span>V 4.4</span>
<br>
<br>
<span>V 4.3</span>
<br>
<br>
<span>V 4.2</span>
<br>
<br>
<span>V 4.1</span>
<br>
<br>
<span>V 4.0</span>
<br>
<br>
<span>V 3.0</span>
<br>
<br>
<span>V 2.0</span>
<br>
<br>
<span>V 1.4</span>
<br>
<br>
<span>V 1.3</span>
<br>
<br>
<span>V 1.2</span>
<br>
<br>
<span>V 1.1</span>
<br>
<br>
<span>V 1.0</span> -->
@endsection