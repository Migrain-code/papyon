@extends('business.layouts.master')
@section('title', 'Sos Düzenle')
@section('styles')

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span>Sos Düzenle</h4>
        <div class="row">
            <!-- View sales -->
            <div class="col-12">


                <!-- Multi Column with Form Separator -->
                <div class="card my-4">
                    <!-- User Content -->
                    <form method="post" action="{{route('business.souce.update', $souce->id)}}" class="card-body order-0 order-md-1">
                        @csrf
                        @method('PUT')
                        <div class="card-title">
                            <h4 >Sos Düzenle</h4>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <label class="form-label" for="addProductQuantity">Sos Adı</label>
                                <input
                                    type="text"
                                    id="addProductQuantity"
                                    name="title"
                                    class="form-control"
                                    value="{{$souce->name}}"
                                />
                            </div>
                        </div>

                        <div class="col-12 text-start mt-3">
                            <button type="submit" class="btn btn-primary w-100" style="max-width: 400px">Kaydet</button>
                        </div>
                    </form>
                    <!--/ User Content -->
                </div>
            </div>
            <!-- View sales -->
        </div>

    </div>
@endsection
@section('scripts')

@endsection
