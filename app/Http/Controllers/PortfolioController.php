<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    protected function developerData(): array
    {
        return [
            'name'                => 'Vaneric San Pascual',
            'profile_image'       => 'images/profile.png',
            'profile_image_light' => 'images/profile_shys.png',
            'tagline'             => 'Ready to Innovate',
            'role_prefix'         => 'Full Stack',
            'role_suffix'         => 'Developer',
            'description'         => 'Shaping digital worlds that flow seamlessly, scale infinitely, and inspire awe at every click.',
            'tech_tags'           => ['Flutter', 'C#', 'Unity Engine', 'Javascript'],
            'social_links' => [
                ['label' => 'GitHub',    'href' => 'https://github.com/Muzukash1',                                  'icon' => 'github'],
                ['label' => 'LinkedIn',  'href' => 'http://www.linkedin.com/in/san-pascual-vaneric-3a5253368/',     'icon' => 'linkedin'],
                ['label' => 'Instagram', 'href' => '#',                                                              'icon' => 'instagram'],
            ],
        ];
    }

    protected function navLinks(): array
    {
        return [
            ['label' => 'Home',      'href' => '#home'],
            ['label' => 'About',     'href' => '#about'],
            ['label' => 'Portfolio', 'href' => '#portfolio'],
            ['label' => 'Contact',   'href' => '#contact'],
        ];
    }

    protected function aboutData(): array
    {
        return [
            'bio'    => "Hello, I'm <strong class=\"text-white\">Vaneric San Pascual</strong> passionate about building smart and scalable web &amp; mobile applications. I've completed a full-stack development course and constantly explore new technologies to refine my skills. Focused on continuous learning, I aim to transition into the IT industry by 2027 and eventually move towards AI and Software Engineer.",
            'cv_url' => '/cv/Vaneric San Pascual - CV.pdf',
            'stats'  => [
                ['icon' => 'code-2', 'value' => '6', 'label' => 'Total Projects',     'sublabel' => 'Innovative web & mobile solutions crafted'],
                ['icon' => 'award',  'value' => '3', 'label' => 'Certificates',        'sublabel' => 'Professional skills validated'],
                ['icon' => 'globe',  'value' => '2', 'label' => 'Years of Experience', 'sublabel' => 'Continuous learning journey'],
            ],
        ];
    }

    protected function portfolioData(): array
    {
        return [
            'has_more_projects' => false, // set true when you have more than 6
            'projects' => [
                [
                    'title'       => 'City of Faith',
                    'description' => 'In an age where many young people are more engaged with digital entertainment than with Scripture, traditional means of discipleship often struggle to capture their attention.',
                    'image'       => 'images/projects/cityoffaith.png',
                    'tags'        => ['Unity Engine', 'C#', 'Blender'],
                    'demo_url'    => 'https://www.youtube.com/watch?v=ZL5ZKwbbWrA',
                    'details_url' => 'https://cityoffaith.site/about',
                ],
                [
                    'title'       => 'Student Voice Portal',
                    'description' => 'Developed a student reporting system enabling secure case tracking, investigations, and reliable submissions, fostering a safer, supportive school environment.',
                    'image'       => 'images/projects/pup_taguig_campus.Jpg',
                    'tags'        => ['HTML/CSS', 'Javascript', 'PHP'],
                    'demo_url'    => '#',
                    'details_url' => '#',
                ],
                [
                    'title'       => 'Quiz App',
                    'description' => 'A Flutter-based quiz application built during a Udemy course. It features multiple-choice questions, score tracking, and a clean UI designed for mobile learning.',
                    'image'       => 'images/projects/flutter.png',
                    'tags'        => ['Flutter', 'Dart', 'Android Studio'],
                    'demo_url'    => '#',
                    'details_url' => 'https://gitlab.com/vsanpascual.xoointern/quiz_app',
                ],
                [
                    'title'       => 'Expense Chart App',
                    'description' => 'A Flutter mobile app that visualizes personal expenses with interactive charts. Built during a Udemy course to practice state management, chart rendering, and responsive UI design.',
                    'image'       => 'images/projects/flutter.png',
                    'tags'        => ['Flutter', 'Dart', 'Android Studio'],
                    'demo_url'    => '#',
                    'details_url' => 'https://gitlab.com/vsanpascual.xoointern/expense_chart',
                ],
                [
                    'title'       => 'Recipe App',
                    'description' => 'A Flutter mobile app built during a Udemy course that allows users to browse, search, and save recipes. It features category filtering, detailed recipe pages, and a clean, responsive UI.',
                    'image'       => 'images/projects/flutter.png',
                    'tags'        => ['Flutter', 'Dart', 'Android Studio'],
                    'demo_url'    => '#',
                    'details_url' => 'https://gitlab.com/vsanpascual.xoointern/recipe_app',
                ],
                [
                    'title'       => 'Dice App',
                    'description' => 'A simple Flutter app built during a Udemy course that simulates rolling dice. It demonstrates Flutter basics such as stateful widgets, random number generation, and responsive UI updates.',
                    'image'       => 'images/projects/flutter.png',
                    'tags'        => ['Flutter', 'Dart', 'Android Studio'],
                    'demo_url'    => '#',
                    'details_url' => 'https://gitlab.com/vsanpascual.xoointern/dice_app',
                ],
            ],
            'certificates' => [
                ['title' => 'Full Stack Web Development', 'issuer' => 'Coursera', 'date' => '2023', 'url' => '#'],
                ['title' => 'React – The Complete Guide',  'issuer' => 'Udemy',    'date' => '2023', 'url' => '#'],
                ['title' => 'Node.js Developer Course',    'issuer' => 'Udemy',    'date' => '2024', 'url' => '#'],
            ],
            'tech_stack' => [
                [
                    'category' => 'Frontend',
                    'items' => [
                        ['name' => 'HTML/CSS',    'icon' => 'layout'],
                        ['name' => 'JavaScript',  'icon' => 'code-2'],
                        ['name' => 'Flutter',     'icon' => 'smartphone'],
                        ['name' => 'Dart',        'icon' => 'braces'],
                        ['name' => 'Unity Engine','icon' => 'gamepad'],
                    ],
                ],
                [
                    'category' => 'Backend',
                    'items' => [
                        ['name' => 'PHP',        'icon' => 'server'],
                        ['name' => 'WordPress',  'icon' => 'file-text'],
                        ['name' => 'Java',       'icon' => 'coffee'],
                        ['name' => 'C#',         'icon' => 'hash'],
                        ['name' => 'C++',        'icon' => 'terminal'],
                    ],
                ],
                [
                    'category' => 'Database',
                    'items' => [
                        ['name' => 'MySQL', 'icon' => 'database'],
                        ['name' => 'XAMPP', 'icon' => 'layers'],
                    ],
                ],
                [
                    'category' => 'Tools & Platforms',
                    'items' => [
                        ['name' => 'Git/GitHub',         'icon' => 'git-branch'],
                        ['name' => 'Trello',             'icon' => 'check-square'],
                        ['name' => 'Visual Studio Code', 'icon' => 'code'],
                        ['name' => 'Ubuntu',             'icon' => 'monitor'],
                        ['name' => 'Alt Tester',         'icon' => 'activity'],
                        ['name' => 'Canva',              'icon' => 'image'],
                        ['name' => 'Adobe Photoshop',    'icon' => 'aperture'],
                        ['name' => 'Capcut',             'icon' => 'film'],
                        ['name' => 'Android Studio',     'icon' => 'cpu'],
                    ],
                ],
            ],
        ];
    }

    protected function contactData(): array
    {
        return [
            'info' => [
                ['icon' => 'mail',       'label' => 'Email',    'value' => 'vanericsp@gmail.com',     'href' => 'mailto:vanericsp@gmail.com'],
                ['icon' => 'map-pin',    'label' => 'Location', 'value' => 'Philippines',              'href' => 'https://maps.google.com/?q=Philippines'],
                ['icon' => 'git-branch', 'label' => 'GitHub',   'value' => 'github.com/Muzukash1',    'href' => 'https://github.com/Muzukash1'],
            ],
        ];
    }

    public function index()
    {
        return view('home', [
            'developer' => $this->developerData(),
            'navLinks'  => $this->navLinks(),
            'about'     => $this->aboutData(),
            'portfolio' => $this->portfolioData(),
            'contact'   => $this->contactData(),
        ]);
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        return redirect()->route('home')->with('success', 'Thank you! Your message has been sent.');
    }
}
