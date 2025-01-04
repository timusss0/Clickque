<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\MBTICOntroller;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;
use Chatify\Http\Controllers\Api\MessagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('splash.splash');
});

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'signupView'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/logoutView', [AuthController::class, 'logoutView'])->name('logoutView');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/mbti', function () {
    return view('mbti.mbti');})->name('mbti');

Route::get('/mbti/input', [MBTIController::class, 'showInputForm'])->name('mbti.input');
Route::post('/mbti/save', [MBTIController::class, 'saveMBTI'])->name('save.mbti');
Route::get('/mbti/chat/{mbti}', [MBTIController::class, 'showChat'])->name('mbti.chat');
Route::get('/anonymous-chat/{mbti}', [MBTIController::class, 'anonymousChat'])->name('mbti.anonymous');
Route::get('/partner/find-a-partner/{mbti}', [MBTIController::class, 'findPartner'])->name('partner.find');
Route::post('/save-mbti', [MBTIController::class, 'saveMbti'])->name('save-mbti');

// Route::get('/find-partner/{mbti}', [MBTIController::class, 'findPartner'])->name('find-partner');
// Route::post('/start-chat', [MBTIController::class, 'startChat'])->name('start-chat');


Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');});
Route::get('/static', [StaticController::class, 'static'])->name('static');
Route::get('/interaction',[StaticController::class, 'interaction'])->name('interaction');
Route::get('/rarely_interaction',[StaticController::class, 'rarely_interaction'])->name('rarely_interaction');
Route::get('/reject',[StaticController::class, 'reject'])->name('reject');


Route::get('/settings',[SettingsController::class, 'settings'])->name('settings');
Route::get('/settings/account',[SettingsController::class, 'account'])->name('settings.account');
Route::post('/settings/account', [SettingsController::class, 'updateAccount'])->name('account.update');
Route::get('/settings/change_eml',[SettingsController::class, 'change_eml'])->name('settings.change_eml');
Route::get('/settings/change_psswrd',[SettingsController::class, 'change_psswrd'])->name('settings.change_psswrd');
Route::post('/settings/change_eml', [SettingsController::class, 'updateEmail'])->name('account.updateEmail');
Route::get('/settings/change_psswrd',[SettingsController::class, 'change_psswrd'])->name('settings.changePassword');
Route::post('/settings/change_psswrd', [SettingsController::class, 'updatePassword'])->name('account.changePassword');

Route::get('/settings/languange',[SettingsController::class, 'languange'])->name('settings.languange');
Route::post('/change-language', [SettingsController::class, 'changeLanguage'])->name('change.language');

Route::get('/delete',[SettingsController::class, 'delete'])->name('delete');
Route::get('/delete',[SettingsController::class, 'deleteUser'])->name('deleteAccount');
Route::delete('/user/{id}', [SettingsController::class, 'deleteUser'])->name('user.delete');

Route::get('/settings/help',[HelpController::class, 'help'])->name('help');
Route::get('/feedback',[FeedbackController::class, 'feedback'])->name('feedback');
Route::post('/feedback', [FeedbackController::class, 'storeFeedback'])->name('feedback.store');

Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink']);
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset-password');
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

Route::post('/pusher/auth', [MessagesController::class, 'pusherAuth']);

Route::post('/send-message', function (Request $request) {
    $userMessage = $request->input('message');

    // Contoh respons bot berdasarkan input
    $botResponse = match ($userMessage) {
        'hello', 'hi' => 'Hi there! How can I help you today?',
        'bye' => 'Goodbye! Have a great day!',
        default => 'I am just a bot, but I am here to help!',
    };

    return response()->json([
        'message' => $botResponse
    ]);
});

Route::post('/help/submit', [HelpController::class, 'submit'])->name('help.submit');