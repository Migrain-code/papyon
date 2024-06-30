<!-- Modal -->
<div class="modal fade" id="orderDetailModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title">Sipariş Detayı Mehmet Yılmaz</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                    <tr data-dt-row="1" data-dt-column="2">
                        <td>Sipariş Kodu:</td>
                        <td id="orderId">#2</td>
                    </tr>
                    <tr data-dt-row="1" data-dt-column="3">
                        <td>Ad Soyad:</td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="avatar-wrapper">
                                    <div class="avatar me-2"><span
                                            class="avatar-initial rounded-circle bg-label-secondary">ML</span></div>
                                </div>
                                <div class="d-flex flex-column"><span
                                        class="emp_name text-truncate" id="nameSurname"></span><small
                                        class="emp_post text-truncate text-muted" id="phoneNumber"></small></div>
                            </div>
                        </td>
                    </tr>
                    <tr data-dt-row="1" data-dt-column="4">
                        <td>Ödeme Türü:</td>
                        <td id="paymentType">1</td>
                    </tr>
                    <tr data-dt-row="1" data-dt-column="5">
                        <td>Tarih:</td>
                        <td id="createdAt"></td>
                    </tr>
                    <tr data-dt-row="1" data-dt-column="6">
                        <td>Toplam Tutar:</td>
                        <td id="totalPayed">0.00 ₺</td>
                    </tr>
                    <tr data-dt-row="1" data-dt-column="7">
                        <td>Durum:</td>
                        <td><span class="badge bg-label-primary">Sipariş Oluşturuldu</span></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>
