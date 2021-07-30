@push('plugin-js')
@php
    $customId = $id ?? "myModal";
    $backdrop = $backdrop ?? true;
@endphp
    <div class="modal fade {!! $class ?? "" !!}" data-backdrop="{{ $backdrop }}" id="{{ $customId }}" {!! isset($tabindex) && $tabindex == false? "" : 'tabindex="-1"' !!} role="dialog" aria-labelledby="{{ $customId }}Label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>
@endpush
