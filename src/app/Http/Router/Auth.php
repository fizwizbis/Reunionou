<?php


namespace App\Http\Router;

use \Route;

class Auth implements BaseRouter
{
    public static function routes()
    {
        self::auth();
    }

    /**
     * Register the typical authentication routes for an application.
     *
     * @param  array  $options
     * @return void
     */
    private static function auth(array $options = [])
    {
        // Authentication Routes...
        Route::get('connexion', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('connexion', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        if ($options['register'] ?? true) {
            Route::get('inscription', 'Auth\RegisterController@showRegistrationForm')->name('register');
            Route::post('inscription', 'Auth\RegisterController@register');
        }

        // Password Reset Routes...
        if ($options['reset'] ?? true) {
            self::resetPassword();
        }

        // Email Verification Routes...
        if ($options['verify'] ?? false) {
            self::emailVerification();
        }
    }

    /**
     * Register the typical reset password routes for an application.
     *
     * @return void
     */
    private static function resetPassword()
    {
        Route::get('mot-de-passe/reinitialiser', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('mot-de-passe/reinitialiser/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    }

    /**
     * Register the typical email verification routes for an application.
     *
     * @return void
     */
    private static function emailVerification()
    {
        Route::get('email/verifier', 'Auth\VerificationController@show')->name('verification.notice');
        Route::get('email/verifier/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
        Route::get('email/renvoyer', 'Auth\VerificationController@resend')->name('verification.resend');
    }
}