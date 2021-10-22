



<footer class="footer mt-auto">




{{--------------
@if (file_exists(public_path(str_replace('public/storage','storage',App\Company::first()->logo))))
<div class="copyright bg-dark">
    <div class="row">
        <div class="col-md-10 mb-3">
            <div class="card">
                <img style="height:150px" src="{{ asset(App\Company::first()->logo) }}" alt="Card image cap">
            </div>
        </div>
    </div>
</div>

@endif

-------------}}

</footer>
