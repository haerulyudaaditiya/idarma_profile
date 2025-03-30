<?php

namespace App\Http\Controllers;

use App\Models\VisionAndMision;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Portfolio;
use App\Models\News;
use App\Models\Tag;
use App\Models\Position;

class HomeController extends Controller
{
    public function index()
    {
        $visions = VisionAndMision::first();
        $services = Service::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $portfolios = Portfolio::latest()->get();
        $services = Service::all();
        $latestNews = News::with('category')->latest()->take(3)->get();

        $positions = Position::with('organization.user')
            ->whereHas('organization.user') // hanya posisi yang punya user
            ->get();
        $grouped = $positions->groupBy('structure');

        $buildTree = function ($structure = null) use (&$buildTree, $grouped) {
            $html = '<ul>';
            foreach ($grouped->get($structure, []) as $position) {
                $user = optional($position->organization)->user;
                $img = $user?->img ? asset('storage/' . $user->img) : asset('assets/img/team/user.png');

                $html .= '<li>
            <div class="member-card">
                <img src="' . $img . '" alt="">
                <p class="name">' . ($user->name ?? '-') . '</p>
                <p class="title">' . $position->name_position . '</p>
                <div class="social">';

                if ($user) {
                    $html .= $user->twiter ? '<a href="' . $user->twiter . '"><i class="bi bi-twitter-x"></i></a>' : '';
                    $html .= $user->facebok ? '<a href="' . $user->facebok . '"><i class="bi bi-facebook"></i></a>' : '';
                    $html .= $user->instagram ? '<a href="' . $user->instagram . '"><i class="bi bi-instagram"></i></a>' : '';
                    $html .= $user->linkedin ? '<a href="' . $user->linkedin . '"><i class="bi bi-linkedin"></i></a>' : '';
                }

                $html .= '</div></div>';
                $html .= $buildTree($position->serial);
                $html .= '</li>';
            }
            $html .= '</ul>';
            return $html;
        };

        $organizationTreeHtml = $buildTree();
        return view('pages.home', compact('visions', 'services', 'testimonials', 'portfolios', 'latestNews', 'organizationTreeHtml'));
    }

    public function news()
    {
        $news = News::with('category')->latest()->paginate(6);

        return view('pages.sections.news', compact('news'));
    }

    public function news_detail(News $news)
    {
        $recentNews = News::latest()->take(5)->get();
        $allTags = Tag::all();

        return view('pages.sections.news-detail', compact('news', 'recentNews', 'allTags'));
    }

    public function userHome()
    {
        return view('pages.user-home'); // atau 'pages.beranda'
    }
}
