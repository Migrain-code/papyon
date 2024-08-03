<?php

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Str;
use Spatie\Html\Elements\A;
use Spatie\Html\Elements\Div;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
function base64Convertor($base64Image, $folderName = "uploads"){
    $base64Image = str_replace('data:image/png;base64,', '', $base64Image);
    $base64Image = str_replace(' ', '+', $base64Image);

    // Base64 verisini decode edin
    $imageData = base64_decode($base64Image);

    // Dosya adını ve dizinini belirleyin
    $fileName = Str::uuid() . '.png';
    $filePath = $folderName.'/' . $fileName;

    // Dosyayı kaydedin
    \Illuminate\Support\Facades\Storage::put($filePath, $imageData);
    $fileUrl = \Illuminate\Support\Facades\Storage::url($filePath);

    return str_replace('/storage/', '', $fileUrl);
}

function base64Convertor2($base64Image, $folderName = "uploads", $tableName = "test") {
    $base64Image = str_replace('data:image/png;base64,', '', $base64Image);
    $base64Image = str_replace(' ', '+', $base64Image);

    // Base64 verisini decode edin
    $imageData = base64_decode($base64Image);

    $image = \Intervention\Image\Laravel\Facades\Image::read($imageData);
    $image->resize(1480, 2100);

    $image->setResolution(300, 300);

    $fileName = Str::slug($tableName) . '.png';
    $resizedFilePath = $folderName . '/' . $fileName;

    Storage::put($resizedFilePath, (string) $image->encode());

    $resizedFileUrl = Storage::url($resizedFilePath);
    return str_replace('/storage/', '', $resizedFileUrl);
}
function generateWifiQrCode($ssid, $password, $encryption = 'WPA')
{
    // Format the text for the WiFi QR code
    $wifiText = "WIFI:T:{$encryption};S:{$ssid};P:{$password};;";

    $qrCode = new QrCode($wifiText);
    $qrCode->setSize(1200);
    $writer = new PngWriter();
    $result = $writer->write($qrCode);

    // Get the image data
    $imageData = $result->getString();

    // Convert image data to base64
    $base64Image = base64_encode($imageData);

    return "data:image/png;base64,".$base64Image;
}
function generateTextQrCode($text)
{
    $qrCode = new QrCode($text);
    $qrCode->setSize(1200);
    $writer = new PngWriter();
    $result = $writer->write($qrCode);
    $imageData = $result->getString();

    // Convert image data to base64
    $base64Image = base64_encode($imageData);
    return "data:image/png;base64,".$base64Image;
}
function generateQrCode($text, $folderName, $fileName, $place_id)
{
    $qrCode = new QrCode($text);
    $qrCode->setSize(1200);
    $writer = new PngWriter();
    $result = $writer->write($qrCode);

    $directoryPath = storage_path('app/public/places/' . $place_id . '/' . $folderName);
    $filePath = $directoryPath . '/' . $fileName . '.png';

    if (!file_exists($directoryPath)) {
        mkdir($directoryPath, 0755, true);
    }
    // QR kodunu dosyaya kaydetme
    $result->saveToFile($filePath);
    $newFilePath = 'places/' . $place_id . '/' . $folderName . '/' . $fileName . '.png';
    return $newFilePath;
}

function instagramLink($username)
{
    return "https://www.instagram.com/". $username;
}
function storage($path): string
{
    return asset('storage/' . $path);
}

function image($path)
{
    return env('IMAGE_URL') . $path;
}

function setting($key)
{
    return config('settings.' . $key);
}
function maskPhone($phone)
{
    if (strlen($phone) > 10) {
        $maskedPhone = substr_replace(clearPhone($phone), str_repeat('*', strlen($phone) - 2), 0, -2);
        return $maskedPhone;
    }
    return $phone;
}
function headers($html)
{
    $heads = [];
    preg_match_all('/<h[1-5].*?>(.*?)<\/h[1-5]>/', $html, $matches);
    foreach ($matches[1] as $match) {
        $heads[] = $match;
    }
    return $heads;
}
function hexToRgb($hex){
    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
    $rgbColor = "rgb($r, $g, $b)";
    return $rgbColor;
}
function authUser()
{
    return auth()->user();
}

function calculateCart($carts)
{
    $total = 0;
    foreach ($carts as $cart) {
       $total += ($cart->product->price * $cart->qty);
    }
    return $total;
}

