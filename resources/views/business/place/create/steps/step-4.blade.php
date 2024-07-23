<hr class="my-4 mx-n4" />
<h6>4. Çalışma Saatleri</h6>

@foreach($dayList as $day)
    <div class="row align-items-center g-3">
        <div class="d-flex" style="max-width: 500px">
            <div class="col">
                <label>{{$day->name}}</label>
            </div>
            <div class="col">
                <label class="switch switch-lg">
                    <input type="checkbox" name="day_opened[]" value="{{$day->id}}" class="switch-input">
                    <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                              <i class="ti ti-check"></i>
                                            </span>
                                            <span class="switch-off">
                                              <i class="ti ti-x"></i>
                                            </span>
                                        </span>
                    <span class="switch-label">Kapalı</span>
                </label>
            </div>
        </div>
        <div class="d-flex col gap-3">
            <div class="col">
                <label for="flatpickr-time{{$day->id}}" class="form-label">Açılış saati</label>
                <input type="text" name="day_open_clock[{{$day->id}}]" class="form-control flatpickr-time flatpickr-start-time" id="flatpickr-time{{$day->id}}" placeholder="HH:MM"
                       style="border: 1px solid #949494;padding: 20px;max-width: 200px;" value=""/>
            </div>
            <div class="col">
                <label for="flatpickr-end-time{{$day->id}}" class="form-label">Kapanış saati</label>
                <input type="text" name="day_close_clock[{{$day->id}}]" class="form-control flatpickr-time flatpickr-end-time" id="flatpickr-end-time{{$day->id}}" placeholder="HH:MM"
                       style="border: 1px solid #949494;padding: 20px;max-width: 200px;"/>
            </div>
        </div>
    </div>
    <hr class="" />
@endforeach
