<div class="col-xs-12 col-sm-12 fundo-cheio margin-t-1 padding-t-1 footer">
    <div class="col-sm-12 col-sm-offset-0 col-md-8 col-md-offset-2">
        <div class="col-sm-3 text-right">
            <span class="font-bold-upper">{{ trans('global.footer_more_about_us') }}</span>
        </div>
        <div class="col-sm-3 text-left">
            <ul>
                <li class="margin-b-1"><a href="{{ url('/paginas/nossomanifesto') }}" class="click-img-no-border text-lowercase" tabindex="-1"><i class="fa fa-plus padding-r-1"></i>{{ trans('global.manifest_title') }}</a></li>
                <li class="margin-b-1"><a href="{{ url('/paginas/quemsomos') }}" class="click-img-no-border text-lowercase" tabindex="-1"><i class="fa fa-plus padding-r-1"></i>{{ trans('global.aboutus_title') }}</a></li>
                <li class="margin-b-1"><a href="{{ url('/paginas/oquefazemos') }}" class="click-img-no-border text-lowercase" tabindex="-1"><i class="fa fa-plus padding-r-1"></i>{{ trans('global.whatwedo_title') }}</a></li>
                <li class="margin-b-1"><a href="{{ url('/paginas/contato') }}" class="click-img-no-border text-lowercase" tabindex="-1"><i class="fa fa-plus padding-r-1"></i>{{ trans('global.contact_title') }}</a></li>
                <li class="margin-b-1"><a href="{{ url('/paginas/termosecondicoes') }}" class="click-img-no-border text-lowercase" tabindex="-1"><i class="fa fa-plus padding-r-1"></i>{{ trans('global.termsconditions_title') }}</a></li>
                <li class="margin-b-1"><a href="{{ url('/paginas/parceiros') }}" class="click-img-no-border text-lowercase" tabindex="-1"><i class="fa fa-plus padding-r-1"></i>{{ trans('global.partners_title') }}</a></li>
                {{--
                <li class="margin-b-1"><a href="{{ url('/paginas/presskit') }}" class="click-img-no-border text-lowercase" tabindex="-1"><i class="fa fa-plus padding-r-1"></i>{{ trans('global.presskit_title') }}</a></li>
                <li class="margin-b-1"><a href="{{ url('/paginas/politicadeprivacidade') }}" class="click-img-no-border text-lowercase" tabindex="-1"><i class="fa fa-plus padding-r-1"></i>{{ trans('global.privacypolicy_title') }}</a></li>
                --}}
            </ul>
        </div>
        <div class="col-sm-6 text-justify hr-border-left margin-b-2">
            <h5>{{ trans('global.footer_vivala_message') }}<h5>
            <h5>{{ trans('global.footer_vivala_infos') }}</h5>
            <div>
                <h5 class="text-right">{{ trans('global.footer_development') }} <i class="icon-footer icon-vivala-logo vi" alt="{{ trans('global.lbl_vivala') }}" title="{{ trans('global.lbl_vivala') }}"></i></h5>
            </div>
        </div>
    </div>
</div>
