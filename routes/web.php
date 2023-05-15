<?php

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuditionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\VolunteerController;



Route::get('/thanks', function () {
    return view('thanks');
});

Route::get('/about-oratorio', function () {
    return view('aboutUs');
});

Route::get('/contact-oratorio', function () {
    return view('contactUs');
});
 

Route::get('/gallery-oratorio', function () {
    $galleries = Cache::remember('random_posts', 60 * 24 * 7, function () {
        return Post::with(['images'])
            ->select('id', 'user_id', 'slug', 'content', 'created_at')
            ->where('category_id', 'Gallery')
            ->inRandomOrder()
            ->limit(20)
            ->get();
    });
    return view('gallery', compact('galleries'));
});
 
Route::controller(AuditionController::class)->group(function () { 
    Route::get('/auditions', 'index')->name('audition.index');
    Route::get('/auditions/questions', 'list')->name('audition.list');
    Route::get('/auditions/save', 'auditionParticipant')->name('audition.participant');
    Route::post('/auditions/store', 'store')->name('audition.store');
    Route::get('/audition/{audition}/edit', 'edit')->name('audition.edit');
    Route::put('/audition/{audition}', 'update')->name('audition.update');
    Route::delete('/audition/{audition}', 'destroy')->name('audition.destroy');

    Route::get('/auditions/test', 'takeTest')->name('audition.test');
    Route::post('/auditions/test/store', 'submitTest')->name('test.store');
    Route::get('/auditions/test/done', 'finishTest')->name('test.finish');

});

Route::resource('volunteer', VolunteerController::class);
Route::resource('/', WelcomeController::class);

Route::get('/feeds', [HomeController::class, 'index'])->name('dashboard.index');

Route::resource('contact', ContactController::class);
Route::post('subcribe', [ContactController::class, 'letter'])->name('letter.subcribe');
Route::post('testify', [ContactController::class, 'testify'])->name('testify.testifer');

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users.index');
    Route::post('/users', 'store')->name('users.store');
    Route::get('/users/{user}/edit', 'edit')->name('users.edit');
    Route::put('/users/{user}', 'update')->name('users.update');
    Route::post('/connect-user', 'connect')->name('users.connect');
    Route::post('/unconnect-user', 'unconnect')->name('users.unconnect');
    Route::post('/follow-user', 'follow')->name('users.follow');
    Route::post('/unfollow-user', 'unfollow')->name('users.unfollow');
    Route::delete('/users/{user}', 'destroy')->name('users.destroy');
    Route::get('/logout', 'logout')->name('user.logout');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/post',  'index')->name('post.index');
    Route::get('/job-post',  'job')->name('job-post.index');
    Route::get('/content-list',  'list')->name('post.list');
    Route::get('/events',  'event')->name('event-post.index');
    Route::get('/post/{post}/edit',  'edit')->name('post.edit');
    Route::post('/comment/{post:slug}/comment',  'comment')->name('posts.comment');
    Route::post('/comment/{post:slug}/uncomment',  'uncomment')->name('posts.uncomment');
    Route::post('/like/{post:slug}/like',  'like')->name('posts.like');
    Route::post('/posts',  'store')->name('post.store');
    Route::get('/post/{post:slug}',  'show')->name('post.show');
    Route::put('/post/{post}', 'update')->name('post.update');
    Route::delete('/post/{post}', 'destroy')->name('post.destroy');
    
});

Route::controller(CommunityController::class)->group(function () {
    Route::get('/community',  'index')->name('community.index');
    Route::post('/community',  'store')->name('community.store');
    Route::post('/community/{chapter:slug}',  'show')->name('community.show');
    Route::get('/community/{chapter}/edit',  'edit')->name('community.edit');
    Route::post('/community/{community}',  'update')->name('community.update');
    Route::delete('/community/{community}/delete',  'destroy')->name('community.destroy');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile/{user}/edit', 'profile')->name('profile.edit');
    Route::put('/user-profile/{user}', 'updateProfile')->name('profile.update');
    Route::post('/experience/store', 'storeExperience')->name('experience.store');
    Route::put('/experience/{user}/update', 'updateExperience')->name('experience.update');
    Route::get('/field', 'indexField')->name('field.index');
    Route::get('/field/{field}/edit', 'editField')->name('field.edit');
    Route::post('/field/store', 'storeField')->name('field.store');
    Route::put('/field/update{field}', 'updateField')->name('field.update');
    Route::delete('/field/{field}/delete', 'destroyField')->name('field.destroy');
    Route::get('/industry', 'indexIndustry')->name('industry.index');
    Route::get('/industry/{industry}/edit', 'editIndustry')->name('industry.edit');
    Route::post('/industry/store', 'storeIndustry')->name('industry.store');
    Route::put('/industry/update{industry}', 'updateIndustry')->name('industry.update');
    Route::delete('/industry/{industry}/delete', 'destroyIndustry')->name('industry.destroy');
    Route::post('/education/store', 'storeEducation')->name('education.store');
    Route::put('/education/{user}/update', 'updateEducation')->name('education.update');
    Route::post('/social/store', 'storeSocial')->name('social.store');
    Route::put('/social/{user}/update', 'updateSocial')->name('social.update');
    Route::post('/skill/store', 'storeSkill')->name('skill.store');
    Route::put('/skill/{user}/update', 'updateSkill')->name('skill.update');

}); 
