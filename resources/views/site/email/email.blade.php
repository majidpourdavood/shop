@component('mail::message')
<div style="width: 100%; font-family: 'Tahoma'; text-align: center; font-size: 2rem; color: #000;">
   کد فعال سازی شما برابر است با :     <button style="      display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1.3rem;
    line-height: 1.5;
    font-family: 'Tahoma';
    font-weight: bold;
    border-radius: .25rem;
    color: #ffffff;
    background-color: #19c516;
    border-color: #80a2a0;">{!! convert($user->code) !!} </button></div>

@endcomponent
