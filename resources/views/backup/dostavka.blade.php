<p>
    <script src="//yandex.st/jquery/1.8.0/jquery.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.js"></script>
    <script src="//api-maps.yandex.ru/2.0/?apikey=8f3f82e0-6ea2-4830-8fb4-0a33ff2effa6&amp;load=package.full&amp;lang=ru-RU&amp;coordorder=longlat&amp;scroll=true"></script>
    <script src="https://www.buket-piter.ru/d/203678/t/images/multi-geocoder.js"></script>
    <script src="https://www.buket-piter.ru/d/203678/t/images/delivery-calculator.js"></script>
    <script src="https://www.buket-piter.ru/d/203678/t/images/directions-renderer.js"></script>
    <script src="https://www.buket-piter.ru/d/203678/t/images/directions-service.js"></script>
    <script src="https://www.buket-piter.ru/d/203678/t/images/delivery-tarif.js"></script>
    <script>// <![CDATA[
        function init() {
            var myMap = window.map = new ymaps.Map('YMapsID', {
                    center: [30.351387, 59.925802],
                    zoom: 10,
                    behaviors: ['drag', 'disable<span id="CmCaReT"></span>', 'scrollZoom']
                }),
                searchOrigin = new ymaps.control.SearchControl({
                    useMapBounds: true,
                    noCentering: true,
                    noPlacemark: true
                }),
                searchDestination = new ymaps.control.SearchControl({
                    useMapBounds: true,
                    noCentering: true,
                    noPlacemark: true
                }),
                tarifs = [{
                    id: 'spb',
                    name: 'Санкт-Петербург',
                    label: 'Маршрут по Санкт-Петербургу',
                    color: '#0000ff',
                    cost: 25,
                    url: 'https://www.buket-piter.ru/d/203678/t/images/spb.json'
                }, {
                    id: 'lo',
                    name: 'Ленинградская область',
                    label: 'Маршрут за КАД',
                    cost: 25,
                    color: '#FF0000',
                    url: 'https://www.buket-piter.ru/d/203678/t/images/lo.json'
                }],
                calculator = new DeliveryCalculator(myMap, 'Санкт-Петербург, ул. Марата 35', tarifs);
            //нарисуем полигон мкада.
            var kad_coords = [[[30.175434703619345,59.94794751575235],[30.17856877416985,59.990054391488755],[30.17633717626947,59.992376343142055],[30.180285387939392,59.9946121421026],[30.189640932983306,60.00660547512915],[30.197022372192286,60.01073120454286],[30.205777102416885,60.01425485611991],[30.225174838012602,60.0107312045474],[30.22774270517969,60.012390225241596],[30.21727136118552,60.02089748283314],[30.181394133402282,60.03575842802731],[30.15341332895891,60.040052249793206],[30.133328947855357,60.06168458811177],[30.154271635843642,60.062456908592296],[30.168004545999846,60.06863481951292],[30.181394133402204,60.07978644137399],[30.19581368906627,60.06374406907942],[30.204396757913873,60.06588922461865],[30.21812966807015,60.06391568667238],[30.22842935068727,60.05421788830891],[30.249887022806423,60.06185621642565],[30.267053160501757,60.05953915824995],[30.30636361582403,60.069406976742165],[30.312177470994683,60.0742740272468],[30.318357280564985,60.07830551247923],[30.319730571580585,60.084308935555356],[30.332776836229026,60.096141043291695],[30.35656947132453,60.095754212333674],[30.3744222545276,60.095239855425085],[30.375108900035464,60.089581397747814],[30.38060206409793,60.08435074424844],[30.38585519980363,60.06878652877122],[30.388945104588796,60.06243702193324],[30.39372957598958,60.05976260180658],[30.39776361834792,60.05841091832003],[30.39905107867512,60.05568592722296],[30.417461761353344,60.050428416757704],[30.420769017310363,60.06037074011452],[30.42197064694904,60.07064581892448],[30.426090519995906,60.070431340698924],[30.438149731726856,60.06721399940265],[30.459409435271827,60.06018328497555],[30.459443062889488,60.058656983430325],[30.46150299941292,60.056425528087544],[30.457855195152582,60.05305660198482],[30.456996888267824,60.05211238246027],[30.454421967613523,60.05071746312091],[30.453477830040242,60.049322484630416],[30.453306168663296,60.04786305922529],[30.45622441207149,60.04588843946801],[30.45407864485958,60.045051336635446],[30.450302094566553,60.04393516639282],[30.444379777061673,60.04112310818252],[30.441118210899614,60.0396633191151],[30.442663163292156,60.03616385524177],[30.444379777061673,60.03345849325731],[30.456996888267696,60.02052980622976],[30.465408295738406,60.02074460992464],[30.46660992537708,60.016577168160616],[30.471845597374152,60.01434285859212],[30.475278824913207,60.01180759309752],[30.477939576255906,60.00785390851497],[30.47793957625593,60.004157643990425],[30.479141205894607,59.999988103995854],[30.48068615828715,59.99543109642029],[30.487810105430736,59.9914754472017],[30.4970798197862,59.98554108368875],[30.506092042076222,59.98390679609706],[30.51742169295507,59.982573501523724],[30.525489777671915,59.98089605439418],[30.54849240218358,59.97319590808839],[30.55355641280363,59.96850611193394],[30.555788010704063,59.96489150246564],[30.555873841392508,59.961448649288904],[30.553899735557547,59.95731675159106],[30.550552338706915,59.95296909277438],[30.545831650840707,59.94909445912198],[30.5474624339218,59.94642500266998],[30.541926354515024,59.94196825202584],[30.540166825401243,59.93260065756392],[30.536476105796716,59.92803433885216],[30.53141209517659,59.924199867182104],[30.527978867637586,59.918555060593334],[30.527463883506723,59.91299549271166],[30.52801828373355,59.907482987171015],[30.527371054321783,59.90248694408745],[30.527456885010256,59.89808894878028],[30.53011763635303,59.892914088490215],[30.528443937927722,59.89058513744986],[30.52591193261769,59.88825602260708],[30.53337920251509,59.87237917364048],[30.53295004907275,59.86922878550028],[30.531662588745597,59.866682362547614],[30.528401022583488,59.86417890860552],[30.515268927246495,59.8575740624591],[30.511964445740148,59.84807459153335],[30.502823477417394,59.853515530540705],[30.496557837158615,59.8530405634853],[30.49063551965376,59.85308374259366],[30.489663909171863,59.849786607250095],[30.489926068034684,59.846436585456544],[30.49198600455807,59.844838600951455],[30.49919578239015,59.84319734754954],[30.50262900992916,59.84388841150104],[30.50606223746824,59.84319734754959],[30.514044491496556,59.84034655653155],[30.51902267142823,59.835205874972274],[30.52394918185501,59.8361413193583],[30.531965597066872,59.83327492706594],[30.538231237325675,59.83232440643416],[30.548874242696712,59.83448464122779],[30.55576215544693,59.83609932488193],[30.560751064214635,59.834314527804416],[30.559812291059405,59.82910134474972],[30.560887856874384,59.825975877822486],[30.567113263997964,59.82293655339367],[30.56301060823391,59.81951256061475],[30.5587405314822,59.81935047481721],[30.554363166369914,59.82128464727309],[30.55193844942043,59.81956658906207],[30.5535692325015,59.817761991949276],[30.555629169024932,59.816983931806604],[30.553697978534206,59.81575196596743],[30.552453433551293,59.81620585343544],[30.552217399157954,59.81587084184725],[30.552839671649398,59.8150062802146],[30.549406444110343,59.81189367200511],[30.517791996511217,59.824163168733556],[30.506189420175602,59.82871682716465],[30.50318534607891,59.8300995439113],[30.506146504831367,59.82731244653257],[30.507176473093047,59.82602684600572],[30.507884576272964,59.82441707432318],[30.50861413712501,59.82411455817193],[30.50902183289527,59.82355273516624],[30.50850684876443,59.81732882901911],[30.50787430220646,59.810512763394364],[30.47583622988811,59.83339964373224],[30.459270907012115,59.83201706445526],[30.451975298491607,59.83024555059468],[30.4462246423637,59.82328820349604],[30.440765851042325,59.827500234746466],[30.437675946257137,59.82551240567928],[30.430809491179048,59.82343802235878],[30.418192379972997,59.820477480026284],[30.405918591520788,59.817862474942615],[30.384761326811322,59.815441790831926],[30.386606686613572,59.80765982548167],[30.377036564848424,59.81211306211444],[30.36574982931376,59.81310739265162],[30.35931252767801,59.81462044722279],[30.352016919157506,59.813496470410016],[30.344978802702396,59.811075468089655],[30.33871316244362,59.80938930865808],[30.32249116232149,59.807746301770216],[30.31674050619358,59.81155103603381],[30.287987225553874,59.8270248951095],[30.281893246672094,59.83035212938154],[30.27485513021696,59.831216291518786],[30.26970528890836,59.83203722470152],[30.266100399992407,59.83320377905574],[30.2564341513315,59.830263335641696],[30.24573793440884,59.827754755051345],[30.23595323592251,59.82529157680093],[30.226168537436227,59.82274177876028],[30.215868854819032,59.81824674267656],[30.20453920394008,59.8118489114184],[30.18050661116668,59.80717944592159],[30.173811817465513,59.80086597692601],[30.1643704417331,59.79766554139123],[30.15784730940883,59.796281473804505],[30.15218248396934,59.796714001113756],[30.147775951726448,59.80052033950465],[30.114816967351402,59.81245450505922],[30.10606223712685,59.813708208383595],[30.0719874538016,59.81409727909539],[30.067095104558447,59.83946349569364],[30.08566851468818,59.83543669332081],[30.09150500150459,59.83444303128452],[30.08927340360418,59.844075978674915],[30.08927340360418,59.853965198396075],[30.097427319009473,59.85495827587329],[30.11261935086982,59.852972091179225],[30.11749380275459,59.852405795858985],[30.114575559346374,59.86205511249584],[30.118008786885458,59.8637817633071],[30.131784612385946,59.86257311719124],[30.13687162801648,59.8634655307664],[30.140176109522823,59.86467414435433],[30.143952659815774,59.86571006378545],[30.163332576544136,59.88726972342107],[30.16599332788691,59.888628434114274],[30.170199031622225,59.89050465724114],[30.17852460840446,59.89102221732889],[30.188480968267786,59.89153976931836],[30.19277250269158,59.89468803636908],[30.20899450281363,59.90119925522123],[30.202685947210643,59.90419571033233],[30.20272886255488,59.907278111300904],[30.19466077783809,59.92779139396394],[30.187794322759924,59.93128083318046],[30.18788015344845,59.93593284594313],[30.170284862310748,59.94377086783162],[30.175434703619345,59.94794751575235]]];
            var kad_polygon = new ymaps.Polygon(kad_coords);
            var openCAD = ymaps.geoQuery(kad_polygon).addToMap(myMap);
            openCAD.removeFromMap(myMap);
            jQuery('.show_area').bind('click', function(){
                jQuery(this).toggleClass('opened');
                if (jQuery(this).hasClass('opened')) {
                    openCAD.addToMap(myMap);
                }
                else {
                    openCAD.removeFromMap(myMap);
                }
            });


            //myMap.controls.add(searchOrigin, { left: 5, top: 5 });
            myMap.controls.add(searchDestination, { left: 5, top: 5 });

            searchOrigin.events.add('resultselect', function (e) {
                var results = searchOrigin.getResultsArray(),
                    selected = e.get('resultIndex'),
                    point = results[selected].geometry.getCoordinates();

                calculator.setOrigin(point);
            });

            searchDestination.events.add('resultselect', function (e) {
                var results = searchDestination.getResultsArray(),
                    selected = e.get('resultIndex'),
                    point = results[selected].geometry.getCoordinates();

                calculator.setDestination(point);
            });

            myMap.events.add('click', function (e) {
                var position = e.get('coordPosition');

                if(calculator.getOrigin()) {
                    calculator.setDestination(position);
                }
                else {
                    calculator.setOrigin(position);
                }
            });
        }

        ymaps.ready(init);
        // ]]></script>
