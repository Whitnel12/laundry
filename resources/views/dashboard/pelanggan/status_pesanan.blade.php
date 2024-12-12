@extends('layouts.user_dashboard')

@php
$idUserLogin = auth()->id();
$lastDatas = $pesanans->where('user_id',$idUserLogin);

// dd($lastDatas);
@endphp

@section('dashboard-content')
<div class="pesanan-pelanggan-content">
  <div class="main-paket">

    <div class="pesanan-pelanggan-container">
      <div class="label-container-pesanan-pelanggan">
        <div class="pesanan-pelanggan-label">Pesanan Kamu</div>
      </div>

      @foreach ($lastDatas as $lastData)

      <div class="order-tracking-container">
        <div class="info-tracking-order">
          <div class="info-order-container">
            {{-- <div class="img-detail-order">
              <i class="fa-solid fa-shirt" style="font-size: 30px"></i>
            </div> --}}

            <div class="desk-detail-order">
              <div class="label-order">{{ $lastData->paket->nama_paket }}</div>
              <div class="time-order">
                <div class="order-date-container">
                  <i class="fa-regular fa-calendar-days" style="font-size: 13px; color:rgb(128, 128, 128);"></i>
                  <div>{{ $lastData->paket->jenispaket->nama_jenis }}</div>
                </div>
                <div class="order-price-container">
                  <i class="fa-solid fa-dollar-sign" style="font-size: 13px; color:rgb(128, 128, 128);" "></i>
                  <div>
                    {{-- {{ $lastData->total_harga }} --}}
                    {{ number_format($lastData->paket->total_harga_paket, 0, ',', '.') }}
                  </div>
                </div>
                <div class="order-weight-container">
                  <i class="fa-solid fa-weight-scale" style="font-size: 13px; color:rgb(128, 128, 128);""></i>
                  {{-- <div>{{ $lastData->berat }}</div> --}}
                  <div>{{ number_format($lastData->berat, 0, ',', '.') }}</div>
                </div>
              </div>
              {{-- <div class="desk-order">{{ $lastData->status_pesanan }}</div> --}}
            </div>
          </div>
        </div>
        <div class="info-tracking-container">
          <div class="price-order">
            {{-- <div>- Rp. {{ $lastData->total_harga }}</div> --}}
            <div>- Rp. {{ number_format($lastData->total_harga, 0, ',', '.') }}</div>
          </div>
          <div class="view-order">
            <i onclick="handleStatus({{ $lastData->id }})" class="fa-solid fa-eye openModal" style="font-size: 20px; font-weight:100;cursor: pointer;"></i>
          </div>
        </div>
      </div>

      @endforeach
    </div>
  </div>

  {{-- MODAL ATAU POP UP PROGRESS PESANAN --}}

  <div id="modal" class="modal-pesanan-pelanggan-content">
    <div class="container-modal">
      <div class="btn-hidden-container">
        <i id="closeModal" class="fa-solid fa-circle-xmark close-tracking" style="color: red; cursor:pointer; font-size:18px;" ></i>
      </div>
      <div class="label-modal">PROGRES PAKAIAN</div>


        <div id="detail-status" class="tracking-progres-modal">
          {{-- ISI DATA DARI JS --}}
        </div>

        <div  id="teks-status-detail" class="detail-tracking-modal">

          {{-- <div class="desk-tracking-modal">
            <div>STEP 1</div>
            <div>Antrian</div>
            <div>completed</div>
          </div>

          <div class="desk-tracking-modal">
            <div>STEP 2</div>
            <div>Proses</div>
            <div>completed</div>
          </div>

          <div class="desk-tracking-modal">
            <div>STEP 1</div>
            <div>Selesai</div>
            <div>completed</div>
          </div>

          <div class="desk-tracking-modal">
            <div>STEP 1</div>
            <div>Diterima</div>
            <div>completed</div>
          </div> --}}

        </div>




      <div id="title-status" class="detail-desk-tracking-modal-container">
        <div>Antrian</div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id placeat quam quos dolore! Aliquid esse neque libero quos recusandae quia? Debitis voluptatem nobis ipsum saepe consequuntur provident neque impedit ipsa.</p>
      </div>
    </div>
  </div>

</div>

<script>

const detailStatus = document.getElementById('detail-status');
const teksStatus = document.getElementById('teks-status-detail');
const titleStatusData = document.getElementById('title-status');


