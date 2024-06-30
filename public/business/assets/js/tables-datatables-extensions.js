/**
 * DataTables Extensions (jquery)
 */

'use strict';

$(function () {
  var dt_fixedheader_table = $('.dt-fixedheader');

  // FixedHeader
  // --------------------------------------------------------------------

  if (dt_fixedheader_table.length) {
    var dt_fixedheader = dt_fixedheader_table.DataTable({
      data: tableDatas,
      columns: [
        { data: '' },
        { data: 'id' },
        { data: 'id' },
        { data: 'full_name' },
        { data: 'email' },
        { data: 'start_date' },
        { data: 'salary' },
        { data: 'status' },
        { data: '' }
      ],
      columnDefs: [
        {
          className: 'control',
          orderable: false,
          targets: 0,
          responsivePriority: 3,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          // For Checkboxes
          targets: 1,
          orderable: false,
          render: function () {
            return '<input type="checkbox" class="dt-checkboxes form-check-input">';
          },
          checkboxes: {
            selectAllRender: '<input type="checkbox" class="form-check-input">'
          },
          responsivePriority: 4
        },
        {
          targets: 2,
          visible: false
        },
        {
          // Avatar image/badge, Name and post
          targets: 3,
          render: function (data, type, full, meta) {
            var $user_img = full['avatar'],
              $name = full['full_name'],
              $post = full['post'];
            if ($user_img) {
              // For Avatar image
              var $output =
                '<img src="' + assetsPath + 'img/avatars/' + $user_img + '" alt="Avatar" class="rounded-circle">';
            } else {
              // For Avatar badge
              var stateNum = Math.floor(Math.random() * 6);
              var states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
              var $state = states[stateNum],
                $name = full['full_name'];
              var $initials = $name.match(/\b\w/g) || [];
              $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
              $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
            }
            // Creates full output for row
            var $row_output =
              '<div class="d-flex justify-content-start align-items-center">' +
              '<div class="avatar-wrapper">' +
              '<div class="avatar me-2">' +
              $output +
              '</div>' +
              '</div>' +
              '<div class="d-flex flex-column">' +
              '<span class="emp_name text-truncate">' +
              $name +
              '</span>' +
              '<small class="emp_post text-truncate text-muted">' +
              $post +
              '</small>' +
              '</div>' +
              '</div>';
            return $row_output;
          },
          responsivePriority: 5
        },
        {
          responsivePriority: 1,
          targets: 4
        },
        {
          responsivePriority: 2,
          targets: 6
        },

        {
          // Label
          targets: -2,
          render: function (data, type, full, meta) {
            // var $rand_num = Math.floor(Math.random() * 5) + 1;
            var $status_number = full['status'];
            var $status = {
              1: { title: 'Sipariş Oluşturuldu', class: 'bg-label-primary' },
              2: { title: 'Onaylandı', class: 'bg-label-success' },
              3: { title: 'Yola Çıktı', class: ' bg-label-secondary' },
              4: { title: 'İptal Edildi', class: ' bg-label-danger' },
              5: { title: 'Teslim Edilemedi', class: ' bg-label-warning' },
              6: { title: 'Teslim Edildi', class: ' bg-label-info' },
              7: { title: 'Tamamlandı', class: ' bg-label-success' }
            };
            if (typeof $status[$status_number] === 'undefined') {
              return data;
            }
            return (
              '<span class="badge ' + $status[$status_number].class + '">' + $status[$status_number].title + '</span>'
            );
          }
        },
        {
          // Actions
          targets: -1,
          title: 'Actions',
          orderable: false,
          render: function (data, type, full, meta) {

            return (
              '<div class="d-inline-block">' +
              '<a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>' +
              '<div class="dropdown-menu dropdown-menu-end m-0">' +
              '<a href="javascript:;" class="dropdown-item">Onayla</a>' +
              '<a href="javascript:;" class="dropdown-item">İptal Et</a>' +
              '<a href="javascript:;" class="dropdown-item">Kuryede</a>' +
              '<a href="javascript:;" class="dropdown-item">Teslim Et</a>' +
              '<a href="javascript:;" class="dropdown-item">Tamamla</a>' +
              '<div class="dropdown-divider"></div>' +
              '<a href="javascript:;" class="dropdown-item text-danger delete-record">Sil</a>' +
              '</div>' +
              '</div>' +
              '<a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>' +
              '<a href="/business/order/' + full.id + '" class="btn btn-sm btn-icon"><i class="text-primary ti ti-eye"></i></a>'
            );
          }
        }
      ],
      order: [[2, 'desc']],
      dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 7,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Sipariş Detayı ' + data['full_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      }
    });
    // Fixed header
    if (window.Helpers.isNavbarFixed()) {
      var navHeight = $('#layout-navbar').outerHeight();
      new $.fn.dataTable.FixedHeader(dt_fixedheader).headerOffset(navHeight);
    } else {
      new $.fn.dataTable.FixedHeader(dt_fixedheader);
    }
  }

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 200);

  $('.item-show').on('click', function (){
        var orderId = $(this).data('order-id');
        var orderModal = new bootstrap.Modal(document.querySelector('#orderDetailModal'));
      $.ajax({
          url: '/business/order/'+orderId,
          type: "GET",
          dataType: "JSON",
          success: function (res) {
              $('#orderId').text('#'+orderId);
              $('#nameSurname').text(res.name);
              $('#phoneNumber').text(res.phone);
              $('#paymentType').text(res.paymentType);
              $('#createdAt').text(res.created_at);
              $('#totalPayed').text(res.totalPrice);
              orderModal.show();
          },
          error: function (xhr) {

              var errorMessage = "<ul>";
              xhr.responseJSON.errors.forEach(function (error) {
                  errorMessage += "<li>" + error + "</li>";
              });
              errorMessage += "</ul>";

              Swal.fire({
                  icon: 'error',
                  title: 'Hata!',
                  html: errorMessage,
                  buttonsStyling: false,
                  confirmButtonText: "Tamam",
                  customClass: {
                      confirmButton: "btn btn-primary"
                  }
              });
          }
      });
  });
});