function clearPhone($phoneNumber)
{
    if (strlen($phoneNumber) > 10) {
        if (substr($phoneNumber, 1) != 0) {
            $phoneNumber = "0" . $phoneNumber;
        }
        $newPhoneNumber = str_replace([' ', '(', ')', '-', '_'], '', $phoneNumber);
        $newPhoneNumber = substr($newPhoneNumber, 1);
        return $newPhoneNumber;
    }
    return $phoneNumber;


}

function clearNumber($number)
{
    return str_replace([' ', '(', ')', '-', '_'], '', $number);
}

function formatPhone($phone)
{
    return preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $phone);
}

function createCheckbox($id, $model, $title, $additional_class = null)
{
    return html()->div(
        html()->input()->class('form-check-input deleteRows '. $additional_class)->type('checkbox')
            ->attribute('data-model', 'App\Models\\' . str_replace('App\Models\\', '', $model))
            ->attribute('data-title', $title)
            ->value($id),
        'form-check form-check-sm form-check-custom form-check-solid ' . $additional_class
    );
}

function createActionButton()
{
    $svgIcon = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path></svg>';


    $span = Div::create()
        ->class('svg-icon svg-icon-5 m-0')
        ->text($svgIcon);

    $button = A::create()
        ->href('#')
        ->class('btn btn-sm btn-light btn-active-light-primary')
        ->attribute('data-kt-menu-trigger', 'click')
        ->attribute('data-kt-menu-placement', 'bottom-end')
        ->html($span)
        ->text('Actions');

    return $button;
}

function createName($link, $text, $additional_class = null)
{
    return html()->a($link, $text)->class('text-gray-800 text-hover-primary mb-1 ' . $additional_class);
}

function createPhone($link, $text, $additional_class = null)
{
    return html()->a('tel:' . $link, "+90 " . $text)->class('text-gray-800 text-hover-primary mb-1 ' . $additional_class);
}

function create_show_button($route, $additional_class = null)
{
    return html()->a($route, html()->i('')->class('fa fa-eye'))->class('btn btn-info btn-sm me-1 ' . $additional_class);
}

function create_status_button($route, $additional_class = null)
{
    return html()->a($route, html()->i('')->class('bx bx-check'))->class('btn btn-success btn-sm me-1 updatePaymentStatus' . $additional_class);
}

function create_send_button($route, $message = "", $additional_class = null)
{
    return html()->a('#' . $route, html()->i('')->class('bx bx-mail-send'))
        ->class('btn btn-warning btn-sm me-1 sendMail' . $additional_class)
        ->attribute('question', $message);
}

function create_edit_button($route, $additional_class = null)
{
    return html()->a($route, html()->i('')->class('fa fa-edit'))
        ->class('btn btn-primary btn-sm me-1');
}

function create_swap_button($route, $additional_class = null)
{
    return html()->a($route, html()->i('')->class('fa fa-arrows-turn-to-dots'))
        ->class('btn btn-warning btn-sm me-1 ' . $additional_class)
        ->data('bs-toggle', 'tooltip')
        ->attribute('title', 'İşletmenizin adı.');
}

function create_copy_button($id, $additional_class = null)
{
    return html()->a('javascript:void(0)', html()->i('')->class('fa fa-copy'))
        ->class('btn btn-info btn-sm me-1 copyBranche' . $additional_class)
        ->data('bs-toggle', 'tooltip')
        ->attribute('title', 'Şube Kopyala')
        ->data('object-id', $id);
}

function create_info_button($link, $text, $additional_class = null)
{
    return html()->a($link)->text($text)
        ->class('me-1 ' . $additional_class)
        ->attribute('target', "_blank");
}

function create_delete_button($model, $id, $title, $content, $isReload = "false", $route = '/isletme/ajax/delete/object', $deleteType = true)
{
    return html()->a('#', html()->i('')->class('fa fa-trash'))
        ->class('btn btn-danger btn-sm me-1 delete-btn')
        ->attribute('data-toggle', 'popover')
        ->attribute('data-object-id', $id)
        ->attribute('data-route', $route)
        ->attribute('data-model', 'App\Models\\' . str_replace('App\Models\\', '', $model))
        ->attribute('data-content', $content)
        ->attribute('data-delete-type', $deleteType)
        ->attribute('data-reload', $isReload)
        ->attribute('data-title', $title);
}

