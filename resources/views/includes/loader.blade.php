<style>
    /*Loader Section Start*/
    #overlay{}
    .loader{
        width:100px;
        height:100px;
        background-color:transparent;
        position:fixed;
        left:50%;
        top:50%;
        margin-left:-50px;
        margin-top:-50px;
        z-index: 99999999;
    }
    /*Loader Section End*/
</style>

{{--    Preloader--}}
<style>.loader{display: none}</style>
<div id="overlay">
    <div class="loader">
        <div class="loader"><img src="{{ asset('assets/images/4V0b.gif') }}" alt=""></div>
    </div>
</div>