</p>
<div class="hero-unit">
    <div class="container-fluid"></div>
    <div class="row-fluid">
        <h1>Расчет стоимости доставки.</h1>
        <p>Чтобы узнать стоимость доставки, введите адрес на карте и нажмите кнопку &laquo;Найти&raquo; либо дважды кликните в нужном месте на карте.</p>
        <p>Стоимость доставки в пределах КАД является бесплатной, за пределы КАД составляет 25 руб./км.</p>
        <button class="show_area" data-attr="openmap">Показать/скрыть область бесплатной доставки</button>
        <div style="margin-top: 25px; position: relative;">
            <div id="YMapsID" class="span8"></div>
            <div id="sidebar" class="span4"></div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<p>&nbsp;</p>
<h1 style="text-align: center;">Куда мы доставляем?</h1>
<p>&nbsp;</p>
<p>&nbsp;</p>
<h3></h3>
<table align="center" style="width: 100%;" class="center-cell">
    <tbody>
    <tr>
        <td>
            <h3 style="text-align: center;"><strong><a href="/magazin/folder/dostavka-cvetov-v-moskve" title="Москва">Москва</a></strong></h3>
        </td>
        <td>
            <h3 style="text-align: center;"><strong><a href="/magazin/folder/dostavka-cvetov-v-peterburg" title="Санкт-Петербург">Санкт-Петербург</a></strong></h3>
        </td>
        <td>
            <h3 style="text-align: center;"><strong><a href="/magazin/folder/dostavka-cvetov-v-ekaterinburge" title="Екатеринбург">Екатеринбург</a></strong></h3>
        </td>
        <td>
            <h3 style="text-align: center;"><strong><a href="/magazin/folder/dostavka-cvetov-v-nizhnem-novgorode" title="Нижний Новгород">Нижний Новгород</a></strong></h3>
        </td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td>
            <h3 style="text-align: center;"><strong><a href="/magazin/folder/dostavka-cvetov-v-kazani" title="Казань">Казань</a></strong></h3>
        </td>
        <td>
            <h3 style="text-align: center;"><strong><a href="/magazin/folder/dostavka-cvetov-v-rostove-na-donu" title="Ростов-на-Дону">Ростов-на-Дону</a></strong></h3>
        </td>
        <td>
            <h3 style="text-align: center;"><strong><a href="/magazin/folder/dostavka-cvetov-v-ufe" title="Уфа">Уфа</a></strong></h3>
        </td>
        <td>
            <h3 style="text-align: center;"><strong><a href="/magazin/folder/dostavka-cvetov-v-volgograde" title="Волгоград">Волгоград</a></strong></h3>
        </td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td>
            <h3 style="text-align: center;"><strong><a href="/magazin/folder/dostavka-cvetov-v-chelyabinske" title="Челябинск">Челябинск</a></strong></h3>
        </td>
        <td>
            <h3 style="text-align: center;"><strong><a href="/magazin/folder/dostavka-cvetov-v-omske" title="Омск">Омск</a></strong></h3>
        </td>
        <td>
            <h3 style="text-align: center;"><strong><a href="/magazin/folder/dostavka-cvetov-v-samare" title="Самара">Самара</a></strong></h3>
        </td>
        <td>
            <h3 style="text-align: center;"><strong><a href="/magazin/folder/dostavka-cvetov-v-krasnoyarske" title="Красноярск">Красноярск</a></strong></h3>
        </td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td>
            <h3 style="text-align: center;"><strong><a href="/magazin/folder/dostavka-cvetov-v-permi" title="Пермь">Пермь</a></strong></h3>
        </td>
        <td>
            <h3 style="text-align: center;"><strong><a href="/magazin/folder/dostavka-cvetov-v-voronezhe" title="Воронеж">Воронеж</a></strong></h3>
        </td>
        <td>
            <h3 style="text-align: center;"><strong><a href="/magazin/folder/dostavka-cvetov-v-novosibirske" title="Новосибирск">Новосибирск</a></strong></h3>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td style="vertical-align: top;">
            <table align="center" style="width: 90px;">
                <tbody>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;" data-mce-mark="1"><strong>А</strong></span></td>
                </tr>
                <tr>
                    <td><span data-mce-mark="1"><a href="/magazin/folder/abramcevo"><span data-mce-mark="1">Абрамцево</span></a></span></td>
                </tr>
                <tr>
                    <td><span data-mce-mark="1"><a href="/magazin/folder/agalatovo"><span data-mce-mark="1">Агалатово</span></a></span></td>
                </tr>
                <tr>
                    <td><span data-mce-mark="1"><a href="/magazin/folder/arhangelsk"><span data-mce-mark="1">Архангельск</span></a></span></td>
                </tr>
                <tr>
                    <td><span data-mce-mark="1"><span data-mce-mark="1"><a href="/magazin/folder/arhangelsk"><span data-mce-mark="1"></span></a></span></span><a href="/magazin/folder/astrahan">Астрахань</a><span data-mce-mark="1"><a href="/magazin/folder/arhangelsk"><span data-mce-mark="1"></span></a></span></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;" data-mce-mark="1"><strong>Б</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/bugry">Бугры</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/bolshaya-izhora">Большая Ижора</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-beloostrov">Белоостров</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>В</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/vnukovo">Внуково</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/vsevolozhskiy-r-n-zavody">Всеволожский р-н &laquo;Заводы&raquo;</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-veschevo">Вещево</a></td>
                </tr>
                <tr>
                    <td><a href="https://www.buket-piter.ru/magazin/folder/voskresensk-mo">Воскресенск (МО)</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-volosovo">Волосово</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/velikiy-novgorod">Великий Новгород</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-volhov">Волхов</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-vo-vsevolozhsk">Всеволожск</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/vidnoe-mo">Видное (МО)</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-vyborg">Выборг</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>Г</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-gatchinu">Гатчина</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/gorelovo-lo">Горелово (ЛО)</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/gorbunki-lo">Горбунки (ЛО)</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>Д</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/domodedovo">Домодедово</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/domodedovo-gorod">Домодедово (город)</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dimitrovgrad">Димитровград</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dnepropetrovsk-ukraina">Днепропетровск (Украина)</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dolgoprudnyy">Долгопрудный</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>Е</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-ekaterinburge">Екатеринбург</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>Ж</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/zheleznodorozhnyy">Железнодорожный</a></td>
                </tr>
                <tr>
                    <td><a href="https://www.buket-piter.ru/zhd-st-lad-ozero">Жд. ст. Лад. озеро.</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>З</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-zelenogorsk">Зеленогорск</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/zerkalnyy-primorsk.-shosse">Зеркальный (Приморск. Шоссе)</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/zelenograd-mo">Зеленоград (МО)</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/zaporozhe">Запорожье</a></td>
                </tr>
                </tbody>
            </table>
        </td>
        <td style="vertical-align: top;">
            <table align="center" style="width: 100px;">
                <tbody>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;" data-mce-mark="1"><strong>И</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/izhevsk">Ижевск</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/irkutsk">Иркутск</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>К</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-kingisepp">Кингисепп</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-kirovsk">Кировск</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/kiev">Киев</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-kommunar">Коммунар</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/kolomna">Коломна</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/kirishi">Кириши</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-korolev-mo">Королев (МО)</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-kolpino">Колпино</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-komarovo">Комарово</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-koltushi">Колтуши</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-krasnoe-selo">Красное Село</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-krasnogorsk">Красногорск</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-kuzmolovo-lo">Кузьмолово ЛО</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-kronshtadt">Кронштадт</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>Л</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-lyubercy">Люберцы</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-lodeynoe-pole">Лодейное Поле</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-levashovo">Левашово</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-leskolovo-lo">Лесколово ЛО</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-lisiy-nos">Лисий Нос</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-lomonosov">Ломоносов</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-lyuban">Любань</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-lvov">Львов</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-lugu">Луга</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>М</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-magadan">Магадан</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-mgu">Мга</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-mariupol">Мариуполь</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-murmansk">Мурманск</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-metallostroy">Металлострой</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-melnichnyy-ruchey">Мельничный ручей</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-miass">Миасс</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-murino">Мурино</a></td>
                </tr>
                </tbody>
            </table>
        </td>
        <td style="vertical-align: top;">
            <table align="center" style="width: 100px;">
                <tbody>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;" data-mce-mark="1"><strong>Н</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-novodevyatkino">Новодевяткино</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-novo-peredelkino">Ново-Переделкино МО</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-novaya-izhora">Новая Ижора</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>О</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-olgino">Ольгино</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-odincovo">Одинцово</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-osinovaya-roscha">Осиновая Роща</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>П</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-pargolovo-lo">Парголово ЛО</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-pavlovsk">Павловск</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-perekyulya">Перекюля</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-petrodvorec">Петродворец</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-priozersk">Приозерск</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-petrozavodsk">Петрозаводск</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-poltava-ukraina">Полтава (Украина)</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-pesochnyy">Песочный</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-podolsk-mo">Подольск (МО)</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-petergof">Петергоф</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-pontonnyy">Понтонный</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-poselok-volodarskogo">Поселок Володарского</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-pushkino-mo">Пушкино МО</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-pulkovo-1">Пулково 1</a></td>
                </tr>
                <tr>
                    <td><a href="https://www.buket-piter.ru/pulkovo-2">Пулково 2</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-pikalevo">Пикалево</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-privetninskoe">Приветнинское</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-pushkin">Пушкин</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>Р</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-russko-vysockoe">Русско-Высоцкое</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-reutov.">Реутов</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-roschino-lo">Рощино ЛО</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-romanovku">Романовка</a><a href="/magazin/folder/dostavka-cvetov-v-repino">Репино</a></td>
                </tr>
                </tbody>
            </table>
        </td>
        <td style="vertical-align: top;">
            <table align="center" style="width: 100px;">
                <tbody>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>С</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-sertolovo">Сертолово</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-serpuhov">Серпухов</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-stupino-mo">Ступино (МО)</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-solnechnoe">Солнечное</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-sestroreck">Сестрорецк</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-siverskiy">Сиверский</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-slancy">Сланцы</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-surgut">Сургут</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-sosnovyy-bor">Сосновый Бор</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-strelnu">Стрельна</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>Т</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-tihvin">Тихвин</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-telmana-pos.-kolpino">Тельмана пос. (Колпино)</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-tosno">Тосно</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-tyumen">Тюмень</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-toksovo">Токсово ЛО</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>Ш</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-shlisselburg">Шлиссельбург</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-sheremetevo">Шереметьево МО</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-shushary">Шушары</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>Ч</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-chehov">Чехов</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-chudovo">Чудово</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>Х</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-helsinki">Хельсинки</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-himki">Химки</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>Э</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-elektrostal.">Электросталь</a></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size: 15pt;"><strong>Ю</strong></span></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-yubileynyy">Юбилейный</a></td>
                </tr>
                <tr>
                    <td><a href="/magazin/folder/dostavka-cvetov-v-yukki">Юкки</a></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<p>В нашей компании собственная курьерская служба доставки цветов. Мы не пользуемся курьерскими услугами других компаний, что дает нам возможность выполнить заказ оперативно и качественно, гарантируя качество цветка и время доставки. Точность времени доставки может составляет&nbsp;&plusmn;15 минут от указанного Вами времени при оформлении. Если Вам нужно доставить цветы в точное время укажите это&nbsp;при оформлении заказа.</p>
