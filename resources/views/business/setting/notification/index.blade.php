@extends('business.layouts.master')
@section('title', 'Hesabım | Faturalar')
@section('styles')

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Hesap Ayarları/</span> Güvenlik</h4>
        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between mb-4 text-center text-sm-start gap-2">
            <div class="mb-2 mb-sm-0">
                <h4 class="mb-1">Müşteri Numaranız #{{$user->id}}</h4>
                <p class="mb-0">Kayıt Tarihi : {{$user->created_at->translatedFormat('d F Y h:i')}}</p>
            </div>
            <a class="btn btn-label-success text-success"  data-bs-toggle="modal" data-bs-target="#editUser">Profili Düzenle</a>
        </div>
       <div class="row">
           @include('business.setting.parts.side-bar')
           <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
               @include('business.setting.parts.nav')
               <div class="card card-action mb-4">
                   <div class="card-header align-items-center py-4">
                       <h5 class="card-action-title mb-0">Bildirim İzinleri</h5>
                   </div>
                   <div class="card-body">
                       <form class="card-body" method="post" action="{{ route('business.setting.notificationPermission.update') }}">
                           @csrf
                           <div class="table-responsive border rounded">
                               <table class="table table-striped">
                                   <thead>
                                   <tr>
                                       <th class="text-nowrap"></th>
                                       <th class="text-nowrap text-center">✉️ Email</th>
                                       <th class="text-nowrap text-center">🖥 SMS</th>
                                       <th class="text-nowrap text-center">👩🏻‍💻 Bildirim</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   <tr>
                                       <td class="text-nowrap">Sipariş durumu</td>
                                       <td>
                                           <div class="form-check d-flex justify-content-center">
                                               <input class="form-check-input" type="checkbox" name="order_status_email" id="defaultCheck1" {{ isset($user->notificationPermission->permissions) && $user->notificationPermission->permissions['order_status']['email'] ? 'checked' : '' }}>
                                           </div>
                                       </td>
                                       <td>
                                           <div class="form-check d-flex justify-content-center">
                                               <input class="form-check-input" type="checkbox" name="order_status_sms" id="defaultCheck2" {{ isset($user->notificationPermission->permissions) && $user->notificationPermission->permissions['order_status']['sms'] ? 'checked' : '' }}>
                                           </div>
                                       </td>
                                       <td>
                                           <div class="form-check d-flex justify-content-center">
                                               <input class="form-check-input" type="checkbox" name="order_status_notification" id="defaultCheck3" {{isset($user->notificationPermission->permissions) && $user->notificationPermission->permissions['order_status']['notification'] ? 'checked' : '' }}>
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="text-nowrap">Kampanyalar</td>
                                       <td>
                                           <div class="form-check d-flex justify-content-center">
                                               <input class="form-check-input" type="checkbox" name="campaigns_email" id="defaultCheck4" {{ isset($user->notificationPermission->permissions) && $user->notificationPermission->permissions['campaigns']['email'] ? 'checked' : '' }}>
                                           </div>
                                       </td>
                                       <td>
                                           <div class="form-check d-flex justify-content-center">
                                               <input class="form-check-input" type="checkbox" name="campaigns_sms" id="defaultCheck5" {{ isset($user->notificationPermission->permissions) && $user->notificationPermission->permissions['campaigns']['sms'] ? 'checked' : '' }}>
                                           </div>
                                       </td>
                                       <td>
                                           <div class="form-check d-flex justify-content-center">
                                               <input class="form-check-input" type="checkbox" name="campaigns_notification" id="defaultCheck6" {{ isset($user->notificationPermission->permissions) && $user->notificationPermission->permissions['campaigns']['notification'] ? 'checked' : '' }}>
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="text-nowrap">Özel Teklifler</td>
                                       <td>
                                           <div class="form-check d-flex justify-content-center">
                                               <input class="form-check-input" type="checkbox" name="special_offers_email" id="defaultCheck7" {{ isset($user->notificationPermission->permissions) && $user->notificationPermission->permissions['special_offers']['email'] ? 'checked' : '' }}>
                                           </div>
                                       </td>
                                       <td>
                                           <div class="form-check d-flex justify-content-center">
                                               <input class="form-check-input" type="checkbox" name="special_offers_sms" id="defaultCheck8" {{ isset($user->notificationPermission->permissions) && $user->notificationPermission->permissions['special_offers']['sms'] ? 'checked' : '' }}>
                                           </div>
                                       </td>
                                       <td>
                                           <div class="form-check d-flex justify-content-center">
                                               <input class="form-check-input" type="checkbox" name="special_offers_notification" id="defaultCheck9" {{ isset($user->notificationPermission->permissions) && $user->notificationPermission->permissions['special_offers']['notification'] ? 'checked' : '' }}>
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="text-nowrap">Yeni Özellikler</td>
                                       <td>
                                           <div class="form-check d-flex justify-content-center">
                                               <input class="form-check-input" type="checkbox" name="new_features_email" id="defaultCheck10" {{ isset($user->notificationPermission->permissions) && $user->notificationPermission->permissions['new_features']['email'] ? 'checked' : '' }}>
                                           </div>
                                       </td>
                                       <td>
                                           <div class="form-check d-flex justify-content-center">
                                               <input class="form-check-input" type="checkbox" name="new_features_sms" id="defaultCheck11" {{ isset($user->notificationPermission->permissions) && $user->notificationPermission->permissions['new_features']['sms'] ? 'checked' : '' }}>
                                           </div>
                                       </td>
                                       <td>
                                           <div class="form-check d-flex justify-content-center">
                                               <input class="form-check-input" type="checkbox" name="new_features_notification" id="defaultCheck12" {{ isset($user->notificationPermission->permissions) && $user->notificationPermission->permissions['new_features']['notification'] ? 'checked' : '' }}>
                                           </div>
                                       </td>
                                   </tr>
                                   </tbody>
                               </table>
                           </div>
                           <div class="d-flex justify-content-end">
                               <button type="submit" class="btn btn-primary me-2 waves-effect waves-light mt-3" style="min-width: 200px;">Kaydet</button>
                           </div>
                       </form>

                   </div>
               </div>
           </div>


       </div>
    </div>
    @include('business.setting.modals.edit-user-info-modal')

@endsection
@section('scripts')

@endsection