document.addEventListener('DOMContentLoaded', () => {
  const openModalBtns = document.querySelectorAll('.openModal');
  const closeModalBtn = document.getElementById('closeModal');
  const modal = document.getElementById('modal');

  // Add event listener to all open modal buttons
  openModalBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
      modal.style.display = 'flex';
    });
  });

  // Hide modal
  closeModalBtn.addEventListener('click', () => {
    modal.style.display = 'none';
  });

  // Hide modal when clicking outside the modal content
  window.addEventListener('click', (event) => {
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  });
});

 const handleStatus = (id) => {

  detailStatus.innerHTML = '';
  // teksStatus.innerHTML = '';
  // titleStatus.innerHTML = '';

  const selectedStatus = @json($lastDatas->keyBy('id'));
  console.log('INI DATA',selectedStatus);
  const statusData = selectedStatus[id];
  console.log('hasil : ', statusData);

  if (statusData) {

    let statusImages = ''
    let statusTeks = ''
    let titleStatus = ''

    if (statusData.status_pesanan === 'ANTRIAN') {
      statusImages =`
          <div class="first-container-lock-succes">
            <div class="second-container-lock-succes">
              <i class="fa-solid fa-circle-check" style="color: white; font-size:13px;"></i>
            </div>
          </div>

          <div class="line-progress"></div>

          <div class="first-container-lock">
            <div class="second-container-lock">
              <i class="fa-solid fa-lock" style="color: white; font-size:13px;"></i>
            </div>
          </div>

          <div class="line-progress"></div>

          <div class="first-container-lock">
            <div class="second-container-lock">
              <i class="fa-solid fa-lock" style="color: white; font-size:13px;"></i>
            </div>
          </div>
          `
      statusTeks = `
        <div class="desk-tracking-modal">
            <div>STEP 1</div>
            <div>Antrian</div>
            <div>in progress</div>
          </div>

          <div class="desk-tracking-modal">
            <div>STEP 2</div>
            <div>Proses</div>
            <div>pending</div>
          </div>

          <div class="desk-tracking-modal">
            <div>STEP 1</div>
            <div>Selesai</div>
            <div>pending</div>
          </div>`
      titleStatus = `
       <div>Antrian</div>
      <p>Pesanan laundry Anda saat ini berada dalam antrian dan akan segera diproses. Kami sedang memprioritaskan setiap pesanan dengan teliti, dan akan segera mengerjakan laundry Anda. Terima kasih atas kesabaran dan kepercayaan Anda!.</p>
      `
    }else if(statusData.status_pesanan === 'PROSES'){
      statusImages =`
          <div class="first-container-lock-succes">
            <div class="second-container-lock-succes">
              <i class="fa-solid fa-circle-check" style="color: white; font-size:13px;"></i>
            </div>
          </div>

          <div class="line-success"></div>

          <div class="first-container-lock-succes">
            <div class="second-container-lock-succes">
              <i class="fa-solid fa-circle-check" style="color: white; font-size:13px;"></i>
            </div>
          </div>

          <div class="line-progress"></div>

          <div class="first-container-lock">
            <div class="second-container-lock">
              <i class="fa-solid fa-lock" style="color: white; font-size:13px;"></i>
            </div>
          </div>
          `

          statusTeks = `
          <div class="desk-tracking-modal">
            <div>STEP 1</div>
            <div>Antrian</div>
            <div>completed</div>
          </div>

          <div class="desk-tracking-modal">
            <div>STEP 2</div>
            <div>Proses</div>
            <div>in progres</div>
          </div>

          <div class="desk-tracking-modal">
            <div>STEP 1</div>
            <div>Selesai</div>
            <div>pending</div>
          </div>
          `

          titleStatus = `
       <div>Proses</div>
      <p>Laundry Anda sedang diproses oleh tim kami. Kami sedang mengerjakan setiap detail dengan hati-hati untuk memastikan pakaian Anda bersih dan rapi. Mohon bersabar, proses ini memerlukan waktu sejenak untuk memberikan hasil terbaik. Terima kasih atas kepercayaan Anda!</p>
      `
    }else if(statusData.status_pesanan === 'SELESAI'){
      statusImages =`
          <div class="first-container-lock-succes">
            <div class="second-container-lock-succes">
              <i class="fa-solid fa-circle-check" style="color: white; font-size:13px;"></i>
            </div>
          </div>

          <div class="line-success"></div>

          <div class="first-container-lock-succes">
            <div class="second-container-lock-succes">
              <i class="fa-solid fa-circle-check" style="color: white; font-size:13px;"></i>
            </div>
          </div>

          <div class="line-success"></div>

          <div class="first-container-lock-succes">
            <div class="second-container-lock-succes">
              <i class="fa-solid fa-circle-check" style="color: white; font-size:13px;"></i>
            </div>
          </div>
          `

          statusTeks = `
          <div class="desk-tracking-modal">
            <div>STEP 1</div>
            <div>Antrian</div>
            <div>completed</div>
          </div>

          <div class="desk-tracking-modal">
            <div>STEP 2</div>
            <div>Proses</div>
            <div>completed</div>
          </div>

          <div class="desk-tracking-modal">
            <div>STEP 1</div>
            <div>Selesai</div>
            <div>in progres</div>
          </div>`
      titleStatus = `
       <div>Selesai</div>
      <p>Laundry Anda telah selesai diproses dan siap untuk diambil. Terima kasih atas kesabaran Anda, semoga hasilnya memuaskan! Silakan ambil pesanan Anda di waktu yang telah ditentukan.</p>
      `
    }


    detailStatus.innerHTML = `${statusImages}`
    teksStatus.innerHTML = `${statusTeks}`
    titleStatusData.innerHTML = `${titleStatus}`


  }
 }


</script>

@endsection
