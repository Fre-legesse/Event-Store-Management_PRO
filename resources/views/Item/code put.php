
 Select from database

   <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name='Department'>
                                        <option value="">Select</option>
        @foreach($category as  $Items)
            <option value="{{ $Items->Department}}" {{$Items->STID == $Item->STID  ? 'selected' : ''}}>{{ $Items->Department }}</option>
        @endforeach
    </select>

php artisan config:clear
php artisan cache:clear
composer dump-autoload
php artisan view:clear
php artisan route:clear



// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

{{ $event->links("pagination::bootstrap-4") }}


User::orderByRaw('CHAR_LENGTH(name)')->get();
