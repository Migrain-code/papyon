<div class="modal fade askDemoModal" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="flex-direction: row;" class="contact_page_contact_form">
                    <div class="left">
                        <h5>Bizimle İletişime Geç</h5>
                        <p>Aklındaki Soruları Yazabilirsin</p>
                        <form action="{{route('demoRequest')}}" method="post">
                            @csrf
                            <div class="form">
                                <input type="text" style="color: white" required="" placeholder="Adınız*" name="name">
                            </div>
                            <div class="form">
                                <input type="text" style="color: white" required="" placeholder="Mail Adresi*" name="mail">
                                <input type="text" style="color: white" name="phone" placeholder="Cep Telefonu">
                            </div>
                            <div class="form">
                                <input type="text" style="color: white" placeholder="Şirket İsmi" name="company_name">
                            </div>
                            <div class="form">
                                <textarea name="message" style="color: white" placeholder="Lütfen Buraya Yazın*" required="" id="" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form">
                                <button style="width: 100%; max-width:100%;" class="third_button">
                                    Gönder
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
