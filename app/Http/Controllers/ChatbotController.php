<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    /**
     * Developer data — the chatbot reads from here.
     * Update this with your real info.
     */
    private function developerProfile(): array
    {
        return [
            'name'     => 'Vaneric San Pascual',
            'role'     => 'Full Stack Developer',
            'location' => 'Philippines',
            'email'    => 'vaneric@example.com',
            'github'   => 'https://github.com/vaneric',
            'linkedin' => 'https://linkedin.com/in/vaneric',
            'status'   => 'Available for work',
            'goal'     => 'Transition into the IT industry by 2027, then move towards AI and data science.',

            'skills' => [
                'frontend' => ['HTML/CSS', 'JavaScript', 'Flutter', 'Dart', 'Unity Engine'],
                'backend'  => ['PHP', 'Wordpress', 'Java', 'C#', 'C++'],
                'database' => ['MySQL', 'Xampp'],
                'tools'    => ['Git', 'GitHub', 'Trelo', 'Visual Studio Code', 'Ubuntu', 'Alt Tester', 'Canva', 'Adobe Photoshop', 'Capcut', 'Android Studio'],
                'learning' => ['Javascript', 'AI Integration'],
            ],

            'projects' => [
                [
                    'name'  => 'City of Faith',
                    'desc'  => 'In an age where many young people are more engaged with digital entertainment than with Scripture, traditional means of discipleship often struggle to capture their attention.',
                    'stack' => 'Unity Engine, C#, Blender',
                    'link'  => '#portfolio',
                ],
                [
                    'name'  => 'Student Voice Portal',
                    'desc'  => 'Developed a student reporting system enabling secure case tracking, investigations, and reliable submissions, fostering a safer, supportive school environment.',
                    'stack' => 'HTML/CSS, Javascript, PHP',
                    'link'  => '#portfolio',
                ],
                [
                    'name'  => 'Quiz App',
                    'desc'  => 'A Flutter-based quiz application built during a Udemy course. It features multiple-choice questions, score tracking, and a clean UI designed for mobile learning.',
                    'stack' => 'Flutter, Dart, Android Studio',
                    'link'  => '#portfolio',
                ],
                [
                    'name'  => 'Expense Chart App',
                    'desc'  => 'A Flutter mobile app that visualizes personal expenses with interactive charts. Built during a Udemy course to practice state management, chart rendering, and responsive UI design.',
                    'stack' => 'Flutter, Dart, Android Studio',
                    'link'  => '#portfolio',
                ],
                
                [
                    'name'  => 'Recipe App',
                    'desc'  => 'A Flutter mobile app built during a Udemy course that allows users to browse, search, and save recipes. It features category filtering, detailed recipe pages, and a clean, responsive UI.',
                    'stack' => 'Flutter, Dart, Android Studio',
                    'link'  => '#portfolio',
                ],

                [
                    'name'  => 'Dice App',
                    'desc'  => 'A simple Flutter app built during a Udemy course that simulates rolling dice. It demonstrates Flutter basics such as stateful widgets, random number generation, and responsive UI updates.',
                    'stack' => 'Flutter, Dart, Android Studio',
                    'link'  => '#portfolio',
                ],

            ],

            'experience' => [
                '2 years of continuous self-directed learning',
                'Completed a full-stack web development bootcamp',
                'Built 6+ full-stack applications independently',
                '3 professional certificates (Coursera, Udemy)',
            ],

            'certificates' => [
                'Full Stack Web Development — Coursera (2023)',
                'React: The Complete Guide — Udemy (2023)',
                'Node.js Developer Course — Udemy (2024)',
            ],
        ];
    }

    /**
     * Match incoming message to a topic and return a response.
     */
    public function message(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $input   = strtolower(trim($validated['message']));
        $profile = $this->developerProfile();
        $reply   = $this->generateReply($input, $profile);

        return response()->json([
            'success' => true,
            'reply'   => $reply,
        ]);
    }

    /**
     * Rule-based reply engine — matches keywords to smart responses.
     */
    private function generateReply(string $input, array $p): string
    {
        // ── Greetings ──────────────────────────────────────────────
        if ($this->matches($input, ['hello', 'hi', 'hey', 'good morning', 'good afternoon', 'good evening', 'howdy', 'sup', 'what\'s up'])) {
            return $this->random([
                "Hey there! 👋 I'm {$p['name']}'s assistant. You can ask me about his skills, projects, experience, or how to get in touch. What would you like to know?",
                "Hi! Welcome to {$p['name']}'s portfolio. 😊 Feel free to ask about his tech stack, projects, or anything else!",
                "Hello! Great to meet you. I'm here to tell you all about {$p['name']} — his work, skills, and projects. What are you curious about?",
            ]);
        }

        // ── Who are you / about ────────────────────────────────────
        if ($this->matches($input, ['who are you', 'who is vaneric', 'about you', 'tell me about', 'introduce', 'yourself'])) {
            return "I'm {$p['name']}, a passionate **{$p['role']}** based in {$p['location']}. \n\nI specialize in building smooth, scalable web and mobile applications. My goal is to transition into the IT industry by 2027 and eventually move towards AI and data science.\n\nWant to know more about my skills or projects?";
        }

        // ── Skills ────────────────────────────────────────────────
        if ($this->matches($input, ['skill', 'tech', 'stack', 'technology', 'tools', 'language', 'know', 'use', 'work with', 'expertise', 'good at', 'proficient'])) {
            $fe  = implode(', ', $p['skills']['frontend']);
            $be  = implode(', ', $p['skills']['backend']);
            $db  = implode(', ', $p['skills']['database']);
            $t   = implode(', ', $p['skills']['tools']);
            $lrn = implode(', ', $p['skills']['learning']);

            return "Here's {$p['name']}'s tech stack 🛠️\n\n**Frontend:** {$fe}\n**Backend:** {$be}\n**Databases:** {$db}\n**Tools:** {$t}\n**Currently learning:** {$lrn}\n\nCheck out the [Tech Stack](#portfolio) tab in the Portfolio section for more detail!";
        }

        // ── Projects ───────────────────────────────────────────────
        if ($this->matches($input, ['project', 'work', 'built', 'made', 'created', 'portfolio', 'app', 'application', 'show me', 'what have'])) {
            $lines = "";
            foreach ($p['projects'] as $proj) {
                $lines .= "\n\n**{$proj['name']}** — {$proj['desc']}\n*Stack: {$proj['stack']}*";
            }
            return "Here are {$p['name']}'s projects: {$lines}\n\nHead to the [Portfolio](#portfolio) section to see live demos and details!";
        }

        // ── Specific project: City of Faith ───────────────────────────
        if ($this->matches($input, ['City of Faith', 'Faith', 'City', 'Mobile Game'])) {
            $proj = $p['projects'][0];
            return "**{$proj['name']}** is one of {$p['name']}'s flagship projects! 🤖\n\n{$proj['desc']}\n\n**Tech Stack:** {$proj['stack']}\n\nYou can see it live in the [Portfolio](#portfolio) section!";
        }

        // ── Specific project: Student Voice Portal ───────────────────────────────
        if ($this->matches($input, ['Student', 'Voice', 'Portal', 'PUP'])) {
            $proj = $p['projects'][1];
            return "**{$proj['name']}** is a social platform {$p['name']} built from scratch! 📱\n\n{$proj['desc']}\n\n**Tech Stack:** {$proj['stack']}\n\nCheck it out in the [Portfolio](#portfolio) section!";
        }

        // ── Specific project: Quiz App ──────────────────────────────
        if ($this->matches($input, ['Quiz', 'App', 'Flutter', 'Dart', 'Android Studio'])) {
            $proj = $p['projects'][2];
            return "**{$proj['name']}** is {$p['name']}'s streaming app! 🎬\n\n{$proj['desc']}\n\n**Tech Stack:** {$proj['stack']}\n\nFind it in the [Portfolio](#portfolio) section!";
        }

        // ── Experience ────────────────────────────────────────────
        if ($this->matches($input, ['experience', 'background', 'history', 'years', 'how long', 'career', 'worked'])) {
            $exp = implode("\n• ", $p['experience']);
            return "Here's {$p['name']}'s experience background 💼\n\n• {$exp}\n\nHe's been building real projects consistently — check the [About](#about) section for the full picture!";
        }

        // ── Certificates ─────────────────────────────────────────
        if ($this->matches($input, ['certificate', 'certification', 'course', 'degree', 'study', 'education', 'learned', 'training'])) {
            $certs = implode("\n• ", $p['certificates']);
            return "**{$p['name']}'s Certifications** 🏆\n\n• {$certs}\n\nThese are displayed in the Certificates tab under [Portfolio](#portfolio)!";
        }

        // ── Contact ───────────────────────────────────────────────
        if ($this->matches($input, ['contact', 'reach', 'email', 'message', 'hire', 'available', 'work together', 'collaborate', 'get in touch', 'talk'])) {
            return "Want to connect with {$p['name']}? 📬\n\n**Email:** {$p['email']}\n**GitHub:** {$p['github']}\n**LinkedIn:** {$p['linkedin']}\n\nOr just fill out the form in the [Contact](#contact) section — he reads every message!";
        }

        // ── Hire / available ──────────────────────────────────────
        if ($this->matches($input, ['hire', 'hiring', 'job', 'freelance', 'open to work', 'opportunity', 'position', 'role'])) {
            return "Great news — {$p['name']} is currently **{$p['status']}**! 🟢\n\nHe's open to full-time roles, freelance projects, and collaborations in web development and related fields.\n\nSend him a message via the [Contact](#contact) section or reach out on LinkedIn!";
        }

        // ── CV / Resume ───────────────────────────────────────────
        if ($this->matches($input, ['cv', 'resume', 'download', 'pdf'])) {
            return "You can download {$p['name']}'s CV directly from the **[About](#about)** section — just click the **\"Download CV\"** button! 📄\n\nIt has his full experience, skills, and certifications.";
        }

        // ── GitHub ────────────────────────────────────────────────
        if ($this->matches($input, ['github', 'git', 'code', 'repository', 'repo', 'open source'])) {
            return "You can find {$p['name']}'s code on GitHub: **{$p['github']}** 💻\n\nHe regularly pushes his projects there. Feel free to explore and star anything you like!";
        }

        // ── LinkedIn ──────────────────────────────────────────────
        if ($this->matches($input, ['linkedin', 'linked in', 'professional', 'network'])) {
            return "Connect with {$p['name']} on LinkedIn: **{$p['linkedin']}** 🔗\n\nHe's active there and open to professional connections!";
        }

        // ── React ─────────────────────────────────────────────────
        if ($this->matches($input, ['react', 'reactjs', 'react.js', 'frontend'])) {
            return "Yes! React is one of {$p['name']}'s strongest skills. ⚛️\n\nHe's used it across multiple projects including IntervueAI, Blendy, and WATCHit — building everything from real-time apps to AI-powered platforms.\n\nCheck the [Portfolio](#portfolio) to see React in action!";
        }

        // ── Laravel ───────────────────────────────────────────────
        if ($this->matches($input, ['laravel', 'php', 'blade'])) {
            return "Laravel is {$p['name']}'s backend framework of choice for PHP projects. 🔥\n\nThis very portfolio is built with Laravel + Blade + TailwindCSS! He uses it to build clean, well-structured MVC applications.";
        }

        // ── Node.js ───────────────────────────────────────────────
        if ($this->matches($input, ['node', 'nodejs', 'node.js', 'express', 'backend'])) {
            return "{$p['name']} is proficient in **Node.js and Express.js** for backend development. ⚡\n\nHe's used it to build REST APIs for projects like IntervueAI and WATCHit, handling real-time data and server-side logic.";
        }

        // ── Location ──────────────────────────────────────────────
        if ($this->matches($input, ['where', 'location', 'country', 'city', 'based', 'from', 'live'])) {
            return "{$p['name']} is based in the **{$p['location']}** 🇵🇭\n\nHe works remotely and is open to both local and international opportunities!";
        }

        // ── Goals / future ────────────────────────────────────────
        if ($this->matches($input, ['goal', 'future', 'plan', 'aspiration', 'aim', 'dream', 'vision', 'ai', 'machine learning', 'data science'])) {
            return "{$p['name']}'s goal is to **{$p['goal']}** 🎯\n\nHe's currently building his portfolio of projects while leveling up in Python and AI/ML fundamentals to prepare for that transition.";
        }

        // ── Thanks ────────────────────────────────────────────────
        if ($this->matches($input, ['thank', 'thanks', 'thank you', 'cheers', 'appreciated', 'great', 'awesome', 'perfect', 'nice'])) {
            return $this->random([
                "You're welcome! 😊 Feel free to ask anything else about {$p['name']}'s work.",
                "Happy to help! 🙌 Don't hesitate if you have more questions.",
                "Anytime! Is there anything else you'd like to know about {$p['name']}?",
            ]);
        }

        // ── Bye ───────────────────────────────────────────────────
        if ($this->matches($input, ['bye', 'goodbye', 'see you', 'later', 'ciao', 'take care'])) {
            return "Thanks for stopping by! 👋 Feel free to come back anytime. Don't forget to check the [Contact](#contact) section if you want to work with {$p['name']}!";
        }
        
        // ── Jokes ───────────────────────────────────────────────
        if ($this->matches($input, ['joke', 'funny', 'humor', 'laugh'])) {
            return $this->random([
                "Why do programmers prefer dark mode? 🌙 Because light attracts bugs! 😄",
                "How many programmers does it take to change a light bulb? None — that's a hardware problem! 💡",
                "A SQL query walks into a bar, walks up to two tables and asks... 'Can I join you?' 😂",
            ]);
        }

        // ── Handsome ────────────────────────────────────────────
        if ($this->matches($input, ['handsome','pogi','pogi mo ya','pogi ba si vaneric'])) {
            return $this->random([
                "Of course, Vaneric is the handsome one. 😎",
                "No doubt about it — you’re undeniably handsome!",
                "The answer is simple: Vaneric is always the handsome guy.",
                "Handsome? That’s definitely you, no question.",
                "Everyone knows it — Vaneric is the definition of handsome.",
            ]);
        }

        // ── Default fallback ──────────────────────────────────────
        return $this->random([
            "That's an interesting question! I'm best at answering things about {$p['name']}'s skills, projects, experience, or contact info. Try asking something like:\n\n• \"What are your skills?\"\n• \"Show me your projects\"\n• \"Are you available for hire?\"",
            "I didn't quite catch that, but I'm here to help! You can ask about {$p['name']}'s **tech stack**, **projects**, **experience**, or **how to contact him**. What would you like to know?",
            "Hmm, I'm not sure about that one! I'm Vaneric's portfolio assistant — ask me about his skills, projects, or how to get in touch. 😊",
        ]);
    }

    /**
     * Check if input contains any of the given keywords.
     */
    private function matches(string $input, array $keywords): bool
    {
        foreach ($keywords as $keyword) {
            if (str_contains($input, $keyword)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Return a random item from an array (prevents repetitive answers).
     */
    private function random(array $options): string
    {
        return $options[array_rand($options)];
    }
}
