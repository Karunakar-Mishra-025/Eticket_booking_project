@if (session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(()=>show=false,3000)" x-show="show"
        class="flash-message" style="
        position: fixed;
        top:0px;
        left: 70%;
        padding:10px 60px;
        background-color: skyblue;
        color:#fff;">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif