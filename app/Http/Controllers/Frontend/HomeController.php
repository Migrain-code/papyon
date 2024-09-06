<?php

namespace App\Http\Controllers\Frontend;

use App\Events\PrivateEvent;
use App\Events\TestEvent;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\City;
use App\Models\ContactRequest;
use App\Models\Contract;
use App\Models\DemoRequest;
use App\Models\Entegration;
use App\Models\Feature;
use App\Models\Gallery;
use App\Models\MenuCategory;
use App\Models\MenuCategoryProduct;
use App\Models\Order;
use App\Models\Package;
use App\Models\Page;
use App\Models\PartnershipRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function soketTest()
    {
        return view('socket.test');
    }

    public function testEven()
    {
        $orders = Order::all();
        $userId = 7;
        event(new PrivateEvent($orders, $userId));
        return "done";
    }
    public function temp()
    {
        $menu_kategori = array(
            array('id' => '51','baslik' => 'Izgara','aciklama' => 'Izgara','foto' => '440179880.jpg','sira' => '4','parent' => ''),
            array('id' => '50','baslik' => 'Aperitifler','aciklama' => 'Aperitifler','foto' => '1942976584.jpg','sira' => '3','parent' => ''),
            array('id' => '47','baslik' => 'Palimpsest Special','aciklama' => 'Palimpsest Special','foto' => '686976022.jpg','sira' => '0','parent' => ''),
            array('id' => '48','baslik' => 'Kahvaltı','aciklama' => 'Kahvaltı','foto' => '1302339224.jpg','sira' => '1','parent' => ''),
            array('id' => '49','baslik' => 'Menemen Ve Yumurta','aciklama' => 'Menemen Ve Yumurta','foto' => '539866680.jpg','sira' => '2','parent' => ''),
            array('id' => '52','baslik' => 'Et Menü','aciklama' => 'Et Menü','foto' => '205843499.jpg','sira' => '5','parent' => ''),
            array('id' => '53','baslik' => 'Tavuk Menü','aciklama' => 'Tavuk Menü','foto' => '65818588.jpg','sira' => '6','parent' => ''),
            array('id' => '54','baslik' => 'Hamburgerler','aciklama' => 'Hamburgerler','foto' => '645277243.jpg','sira' => '7','parent' => ''),
            array('id' => '55','baslik' => 'Pizza Çeşitleri','aciklama' => 'Pizza Çeşitleri','foto' => '1102252555.jpg','sira' => '8','parent' => ''),
            array('id' => '56','baslik' => 'Wraplar','aciklama' => 'Wraplar','foto' => '609968990.jpg','sira' => '9','parent' => ''),
            array('id' => '57','baslik' => 'Makarna Menü','aciklama' => 'Makarna Menü','foto' => '1406358251.jpg','sira' => '10','parent' => ''),
            array('id' => '58','baslik' => 'Mantı Çeşitleri','aciklama' => 'Mantı Çeşitleri','foto' => '760530359.jpg','sira' => '11','parent' => ''),
            array('id' => '59','baslik' => 'Salatalar','aciklama' => 'Salatalar','foto' => '2071404835.jpg','sira' => '12','parent' => ''),
            array('id' => '60','baslik' => 'Tost Çeşitleri','aciklama' => 'Tost Çeşitleri','foto' => '790085902.jpg','sira' => '13','parent' => ''),
            array('id' => '61','baslik' => 'Pasta-Tatlı','aciklama' => 'Pasta-Tatlı','foto' => '553397112.jpg','sira' => '14','parent' => ''),
            array('id' => '62','baslik' => 'Sıcak İçecekler','aciklama' => 'Sıcak İçecekler','foto' => '533273536.jpg','sira' => '15','parent' => ''),
            array('id' => '63','baslik' => 'Soğuk İçecekler','aciklama' => 'Soğuk İçecekler','foto' => '1286878076.jpg','sira' => '16','parent' => ''),
            array('id' => '64','baslik' => 'Kokteyl','aciklama' => 'Kokteyl','foto' => '2023121752.jpg','sira' => '17','parent' => ''),
            array('id' => '65','baslik' => 'Meşrubatlar','aciklama' => 'Meşrubatlar','foto' => '1276563422.jpg','sira' => '19','parent' => ''),
            array('id' => '73','baslik' => 'SPECIAL NARGİLELER','aciklama' => 'SPECIAL NARGİLELER','foto' => '1271568202.jpg','sira' => '21','parent' => ''),
            array('id' => '69','baslik' => 'Nargileler','aciklama' => 'Nargileler','foto' => '588006399.jpg','sira' => '20','parent' => ''),
            array('id' => '72','baslik' => 'DONDURMA','aciklama' => 'DONDURMA','foto' => 'adsız.jpg','sira' => '18','parent' => '')
        );
        $products = array(
            array('parent' => '47','urun_adi' => 'ÇÖKERTME KEBABI','urun_fiyat' => '500','aciklama' => '200 gr dana bonfile ,kibrit cips,yoğurt,pilav,domates sos','foto' => '905119956.jpg','aktif' => '1','sira' => '0','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOGMOON COLA','urun_fiyat' => '375','aciklama' => 'KOLA','foto' => '98343330.jpg','aktif' => '1','sira' => '19','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOGMOON TURKISH ROSE','urun_fiyat' => '375','aciklama' => 'GÜL AHUDUDU VANİLYA SARDUNYA','foto' => '1178607134.jpg','aktif' => '1','sira' => '20','alerji' => '','ekstralar' => ''),
            array('parent' => '47','urun_adi' => 'Palimpsest Special','urun_fiyat' => '2500','aciklama' => 'Palimpsest Special','foto' => '1924712036.jpg','aktif' => '1','sira' => '192','alerji' => '','ekstralar' => ''),
            array('parent' => '48','urun_adi' => 'PALİMPSEST SERPME 2 KİŞİLİK','urun_fiyat' => '700','aciklama' => 'Bal beyaz peynir cips tabağı çeçil peynir çerkez peynir eski kaşar ev reçelleri ezine peyniri,haşlanmış yumurta kaymak ,örgü peynir,sınırsız çay,söğüş tabağı,,taze kaşar,tereyağ ,','foto' => '1820779082.jpg','aktif' => '1','sira' => '193','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'JAİBAR DAMLA SAKIZI','urun_fiyat' => '450','aciklama' => 'JAİBAR DAMLA SAKIZI','foto' => '1754994079.jpg','aktif' => '1','sira' => '42','alerji' => '','ekstralar' => ''),
            array('parent' => '48','urun_adi' => 'SICAK KAHVALTI','urun_fiyat' => '350','aciklama' => 'BEYAZ PEYNİR,BİR BARDAK ÇAY,HAŞLANMIŞ YUMURTA,KAŞAR PEYNİR,REÇEL,SALATALIK,DOMATES,SUSAMLI SİMİT,YEŞİL SİYAH ZEYTİN','foto' => '1428946504.jpg','aktif' => '1','sira' => '194','alerji' => '','ekstralar' => ''),
            array('parent' => '49','urun_adi' => 'MENEMEN','urun_fiyat' => '150','aciklama' => 'MENEMEN','foto' => '1602072872.jpg','aktif' => '1','sira' => '195','alerji' => '','ekstralar' => ''),
            array('parent' => '49','urun_adi' => 'KARIŞIK MENEMEN','urun_fiyat' => '175','aciklama' => 'KARIŞIK MENEMEN','foto' => '869191873.jpg','aktif' => '1','sira' => '196','alerji' => '','ekstralar' => ''),
            array('parent' => '49','urun_adi' => 'SAHANDA YUMURTA','urun_fiyat' => '125','aciklama' => 'SAHANDA YUMURTA','foto' => '2101742362.jpg','aktif' => '1','sira' => '197','alerji' => '','ekstralar' => ''),
            array('parent' => '49','urun_adi' => 'SUCUKLU YUMURTA','urun_fiyat' => '175','aciklama' => 'SUCUKLU YUMURTA','foto' => '1467421577.jpg','aktif' => '1','sira' => '198','alerji' => '','ekstralar' => ''),
            array('parent' => '49','urun_adi' => 'SADE OMLET','urun_fiyat' => '150','aciklama' => 'SADE OMLET','foto' => '1391997887.jpg','aktif' => '1','sira' => '199','alerji' => '','ekstralar' => ''),
            array('parent' => '49','urun_adi' => 'KARIŞIK OMLET','urun_fiyat' => '175','aciklama' => 'KARIŞIK OMLET','foto' => '380060272.jpg','aktif' => '1','sira' => '200','alerji' => '','ekstralar' => ''),
            array('parent' => '50','urun_adi' => 'MUHABBET TABAĞI','urun_fiyat' => '275','aciklama' => 'MUHABBET TABAĞI','foto' => '1060395301.jpg','aktif' => '1','sira' => '201','alerji' => '','ekstralar' => ''),
            array('parent' => '50','urun_adi' => 'ELMA DİLİM PATATES','urun_fiyat' => '195','aciklama' => 'ELMA DİLİM PATATES','foto' => '1652210541.jpg','aktif' => '1','sira' => '202','alerji' => '','ekstralar' => ''),
            array('parent' => '50','urun_adi' => 'SOĞAN HALKASI','urun_fiyat' => '220','aciklama' => 'SOĞAN HALKASI','foto' => '1516985595.jpg','aktif' => '1','sira' => '203','alerji' => '','ekstralar' => ''),
            array('parent' => '50','urun_adi' => 'PATATES KROKET','urun_fiyat' => '220','aciklama' => 'PATATES KROKET','foto' => '1534344828.jpg','aktif' => '1','sira' => '204','alerji' => '','ekstralar' => ''),
            array('parent' => '50','urun_adi' => 'PARMAK PATATES','urun_fiyat' => '175','aciklama' => 'PARMAK PATATES','foto' => '341254561.jpg','aktif' => '1','sira' => '205','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOOGMOON TURKISH COFFE','urun_fiyat' => '375','aciklama' => 'GELENELSEL TURK KAHVESİ','foto' => '24884907.jpg','aktif' => '1','sira' => '21','alerji' => '','ekstralar' => ''),
            array('parent' => '50','urun_adi' => 'SİGARA BÖREĞİ','urun_fiyat' => '225','aciklama' => 'SİGARA BÖREĞİ','foto' => '635202891.jpg','aktif' => '1','sira' => '206','alerji' => '','ekstralar' => ''),
            array('parent' => '51','urun_adi' => 'IZGARA KÖFTE','urun_fiyat' => '300','aciklama' => '230 GR KASAP KÖFTE,CİPS,DOMATES,SOĞAN,KÖZLENMİŞ BİBER,PEYNİRLİ LAVAŞ,PİLAV','foto' => '1787056819.jpg','aktif' => '1','sira' => '207','alerji' => '','ekstralar' => ''),
            array('parent' => '51','urun_adi' => 'SULTAN KÖFTE','urun_fiyat' => '375','aciklama' => '230 GR PEYNİR DOLGULU KÖFTE,DOMATES SOS','foto' => '1509781025.jpg','aktif' => '1','sira' => '208','alerji' => '','ekstralar' => ''),
            array('parent' => '51','urun_adi' => 'ET ŞİŞ','urun_fiyat' => '370','aciklama' => '180 GR DANA BONFİLE,CİPS,PEYNİRLİ LAVAŞ,PİLAV','foto' => '128627342.jpg','aktif' => '1','sira' => '209','alerji' => '','ekstralar' => ''),
            array('parent' => '51','urun_adi' => 'PÜRELİ BONFİLE','urun_fiyat' => '600','aciklama' => 'PÜRELİ BONFİLE','foto' => '860502881.JPG','aktif' => '1','sira' => '9','alerji' => '','ekstralar' => ''),
            array('parent' => '51','urun_adi' => 'BEYTİ KEBAP','urun_fiyat' => '350','aciklama' => 'BEYTİ KEBAP','foto' => '161081121.jpg','aktif' => '1','sira' => '210','alerji' => '','ekstralar' => ''),
            array('parent' => '51','urun_adi' => 'ADANA KEBAP','urun_fiyat' => '325','aciklama' => 'ADANA KEBAP','foto' => '1398857872.jpg','aktif' => '1','sira' => '211','alerji' => '','ekstralar' => ''),
            array('parent' => '51','urun_adi' => 'BEĞENDİLİ BONFİLE','urun_fiyat' => '650','aciklama' => '230 GR DANA BONFİLE,KROKET,PATLICAN BEĞENDİ,SOĞAN HALKASI','foto' => '1982503776.jpg','aktif' => '1','sira' => '212','alerji' => '','ekstralar' => ''),
            array('parent' => '51','urun_adi' => 'DOMİ GLAS SOSLU BONFİLE','urun_fiyat' => '550','aciklama' => '250 GR BONFİLE DOMATES KÖZLENMİŞ BİBER PARMAK PATATES YEŞİLLİK VE BİBER','foto' => '1993443117.jpg','aktif' => '1','sira' => '213','alerji' => '','ekstralar' => ''),
            array('parent' => '51','urun_adi' => 'KARIŞIK IZGARA','urun_fiyat' => '600','aciklama' => '100 GR KÖFTE 120 GR DANA BONFİLE ET ŞİŞ 100 GR TAVUK IZGARA PATATES PİLAV YEŞİLLİK','foto' => '1405355264.jpg','aktif' => '1','sira' => '214','alerji' => '','ekstralar' => ''),
            array('parent' => '72','urun_adi' => 'ÇİKOLATA','urun_fiyat' => '40','aciklama' => 'KAKAO','foto' => '1405641911.jpg','aktif' => '1','sira' => '51','alerji' => '','ekstralar' => ''),
            array('parent' => '72','urun_adi' => 'BLUE SKY','urun_fiyat' => '35','aciklama' => 'MAVİ MELEK','foto' => '150863735.jpg','aktif' => '1','sira' => '52','alerji' => '','ekstralar' => ''),
            array('parent' => '51','urun_adi' => 'TAVUK PİRZOLA','urun_fiyat' => '300','aciklama' => '240 GR MARİNE EDİLMİŞ TAVUK PİRZOLA CİPS PEYNİRLİ LAVAŞ PİLAV','foto' => '1738347236.jpg','aktif' => '1','sira' => '215','alerji' => '','ekstralar' => ''),
            array('parent' => '52','urun_adi' => 'GÜVEÇTE ET SOTE','urun_fiyat' => '350','aciklama' => 'KUŞBAŞI 200 GR DANA BONFİLE BİBER DOMATES ÇOBAN SALATA PİLAV SARIMSAK SOĞAN','foto' => '1740120268.jpg','aktif' => '1','sira' => '216','alerji' => '','ekstralar' => ''),
            array('parent' => '52','urun_adi' => 'ETLİ FAJİTA','urun_fiyat' => '450','aciklama' => '200 GR DANA BONFİLE BARBEKÜ SOS CALİFORNİA BİBERİ GARLİC PEYNİRLİ ROKA SOĞAN TAİ TORTİLLA','foto' => '1879208766.jpg','aktif' => '1','sira' => '217','alerji' => '','ekstralar' => ''),
            array('parent' => '52','urun_adi' => 'SAÇ KAVURMA','urun_fiyat' => '350','aciklama' => '200 GR BONFİLE ÇOBAN SALATA PİLAV','foto' => '2078927403.jpg','aktif' => '1','sira' => '218','alerji' => '','ekstralar' => ''),
            array('parent' => '52','urun_adi' => 'KAŞARLI OSMANLI GÜVECİ','urun_fiyat' => '400','aciklama' => '200 GR KUŞBAŞI ET PARMAK PATATES VE SOSLARLA SERVİS EDİLİR','foto' => '42418361.jpg','aktif' => '1','sira' => '219','alerji' => '','ekstralar' => ''),
            array('parent' => '53','urun_adi' => 'KÖRİ SOSLU TAVUK','urun_fiyat' => '275','aciklama' => 'KÖRİ SOSLU TAVUK','foto' => '1756800619.jpg','aktif' => '1','sira' => '220','alerji' => '','ekstralar' => ''),
            array('parent' => '53','urun_adi' => 'KREMALI MANTARLI TAVUK','urun_fiyat' => '275','aciklama' => 'KREMALI MANTARLI TAVUK','foto' => '1967029374.jpg','aktif' => '1','sira' => '221','alerji' => '','ekstralar' => ''),
            array('parent' => '53','urun_adi' => 'SOYA SOSLU TAVUK','urun_fiyat' => '275','aciklama' => 'SOYA SOSLU TAVUK','foto' => '23423875.jpg','aktif' => '1','sira' => '222','alerji' => '','ekstralar' => ''),
            array('parent' => '53','urun_adi' => 'TAİ SOSLU TAVUK','urun_fiyat' => '275','aciklama' => 'TAİ SOSLU TAVUK','foto' => '203681101.jpg','aktif' => '1','sira' => '223','alerji' => '','ekstralar' => ''),
            array('parent' => '53','urun_adi' => 'TERİYAKİ SOSLU TAVUK','urun_fiyat' => '275','aciklama' => 'TERİYAKİ SOSLU TAVUK','foto' => '1093467533.jpg','aktif' => '1','sira' => '224','alerji' => '','ekstralar' => ''),
            array('parent' => '53','urun_adi' => 'TAVUK FAJİTA','urun_fiyat' => '300','aciklama' => 'TAVUK FAJİTA','foto' => '1957650570.jpg','aktif' => '1','sira' => '225','alerji' => '','ekstralar' => ''),
            array('parent' => '53','urun_adi' => 'SHINITZEL','urun_fiyat' => '300','aciklama' => 'SHINITZEL','foto' => '527443360.jpg','aktif' => '1','sira' => '226','alerji' => '','ekstralar' => ''),
            array('parent' => '53','urun_adi' => 'ÇITIR TAVUK TABAĞI','urun_fiyat' => '300','aciklama' => 'ÇITIR TAVUK TABAĞI','foto' => '797347107.jpg','aktif' => '1','sira' => '227','alerji' => '','ekstralar' => ''),
            array('parent' => '54','urun_adi' => 'KLASİK HAMBURGER','urun_fiyat' => '275','aciklama' => '200 GR KONTRNUAR KIYMALI KÖFTE DOMATES MARUL KIZARMIŞ SOĞAN KOKTEYL SOS PARMAK PATATES  TURŞU','foto' => '1258777647.jpg','aktif' => '1','sira' => '228','alerji' => '','ekstralar' => ''),
            array('parent' => '54','urun_adi' => 'CHEESEBURGER','urun_fiyat' => '300','aciklama' => '200 GR KONTRNUAR  KIYMALI KÖFTE CHEDDAR PEYNİRİ,DOMATES MARUL,KIZARMIŞ SOĞAN,KOKTELY SOS PARMAK PATATES TURŞU','foto' => '1711965770.jpg','aktif' => '1','sira' => '229','alerji' => '','ekstralar' => ''),
            array('parent' => '54','urun_adi' => 'MEXICO BURGER','urun_fiyat' => '300','aciklama' => 'ACILI KONTRNUAR KÖFTESİ 250 GR CHEDDAR PEYNİRİ DOMATES MARUL KAVRULMUŞ SOĞAN PARMAK PATATES PEYNİRLİ','foto' => '1062200201.jpg','aktif' => '1','sira' => '230','alerji' => '','ekstralar' => ''),
            array('parent' => '54','urun_adi' => 'CHİCKEN BURGER','urun_fiyat' => '240','aciklama' => '200 GR TAVUK KÖFTE CHEDDAR PEYNİRİ DOMATES MARUL KAVRULMUŞ SOĞAN PARMAK PATATES PEYNİRLİ ROKA SOĞAN HALKASI','foto' => '1851813688.jpg','aktif' => '1','sira' => '231','alerji' => '','ekstralar' => ''),
            array('parent' => '54','urun_adi' => 'PALİMPSEST MİX DOUBLE BURGER','urun_fiyat' => '400','aciklama' => 'PALİMPSEST MİX DOUBLE BURGER','foto' => '1319878007.jpg','aktif' => '1','sira' => '232','alerji' => '','ekstralar' => ''),
            array('parent' => '55','urun_adi' => 'KLASİK KARIŞIK PİZZA','urun_fiyat' => '300','aciklama' => 'BİBER DOMATES MANTAR MISIR MOZERALLA SOĞAN SALAM SUCUK ZEYTİN','foto' => '1456243386.jpg','aktif' => '1','sira' => '233','alerji' => '','ekstralar' => ''),
            array('parent' => '55','urun_adi' => 'VEJETERYAN PİZZA','urun_fiyat' => '260','aciklama' => 'BİBER DOMATES MANTAR MISIR MOZERALLA  PEYNİR ZEYTİN','foto' => '87123088.jpg','aktif' => '1','sira' => '234','alerji' => '','ekstralar' => ''),
            array('parent' => '56','urun_adi' => 'ETLİ WRAP','urun_fiyat' => '350','aciklama' => 'ETLİ WRAP','foto' => '357454325.jpg','aktif' => '1','sira' => '235','alerji' => '','ekstralar' => ''),
            array('parent' => '56','urun_adi' => 'TAVUKLU WRAP','urun_fiyat' => '260','aciklama' => 'TAVUKLU WRAP','foto' => '1369982141.jpg','aktif' => '1','sira' => '236','alerji' => '','ekstralar' => ''),
            array('parent' => '56','urun_adi' => 'KÖFTELİ WRAP','urun_fiyat' => '260','aciklama' => 'KÖFTELİ WRAP','foto' => '759178542.jpg','aktif' => '1','sira' => '237','alerji' => '','ekstralar' => ''),
            array('parent' => '56','urun_adi' => 'PATATESLİ PEYNİRLİ WRAP','urun_fiyat' => '230','aciklama' => 'PATATESLİ PEYNİRLİ WRAP','foto' => '1823667861.jpg','aktif' => '1','sira' => '238','alerji' => '','ekstralar' => ''),
            array('parent' => '57','urun_adi' => 'SPAGETTİ NAPOLİTEN','urun_fiyat' => '250','aciklama' => 'DOMATES SOS PARMESAN PEYNİRİ','foto' => '60942341.jpg','aktif' => '1','sira' => '239','alerji' => '','ekstralar' => ''),
            array('parent' => '57','urun_adi' => 'SPAGETTİ BOLOGNESE','urun_fiyat' => '290','aciklama' => 'BOLOGNESE SOS KIZARMIŞ ANANAS PARMESAN PEYNİRİ','foto' => '479932719.jpg','aktif' => '1','sira' => '240','alerji' => '','ekstralar' => ''),
            array('parent' => '57','urun_adi' => 'FETTUCINI ALFREDO','urun_fiyat' => '260','aciklama' => 'FESLEYEN KREMA MANTAR PARMESAN PEYNİRİ TAVUK ZEYTİN','foto' => '336798803.jpg','aktif' => '1','sira' => '241','alerji' => '','ekstralar' => ''),
            array('parent' => '57','urun_adi' => 'PENNE ALFREDO','urun_fiyat' => '260','aciklama' => 'FESLEYEN KREMA MANTAR PARMESAN PEYNİRİ TAVUK','foto' => '364092916.jpg','aktif' => '1','sira' => '242','alerji' => '','ekstralar' => ''),
            array('parent' => '57','urun_adi' => 'PENNE ARRABIATTA','urun_fiyat' => '250','aciklama' => 'ACI SOS BİBER DOMATES FESLEYEN PARMESAN PEYNİRİ ZEYTİN','foto' => '1907569092.jpg','aktif' => '1','sira' => '243','alerji' => '','ekstralar' => ''),
            array('parent' => '58','urun_adi' => 'EV YAPIMI TÜRK USULÜ MANTI','urun_fiyat' => '250','aciklama' => 'EV YAPIMI TÜRK USULÜ MANTI','foto' => '239676819.jpg','aktif' => '1','sira' => '244','alerji' => '','ekstralar' => ''),
            array('parent' => '59','urun_adi' => 'SEZAR SALATA','urun_fiyat' => '240','aciklama' => 'SEZAR SALATA','foto' => '1524471564.jpg','aktif' => '1','sira' => '245','alerji' => '','ekstralar' => ''),
            array('parent' => '59','urun_adi' => 'STEAK SALATA','urun_fiyat' => '340','aciklama' => 'STEAK SALATA','foto' => '1215214770.jpg','aktif' => '1','sira' => '246','alerji' => '','ekstralar' => ''),
            array('parent' => '59','urun_adi' => 'DİYET SALATA','urun_fiyat' => '220','aciklama' => 'DİYET SALATA','foto' => '2025420319.jpg','aktif' => '1','sira' => '247','alerji' => '','ekstralar' => ''),
            array('parent' => '59','urun_adi' => 'ÇITIR SALATA','urun_fiyat' => '240','aciklama' => 'ÇITIR SALATA','foto' => '1755976257.jpg','aktif' => '1','sira' => '248','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOGMOON REDSMOG','urun_fiyat' => '375','aciklama' => 'BÖĞÜRTLEN AHUDUDU ÇİLEK KIRMIZI ORMAN MEYVELERİ','foto' => '1610139694.jpg','aktif' => '1','sira' => '22','alerji' => '','ekstralar' => ''),
            array('parent' => '60','urun_adi' => 'AYVALIK TOSTU','urun_fiyat' => '250','aciklama' => 'AYVALIK TOSTU','foto' => '2045672937.jpg','aktif' => '1','sira' => '249','alerji' => '','ekstralar' => ''),
            array('parent' => '60','urun_adi' => 'KARIŞIK TOST','urun_fiyat' => '220','aciklama' => 'KARIŞIK TOST','foto' => '1083681649.jpg','aktif' => '1','sira' => '250','alerji' => '','ekstralar' => ''),
            array('parent' => '60','urun_adi' => 'PEYNİRLİ TOST','urun_fiyat' => '180','aciklama' => 'PEYNİRLİ TOST','foto' => '266484853.jpg','aktif' => '1','sira' => '251','alerji' => '','ekstralar' => ''),
            array('parent' => '61','urun_adi' => 'FONDÜ ','urun_fiyat' => '250','aciklama' => 'FONDÜ TEK KİŞİLİK','foto' => '1717086831.jpg','aktif' => '1','sira' => '252','alerji' => '','ekstralar' => ''),
            array('parent' => '61','urun_adi' => 'MEYVE TABAĞI','urun_fiyat' => '200','aciklama' => 'MEYVE TABAĞI','foto' => '2001009594.jpg','aktif' => '1','sira' => '253','alerji' => '','ekstralar' => ''),
            array('parent' => '61','urun_adi' => 'MARLENKA','urun_fiyat' => '200','aciklama' => 'MARLENKA','foto' => '437683885.jpg','aktif' => '1','sira' => '254','alerji' => '','ekstralar' => ''),
            array('parent' => '61','urun_adi' => 'CHEESECAKE FRAMBUAZLI','urun_fiyat' => '155','aciklama' => 'CHEESECAKE FRAMBUAZLI','foto' => '670667843.jpg','aktif' => '1','sira' => '255','alerji' => '','ekstralar' => ''),
            array('parent' => '61','urun_adi' => 'ÇEREZ','urun_fiyat' => '120','aciklama' => 'ÇEREZ','foto' => '23082497.jpg','aktif' => '1','sira' => '258','alerji' => '','ekstralar' => ''),
            array('parent' => '61','urun_adi' => 'TİRAMİSU','urun_fiyat' => '155','aciklama' => 'TİRAMİSU','foto' => '389565696.jpg','aktif' => '1','sira' => '259','alerji' => '','ekstralar' => ''),
            array('parent' => '61','urun_adi' => 'ÇİLEKLİ MAGNOLIA','urun_fiyat' => '190','aciklama' => 'ÇİLEKLİ MAGNOLIA','foto' => '450150288.jpg','aktif' => '1','sira' => '260','alerji' => '','ekstralar' => ''),
            array('parent' => '61','urun_adi' => 'SUFFLE','urun_fiyat' => '170','aciklama' => 'SUFFLE','foto' => '906813173.jpg','aktif' => '1','sira' => '261','alerji' => '','ekstralar' => ''),
            array('parent' => '54','urun_adi' => 'STEAK BURGER','urun_fiyat' => '400','aciklama' => 'STEAK BURGER','foto' => '1110386423.jpg','aktif' => '1','sira' => '80','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'ÇAY','urun_fiyat' => '35','aciklama' => 'ÇAY','foto' => '2066634816.jpg','aktif' => '1','sira' => '262','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'TÜRK KAHVESİ SADE','urun_fiyat' => '80','aciklama' => 'TÜRK KAHVESİ SADE','foto' => '690564947.jpg','aktif' => '1','sira' => '263','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'DİBEK KAHVESİ','urun_fiyat' => '85','aciklama' => 'DİBEK KAHVESİ','foto' => '1159619882.jpg','aktif' => '1','sira' => '264','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'MENENGİÇ KAHVESİ','urun_fiyat' => '85','aciklama' => 'MENENGİÇ KAHVESİ','foto' => '1452963280.jpg','aktif' => '1','sira' => '265','alerji' => 'Tehlikeli (opsiyonel)','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'CAFE AU LAIT(SÜTLÜ FİLTRE)','urun_fiyat' => '105','aciklama' => 'CAFE AU LAIT(SÜTLÜ FİLTRE)','foto' => '121826576.jpg','aktif' => '1','sira' => '266','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'HOT CHOCOLATE','urun_fiyat' => '100','aciklama' => 'HOT CHOCOLATE','foto' => '1410760963.jpg','aktif' => '1','sira' => '267','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'WHİTE HOT CHOCOLATE','urun_fiyat' => '100','aciklama' => 'WHİTE HOT CHOCOLATE','foto' => '866186863.jpg','aktif' => '1','sira' => '268','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'MEYVE VE BİTKİ ÇAYLARI','urun_fiyat' => '130','aciklama' => 'KIŞ ÇAY','foto' => '1908765827.jpg','aktif' => '1','sira' => '269','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'CHAI TEA LATTE','urun_fiyat' => '100','aciklama' => 'CHAI TEA LATTE','foto' => '519448827.jpg','aktif' => '1','sira' => '270','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'AFFOGATO(ESPRESSO VE DONDURMA)','urun_fiyat' => '130','aciklama' => 'AFFOGATO(ESPRESSO VE DONDURMA)','foto' => '637939208.jpg','aktif' => '1','sira' => '271','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'SAHLEP','urun_fiyat' => '120','aciklama' => 'SAHLEP','foto' => '646166763.jpg','aktif' => '1','sira' => '272','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'CAFE MOCHA','urun_fiyat' => '120','aciklama' => 'CAFE MOCHA','foto' => '1006602421.jpg','aktif' => '1','sira' => '273','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'RASBERRY MOCHA','urun_fiyat' => '120','aciklama' => 'RASBERRY MOCHA','foto' => '1209294584.jpg','aktif' => '1','sira' => '274','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'WHİTE MOCHA','urun_fiyat' => '120','aciklama' => 'WHİTE MOCHA','foto' => '2006469514.jpg','aktif' => '1','sira' => '275','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'CARAMEL MOCHA','urun_fiyat' => '130','aciklama' => 'CARAMEL MOCHA','foto' => '1262573632.jpg','aktif' => '1','sira' => '276','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'CARAMEL LATTE','urun_fiyat' => '115','aciklama' => 'CARAMEL LATTE','foto' => '547797683.jpg','aktif' => '1','sira' => '277','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'VANİLLA MOCHA','urun_fiyat' => '130','aciklama' => 'VANİLLA MOCHA','foto' => '2072204790.jpg','aktif' => '1','sira' => '278','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'ESPRESSO','urun_fiyat' => '95','aciklama' => 'ESPRESSO','foto' => '1161862572.jpg','aktif' => '1','sira' => '279','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'AMERİCANO','urun_fiyat' => '100','aciklama' => 'AMERİCANO','foto' => '710028886.jpg','aktif' => '1','sira' => '281','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'CAFE LATTE','urun_fiyat' => '110','aciklama' => 'CAFE LATTE','foto' => '2017168212.jpg','aktif' => '1','sira' => '280','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'DEMLENMİŞ FİLTRE KAHVE','urun_fiyat' => '95','aciklama' => 'DEMLENMİŞ FİLTRE KAHVE','foto' => '479725852.jpg','aktif' => '1','sira' => '282','alerji' => '','ekstralar' => ''),
            array('parent' => '55','urun_adi' => 'MARGARİTTA PİZZA','urun_fiyat' => '260','aciklama' => 'domates,fesleğen,mozerella peyniri','foto' => '2015368955.jpg','aktif' => '1','sira' => '117','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'FLAT WHİTE','urun_fiyat' => '110','aciklama' => 'FLAT WHİTE','foto' => '270621057.jpg','aktif' => '1','sira' => '128','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'CORTADO','urun_fiyat' => '100','aciklama' => 'CORTADO','foto' => '1029009737.jpg','aktif' => '1','sira' => '129','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'CAPPUCİNO','urun_fiyat' => '110','aciklama' => 'CAPPUCİNO','foto' => '614484198.jpg','aktif' => '1','sira' => '130','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'TÜRK KAHVESİ ŞEKERLİ','urun_fiyat' => '80','aciklama' => 'TÜRK KAHVESİ ŞEKERLİ','foto' => '626563910.jpg','aktif' => '1','sira' => '131','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'TÜRK KAHVESİ ORTA','urun_fiyat' => '80','aciklama' => 'TÜRK KAHVESİ ORTA','foto' => '866653800.jpg','aktif' => '1','sira' => '132','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'TÜRK KAHVESİ AZ ŞEKERLİ','urun_fiyat' => '80','aciklama' => 'TÜRK KAHVESİ AZ ŞEKERLİ','foto' => '1430577341.jpg','aktif' => '1','sira' => '133','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'DOUBLE TÜRK KAHVESİ','urun_fiyat' => '110','aciklama' => 'DOUBLE TÜRK KAHVESİ','foto' => '140755086.jpg','aktif' => '1','sira' => '134','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'FİNCAN ÇAY','urun_fiyat' => '50','aciklama' => 'FİNCAN ÇAY','foto' => '1794894866.jpg','aktif' => '1','sira' => '135','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'CHİMEX','urun_fiyat' => '300','aciklama' => 'CHİMEK','foto' => '303337689.jpg','aktif' => '1','sira' => '136','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'SÜTLÜ TÜRK KAHVESİ','urun_fiyat' => '85','aciklama' => 'SÜTLÜ TÜRK KAHVESİ','foto' => '1601406451.jpg','aktif' => '1','sira' => '137','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'CARAMEL MACHIATO','urun_fiyat' => '130','aciklama' => 'CARAMEL MACHIATO','foto' => '1150671908.jpg','aktif' => '1','sira' => '138','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'PORTAKAL SUYU','urun_fiyat' => '140','aciklama' => 'TAZE SIKMA','foto' => '80751900.jpg','aktif' => '1','sira' => '139','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'ICE COFFE','urun_fiyat' => '100','aciklama' => 'ICE COFFE','foto' => '331811136.jpg','aktif' => '1','sira' => '140','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'REDBULL','urun_fiyat' => '100','aciklama' => 'REDBULL','foto' => '1044168269.jpg','aktif' => '1','sira' => '141','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'ICE CHOCOLATE','urun_fiyat' => '120','aciklama' => 'ICE CHOCOLATE','foto' => '75844121.jpg','aktif' => '1','sira' => '142','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'ICE WHITE CHOCOLATE','urun_fiyat' => '120','aciklama' => 'ICE WHITE CHOCOLATE','foto' => '451146840.jpg','aktif' => '1','sira' => '143','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'ICE LATTE','urun_fiyat' => '120','aciklama' => 'ICE LATTE','foto' => '1029726034.jpg','aktif' => '1','sira' => '144','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'ICE AMERİCANO','urun_fiyat' => '110','aciklama' => 'ICE AMERİCANO','foto' => '1410502684.jpg','aktif' => '1','sira' => '145','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'LİMONATA','urun_fiyat' => '120','aciklama' => 'LİMONATA','foto' => '353235579.jpg','aktif' => '1','sira' => '146','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'FRESH MINT CHOCOLATE','urun_fiyat' => '120','aciklama' => 'FRESH MINT CHOCOLATE','foto' => '1476833466.jpg','aktif' => '1','sira' => '147','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'OREO CHOCOLATE','urun_fiyat' => '150','aciklama' => 'OREO CHOCOLATE','foto' => '597715706.jpg','aktif' => '1','sira' => '148','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'CARAMEL MIX','urun_fiyat' => '140','aciklama' => 'CARAMEL MIX','foto' => '1295235754.jpg','aktif' => '1','sira' => '149','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'SMOOTHIE','urun_fiyat' => '135','aciklama' => 'SMOOTHIE','foto' => '546833117.jpg','aktif' => '1','sira' => '150','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'ÇİKOLATALI FRAPPE','urun_fiyat' => '135','aciklama' => 'FRAPPE','foto' => '482658901.jpg','aktif' => '1','sira' => '151','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'FROZEN','urun_fiyat' => '125','aciklama' => 'ÇİLEKLİ FROZEN','foto' => '436543538.jpg','aktif' => '1','sira' => '152','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'ICE CHAI TEA LATTE','urun_fiyat' => '100','aciklama' => 'ICE CHAI TEA LATTE','foto' => '358932116.jpg','aktif' => '1','sira' => '153','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'CHURCHILL','urun_fiyat' => '75','aciklama' => 'CHURCHILL','foto' => '280032470.jpg','aktif' => '1','sira' => '154','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'MOJITO','urun_fiyat' => '150','aciklama' => 'MOJITO','foto' => '1246407795.jpg','aktif' => '1','sira' => '155','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'SORBE','urun_fiyat' => '125','aciklama' => 'SORBY','foto' => '1587980864.jpg','aktif' => '1','sira' => '156','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'ÇİKOLATALI MILKSHAKE','urun_fiyat' => '140','aciklama' => 'ÇİKOLATALI MILKSHAKE','foto' => '1777574194.jpg','aktif' => '1','sira' => '157','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'ICE MOCHA','urun_fiyat' => '135','aciklama' => 'ICE MOCHA','foto' => '1624004492.jpg','aktif' => '1','sira' => '158','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'SNICKERS ICE CHOCOLATE','urun_fiyat' => '150','aciklama' => 'SNICKERS ICE CHOCOLATE','foto' => '2018589057.jpg','aktif' => '1','sira' => '159','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'BROWNI ICE CHOCOLATE','urun_fiyat' => '140','aciklama' => 'BROWNI ICE CHOCOLATE','foto' => '1175417150.jpg','aktif' => '1','sira' => '160','alerji' => '','ekstralar' => ''),
            array('parent' => '64','urun_adi' => 'SUNSET ISLAND','urun_fiyat' => '150','aciklama' => 'SUNSET ISLAND','foto' => '2068877944.jpg','aktif' => '1','sira' => '161','alerji' => '','ekstralar' => ''),
            array('parent' => '64','urun_adi' => 'JAMAICA','urun_fiyat' => '150','aciklama' => 'JAMAICA','foto' => '1687847199.jpg','aktif' => '1','sira' => '162','alerji' => '','ekstralar' => ''),
            array('parent' => '64','urun_adi' => 'SAN FRANCISCO','urun_fiyat' => '170','aciklama' => 'SAN FRANCISCO','foto' => '1534971176.jpg','aktif' => '1','sira' => '163','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOGMOON SWEET ICE','urun_fiyat' => '375','aciklama' => 'ÜZÜM KARPUZ ÇİLEK ICE','foto' => '888384719.jpg','aktif' => '1','sira' => '23','alerji' => '','ekstralar' => ''),
            array('parent' => '64','urun_adi' => 'BLUE HAVAI','urun_fiyat' => '150','aciklama' => 'BLUE HAVAI','foto' => '888962121.jpg','aktif' => '1','sira' => '164','alerji' => '','ekstralar' => ''),
            array('parent' => '64','urun_adi' => 'TOM AND JERRY','urun_fiyat' => '150','aciklama' => 'TOM AND JERRY','foto' => '2066209942.jpg','aktif' => '1','sira' => '165','alerji' => '','ekstralar' => ''),
            array('parent' => '64','urun_adi' => 'LADY','urun_fiyat' => '170','aciklama' => 'LADY','foto' => '1028291149.jpg','aktif' => '1','sira' => '166','alerji' => '','ekstralar' => ''),
            array('parent' => '64','urun_adi' => 'Three Colors','urun_fiyat' => '150','aciklama' => 'Three Colors','foto' => '754432257.jpg','aktif' => '1','sira' => '167','alerji' => '','ekstralar' => ''),
            array('parent' => '64','urun_adi' => 'PINA COLADO','urun_fiyat' => '170','aciklama' => 'PINA COLADO','foto' => '938184422.jpg','aktif' => '1','sira' => '168','alerji' => '','ekstralar' => ''),
            array('parent' => '64','urun_adi' => 'RED MIX','urun_fiyat' => '175','aciklama' => 'RED MIX','foto' => '1291196209.jpg','aktif' => '1','sira' => '169','alerji' => '','ekstralar' => ''),
            array('parent' => '64','urun_adi' => 'BLUE CRASH','urun_fiyat' => '180','aciklama' => 'BLUE CRASH','foto' => '1088641884.jpg','aktif' => '1','sira' => '170','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'CAPPY ELMA SUYU','urun_fiyat' => '70','aciklama' => 'CAPPY ELMA SUYU','foto' => '289434827.jpg','aktif' => '1','sira' => '171','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'CAPPY KARIŞIK NEKTARI','urun_fiyat' => '70','aciklama' => 'CAPPY KARIŞIK NEKTARI','foto' => '345589223.jpg','aktif' => '1','sira' => '172','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'CAPPY ŞEFTALİ NEKTARI','urun_fiyat' => '70','aciklama' => 'CAPPY ŞEFTALİ NEKTARI','foto' => '422874571.jpg','aktif' => '1','sira' => '173','alerji' => 'Tehlikeli (opsiyonel)','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'CAPPY VİŞNE','urun_fiyat' => '70','aciklama' => 'CAPPY VİŞNE','foto' => '1350281444.jpg','aktif' => '1','sira' => '174','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'ŞİŞE FANTA','urun_fiyat' => '70','aciklama' => 'ŞİŞE FANTA','foto' => '1516348575.jpg','aktif' => '1','sira' => '175','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'ŞİŞE KOLA','urun_fiyat' => '70','aciklama' => 'ŞİŞE KOLA','foto' => '1964151143.jpg','aktif' => '1','sira' => '176','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'FUSE TEA MANGO','urun_fiyat' => '70','aciklama' => 'FUSE TEA MANGO','foto' => '1929052161.jpg','aktif' => '1','sira' => '177','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'FUSE TEA ŞEFTALİ','urun_fiyat' => '70','aciklama' => 'FUSE TEA ŞEFTALİ','foto' => '1873061578.jpg','aktif' => '1','sira' => '178','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'FUSE TEA LİMON','urun_fiyat' => '70','aciklama' => 'FUSE TEA LİMON','foto' => '1557569646.jpg','aktif' => '1','sira' => '179','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'AYRAN','urun_fiyat' => '45','aciklama' => 'AYRAN','foto' => '397268590.jpg','aktif' => '1','sira' => '180','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'SCHWEPPES ŞİŞE','urun_fiyat' => '80','aciklama' => 'SCHWEPPES ŞİŞE','foto' => '1352502927.jpg','aktif' => '1','sira' => '181','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'ULUDAĞ EKSTRA ARMUTLU','urun_fiyat' => '60','aciklama' => 'ULUDAĞ EKSTRA ARMUTLU','foto' => '320990606.jpg','aktif' => '1','sira' => '182','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'ULUDAĞ EKSTRA KAVUNLU','urun_fiyat' => '60','aciklama' => 'ULUDAĞ EKSTRA KAVUNLU','foto' => '253090524.jpg','aktif' => '1','sira' => '183','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'ULUDAĞ EKSTRA MANDALİNALI','urun_fiyat' => '60','aciklama' => 'ULUDAĞ EKSTRA MANDALİNALI','foto' => '1145365672.jpg','aktif' => '1','sira' => '184','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'ULUDAĞ EKSTRA ORMAN MEYVELİ','urun_fiyat' => '60','aciklama' => 'ULUDAĞ EKSTRA ORMAN MEYVELİ','foto' => '1410511815.jpg','aktif' => '1','sira' => '185','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'ULUDAĞ EKSTRA YEŞİL LİMONLU','urun_fiyat' => '60','aciklama' => 'ULUDAĞ EKSTRA YEŞİL LİMONLU','foto' => '432481409.jpg','aktif' => '1','sira' => '186','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'ULUDAĞ FRUTTI LIMON ','urun_fiyat' => '60','aciklama' => 'ULUDAĞ FRUTTI LIMON ','foto' => '1535799160.jpg','aktif' => '1','sira' => '187','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'ULUDAĞ PREMİUM MİNERALLİ','urun_fiyat' => '60','aciklama' => 'ULUDAĞ PREMİUM MİNERALLİ','foto' => '1294779939.jpg','aktif' => '1','sira' => '188','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'SU','urun_fiyat' => '35','aciklama' => 'ULUDAĞ SU','foto' => '1822413878.jpg','aktif' => '1','sira' => '189','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'ULUDAĞ FRUTTI ELMA','urun_fiyat' => '60','aciklama' => 'ULUDAĞ FRUTTI ELMA','foto' => '1445162722.jpg','aktif' => '1','sira' => '190','alerji' => '','ekstralar' => ''),
            array('parent' => '65','urun_adi' => 'ULUDAĞ FRUTTI KARPUZ ÇİLEK','urun_fiyat' => '60','aciklama' => 'ULUDAĞ FRUTTI KARPUZ ÇİLEK','foto' => '1689736428.jpg','aktif' => '1','sira' => '191','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOGMOON GUM','urun_fiyat' => '375','aciklama' => 'SAKIZ','foto' => '480399275.jpg','aktif' => '1','sira' => '24','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOGMOON  GUM MİNT','urun_fiyat' => '375','aciklama' => 'SAKIZ NANE','foto' => '2054172679.jpg','aktif' => '1','sira' => '25','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOGMOON  BİG BANG','urun_fiyat' => '375','aciklama' => 'ÇAY ŞEFTALİ HİBİSCUS','foto' => '1991884533.jpg','aktif' => '1','sira' => '26','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOGMOON LOVELY','urun_fiyat' => '375','aciklama' => 'KARPUZ MARAKUJA KAVUN NANE','foto' => '1872673126.jpg','aktif' => '1','sira' => '27','alerji' => '','ekstralar' => ''),
            array('parent' => '61','urun_adi' => 'YER FISTIKLI MONO ','urun_fiyat' => '155','aciklama' => 'YER FISTIKLI MONO ','foto' => '1733457085.jpg','aktif' => '1','sira' => '39','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'COOL LİME','urun_fiyat' => '130','aciklama' => 'COOL LİME','foto' => '1355668051.jpg','aktif' => '1','sira' => '67','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'BERRY HIBISCUS','urun_fiyat' => '130','aciklama' => 'BERRY HIBISCUS','foto' => '192603695.jpg','aktif' => '1','sira' => '53','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'ÇİLEKLİ SICAK ÇİKOLATA','urun_fiyat' => '110','aciklama' => 'ÇİLEKLİ SICAK ÇİKOLATA','foto' => '1882354450.jpg','aktif' => '1','sira' => '75','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'V60','urun_fiyat' => '170','aciklama' => 'V60','foto' => '1768028510.jpg','aktif' => '1','sira' => '40','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOGMOON RETRO','urun_fiyat' => '375','aciklama' => 'LİMON NANE TURUNÇ','foto' => '1283864342.jpg','aktif' => '1','sira' => '28','alerji' => '','ekstralar' => ''),
            array('parent' => '69','urun_adi' => 'Elma(Apple)','urun_fiyat' => '350','aciklama' => 'Elma(Apple)','foto' => '1683962465.jpg','aktif' => '1','sira' => '118','alerji' => '','ekstralar' => ''),
            array('parent' => '69','urun_adi' => 'Limon(Lemon)','urun_fiyat' => '350','aciklama' => 'Limon(Lemon)','foto' => '888545592.jpg','aktif' => '1','sira' => '119','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'MOSCOW COOKİE','urun_fiyat' => '375','aciklama' => 'MOSCOW MULE KEK','foto' => '1292328417.jpg','aktif' => '1','sira' => '36','alerji' => '','ekstralar' => ''),
            array('parent' => '69','urun_adi' => 'Yaban Mersini(Blueberries)','urun_fiyat' => '350','aciklama' => 'Yaban Mersini(Blueberries)','foto' => '356352153.jpg','aktif' => '1','sira' => '120','alerji' => '','ekstralar' => ''),
            array('parent' => '69','urun_adi' => 'Böğürtlen(Blackberry)','urun_fiyat' => '350','aciklama' => 'Böğürtlen(Blackberry)','foto' => '125445565.jpg','aktif' => '1','sira' => '121','alerji' => '','ekstralar' => ''),
            array('parent' => '69','urun_adi' => 'Portakal(Orange)','urun_fiyat' => '350','aciklama' => 'Portakal(Orange)','foto' => '573169394.jpg','aktif' => '1','sira' => '122','alerji' => '','ekstralar' => ''),
            array('parent' => '69','urun_adi' => 'Nane(Mint)','urun_fiyat' => '350','aciklama' => 'Nane(Mint)','foto' => '592425107.jpg','aktif' => '1','sira' => '123','alerji' => '','ekstralar' => ''),
            array('parent' => '69','urun_adi' => 'Üzüm(Grape)','urun_fiyat' => '350','aciklama' => 'Üzüm(Grape)','foto' => '1630405060.jpg','aktif' => '1','sira' => '124','alerji' => '','ekstralar' => ''),
            array('parent' => '69','urun_adi' => 'Şeftali(Peach)','urun_fiyat' => '350','aciklama' => 'Şeftali(Peach)','foto' => '1546732023.jpg','aktif' => '1','sira' => '125','alerji' => '','ekstralar' => ''),
            array('parent' => '69','urun_adi' => 'Karpuz(Watermelon)','urun_fiyat' => '350','aciklama' => 'Karpuz(Watermelon)','foto' => '1467837014.jpg','aktif' => '1','sira' => '126','alerji' => '','ekstralar' => ''),
            array('parent' => '69','urun_adi' => 'Çilek(Strawberry)','urun_fiyat' => '350','aciklama' => 'Çilek(Strawberry)','foto' => '716140799.jpg','aktif' => '1','sira' => '127','alerji' => '','ekstralar' => ''),
            array('parent' => '72','urun_adi' => 'ANTEP FISTIĞI','urun_fiyat' => '35','aciklama' => 'BÖĞÜRTLEN','foto' => '522417457.jpg','aktif' => '1','sira' => '54','alerji' => '','ekstralar' => ''),
            array('parent' => '72','urun_adi' => 'KARADUT','urun_fiyat' => '40','aciklama' => 'VİŞNE','foto' => '25806207.jpg','aktif' => '1','sira' => '55','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'COOKİE SHAKE','urun_fiyat' => '135','aciklama' => 'COOKİE SHAKE','foto' => '1516063110.jpg','aktif' => '1','sira' => '68','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'COOKİE MİLKSHAKE','urun_fiyat' => '145','aciklama' => 'COOKİE MİLKSHAKE','foto' => '1608113384.jpg','aktif' => '1','sira' => '69','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'ICE PEKAN LATTE','urun_fiyat' => '135','aciklama' => 'ICE PEKAN LATTE','foto' => '691897351.jpg','aktif' => '1','sira' => '70','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'ICE TOFFEE NUTT LATTE','urun_fiyat' => '135','aciklama' => 'ICE TOFFE NUTT LATTE','foto' => '1834142165.jpg','aktif' => '1','sira' => '71','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'PEKAN LATTE','urun_fiyat' => '125','aciklama' => 'PEKAN LATTE','foto' => '1417421931.jpg','aktif' => '1','sira' => '72','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'TOFFE NUTT LATTE','urun_fiyat' => '130','aciklama' => 'TOFFE NUTT LATTE','foto' => '13423506.jpg','aktif' => '1','sira' => '73','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'COOKİE LATTE','urun_fiyat' => '130','aciklama' => 'COOKİE LATTE','foto' => '885675351.jpg','aktif' => '1','sira' => '74','alerji' => '','ekstralar' => ''),
            array('parent' => '72','urun_adi' => 'KAYMAK','urun_fiyat' => '40','aciklama' => 'SADE','foto' => '1968699127.jpg','aktif' => '1','sira' => '56','alerji' => '','ekstralar' => ''),
            array('parent' => '72','urun_adi' => 'KARAMEL','urun_fiyat' => '40','aciklama' => 'KARAMEL','foto' => '666650043.jpg','aktif' => '1','sira' => '57','alerji' => '','ekstralar' => ''),
            array('parent' => '72','urun_adi' => 'MUZ','urun_fiyat' => '40','aciklama' => 'KİVİ','foto' => '1022877157.jpg','aktif' => '1','sira' => '58','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'JAİBAR DEJAVU','urun_fiyat' => '450','aciklama' => 'JAİBAR DEJAVU','foto' => '1661623462.jpg','aktif' => '1','sira' => '43','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'WİLD WATER','urun_fiyat' => '375','aciklama' => 'KARPUZ,ORMAN MEYVE','foto' => '1073938019.jpg','aktif' => '1','sira' => '37','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOGMOON FREEZER','urun_fiyat' => '375','aciklama' => 'SAKIZ LİMON ICE','foto' => '1431615543.jpg','aktif' => '1','sira' => '29','alerji' => '','ekstralar' => ''),
            array('parent' => '61','urun_adi' => 'San sebastian','urun_fiyat' => '210','aciklama' => 'san sebastian','foto' => '531963684.jpg','aktif' => '1','sira' => '105','alerji' => '','ekstralar' => ''),
            array('parent' => '61','urun_adi' => 'Profiterol','urun_fiyat' => '190','aciklama' => 'Profiterol','foto' => '1238027316.jpg','aktif' => '1','sira' => '106','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'İngiliz çayı','urun_fiyat' => '95','aciklama' => 'İngiliz çayı','foto' => '1054194756.jpg','aktif' => '1','sira' => '107','alerji' => '','ekstralar' => ''),
            array('parent' => '64','urun_adi' => 'IVLİS','urun_fiyat' => '180','aciklama' => 'IVLİS','foto' => '517881528.jpg','aktif' => '1','sira' => '108','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOGMOON MELODY','urun_fiyat' => '375','aciklama' => 'MUZ KARPUZ ÇİLEK MEVSİM MEYVELERİ','foto' => '234415617.jpg','aktif' => '1','sira' => '30','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'MUZLU FROZEN','urun_fiyat' => '125','aciklama' => 'MUZLU FROZEN','foto' => '1350620787.jpg','aktif' => '1','sira' => '109','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'MANGO FROZEN','urun_fiyat' => '125','aciklama' => 'MANGO FROZEN','foto' => '1784252275.jpg','aktif' => '1','sira' => '110','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'ŞEFTALİ FROZEN','urun_fiyat' => '125','aciklama' => 'ŞEFTALİ FROZEN','foto' => '941408090.jpg','aktif' => '1','sira' => '111','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'PASSİON FRUİT','urun_fiyat' => '125','aciklama' => 'PASSİON FRUİT','foto' => '1725700894.jpg','aktif' => '1','sira' => '112','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'ÇİLEK FRABBE','urun_fiyat' => '135','aciklama' => 'ÇİLEKLİ FRABBE','foto' => '224430209.jpg','aktif' => '1','sira' => '113','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'MUZ FRABBE','urun_fiyat' => '135','aciklama' => 'MUZ FRABBE','foto' => '908186370.jpg','aktif' => '1','sira' => '114','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'VANİLYA FRABBE','urun_fiyat' => '135','aciklama' => 'VANİLYA FRABBE','foto' => '138818194.jpg','aktif' => '1','sira' => '115','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'KARAMEL FRABBE','urun_fiyat' => '135','aciklama' => 'KARAMEL FRABBE','foto' => '2132557662.jpg','aktif' => '1','sira' => '116','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'MEYVE VE BİTKİ ÇAYLARI KUŞBURNU','urun_fiyat' => '130','aciklama' => 'KUŞBURNU','foto' => '684314296.jpg','aktif' => '1','sira' => '81','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'MEYVE VE BİTKİ ÇAYLARI TROPİKAL','urun_fiyat' => '130','aciklama' => 'TROPİKAL','foto' => '1112356132.jpg','aktif' => '1','sira' => '82','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'MEYVE VE BİTKİ ÇAYLARI AHUDUDU','urun_fiyat' => '130','aciklama' => 'AHUDUDU','foto' => '274641581.jpg','aktif' => '1','sira' => '83','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'MEYVE VE BİTKİ ÇAYLARI BÖĞÜRTLEN','urun_fiyat' => '130','aciklama' => 'BÖĞÜRTLEN','foto' => '1458410664.jpg','aktif' => '1','sira' => '84','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'MEYVE VE BİTKİ ÇAYLARI YEŞİL ÇAY','urun_fiyat' => '130','aciklama' => 'YEŞİL ÇAY','foto' => '782493944.jpg','aktif' => '1','sira' => '85','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'MEYVE VE BİTKİ ÇAYLARI NANE LİMON','urun_fiyat' => '130','aciklama' => 'NANE LİMON','foto' => '583185061.jpg','aktif' => '1','sira' => '86','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'MEYVE VE BİTKİ ÇAYLARI IHLAMUR','urun_fiyat' => '130','aciklama' => 'IHLAMUR','foto' => '768935024.jpg','aktif' => '1','sira' => '87','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'MEYVE VE BİTKİ ÇAYLARI ADA ÇAYI','urun_fiyat' => '130','aciklama' => 'ADA ÇAYI','foto' => '1971968662.jpg','aktif' => '1','sira' => '88','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'MİLKSHAKE ÇİLEK','urun_fiyat' => '140','aciklama' => 'ÇİLEK','foto' => '768507689.jpg','aktif' => '1','sira' => '89','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'MİLKSHAKE KARAMEL','urun_fiyat' => '140','aciklama' => 'KARAMEL','foto' => '1318717383.jpg','aktif' => '1','sira' => '90','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'MİLKSHAKE VANİLYA','urun_fiyat' => '140','aciklama' => 'VANİLYA','foto' => '1762073643.jpg','aktif' => '1','sira' => '91','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'MİLKSHAKE ÇİKOLATA','urun_fiyat' => '140','aciklama' => 'ÇİKOLATA','foto' => '723169750.jpg','aktif' => '1','sira' => '92','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'MİLKSHAKE MUZ','urun_fiyat' => '140','aciklama' => 'MUZ','foto' => '500736986.jpg','aktif' => '1','sira' => '93','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'SMOOTHİE ÇİLEK','urun_fiyat' => '135','aciklama' => 'ÇİLEK','foto' => '1286768334.jpg','aktif' => '1','sira' => '94','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'SMOOTHİE KARAMEL','urun_fiyat' => '135','aciklama' => 'KARAMEL','foto' => '606652887.jpg','aktif' => '1','sira' => '95','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'SMOOTHİE VANİLYA','urun_fiyat' => '135','aciklama' => 'VANİLYA','foto' => '1176839158.jpg','aktif' => '1','sira' => '96','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'SMOOTHİE MUZ','urun_fiyat' => '135','aciklama' => 'MUZ','foto' => '1524430817.jpg','aktif' => '1','sira' => '97','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'SMOOTHİE ŞEFTALİ','urun_fiyat' => '135','aciklama' => 'ŞEFTALİ','foto' => '687788128.jpg','aktif' => '1','sira' => '98','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'SMOOTHİE ÇİKOLATA','urun_fiyat' => '135','aciklama' => 'ÇİKOLATA','foto' => '1075024325.jpg','aktif' => '1','sira' => '99','alerji' => '','ekstralar' => ''),
            array('parent' => '63','urun_adi' => 'YEŞİL ELMA SORBE','urun_fiyat' => '125','aciklama' => 'YEŞİL ELMA SORBY','foto' => '1343776162.jpg','aktif' => '1','sira' => '100','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'RUBY SICAK ÇİKOLATA','urun_fiyat' => '110','aciklama' => 'RUBY SICAK ÇİKOLATA','foto' => '746228093.jpg','aktif' => '1','sira' => '101','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'DOUBLE DİBEK KAHVESİ','urun_fiyat' => '120','aciklama' => 'DOUBLE DİBEK KAHVESİ','foto' => '1923299783.jpg','aktif' => '1','sira' => '102','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'DOUBLE MENENGİÇ KAHVESİ','urun_fiyat' => '120','aciklama' => 'DOUBLE MENENGİÇ KAHVESİ','foto' => '1919565106.jpg','aktif' => '1','sira' => '103','alerji' => '','ekstralar' => ''),
            array('parent' => '62','urun_adi' => 'DOUBLE SÜTLÜ TÜRK KAHVESİ','urun_fiyat' => '120','aciklama' => 'DOUBLE SÜTLÜ TÜRK KAHVESİ','foto' => '1596039290.jpg','aktif' => '1','sira' => '104','alerji' => '','ekstralar' => ''),
            array('parent' => '61','urun_adi' => 'CHOCOLATE BALL PASTA','urun_fiyat' => '155','aciklama' => 'CHOCOLATE BALL PASTA','foto' => '124974442.jpg','aktif' => '1','sira' => '77','alerji' => '','ekstralar' => ''),
            array('parent' => '61','urun_adi' => 'FISTIKLI PERLA','urun_fiyat' => '155','aciklama' => 'FISTIKLI PERLA','foto' => '1203774831.jpg','aktif' => '1','sira' => '78','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOGMOON HOT BROWN','urun_fiyat' => '375','aciklama' => 'BEYAZ ÇİKOLATA VANİLYA HİNDİSTAN CEVİZİTRAMİSU KREMA ICE','foto' => '1596639465.jpg','aktif' => '1','sira' => '31','alerji' => '','ekstralar' => ''),
            array('parent' => '61','urun_adi' => 'KARAMELLİ CASCATA','urun_fiyat' => '170','aciklama' => 'KARAMELLİ CASCATA','foto' => '2082557450.jpg','aktif' => '1','sira' => '79','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOGMOON MASTİCA','urun_fiyat' => '375','aciklama' => 'DAMLA SAKIZI ÇAM SAKIZI HİNDİSTAN CEVİZİ NANE','foto' => '1580024422.jpg','aktif' => '1','sira' => '32','alerji' => '','ekstralar' => ''),
            array('parent' => '61','urun_adi' => 'FRANBUAZLI PERLA','urun_fiyat' => '155','aciklama' => 'FRANBUAZLI PERLA','foto' => '776790889.JPG','aktif' => '1','sira' => '76','alerji' => '','ekstralar' => ''),
            array('parent' => '72','urun_adi' => 'VANİLYA','urun_fiyat' => '40','aciklama' => 'CEVİZ','foto' => '798600117.jpg','aktif' => '1','sira' => '59','alerji' => '','ekstralar' => ''),
            array('parent' => '72','urun_adi' => 'KAVUN','urun_fiyat' => '40','aciklama' => 'KAVUN','foto' => '1097893464.jpg','aktif' => '1','sira' => '60','alerji' => '','ekstralar' => ''),
            array('parent' => '72','urun_adi' => 'OREO','urun_fiyat' => '40','aciklama' => 'OREO','foto' => '1947329608.jpg','aktif' => '1','sira' => '61','alerji' => '','ekstralar' => ''),
            array('parent' => '72','urun_adi' => 'MEYVE ŞÖLENİ','urun_fiyat' => '40','aciklama' => 'PARÇA ÇİKOLATA','foto' => '652879660.jpg','aktif' => '1','sira' => '62','alerji' => '','ekstralar' => ''),
            array('parent' => '72','urun_adi' => 'ÇİLEK','urun_fiyat' => '40','aciklama' => 'ÇİLEK','foto' => '1022351432.jpg','aktif' => '1','sira' => '63','alerji' => '','ekstralar' => ''),
            array('parent' => '72','urun_adi' => 'LİMON','urun_fiyat' => '40','aciklama' => 'LİMON','foto' => '389811334.jpg','aktif' => '1','sira' => '64','alerji' => '','ekstralar' => ''),
            array('parent' => '72','urun_adi' => 'BAL BADEM','urun_fiyat' => '40','aciklama' => 'BADEM','foto' => '87768317.jpg','aktif' => '1','sira' => '65','alerji' => '','ekstralar' => ''),
            array('parent' => '72','urun_adi' => 'PORSİYON DONDURMA','urun_fiyat' => '160','aciklama' => '4 TOP DONDURMA','foto' => '1700342417.jpg','aktif' => '1','sira' => '66','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'İZMİR ROMANTİK','urun_fiyat' => '375','aciklama' => 'İZMİR ROMANTİK','foto' => '140395656.jpg','aktif' => '1','sira' => '44','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'BERLİN ICE','urun_fiyat' => '375','aciklama' => 'BERLİN ICE','foto' => '34314156.jpg','aktif' => '1','sira' => '45','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'HAWANA','urun_fiyat' => '375','aciklama' => 'HAWANA','foto' => '1349424631.jpg','aktif' => '1','sira' => '46','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'LADY KILLER','urun_fiyat' => '375','aciklama' => 'LADY KILLER','foto' => '250673940.jpg','aktif' => '1','sira' => '47','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'ANASON (DOUBLE APPLE)','urun_fiyat' => '450','aciklama' => 'NAKLA ANASON','foto' => '1940155536.jpg','aktif' => '1','sira' => '48','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'CUPPUCCİNO','urun_fiyat' => '450','aciklama' => 'NAKLA CUPPUCCİNO','foto' => '1727005897.jpg','aktif' => '1','sira' => '49','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'ŞEFTALİ','urun_fiyat' => '350','aciklama' => 'ŞEFTALİ','foto' => '763040057.jpg','aktif' => '1','sira' => '50','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOGMOON LEMON MİNT','urun_fiyat' => '375','aciklama' => 'LİMON NANE','foto' => '103488654.jpg','aktif' => '1','sira' => '33','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOGMOON LADY GRIL','urun_fiyat' => '375','aciklama' => 'MANGO KAVUN ÇİLEK BUZ ESİNTİSİ','foto' => '1037484468.jpg','aktif' => '1','sira' => '34','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'SMOGMOON LEMONADZE','urun_fiyat' => '375','aciklama' => 'LİMON PORTAKAL GREYFURT MANDARİN NANE','foto' => '916965507.jpg','aktif' => '1','sira' => '35','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'PİŞMİŞ ŞEFTALİ','urun_fiyat' => '450','aciklama' => 'PİŞMİŞ ŞEFTALİ','foto' => '754958043.jpg','aktif' => '1','sira' => '38','alerji' => '','ekstralar' => ''),
            array('parent' => '73','urun_adi' => 'PALİMPSEST HOOKKAH','urun_fiyat' => '950','aciklama' => 'PALİMPSEST ÖZEL KARIŞIMI','foto' => '338822074.jpg','aktif' => '1','sira' => '41','alerji' => '','ekstralar' => ''),
            array('parent' => '60','urun_adi' => 'CHEDDAR SOSLU TOST','urun_fiyat' => '200','aciklama' => 'CHEDDAR SOSLU TOST','foto' => '1310992214.jpg','aktif' => '1','sira' => '10','alerji' => NULL,'ekstralar' => NULL),
            array('parent' => '54','urun_adi' => 'CHEDDAR DOLGULU BURGER','urun_fiyat' => '450','aciklama' => 'CHEDDAR DOLGULU BURGER','foto' => '26123232.jpg','aktif' => '1','sira' => '11','alerji' => NULL,'ekstralar' => NULL),
            array('parent' => '55','urun_adi' => 'PEPPERONİ','urun_fiyat' => '260','aciklama' => 'PEPPERONİ','foto' => '2125855285.jpg','aktif' => '1','sira' => '12','alerji' => NULL,'ekstralar' => NULL),
            array('parent' => '57','urun_adi' => 'STEAK SPAGETTİ','urun_fiyat' => '400','aciklama' => 'STEAK SPAGETTİ','foto' => '54263649.jpg','aktif' => '1','sira' => '13','alerji' => '','ekstralar' => ''),
            array('parent' => '57','urun_adi' => 'KÖRİLİ PENNE','urun_fiyat' => '260','aciklama' => 'KÖRİLİ PENNE','foto' => '1993368301.jpg','aktif' => '1','sira' => '14','alerji' => NULL,'ekstralar' => NULL),
            array('parent' => '57','urun_adi' => 'SCHNİTZEL PENNE','urun_fiyat' => '350','aciklama' => 'SCHNİTZEL PENNE','foto' => '902033612.jpg','aktif' => '1','sira' => '15','alerji' => '','ekstralar' => ''),
            array('parent' => '58','urun_adi' => 'ÇITIR MANTI','urun_fiyat' => '265','aciklama' => 'ÇITIR MANTI','foto' => '1575128750.jpg','aktif' => '1','sira' => '16','alerji' => NULL,'ekstralar' => NULL),
            array('parent' => '59','urun_adi' => 'SELANİK SALATA','urun_fiyat' => '220','aciklama' => 'SELANİK SALATA','foto' => '1841752243.jpg','aktif' => '1','sira' => '17','alerji' => '','ekstralar' => ''),
            array('parent' => '60','urun_adi' => 'CHEDDAR SOSLU TOST','urun_fiyat' => '200','aciklama' => 'CHEDDAR SOSLU TOST','foto' => '260738978.jpg','aktif' => '','sira' => '18','alerji' => NULL,'ekstralar' => NULL),
            array('parent' => '47','urun_adi' => 'GÜNÜN ÇORBASI','urun_fiyat' => '80','aciklama' => 'ÇORBA','foto' => '754195298.jpg','aktif' => '1','sira' => '2','alerji' => '','ekstralar' => ''),
            array('parent' => '47','urun_adi' => 'TAVUK ÇÖKERTME','urun_fiyat' => '430','aciklama' => 'TAVUK ÇÖKERTME','foto' => '2004363558.jpg','aktif' => '1','sira' => '3','alerji' => NULL,'ekstralar' => NULL),
            array('parent' => '48','urun_adi' => 'SOĞUK KAHVALTI TABAĞI','urun_fiyat' => '250','aciklama' => 'SOĞUK KAHVALTI TABAĞI','foto' => '1932022221.jpg','aktif' => '1','sira' => '4','alerji' => NULL,'ekstralar' => NULL),
            array('parent' => '49','urun_adi' => 'MUHLAMA','urun_fiyat' => '175','aciklama' => 'MUHLAMA','foto' => '2001619863.jpg','aktif' => '1','sira' => '5','alerji' => NULL,'ekstralar' => NULL),
            array('parent' => '49','urun_adi' => 'PEYNİRLİ OMLET','urun_fiyat' => '165','aciklama' => 'PEYNİRLİ OMLET','foto' => '973033324.jpg','aktif' => '1','sira' => '6','alerji' => '','ekstralar' => ''),
            array('parent' => '50','urun_adi' => 'SEBZELİ BÖREK','urun_fiyat' => '225','aciklama' => 'SEBZELİ BÖREK','foto' => '1118165652.jpg','aktif' => '1','sira' => '7','alerji' => NULL,'ekstralar' => NULL),
            array('parent' => '50','urun_adi' => 'İÇLİ KÖFTE','urun_fiyat' => '255','aciklama' => 'İÇLİ KÖFTE','foto' => '580146493.jpg','aktif' => '1','sira' => '8','alerji' => NULL,'ekstralar' => NULL),
            array('parent' => '65','urun_adi' => 'SPRİTE','urun_fiyat' => '70','aciklama' => 'SPRİTE','foto' => '431109210.JPG','aktif' => '1','sira' => '1','alerji' => '','ekstralar' => '')
        );
        foreach ($menu_kategori as $category){
            $menuCategory = new MenuCategory();
            $menuCategory->id = $category["id"];
            $menuCategory->menu_id = 1;
            $menuCategory->name = $category["baslik"];
            $menuCategory->sub_title = $category["aciklama"];
            $menuCategory->status = 1;
            $menuCategory->save();
            $categoryProducts = array_filter($products, function($product) use ($category) {
                return $product['parent'] == $category['id'];
            });
            foreach ($categoryProducts as $product){
                $menuCategoryProduct = new MenuCategoryProduct();
                $menuCategoryProduct->menu_id = $menuCategory->menu_id;
                $menuCategoryProduct->category_id = $menuCategory->id;
                $menuCategoryProduct->name = $product["urun_adi"];
                $menuCategoryProduct->description = $product["aciklama"];
                $menuCategoryProduct->price = $product["urun_fiyat"];
                $menuCategoryProduct->save();
            }
        }
    }
    public function index()
    {
        //$this->temp();
        $packages = Package::all();
        $features = Feature::whereStatus(1)->latest()->get();
        $blogs = Blog::whereStatus(1)->latest()->take(5)->get();

        return view('front-end.welcome.index', compact('packages', 'features', 'blogs'));
    }

    public function features()
    {
        $features = Feature::whereStatus(1)->latest()->paginate(8);
        return view('front-end.property.index', compact('features'));
    }
    public function featureDetail($slug)
    {
        $feature = Feature::whereStatus(1)->whereSlug($slug)->first();
        $heads = headers($feature->description);
        $otherFeatures = Feature::whereNot('id', $feature->id)->whereStatus(1)->latest()->take(5)->get();
        return view('front-end.property.detail.index', compact('feature', 'heads', 'otherFeatures'));
    }
    public function blogs()
    {
        $categories = BlogCategory::whereStatus(1)->get();
        $blogCategory = $categories->first();
        $blogs = $blogCategory->blogs()->paginate(8);
        return view('front-end.blog.index', compact('categories', 'blogCategory', 'blogs'));
    }

    public function blogCategory($slug)
    {
        $categories = BlogCategory::whereStatus(1)->get();
        $blogCategory = BlogCategory::where('slug', $slug)->first();
        $blogs = $blogCategory->blogs()->paginate(8);
        return view('front-end.blog.index', compact('categories', 'blogCategory', 'blogs'));
    }

    public function blogDetail($slug)
    {
        $blog = Blog::whereSlug($slug)->whereStatus(1)->firstOrFail();
        $otherBlogs = $blog->category->blogs()->whereNot('id', $blog->id)->latest()->take(5)->get();
        $heads = headers($blog->description);
        $categories = BlogCategory::whereStatus(1)->get();
        return view('front-end.blog.detail.index', compact('blog', 'heads', 'otherBlogs', 'categories'));
    }
    public function faq()
    {
        return view('front-end.faq.index');
    }

    public function pageDetail($slug)
    {
        $page = Page::whereSlug($slug)->first();
        return view('front-end.page.index', compact('page'));
    }
    public function entegration()
    {
        $images = Gallery::where('status', 1)->latest()->take(10)->get();
        $entegrations = Entegration::whereStatus(1)->get();
        return view('front-end.entegration.index', compact('images', 'entegrations'));
    }
    public function package()
    {
        $packages = Package::all();
        return view('front-end.package.index', compact('packages'));
    }
    public function partnership()
    {
        $cities = City::all();
        return view('front-end.partnership.index', compact('cities'));
    }
    public function partnershipForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'company_age' => 'required',
            'city_id' => 'required',
            'customer_count' => 'required',
            'target_customer_count' => 'required',
            'terms' => 'accepted',
        ], [], [
            'name' => "Ad Soyad",
            'phone' => "Telefon",
            'email' => "E-posta",
            'company_age' => "Şirket Yaşı",
            'city_id' => "Şehir",
            'customer_count' => "Müşteri Sayısı",
            'target_customer_count' => "Hedef Müşteri Sayısı",
            'terms' => "Gizlilik Politikası"
        ]);
        $partnerShipRequest = new PartnershipRequest();
        $partnerShipRequest->name = $request->input('name');
        $partnerShipRequest->phone = $request->input('phone');
        $partnerShipRequest->email = $request->input('email');
        $partnerShipRequest->company_age = $request->input('company_age');
        $partnerShipRequest->city_id = $request->input('city_id');
        $partnerShipRequest->customer_count = $request->input('customer_count');
        $partnerShipRequest->goal_customer_count = $request->input('target_customer_count');
        $partnerShipRequest->other_company = $request->input('other_companies');
        $partnerShipRequest->note = $request->input('note');
        if($partnerShipRequest->save()){
            return back()->with('response', [
               'status' => "success",
               'message' => "Talebiniz Tarafımıza iletildi en kısa sürede sizinle iletişime geçeceğiz"
            ]);
        }
    }
    public function contact()
    {
        return view('front-end.contact.index');
    }

    public function contactForm(Request $request)
    {
        $request->validate([
            'name' => "required",
            'mail' => "required",
            'phone' => "required",
            'subject' => "required",
        ], [], [
            'name' => "Ad Soyad",
            'mail' => "E-posta",
            'phone' => "Telefon",
            'subject' => "Konu",
        ]);
        $contact = new ContactRequest();
        $contact->name = $request->input('name');
        $contact->mail = $request->input('mail');
        $contact->phone = $request->input('phone');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        if ($contact->save()){
            return back()->with('response', [
                'status' => "success",
                'message' => "Talebiniz Tarafımıza iletildi en kısa sürede sizinle iletişime geçeceğiz"
            ]);
        }
    }

    public function demoRequest(Request $request)
    {
        $request->validate([
            'name' => "required",
            'mail' => "required",
            'phone' => "required",
            'company_name' => "required",
        ], [], [
            'name' => "Ad Soyad",
            'mail' => "E-posta",
            'phone' => "Telefon",
            'company_name' => "Şirket Adı",
        ]);
        $contact = new DemoRequest();
        $contact->name = $request->input('name');
        $contact->mail = $request->input('mail');
        $contact->phone = $request->input('phone');
        $contact->company_name = $request->input('company_name');
        $contact->note = $request->input('message');
        if ($contact->save()){
            return to_route('front.index')->with('response', [
                'status' => "success",
                'message' => "Talebiniz Tarafımıza iletildi en kısa sürede sizinle iletişime geçeceğiz"
            ]);
        }
    }
}