function create_html_delete_button($model, $id, $title, $content, $route, $isReload)
{
    return html()->a('#', html()->i('')->class('fa fa-trash'))
        ->class('btn btn-danger btn-sm me-1 delete-btn')
        ->attribute('data-toggle', 'popover')
        ->attribute('data-object-id', $id)
        ->attribute('data-route', $route)
        ->attribute('data-model', 'App\Models\\' . str_replace('App\Models\\', '', $model))
        ->attribute('data-content', $content)
        //->attribute('data-delete-type', $deleteType)
        ->attribute('data-reload', $isReload)
        ->attribute('data-title', $title);
}
function create_html_delete_big_button($model, $id, $title, $content, $route, $isReload)
{
    return html()->button(html()->i('')->class('fa fa-trash'))
        ->class('btn btn-danger me-1 mb-3 delete-btn')
        ->attribute('data-toggle', 'popover')
        ->attribute('data-object-id', $id)
        ->attribute('data-route', $route)
        ->attribute('data-model', 'App\Models\\' . str_replace('App\Models\\', '', $model))
        ->attribute('data-content', $content)
        //->attribute('data-delete-type', $deleteType)
        ->attribute('data-reload', $isReload)
        ->attribute('data-title', $title);
}
function create_html_icon_delete_button($model, $id, $title, $content, $route, $isReload)
{
    return html()->i('')->class('cursor-pointer ti ti-trash ti-md me-2 text-danger delete-btn')
        ->attribute('data-toggle', 'popover')
        ->attribute('data-object-id', $id)
        ->attribute('data-route', $route)
        ->attribute('data-model', 'App\Models\\' . str_replace('App\Models\\', '', $model))
        ->attribute('data-content', $content)
        //->attribute('data-delete-type', $deleteType)
        ->attribute('data-reload', $isReload)
        ->attribute('data-title', $title);
}

function create_form_delete_button($model, $id, $title, $content)
{
    $svgIcon = collect([
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">',
        '<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="#bfbfbf" />',
        '<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />',
        '<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />',
        '</svg>',
    ])->implode('');

    return html()->a('#', html_entity_decode($svgIcon))
        ->class('btn btn-icon btn-active-light-primary w-30px h-30px me-3 delete-btn')
        ->attribute('data-bs-toggle', 'tooltip')
        ->attribute('title', 'Sil')
        ->attribute('data-object-id', $id)
        ->attribute('data-model', 'App\Models\\' . str_replace('App\Models\\', '', $model))
        ->attribute('data-content', $content)
        ->attribute('data-title', $title);

}

function create_switch($id, $checked, $model, $colum = 'is_active', $title = null): \Spatie\Html\BaseElement|\Spatie\Html\Elements\Div
{
    $input = html()->input('checkbox', 'featured', $id)
        ->checked($checked)
        ->class('form-check-input ajax-switch')
        ->attribute('data-model', 'App\Models\\' . str_replace('App\Models\\', '', $model))
        ->attribute('data-column', $colum);

    return html()->div($input)->class('form-check form-switch')
        ->attribute('title', $title);
}

function create_custom_route_switch($id, $checked, $model, $column, $route): \Spatie\Html\BaseElement|\Spatie\Html\Elements\Div
{
    $input = html()->input('checkbox', 'featured', $id)
        ->checked($checked)
        ->class('form-check-input custom-ajax-switch')
        ->attribute('data-model', 'App\Models\\' . str_replace('App\Models\\', '', $model))
        ->attribute('data-route', $route)
        ->attribute('data-column', $column);

    return html()->div($input)->class('form-check form-switch');
}

function formatPrice($price)
{
    // Fiyatı iki ondalık basamağa yuvarlamadan kes
   // $formattedPrice = floor($price * 100) / 100;
    // Sayıyı iki ondalık basamakla formatla
    $formattedPrice = number_format($price, 2) . " TL";
    return $formattedPrice;
}


function create_dropdown_button($buttons, $id, $addedClass)
{
    $newButtons = "";

    foreach ($buttons as $button) {
        if(isset($button["buttonLink"])){
            $newButtons .= '<a href="'.$button["buttonLink"].'" class="dropdown-item '.$addedClass.'" data-element-id="'.$id.'" data-update-id="'.$button["id"].'">'.$button["buttonText"].'</a>';
        } else{
            $newButtons .= '<a href="javascript:void(0)" class="dropdown-item '.$addedClass.'" data-element-id="'.$id.'" data-update-id="'.$button["id"].'">'.$button["buttonText"].'</a>';
        }
    }

    $menuOptions = '<div class="d-inline-block">
                        <a href="javascript:;" class="btn btn-sm btn-primary  dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="text-white ti ti-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end m-0">
                            '.$newButtons.'
                        </div>
                    </div>';
    return $menuOptions;
}
