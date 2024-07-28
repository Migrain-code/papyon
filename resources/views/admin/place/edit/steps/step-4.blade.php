<hr class="my-4 mx-n4" />
<h6>4. Çalışma Saatleri</h6>

@foreach($workTimes as $workTime)
    <div class="row align-items-center g-3">
        <div class="d-flex" style="max-width: 500px">
            <div class="col">
                <label>{{$workTime->day->name}}</label>
            </div>
            <div class="col">
                <label class="switch switch-lg">
                    <input type="checkbox" @checked($workTime->status == 1) name="day_opened[]" value="{{$workTime->day->id}}" class="switch-input">
                    <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                              <i class="ti ti-check"></i>
                                            </span>
                                            <span class="switch-off">
                                              <i class="ti ti-x"></i>
                                            </span>
                                        </span>
                    <span class="switch-label">@if($workTime->status) Açık @else Kapalı @endif</span>
                </label>
            </div>
        </div>
        <div class="d-flex col gap-3">
            <div class="col">
                <label for="flatpickr-time{{$workTime->day->id}}" class="form-label">Açılış saati</label>
                <input type="text" name="day_open_clock[{{$workTime->day->id}}]" value="{{$workTime->start_time}}" class="form-control flatpickr-time flatpickr-start-time" id="flatpickr-time{{$workTime->day->id}}" placeholder="HH:MM"
                       style="border: 1px solid #949494;padding: 20px;max-width: 200px;" value=""/>
            </div>
            <div class="col">
                <label for="flatpickr-end-time{{$workTime->day->id}}" class="form-label">Kapanış saati</label>
                <input type="text" name="day_close_clock[{{$workTime->day->id}}]" value="{{$workTime->end_time}}" class="form-control flatpickr-time flatpickr-end-time" id="flatpickr-end-time{{$workTime->day->id}}" placeholder="HH:MM"
                       style="border: 1px solid #949494;padding: 20px;max-width: 200px;"/>
            </div>
        </div>
    </div>
    <hr class="" />
@endforeach
