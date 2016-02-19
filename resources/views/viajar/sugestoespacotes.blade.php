<ul id="menu-direita" class="sugestoes sugestoes-pacotes">
    {{-- Menu antigo, desabilitado por motivos de CSS, voltar a usar somente este após o black friday --}}
    <h4 class="suave">{{ trans('global.wannatravel_package_find_best_destinies') }}</h4>
    <ul class="sugestoes sugestoes-pacotes">
        <li>
            <a href="#" class="click-img-no-border ativa-modal-quimera" data-url="http://www.e-agencias.com.br/vivala/home/flights">
                <div class="round-foto-sem-cover">
                    <img src="/img/dummyvoos.jpg">
                </div>
                <strong class="col-sm-12 margin-t-1">{{ trans('global.dummy_travel_1_title') }}</strong>
                <span class="col-sm-12">{{ trans('global.dummy_travel_1') }}</span>
                <button class="suave" type="button" >{{ trans('global.lbl_seemore') }}</button>
            </a>
        </li>
        <li>
            <a href="#" class="click-img-no-border ativa-modal-quimera" data-url="http://www.e-agencias.com.br/vivala/home/hotels">
                <div class="round-foto-sem-cover">
                    <img src="/img/dummyhoteis.jpg">
                </div>
                <strong class="col-sm-12 margin-t-1">{{ trans('global.dummy_travel_2_title') }}</strong>
                <span class="col-sm-12">{{ trans('global.dummy_travel_2') }}</span>
                <button class="suave" type="button">{{ trans('global.lbl_seemore') }}</button>
            </a>
        </li>
        <li>
            <a href="https://vivala.com.br/viajar" class="click-img-no-border">
                <div class="round-foto-sem-cover">
                    <img src="/img/dummyrestaurantes.jpg">
                </div>
                <strong class="col-sm-12 margin-t-1">{{ trans('global.dummy_travel_3_title') }}</strong>
                <span class="col-sm-12">{{ trans('global.dummy_travel_3') }}</span>
                <button class="suave" type="button">{{ trans('global.lbl_seemore') }}</button>
            </a>
        </li>
        {{--
        <li>
            <a href="#" class="click-img-no-border hidden-xs ativa-modal-quimera" data-url="https://www.e-agencias.com.br/vivala/hotels/search/MV1/2015-11-27/2015-11-29/2">
                <div class="round-foto-sem-cover">
                    <img src="/img/dummymonteverde.png">
                </div>
                <strong class="col-sm-12">Monte Verde</strong>
                <span class="col-sm-12">{{ trans('global.dummy_travel_4') }}</span>
                <button class="suave" type="button">{{ trans('global.lbl_seemore') }}</button>
            </a>
        </li>
        --}}
    </ul>
    {{-- Menu Black Friday, temporário --}}
    <!-- <li>
        <a href="#" class="click-img-no-border ativa-modal-quimera" data-url="https://www.e-agencias.com.br/vivala/flights/search/OneWay/SAO/RIO/2016-03-11/1/0/0/">
            <div class="round foto">
                <div class="cover-explode">
                    <img src="/img/black-friday/01.png">
                </div>
            </div>
            <div class="col-sm-12 marginal"><span class="black-friday">{{ trans('global.blackfriday-title') }}</span></div>
            <span class="col-sm-12">{{ trans('global.blackfriday-1') }}</span>
            <button class="suave" type="button" >{{ trans('global.lbl_seemore') }}</button>
        </a>
    </li>
    <li>
        <a href="#" class="click-img-no-border ativa-modal-quimera" data-url="https://www.e-agencias.com.br/vivala/flights/search/RoundTrip/SAO/MCZ/2016-04-22/2016-04-27/1/0/0">
            <div class="round foto">
                <div class="cover-explode">
                    <img src="/img/black-friday/02.png">
                </div>
            </div>
            <div class="col-sm-12 marginal"><span class="black-friday">{{ trans('global.blackfriday-title') }}</span></div>
            <span class="col-sm-12">{{ trans('global.blackfriday-2') }}</span>
            <button class="suave" type="button" >{{ trans('global.lbl_seemore') }}</button>
        </a>
    </li>
    <li>
        <a href="#" class="click-img-no-border ativa-modal-quimera" data-url="https://www.e-agencias.com.br/vivala/flights/search/OneWay/RIO/SAO/2016-01-28/1/0/0/">
            <div class="round foto">
                <div class="cover-explode">
                    <img src="/img/black-friday/03.png">
                </div>
            </div>
            <div class="col-sm-12 marginal"><span class="black-friday">{{ trans('global.blackfriday-title') }}</span></div>
            <span class="col-sm-12">{{ trans('global.blackfriday-3') }}</span>
            <button class="suave" type="button" >{{ trans('global.lbl_seemore') }}</button>
        </a>
    </li>
    <li>
        <a href="#" class="click-img-no-border ativa-modal-quimera" data-url="https://www.e-agencias.com.br/vivala/hotels/search/FLN/2016-01-18/2016-01-21/1">
            <div class="round foto">
                <div class="cover-explode">
                    <img src="/img/black-friday/04.png">
                </div>
            </div>
            <div class="col-sm-12 marginal"><span class="black-friday">{{ trans('global.blackfriday-title') }}</span></div>
            <span class="col-sm-12">{{ trans('global.blackfriday-4') }}</span>
            <button class="suave" type="button" >{{ trans('global.lbl_seemore') }}</button>
        </a>
    </li>
    <li>
        <a href="#" class="click-img-no-border ativa-modal-quimera" data-url="https://www.e-agencias.com.br/vivala/hotels/search/AC1/2015-12-15/2015-12-18/2">
            <div class="round foto">
                <div class="cover-explode">
                    <img src="/img/black-friday/05.png">
                </div>
            </div>
            <div class="col-sm-12 marginal"><span class="black-friday">{{ trans('global.blackfriday-title') }}</span></div>
            <span class="col-sm-12">{{ trans('global.blackfriday-5') }}</span>
            <button class="suave" type="button" >{{ trans('global.lbl_seemore') }}</button>
        </a>
    </li>
    <li>
        <a href="#" class="click-img-no-border ativa-modal-quimera" data-url="https://www.e-agencias.com.br/vivala/hotels/search/MO1/2016-01-18/2016-01-21/1">
            <div class="round foto">
                <div class="cover-explode">
                    <img src="/img/black-friday/06.png">
                </div>
            </div>
            <div class="col-sm-12 marginal"><span class="black-friday">{{ trans('global.blackfriday-title') }}</span></div>
            <span class="col-sm-12">{{ trans('global.blackfriday-6') }}</span>
            <button class="suave" type="button" >{{ trans('global.lbl_seemore') }}</button>
        </a>
    </li>
    <li>
        <a href="#" class="click-img-no-border ativa-modal-quimera" data-url="https://www.e-agencias.com.br/vivala/packages/items/SAO/NAT/2016-03/NA/2">
            <div class="round foto">
                <div class="cover-explode">
                    <img src="/img/black-friday/07.png">
                </div>
            </div>
            <div class="col-sm-12 marginal"><span class="black-friday">{{ trans('global.blackfriday-title') }}</span></div>
            <span class="col-sm-12">{{ trans('global.blackfriday-7') }}</span>
            <button class="suave" type="button" >{{ trans('global.lbl_seemore') }}</button>
        </a>
    </li>-->
</ul>
