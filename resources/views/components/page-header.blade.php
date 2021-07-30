<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <div class="row align-content-center">
        <div class="col-lg-7">
            <h4 class="tx-gray-800 mg-b-5">{{ $title }}</h4>
            @if($subtitle) <p class="mg-b-0">Introducing Bracket admin template, the most handsome admin template of all time.</p> @endif
        </div>
        <div class="col-lg-5 @if($buttonText) text-md-right @endif">
            {!! $slot !!}
            @if($buttonText)
                <button type="button" @if($isViewButton) dt-action="view" @endif class="btn btn-success btn-with-icon">
                    <div class="ht-40 justify-content-between">
                        <span class="icon wd-40"><i class="{{ $buttonIcon }}"></i></span>
                        <span class="pd-x-15">{{ $buttonText }}</span>
                    </div>
                </button>
            @endif
        </div>
    </div>
</div>
