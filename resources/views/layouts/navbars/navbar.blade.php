<?php $value = Session('value')?>
@if ($value == "logged")
    @include('layouts.navbars.navs.auth')
@else
    @include('layouts.navbars.navs.guest')
@endif