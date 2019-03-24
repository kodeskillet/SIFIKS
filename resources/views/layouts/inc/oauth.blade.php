<div class="row justify-content-center mt-3">
    <div class="col-md-6">
        <div class="btn-group btn-block">
            <a href="{{ route('api.login', ['provider' => 'google']) }}" class="btn btn-soc btn-google btn-lg p-3" title="Google">
                <i class="fab fa-google fa-lg"></i>
            </a>
            <a href="{{ route('api.login', ['provider' => 'twitter']) }}" class="btn btn-soc btn-twitter btn-lg p-3 disabled" title="Twitter">
                <i class="fab fa-twitter fa-lg"></i>
            </a>
            <a href="{{ route('api.login', ['provider' => 'twitter']) }}" class="btn btn-soc btn-facebook btn-lg p-3 disabled" title="Facebook">
                <i class="fab fa-facebook-f fa-lg"></i>
            </a>
        </div>
    </div>
</div>
