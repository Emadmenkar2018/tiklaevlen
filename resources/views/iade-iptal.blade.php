@extends('layouts.main')
@section('styles')
	<link rel="stylesheet" href="{{ asset('css/website-index.css') }}">
@endsection
@section('content')
<section class="sss">
	<div class="container">
		<div class="row">
			<h1 class="title">İADE VE İPTAL KOŞULLARI</h1>
		</div>
		<div class="row questions sozlesme" style="height:auto;">
			<p>
				<b>İPTAL KOŞULLARI</b><br/><br/>
				Sipariş İptal Etme / Cayma Hakkı Siparişinizi oluşturmanızın ardından 1 saat içerisinde iptal edebilirsiniz. Sepetim menüsüne gelerek Siparişinizin içinde yer alan İptal Et butonuna bir kez tıklamanız yeterlidir.<br/><br/>
				Ücret iadeniz sipariş durumunuz İptal Edildi göründüğünde eş zamanlı olarak gerçekleşmektedir. Kartınıza yansıması Bankadan bankaya değişebilmekle birlikte birkaç gün içinde gerçekleşmekte olup, detaylı takibini bankanızdan sağlayabilirsiniz.<br/><br/>
				Eğer, ‘’İptal Et’’ butonunuz aktif değilse, 1(bir) saatlik süreniz dolmuş demektir. Bu durumda iptal yapılamayacaktır ancak kargo tarafından getirilen siparişi teslim almamanız veya teslim alarak İADE/CAYMA prosedürünü yerine getirmeniz halinde de iade işlemleri gerçekleştirilecektir.
			</p>
			<p>
				<b>İADE KOŞULLARI</b><br/><br/>
				Sipariş İade Etme / Cayma Hakkı Prosedürü<br/><br/>
				Tüketicinin Korunması Hakkında Mevzuat gereği TÜKETİCİ, Mesafeli Satış Sözleşmesi'nden 14 (ondört) gün içinde herhangi bir gerekçe göstermeksizin ve cezai şart ödemeksizin cayma hakkına sahiptir. <br/><br/>
				Ancak DÜĞÜN HEDİYEM’de müşterilerimiz, siparişini teslim aldığı günden itibaren 30(Otuz) gün süresince iade ve mesafeli satış sözleşmesinde cayma hakkına sahiptir.<br/><br/>
				Cayma hakkı süresi, hizmet ifasına ilişkin sözleşmelerde sözleşmenin kurulduğu gün; mal teslimine ilişkin sözleşmelerde ise TÜKETİCİ' nin veya TÜKETİCİ tarafından belirlenen üçüncü kişinin malı teslim aldığı gün başlar. Ancak TÜKETİCİ, sözleşmenin kurulmasından malın teslimi tarihini takip eden 30(otuz) günlük süre içinde belirtilen şartlara haiz olmak üzere cayma hakkını kullanabilir. Cayma hakkı süresinin belirlenmesinde;
				Tek sipariş konusu olup ayrı ayrı teslim edilen mallarda, TÜKETİCİ' nin veya TÜKETİCİ tarafından belirlenen üçüncü kişinin son malı teslim aldığı gün, Birden fazla parçadan oluşan mallarda, TÜKETİCİ' nin veya TÜKETİCİ tarafından belirlenen üçüncü kişinin son parçayı teslim aldığı gün, Belirli bir süre boyunca malın düzenli tesliminin yapıldığı sözleşmelerde, TÜKETİCİ' nin veya TÜKETİCİ tarafından belirlenen üçüncü kişinin ilk malı teslim aldığı gün esas alınır.<br/><br/>
				İade için yapmanız gerekenler sırasıyla aşağıdaki gibidir;<br/><br/>
				Üyeliğinize giriş yaparak siparişlerim menüsünden, iade etmek istediğiniz siparişi bulup "Sipariş Detayı" bölümüne girmeniz ve ‘’Aksiyon Seçin’’ alanından "iptal/iade" seçerek "gönder" butonunu tıklamanız gerekmektedir.
				Üye olmadan gerçekleştirilen siparişlerinizin iadesi için müşteri hizmetlerimizi arayarak iade talebinizi oluşturabilirsiniz.<br/><br/>
				İade edeceğiniz ürünü faturanız ile birlikte anlaşmalı kargo firmamıza ücretsiz olarak teslim edebilirsiniz.<br/>
				Siparişinizin tamamı iade olacaksa faturanızın her iki nüshasını da, siparişinizde sizde kalacak ürünler varsa, sadece ilk nüshasını göndermeniz yeterlidir.<br/>
				İade gönderiniz depomuza ulaştıktan sonra 7(yedi) iş günü içerisinde ücret iadeniz sağlanmaktadır. (Hafta sonları ve resmi tatil günleri dahil değildir.)<br/>
				İade gönderisinin hatalı adrese ulaşması sonucu, depomuza teslimat süresi değişebilir.<br/>
				İade süresi gönderimi sağladığınız tarihten itibaren değil, depomuza ulaştığı tarihten itibaren başlar.<br/>
				İade gönderisi sizin tarafınızdan gerçekleştirildiği için gönderimi sağladığınız kargo firmasından/şubesinden takip numaranızı siz talep edebilirsiniz.<br/>
				Bu numara ile gönderi takibi ve teslimat tarihini kontrol edebilirsiniz.<br/>
				Ücret iadeniz gerçekleştiğinde üye mail adresinize bilgi maili gönderimi sağlanmaktadır.<br/>
				<ul>
					<li>
						İade edilmek istenen ürün ile birlikte orijinal fatura, irsaliye (Tüketici’ de bulunan bütün kopyaları) ve iade sebebini de içeren bir dilekçe gönderilmesi gereklidir.
					</li>
					<li>
						Ürün seçiminde uyumsuzluk problemi yaşanabilecek ürünler için, teknik destek alınması ve devamında uygun ürünün tespiti ile sipariş verilmesi gerekmektedir.
					</li>
					<li>
						Gizli ayıplar dışında ürün iade taleplerinin, ürünün Müşteri tarafından teslim alınmasından itibaren 30(Otuz) gün içerisinde yapılması gerekmektedir.
					</li>
					<li>
						30(Otuz) Günlük süre mutlak süre olarak belirlenmiş olup, Tüketici yasası gereği 14 gün olarak belirlenmiş süre, DÜĞÜN HEDİYEM tarafından Müşteri lehine olacak şekilde uzatılmıştır. Bu hususa özellikle dikkat edilmesi rica olunur. İadeler mutlak surette ürünün orijinal kutusu ve/veya ambalajı ile birlikte yapılmalıdır. (Orijinal kutu/ambalaj, eğer teslimat aşamasında mevcutsa ürünün kendi kutusu yada ambalajıdır. Siparişinizin teslim edildiği koli değildir.)
					</li>
					<li>
						Çabuk bozulabilen veya son kullanma tarihi geçebilecek malların teslimine ilişkin sözleşmeler.
					</li>
					<li>
						Tüketici'nin istekleri veya kişisel ihtiyaçları doğrultusunda hazırlanan mallara ilişkin sözleşmeler. (Örn. perde ve benzeri ölçü verilerek alınan, tüketici'ye özel imal edilen ya da dikilen ya da satışa arzındaki durumu Tüketici talebine istinaden değiştirilen, kişiye özel uyarlanan)
					</li>
					<li>
						Fiyatı finansal piyasalardaki dalgalanmalara bağlı olarak değişen ve SATICI veya sağlayıcının kontrolünde olmayan mal veya hizmetlere ilişkin sözleşmeler.
					</li>
					<li>
						Tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olan mallardan; iadesi sağlık ve hijyen açısından uygun olmayanların teslimine ilişkin sözleşmeler.
					</li>
					<li>
						Tesliminden sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması mümkün olmayan mallara ilişkin sözleşmeler.
					</li>
					<li>
						Malın tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olması halinde maddi ortamda sunulan kitap, dijital içerik ve bilgisayar sarf malzemelerine ilişkin sözleşmeler.
					</li>
					<li>
						Abonelik sözleşmesi kapsamında sağlananlar dışında, gazete ve dergi gibi süreli yayınların teslimine ilişkin sözleşmeler.
					</li>
					<li>
						Elektronik ortamda anında ifa edilen hizmetler veya TÜKETİCİye anında teslim edilen gayri maddi mallara ilişkin sözleşmeler.
					</li>
					<li>
						Cayma hakkı süresi sona ermeden önce, TÜKETİCİ'nin onayı ile ifasına başlanan hizmetlere ilişkin sözleşmeler.
					</li>
					<li>
						Orjinal kutusu/ambalajı bozulmuş (örneğin orjinal kutu/ambalajı yırtılmış, farklı bir kutu/ambalaj içerisine konulmuş, kutu/ambalaj üzerine kargo etiketi/gönderi ya da sair bilgiler ayrıca yapıştırılmış ve/veya ambalaj/kutu koli bandı ile bantlanmış veya üzerine yazı yazılmış koli/ambalajlı ürünler kabul edilmemektedir), ekonomik değerini/tekrar satılabilme özelliğini kaybetmiş, bir kez dahi olsa kullanılmış, herhangi bir şekilde hasar verilmiş, herhangi bir şekilde Satıcıdan kaynaklanmayan nedenler ile başka bir müşteri tarafından satın alınamayacak durumda olan vb. ürünlerin iadesi kabul edilmemektedir.
					</li>
				</ul>
			</p>
			<p>
				<b>İPTAL KOŞULLARI</b><br/><br/>
				Yukarıda belirtilen şartlara uyan iade talebi hususunda Tüketici;<br/><br/>
				<ul>
					<li>
						Ürünün orijinal ambalajının hasar görmesini önleyecek şekilde (ürün, fatura irsaliye vb. ile birlikte) "Sağlam bir mukavva kutunun ya da benzeri ambalaj içine koyarak" tarafımıza gönderecek,
					</li>
					<li>
						 Usulüne uygun iade tarafımıza ulaştığında, talep İade bölümü tarafından incelenir,
					</li>
					<li>
						Gerekirse ürünün yetkili servisine ya da tedarikçi firmaya test etmeleri için gönderilir.
					</li>
					<li>
						Tüketici/Müşteri iade talebi, yukarıda belirtilen şartlara ve ilgili yasal mevzuata uygun ise iade işlemi/süreci başlatılır.
					</li>
					<li>
						İade süresi 3(üç)-7(yedi) gün arasında değişmektedir. İade bölümü tarafından incelenen iade için Müşteri/Tüketici ile irtibat sağlanarak, tercihine göre yeni ürün gönderimi, para iadesi işlemlerinden biri gerçekleştirilir. İş bu iade işlemleri kapsamında belirtilen koşulları sağlamayan iade talepleri kesinlikle kabul edilmeyecek/alınmayacaktır ve Müşteriye/Tüketici’ ye iade edilecektir.
					</li>
				</ul>
			</p>
		</div>

	</div>
</section>
@endsection