<p>Доставка цветов в Петербурге и Ленинградской области осуществляется 24 часа в сутки.</p>
<p>Доставка букетов по Санкт-Петербургу в дневное и ночное время <span style="color: #ff0000;">БЕСПЛАТНО<span>*</span></span>. Доставка срезанных цветов поштучно и подарков <span style="color: #ff0000;">БЕСПЛАТНО*</span>&nbsp;при заказе от 3500 рублей.</p>
<p>Мы стараемся для Вас сделать все условия для комфортного заказа и оплаты цветов, не выходя из дома или офиса. У нас на сайте имеется около 20 способов оплаты.<br /><span><span style="color: #ff0000;">*</span>С 3.03.2020г. по 09.03.2020г. стоимость доставки составляет 400 рублей.</span></p>
<hr />
<p>Компания <a href="https://www.buket-piter.ru">Букет-Питер</a> - круглосуточный интернет-магазин доставки цветов по Петербургу. Наши флористы каждый день составляют <a href="/magazin/folder/kompozicii">композиции</a> и <a href="/magazin/folder/vse-bukety">букеты</a>, специалисты принимают и максимально быстро обрабатывают заявки на доставку цветов, а курьеры <a href="/kuda-my-dostavlyaem">доставляют цветы по Петербургу (СПБ)</a>, все для y to create for you all conditions for comfortable ordering and payment of flowers from your home or office.</p>
<p></p>
