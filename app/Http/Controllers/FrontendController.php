<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\Contact;
use App\Models\DewanPengurus;
use App\Models\EventSchedule;
use App\Models\EventStory;
use App\Models\HeroEventPage;
use App\Models\HeroMerchandisePage;
use App\Models\HomeHeroImage;
use App\Models\HomeHeroText;
use App\Models\Member;
use App\Models\Merchandise;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function home()
    {
        $heroImage = HomeHeroImage::orderBy('created_at', 'desc')->get();
        $heroText = HomeHeroText::first();
        $about = AboutPage::first();
        $eventStory = EventStory::orderBy('created_at', 'desc')->limit(3)->get();
        $products = Merchandise::orderBy('created_at', 'desc')->limit(3)->get();
        $contact = Contact::first();

        return view('frontend.pages.home', [
            'heroImage' => $heroImage,
            'heroText' => $heroText,
            'about' => $about,
            'eventStory' => $eventStory,
            'products' => $products,
            'contact' => $contact
        ]);
    }

    public function about()
    {
        $aboutPage = AboutPage::first();
        $team1 = DewanPengurus::where('order', '1')->get();
        $team2 = DewanPengurus::where('order', '2')->get();


        return view('frontend.pages.about', [
            'aboutPage' => $aboutPage,
            'team1' => $team1,
            'team2' => $team2,

        ]);
    }

    public function event()
    {
        $hero = HeroEventPage::first();

        $stories = EventStory::with('author')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('frontend.pages.event', [
            'hero' => $hero,
            'stories' => $stories,
        ]);
    }

    public function eventShow(EventStory $story)
    {

        $moreStories = EventStory::where('id', '!=', $story->id)
            ->inRandomOrder()   // <-- random 3
            ->limit(3)
            ->get();

        return view('components.frontend.event.event-story-show', compact('story', 'moreStories'));
    }

    public function eventScheduleShow(EventSchedule $event)
    {
        return view('components.frontend.event.event-schedule-show', compact('event'));
    }

    public function merchandise()
    {
        $heroMerchandise = HeroMerchandisePage::first();
        $products = Merchandise::orderBy('created_at', 'desc')->paginate(12);

        return view('frontend.pages.merchandise', [
            'hero' => $heroMerchandise,
            'products' => $products,
        ]);
    }

    public function merchandiseShow(Merchandise $product)
    {
        $contact = Contact::first();
        $whatsapp = $contact->whatsapp;
        return view('components.frontend.merchandise.merchandise-show', compact('product', 'whatsapp'));
    }

    // Berubah langsung menggunakan livewire page
    // public function profile()
    // {
    //     $user = Auth::user();
    //     $members = Member::all();
    //     $kasHistory = $user->member->payments()->orderBy('created_at', 'desc')->get();
    //     $contact = Contact::first();

    //     return view('frontend.pages.profile', [
    //         'user' => $user,
    //         'members' => $members,
    //         'kasHistory' => $kasHistory,
    //         'contact' => $contact
    //     ]);
    // }


    public function profileSetting($id)
    {
        $user = User::find($id);
        return view('frontend.pages.profile-setting', [
            'user' => $user
        ]);
    }

    public function login()
    {

        return view('frontend.auth.login');
    }

    public function register()
    {
        return view('frontend.auth.register');
    }

    public function forgotPassword()
    {
        return view('frontend.auth.forgot-password');
    }

    public function resetPassword($token) // ✅ benar
    {
        return view('frontend.auth.reset-password', compact('token'));
    }
}
