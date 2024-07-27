@extends('front-end.layouts.master')
@section('title', '')
@section('styles')

@endsection
@section('content')
    <section class="faq">
        <div class="title">Sıkça Sorular Sorular</div>
        <div class="subtitle">Bu Sorulara Cevaplarımız Aşağıda</div>
        <div class="container">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            HİZMETLER
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            65 yıllık deneyimimizi ve arşivlerimizdeki üç nesil bilgimizi halı kültürünü yaşamanız için mutlu olmanız için kullanıyoruz. Eski yöntemleri bugünkü imkanlarla harmanlayarak, tamamen el yapımı tekniklerle halının karakterini veren doğal malzemeler kullanıyoruz. Ana malzeme olarak, en yüksek kaliteli ve dayanıklı yünleri Anadolu ve Asya&#039;nın bozkırlarından ve yüksek kesimlerinden temin ediyoruz. Galerie Ikman aynı zamanda size uygun renkler ve tasarımlara bağlı kalarak doğudan batıya geçmişten günümüze benzersiz halılar da üretir. Tüm bunların birleşimi de taleplerinizi farklı bir boyuta taşır.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            GEÇMİŞTEN GÜNÜMÜZE
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Oriental Halılar: İnsan emeğinin doğanın bize sunduğu şeyle buluşması sanata dönüşüyor. Halılarımızda kullanılan malzemeler dikkatlice seçilmiş farklı coğrafyalardan ve geçmişten günümüze harmanlanan dokuma tezgahlarında hayat buluyor. Size, doğu halılarının tarihini, arkasındaki hikayeleri ve hepimizi büyüleyen benzersiz farklılıkları veya ortak noktaları sunuyoruz. Kültürümüzden öğrendiğimiz ve nesilden nesile deneyimlediğimiz misafirperverliğimizi muhteşem sanat eserleri eşliğinde sunmaktan mutluluk duyuyoruz. Sizi geçmişin ve geleceğin merkezine koyuyoruz.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            BUGÜNÜN UYUMU
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Modern Halılar: Doğu halılarının coğrafyalarına, kültürlerine ve yaşam tarzlarına uygun desenlere ve renklere sahip olduğunu biliyoruz. Zaman içinde halı kültüründeki kaçınılmaz değişiklikler, hayatımıza zengin ve farklı tasarımlar ekleyen doğu halılarının kombinasyonlarından oluşan yeni ve modern halıların ortaya çıkmasına neden oldu. Bu yolculukta gezegenimize, insanlara ve kültüre zarar vermeden, eski teknikleri geliştirerek tamamen doğal malzemeler kullanarak modern halılar tasarladık. Geçmişin izlerinin yanı sıra, tamamen minimalist veya çağın çizgilerini taşıyan ancak eski dokuma tekniklerine bağlı kalan dayanıklı halılar ürettik, ihtiyaçlarınıza ve taleplerinize uygun.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                            ANTİKA VE DEĞERLİ HALILAR
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Onarımlar: Sahip olduğumuz halıların yaşlarına bakılmaksızın bize çok değerli olduklarını biliyoruz. Yüzlerce yılın yaşını ifade eden bazı halılar var. Bir şekilde hepsi bizim için farklı anlamlara sahip. Bizim için değerlidirler. Bu tür antika ve değerli halıların onarımlarını ve tamirlerini yaparız. Kullanılan malzemeler ve renkler uzman ekiplerimiz tarafından laboratuvarlarımızda analiz edilir ve ihtiyaç listeleri hazırlanarak süreç başlatılır. Ve sonuç olarak, halınız size daha önce hiç zarar görmemiş veya onarılmamış gibi teslim edilir. Bu çok hassas ve zorlu bir süreç olduğunun farkındayız. 40 yıldan fazla deneyimimiz ve yeteneklerimiz, müşterilerimizin son derece tatmin edici sonuçlara ulaştığımızı göstermektedir.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                            DOĞADAN HER ŞEY, TAMAMEN DOĞAL
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Doğal Boya: Çevreyi ve insanları koruyor ve doğanın sunduğu nimetleri tamamen el yapımı tekniklerle elde edilen bu göz alıcı renklerde kullanıyoruz. Tüm bu çarpıcı renkler, kimyasal maddelerin kullanılmadan doğadan elde edildi ve yünü renklendirdi. Halılarımızdaki kullandığımız renkler hakkındaki sorularınızı cevaplıyor ve taleplerinizi karşılıyoruz. Bu renklerin tamamen doğadan geldiğini görmekten hoşlanıyoruz. Doğal olmaları harika, aynı zamanda çok dayanıklı ve uzun ömürlü olmaları da güzel. Fotoğrafta tamamen burada tanımlanan yöntemlerle dokunan modern bir halı görüyorsunuz. Renk skalasını farklı bir şekilde göstermeyi amaçlıyoruz.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                            FARK YARATMAK İÇİN
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Medya Temini: Tek ve özel doğu halılarımızın sergilendiği veya tercih edildiği alanlardan biri büyük organizasyonlar, fuarlar, davetler ve sinema sektörüdür. Zaman zaman benzer talepleri düşünüyoruz. Temsil ettiğimiz konu ile uyumlu doğu halıları, elçilikler tarafından verilen yıllık önemli davetlerde veya bir film yapıminde mekanları ölümsüzleştirir. Elbette büyük sergilere davet edilen misafirleriz. Zaman zaman benzer talepleri karşıladığımız medya temini projeleriniz hakkında konuşmak için stüdyolarımıza başvurabilirsiniz.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                            TESTTTTTT
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection
