@extends('layouts.master')

@section('content')
   <!-- ========== title-wrapper start ========== -->
   <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="title">
          <h2 class="text-2xl font-semibold text-gray-800">History Pengajuan Surat</h2>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
   </div>
   <!-- ========== title-wrapper end ========== -->
   <div class="tables-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-style mb-30">
            <div class="table-wrapper table-responsive">
               <table class="table">
                 <thead>
                   <tr>
                     <th class="lead-info">
                        <h6>Jenis Surat</h6>
                     </th>
                     <th class="lead-email">
                        <h6>Status</h6>
                     </th>
                   </tr>
                   <!-- end table row-->
                 </thead>
                 <tbody>
                   @foreach($surats as $surat)
                  <tr>
                   <td class="min-width">
                     <p class="text-capitalize">{{ $surat->jenisSurat->name }}</p>
                   </td>
                   <td class="min-width">
                     @if ($surat->status == '2')
                        <p>Pending</p>
                     @elseif ($surat->status == '0')
                        <p>Tolak</p>
                     @elseif ($surat->status == '1')
                        <p>Setujui</p>
                      @elseif ($surat->status == '3')
                        <p>Surat terkirim</p>
                     @endif
                   </td>
                   <td>
                      @if ($surat->status == '3')
                      <a href="{{ route('surat.download', $surat->id) }}">Download Surat</a>
                      @endif
                   </td>
                  </tr>
                  <!-- end table row -->
               @endforeach
                 </tbody>
               </table>
               <!-- end table -->
            </div>
          </div>
        </div>
      </div>
   </div>
@endsection